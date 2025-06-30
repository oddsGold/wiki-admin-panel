import {Stack} from 'aws-cdk-lib';
import * as ec2 from 'aws-cdk-lib/aws-ec2';
import * as iam from 'aws-cdk-lib/aws-iam';

class MyEc2AppStack extends Stack {
    constructor(scope, id, props) {
        super(scope, id, props);

        // 1. Створюємо VPC
        const vpc = new ec2.Vpc(this, 'MyVpc', {
            natGateways: 0,
            subnetConfiguration: [
                {
                    name: 'public-subnet',
                    subnetType: ec2.SubnetType.PUBLIC,
                }
            ],
        });

        // 2. Створюємо роль IAM для EC2 інстансу
        const role = new iam.Role(this, 'MyEc2Role', {
            assumedBy: new iam.ServicePrincipal('ec2.amazonaws.com'),
            managedPolicies: [
                iam.ManagedPolicy.fromAwsManagedPolicyName('AmazonSSMManagedInstanceCore'),
            ],
        });

        const key = new ec2.CfnKeyPair(this, 'MyKeyPair', {
            keyName: 'my-key-pair',
        });

        // 3. Створюємо EC2 інстанс
        const instance = new ec2.Instance(this, 'MyInstance', {
            instanceType: ec2.InstanceType.of(ec2.InstanceClass.T2, ec2.InstanceSize.MICRO),
            machineImage: new ec2.AmazonLinuxImage({
                generation: ec2.AmazonLinuxGeneration.AMAZON_LINUX_2023,
            }),
            vpc,
            vpcSubnets: {
                subnetType: ec2.SubnetType.PUBLIC,
            },
            role,
            keyName: key.keyName,
        });

        // 4. Дозволяємо HTTP трафік на інстанс (публічний доступ до порту 80)
        instance.connections.allowFromAnyIpv4(ec2.Port.tcp(80), 'Allow HTTP');

        // 5. Встановлюємо Docker та Docker Compose через UserData
        instance.userData.addCommands(
            '#!/bin/bash -xe',
            // Оновлення та встановлення пакетів
            'sudo yum update -y',
            'sudo yum install -y docker git python3-pip',

            // Встановлення останньої версії docker-compose
            'sudo curl -L https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose',
            'sudo chmod +x /usr/local/bin/docker-compose',

            // Налаштування Docker
            'sudo usermod -aG docker ec2-user',
            'sudo systemctl enable docker.service',
            'sudo systemctl start docker.service',

            // Оновлення груп для поточної сесії
            'exec sg docker -c "',  // Починаємо нову сесію з групою docker

            // Робота з проектом
            'cd /home/ec2-user',
            'sudo rm -rf app',
            'git clone https://github.com/oddsGold/wiki-admin-panel.git app',
            'cd app',

            // Створення .env файлу
            'touch .env',

            // Права для Laravel
            'sudo chown -R ec2-user:ec2-user /home/ec2-user/app',
            'sudo chmod -R 775 storage bootstrap/cache',

            // Запуск контейнерів
            'docker-compose up -d --build',

            '"'  // Закриваємо сесію sg docker
        );


        // 7. При необхідності, можна додати DNS запис для Route 53
        // new route53.ARecord(this, 'AliasRecord', {
        //     zone: hostedZone,
        //     target: route53.RecordTarget.fromIpAddresses(eip.ref),
        //     recordName: 'my-website.example.com',
        // });
    }
}

export {MyEc2AppStack};
