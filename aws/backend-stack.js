import { Stack } from 'aws-cdk-lib';
import * as ec2 from 'aws-cdk-lib/aws-ec2';
import * as iam from 'aws-cdk-lib/aws-iam';

class MyEc2AppStack extends Stack {
    constructor(scope, id, props) {
        super(scope, id, props);

        // 1. Створюємо VPC
        const vpc = new ec2.Vpc(this, 'MyVpc', { maxAzs: 3 });

        // 2. Створюємо роль IAM для EC2 інстансу
        const role = new iam.Role(this, 'MyEc2Role', {
            assumedBy: new iam.ServicePrincipal('ec2.amazonaws.com'),
            managedPolicies: [
                iam.ManagedPolicy.fromAwsManagedPolicyName('AmazonSSMManagedInstanceCore'), // для використання SSM
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
            role,
            keyName: key.keyName,
        });

        // 4. Дозволяємо HTTP трафік на інстанс (публічний доступ до порту 80)
        instance.connections.allowFromAnyIpv4(ec2.Port.tcp(80), 'Allow HTTP');

        // 5. Встановлюємо Docker та Docker Compose через UserData
// …попередні імпорт і створення instance…

// 5. User-data
        instance.userData.addCommands(
            '#!/bin/bash -xe',
            // Оновлення системи
            'dnf update -y',

            // Встановлення необхідних пакетів
            'dnf install -y moby-engine git python3-pip',
            'pip3 install docker-compose',

            // Налаштування Docker
            'usermod -aG docker ec2-user',
            'systemctl enable --now docker',

            // Очікування запуску Docker (важливо для подальших команд)
            'while ! docker info >/dev/null 2>&1; do sleep 1; done',

            // Робота з проектом
            'cd /home/ec2-user',
            'rm -rf app',
            'git clone https://github.com/oddsGold/wiki-admin-panel.git app',
            'cd app',

            // Створення .env файлу, якщо його немає
            'if [ ! -f .env ]; then cp .env.example .env; fi',

            // Запуск контейнерів
            'docker-compose up -d --build',

            // Додаткові права для папок (якщо потрібно для Laravel)
            'chown -R ec2-user:ec2-user /home/ec2-user/app',
            'chmod -R 775 /home/ec2-user/app/storage /home/ec2-user/app/bootstrap/cache'
        );





        // 7. При необхідності, можна додати DNS запис для Route 53
        // new route53.ARecord(this, 'AliasRecord', {
        //     zone: hostedZone,
        //     target: route53.RecordTarget.fromIpAddresses(eip.ref),
        //     recordName: 'my-website.example.com',
        // });
    }
}

export { MyEc2AppStack };
