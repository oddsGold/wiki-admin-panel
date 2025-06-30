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
            // 1) Оновлюємо систему
            'yum update -y',

            // 2) Ставимо Docker через amazon-linux-extras + Git + плагін Docker Compose
            'amazon-linux-extras install -y docker',
            'yum install -y git docker-compose-plugin',

            // 3) Запускаємо й додаємо в автозапуск Docker
            'systemctl enable --now docker',

            // 4) Переходимо в домашню теку ec2-user і клоніруємо ваш репозиторій
            'cd /home/ec2-user',
            'rm -rf app',  // почистимо, якщо було
            'git clone https://github.com/oddsGold/wiki-admin-panel.git app',

            // 5) Переключаємося в теку з docker-compose.yml і піднімаємо сервіси
            'cd app',
            'docker compose up -d'
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
