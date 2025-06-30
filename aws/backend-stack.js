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
            instanceType: ec2.InstanceType.of(ec2.InstanceClass.T2, ec2.InstanceSize.MICRO), // можна вибрати більш потужний тип
            machineImage: ec2.MachineImage.latestAmazonLinux2(), // використання Amazon Linux 2
            vpc,
            role,
            keyName: key.keyName, // вказати свій SSH ключ для підключення до інстансу
        });

        // 4. Дозволяємо HTTP трафік на інстанс (публічний доступ до порту 80)
        instance.connections.allowFromAnyIpv4(ec2.Port.tcp(80), 'Allow HTTP');

        // 5. Встановлюємо Docker та Docker Compose через UserData
        instance.userData.addCommands(
            '#!/bin/bash',
            'set -xe',

            // 1. Оновимо OS і встановимо Docker + Git
            'yum update -y',
            'amazon-linux-extras install docker -y',
            'yum install -y git',

            // 2. Запустимо та ввімкнемо Docker
            'systemctl enable --now docker',

            // 3. Встановимо docker-compose
            // Варіант A: плагін
            'yum install -y docker-compose-plugin || true',
            // Варіант B: standalone (закоментуйте один з варіантів, щоб не було конфлікту)
            'curl -L "https://github.com/docker/compose/releases/download/v2.20.2/docker-compose-linux-x86_64" -o /usr/local/bin/docker-compose',
            'chmod +x /usr/local/bin/docker-compose',

            // 4. Клонуємо ваш репозиторій і піднімаємо стеки
            'cd /home/ec2-user',
            'rm -rf app',
            'git clone https://github.com/oddsGold/wiki-admin-panel.git app',
            'cd app',
            // в залежності від того, як у вас в проекті називається команда:
            '/usr/local/bin/docker-compose up -d || docker compose up -d'
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
