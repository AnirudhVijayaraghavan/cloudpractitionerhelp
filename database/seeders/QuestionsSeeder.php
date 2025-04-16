<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Example question data. You can expand this list as needed.
        $questions = [
            [
                'text' => 'What is the primary benefit of AWS Regions?',
                'options' => json_encode([
                    'Data residency and compliance',
                    'Reduced latency for end users',
                    'High availability and fault tolerance',
                    'All of the above'
                ]),
                'correct_answer' => 'All of the above',
                'explanation' => 'AWS Regions offer data residency, lower latency, and enhanced availability by isolating resources in distinct geographical areas.'
            ],
            [
                'text' => 'What is an Availability Zone (AZ) in AWS?',
                'options' => json_encode([
                    'A single physical server',
                    'A collection of one or more discrete data centers with redundant power, networking, and connectivity',
                    'A global region',
                    'A virtual network segment'
                ]),
                'correct_answer' => 'A collection of one or more discrete data centers with redundant power, networking, and connectivity',
                'explanation' => 'An Availability Zone consists of one or more data centers that are engineered to be isolated from failures in other AZs, ensuring high availability.'
            ],
            [
                'text' => 'Which AWS service is designed for scalable Domain Name System (DNS) management?',
                'options' => json_encode([
                    'Amazon CloudFront',
                    'Amazon Route 53',
                    'AWS Direct Connect',
                    'AWS IAM'
                ]),
                'correct_answer' => 'Amazon Route 53',
                'explanation' => 'Amazon Route 53 is a scalable DNS web service designed to route end users to Internet applications.'
            ],
            [
                'text' => 'What does AWS’s “Shared Responsibility Model” imply?',
                'options' => json_encode([
                    'AWS is responsible for both infrastructure and application security',
                    'The customer is solely responsible for all security aspects',
                    'AWS manages security “of” the cloud while customers manage security “in” the cloud',
                    'Security is managed only by a third-party vendor'
                ]),
                'correct_answer' => 'AWS manages security “of” the cloud while customers manage security “in” the cloud',
                'explanation' => 'In the Shared Responsibility Model, AWS secures the infrastructure, and the customer is responsible for securing their applications and data.'
            ],
            [
                'text' => 'Which AWS service provides object storage that is highly scalable and durable?',
                'options' => json_encode([
                    'Amazon EBS',
                    'Amazon EFS',
                    'Amazon S3',
                    'Amazon Glacier'
                ]),
                'correct_answer' => 'Amazon S3',
                'explanation' => 'Amazon S3 is designed for scalable, durable, and secure object storage.'
            ],
            [
                'text' => 'Which pricing model does AWS offer to reduce costs when you commit to a one- or three-year term?',
                'options' => json_encode([
                    'On-Demand Pricing',
                    'Reserved Instances',
                    'Spot Instances',
                    'Volume Pricing'
                ]),
                'correct_answer' => 'Reserved Instances',
                'explanation' => 'Reserved Instances allow customers to commit to a term and receive a discount compared to on-demand pricing.'
            ],
            [
                'text' => 'Which AWS service is best suited for running containerized applications?',
                'options' => json_encode([
                    'Amazon ECS',
                    'Amazon S3',
                    'Amazon RDS',
                    'Amazon DynamoDB'
                ]),
                'correct_answer' => 'Amazon ECS',
                'explanation' => 'Amazon Elastic Container Service (ECS) is a fully managed container orchestration service that supports Docker containers.'
            ],
            [
                'text' => 'What is the primary function of AWS Lambda?',
                'options' => json_encode([
                    'To host static websites',
                    'To run code without provisioning or managing servers',
                    'To store data persistently',
                    'To manage virtual machines'
                ]),
                'correct_answer' => 'To run code without provisioning or managing servers',
                'explanation' => 'AWS Lambda enables you to run code in response to events without provisioning or managing servers.'
            ],
            [
                'text' => 'Which AWS service is commonly used for monitoring resources and applications in real time?',
                'options' => json_encode([
                    'Amazon CloudWatch',
                    'AWS CloudFormation',
                    'Amazon SNS',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'Amazon CloudWatch',
                'explanation' => 'Amazon CloudWatch is used for monitoring AWS resources and applications in real time by collecting and tracking metrics, logs, and events.'
            ],
            [
                'text' => 'What is the key benefit of implementing Auto Scaling in AWS?',
                'options' => json_encode([
                    'It automatically deploys new servers without cost',
                    'It dynamically adjusts capacity to maintain steady, predictable performance',
                    'It improves data encryption',
                    'It monitors user activity'
                ]),
                'correct_answer' => 'It dynamically adjusts capacity to maintain steady, predictable performance',
                'explanation' => 'Auto Scaling automatically adjusts the number of compute resources based on demand to maintain performance and reduce costs.'
            ],
            [
                'text' => 'Which AWS service allows you to define and provision infrastructure as code?',
                'options' => json_encode([
                    'AWS CloudFormation',
                    'AWS OpsWorks',
                    'Amazon EC2',
                    'AWS IAM'
                ]),
                'correct_answer' => 'AWS CloudFormation',
                'explanation' => 'AWS CloudFormation enables you to model, provision, and manage AWS and third-party resources by treating infrastructure as code.'
            ],
            [
                'text' => 'Which AWS service is primarily used for NoSQL database management?',
                'options' => json_encode([
                    'Amazon Aurora',
                    'Amazon RDS',
                    'Amazon DynamoDB',
                    'Amazon Redshift'
                ]),
                'correct_answer' => 'Amazon DynamoDB',
                'explanation' => 'Amazon DynamoDB is a fully managed NoSQL database service known for low latency and scalability.'
            ],
            [
                'text' => 'What is a key advantage of using Amazon Aurora?',
                'options' => json_encode([
                    'It is a NoSQL database',
                    'It provides high availability and scalability with MySQL and PostgreSQL compatibility',
                    'It is only available in one AWS region',
                    'It does not support replication'
                ]),
                'correct_answer' => 'It provides high availability and scalability with MySQL and PostgreSQL compatibility',
                'explanation' => 'Amazon Aurora offers the performance and availability of high-end commercial databases at a cost-effective price.'
            ],
            [
                'text' => 'Which AWS service is designed for high-performance data warehousing?',
                'options' => json_encode([
                    'Amazon Redshift',
                    'Amazon DynamoDB',
                    'Amazon RDS',
                    'Amazon ElastiCache'
                ]),
                'correct_answer' => 'Amazon Redshift',
                'explanation' => 'Amazon Redshift is a fully managed, petabyte-scale data warehouse service in the cloud.'
            ],
            [
                'text' => 'What does Amazon VPC allow you to do?',
                'options' => json_encode([
                    'Create isolated networks within the AWS Cloud',
                    'Run containerized applications',
                    'Manage DNS records',
                    'Automatically scale applications'
                ]),
                'correct_answer' => 'Create isolated networks within the AWS Cloud',
                'explanation' => 'Amazon Virtual Private Cloud (VPC) lets you provision a logically isolated section of the AWS Cloud to launch AWS resources in a virtual network.'
            ],
            [
                'text' => 'Which AWS service provides fully managed caching for web applications?',
                'options' => json_encode([
                    'Amazon RDS',
                    'Amazon S3',
                    'Amazon ElastiCache',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'Amazon ElastiCache',
                'explanation' => 'Amazon ElastiCache is a fully managed in-memory data store, compatible with Redis or Memcached, to improve application performance.'
            ],
            [
                'text' => 'What is AWS Identity and Access Management (IAM) used for?',
                'options' => json_encode([
                    'Storing files securely',
                    'Managing encryption keys',
                    'Controlling user access to AWS resources',
                    'Monitoring application performance'
                ]),
                'correct_answer' => 'Controlling user access to AWS resources',
                'explanation' => 'IAM is used to manage users, groups, and roles to control access to AWS services and resources securely.'
            ],
            [
                'text' => 'Which pricing model allows AWS customers to bid on spare capacity?',
                'options' => json_encode([
                    'On-Demand Instances',
                    'Reserved Instances',
                    'Spot Instances',
                    'Dedicated Hosts'
                ]),
                'correct_answer' => 'Spot Instances',
                'explanation' => 'Spot Instances allow customers to bid on unused AWS capacity at potentially lower costs than on-demand pricing.'
            ],
            [
                'text' => 'Which AWS service is best suited for hosting static websites?',
                'options' => json_encode([
                    'Amazon EC2',
                    'Amazon S3',
                    'AWS Lambda',
                    'Amazon RDS'
                ]),
                'correct_answer' => 'Amazon S3',
                'explanation' => 'Amazon S3 can be configured to host static websites, offering high availability and scalability.'
            ],
            [
                'text' => 'What is the main advantage of using AWS Elastic Load Balancing (ELB)?',
                'options' => json_encode([
                    'It improves application security',
                    'It automatically distributes incoming traffic across multiple targets',
                    'It stores application data',
                    'It creates backups of your instances'
                ]),
                'correct_answer' => 'It automatically distributes incoming traffic across multiple targets',
                'explanation' => 'ELB distributes incoming application traffic across multiple targets, such as EC2 instances, to improve availability and fault tolerance.'
            ],
            [
                'text' => 'Which AWS service is used for sending bulk emails?',
                'options' => json_encode([
                    'Amazon SNS',
                    'Amazon SES',
                    'AWS Lambda',
                    'Amazon SQS'
                ]),
                'correct_answer' => 'Amazon SES',
                'explanation' => 'Amazon Simple Email Service (SES) is a scalable email service designed to help send and receive email securely and cost-effectively.'
            ],
            [
                'text' => 'What is the benefit of using Amazon CloudFront?',
                'options' => json_encode([
                    'Improved DNS resolution',
                    'Content caching and delivery at low latency',
                    'Database management',
                    'Direct server management'
                ]),
                'correct_answer' => 'Content caching and delivery at low latency',
                'explanation' => 'Amazon CloudFront is a Content Delivery Network (CDN) that caches content at edge locations to provide low-latency delivery to users.'
            ],
            [
                'text' => 'Which AWS service is a managed message queuing service that supports decoupling of microservices?',
                'options' => json_encode([
                    'Amazon SNS',
                    'Amazon SQS',
                    'AWS Step Functions',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'Amazon SQS',
                'explanation' => 'Amazon Simple Queue Service (SQS) is a fully managed message queuing service that enables decoupling and scaling of microservices.'
            ],
            [
                'text' => 'Which feature of AWS offers a virtual firewall to control traffic for one or more instances?',
                'options' => json_encode([
                    'Security Groups',
                    'IAM Roles',
                    'VPC Peering',
                    'Route 53'
                ]),
                'correct_answer' => 'Security Groups',
                'explanation' => 'Security Groups act as virtual firewalls to control inbound and outbound traffic for AWS instances.'
            ],
            [
                'text' => 'What is the purpose of AWS Trusted Advisor?',
                'options' => json_encode([
                    'To manage user permissions',
                    'To optimize AWS infrastructure based on best practices',
                    'To provide backup services',
                    'To host websites'
                ]),
                'correct_answer' => 'To optimize AWS infrastructure based on best practices',
                'explanation' => 'AWS Trusted Advisor offers recommendations to help follow AWS best practices, optimize performance, improve security, and reduce costs.'
            ],
            [
                'text' => 'Which AWS service would you use to automate operational tasks across AWS resources?',
                'options' => json_encode([
                    'AWS CloudFormation',
                    'AWS Systems Manager',
                    'Amazon RDS',
                    'Amazon Aurora'
                ]),
                'correct_answer' => 'AWS Systems Manager',
                'explanation' => 'AWS Systems Manager provides a unified user interface to view operational data from multiple AWS services and automate operational tasks.'
            ],
            [
                'text' => 'What does the AWS Well-Architected Framework help you achieve?',
                'options' => json_encode([
                    'Optimal resource pricing',
                    'Best practices for designing, deploying, and operating reliable and secure systems',
                    'Automatic code deployment',
                    'Direct database management'
                ]),
                'correct_answer' => 'Best practices for designing, deploying, and operating reliable and secure systems',
                'explanation' => 'The AWS Well-Architected Framework provides best practices and guidance for building secure, high-performing, resilient, and efficient infrastructure.'
            ],
            [
                'text' => 'Which AWS service is primarily used for managing application deployments?',
                'options' => json_encode([
                    'AWS CodeDeploy',
                    'AWS CloudFormation',
                    'Amazon S3',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'AWS CodeDeploy',
                'explanation' => 'AWS CodeDeploy automates code deployments to any instance, including Amazon EC2 instances and on-premises servers.'
            ],
            [
                'text' => 'Which service is best used for monitoring billing and cost management in AWS?',
                'options' => json_encode([
                    'AWS Cost Explorer',
                    'Amazon CloudWatch',
                    'AWS CloudTrail',
                    'Amazon SNS'
                ]),
                'correct_answer' => 'AWS Cost Explorer',
                'explanation' => 'AWS Cost Explorer helps you visualize, understand, and manage your AWS costs and usage over time.'
            ],
            [
                'text' => 'What is one advantage of using AWS Organizations?',
                'options' => json_encode([
                    'Centralized management of multiple AWS accounts',
                    'Automatic server scaling',
                    'Simplified database replication',
                    'Direct content delivery'
                ]),
                'correct_answer' => 'Centralized management of multiple AWS accounts',
                'explanation' => 'AWS Organizations allows you to centrally manage and govern multiple AWS accounts for consolidated billing and streamlined policy management.'
            ],
            [
                'text' => 'Which AWS service provides a serverless, pay-as-you-go execution environment for containers?',
                'options' => json_encode([
                    'AWS Fargate',
                    'Amazon ECS',
                    'Amazon EKS',
                    'Amazon Lightsail'
                ]),
                'correct_answer' => 'AWS Fargate',
                'explanation' => 'AWS Fargate is a serverless compute engine for containers that works with both Amazon ECS and EKS.'
            ],
            [
                'text' => 'Which AWS service is used to record API calls and monitor account activity?',
                'options' => json_encode([
                    'AWS CloudTrail',
                    'Amazon CloudWatch',
                    'AWS Config',
                    'Amazon Inspector'
                ]),
                'correct_answer' => 'AWS CloudTrail',
                'explanation' => 'AWS CloudTrail records API calls made on your account, providing an audit trail for actions taken in your AWS environment.'
            ],
            [
                'text' => 'What does the term “serverless” refer to in AWS Lambda?',
                'options' => json_encode([
                    'There are no servers involved in the execution',
                    'You do not manage the underlying infrastructure',
                    'It only supports event-driven applications',
                    'It is only used for database operations'
                ]),
                'correct_answer' => 'You do not manage the underlying infrastructure',
                'explanation' => 'Serverless computing means that the cloud provider automatically provisions, scales, and manages the infrastructure, so you only worry about your code.'
            ],
            [
                'text' => 'Which AWS service can be used for scalable file storage accessible by multiple EC2 instances?',
                'options' => json_encode([
                    'Amazon EBS',
                    'Amazon S3',
                    'Amazon EFS',
                    'Amazon Glacier'
                ]),
                'correct_answer' => 'Amazon EFS',
                'explanation' => 'Amazon Elastic File System (EFS) provides scalable file storage that can be concurrently accessed by multiple EC2 instances.'
            ],
            [
                'text' => 'What is the function of AWS Direct Connect?',
                'options' => json_encode([
                    'To provide a dedicated network connection from your premises to AWS',
                    'To host static websites',
                    'To run containerized applications',
                    'To encrypt data at rest'
                ]),
                'correct_answer' => 'To provide a dedicated network connection from your premises to AWS',
                'explanation' => 'AWS Direct Connect establishes a dedicated network connection between your premises and AWS, which can reduce network costs and increase bandwidth throughput.'
            ],
            [
                'text' => 'Which AWS service offers a managed Kubernetes solution?',
                'options' => json_encode([
                    'Amazon ECS',
                    'Amazon EKS',
                    'AWS Lambda',
                    'Amazon Lightsail'
                ]),
                'correct_answer' => 'Amazon EKS',
                'explanation' => 'Amazon Elastic Kubernetes Service (EKS) is a managed service that makes it easy to run Kubernetes on AWS without needing to install and operate your own Kubernetes control plane.'
            ],
            [
                'text' => 'What is the purpose of AWS Config?',
                'options' => json_encode([
                    'To manage user access',
                    'To track and record AWS resource configurations over time',
                    'To deliver content globally',
                    'To provide serverless computing'
                ]),
                'correct_answer' => 'To track and record AWS resource configurations over time',
                'explanation' => 'AWS Config enables you to assess, audit, and evaluate the configurations of your AWS resources, tracking changes over time.'
            ],
            [
                'text' => 'Which AWS service is best suited for real-time stream processing?',
                'options' => json_encode([
                    'Amazon Kinesis',
                    'Amazon SQS',
                    'AWS Lambda',
                    'Amazon CloudFront'
                ]),
                'correct_answer' => 'Amazon Kinesis',
                'explanation' => 'Amazon Kinesis is designed for real-time processing of streaming data at scale.'
            ],
            [
                'text' => 'Which AWS service is designed to help detect potential security vulnerabilities in your applications?',
                'options' => json_encode([
                    'Amazon Inspector',
                    'AWS CloudTrail',
                    'AWS Shield',
                    'Amazon Macie'
                ]),
                'correct_answer' => 'Amazon Inspector',
                'explanation' => 'Amazon Inspector is an automated security assessment service that helps improve the security and compliance of applications deployed on AWS.'
            ],
            [
                'text' => 'What is one of the main benefits of using AWS Savings Plans?',
                'options' => json_encode([
                    'Eliminates the need for on-demand instances',
                    'Offers a flexible pricing model across multiple services and instance families',
                    'Requires a long-term commitment to a specific instance type',
                    'Provides dedicated hardware'
                ]),
                'correct_answer' => 'Offers a flexible pricing model across multiple services and instance families',
                'explanation' => 'AWS Savings Plans provide a flexible pricing model that allows you to reduce costs across various instance types and AWS services in exchange for a commitment to usage.'
            ],
            [
                'text' => 'Which AWS service is used to protect applications against DDoS attacks?',
                'options' => json_encode([
                    'AWS Shield',
                    'AWS WAF',
                    'Amazon CloudFront',
                    'AWS Firewall Manager'
                ]),
                'correct_answer' => 'AWS Shield',
                'explanation' => 'AWS Shield is a managed Distributed Denial of Service (DDoS) protection service designed to safeguard applications running on AWS.'
            ],
            [
                'text' => 'Which AWS service helps you centrally manage security policies across multiple AWS accounts?',
                'options' => json_encode([
                    'AWS Organizations',
                    'AWS Config',
                    'AWS Control Tower',
                    'AWS Firewall Manager'
                ]),
                'correct_answer' => 'AWS Firewall Manager',
                'explanation' => 'AWS Firewall Manager simplifies the administration of AWS WAF rules across accounts and applications in AWS Organizations.'
            ],
            [
                'text' => 'What is the primary advantage of using Amazon RDS?',
                'options' => json_encode([
                    'It requires manual patching and backups',
                    'It automates time-consuming administration tasks such as backups and patch management',
                    'It does not support scaling',
                    'It is a NoSQL database'
                ]),
                'correct_answer' => 'It automates time-consuming administration tasks such as backups and patch management',
                'explanation' => 'Amazon Relational Database Service (RDS) automates routine administrative tasks, which improves efficiency and reduces the risk of human error.'
            ],
            [
                'text' => 'Which AWS service is primarily used to store and analyze log data?',
                'options' => json_encode([
                    'Amazon Redshift',
                    'Amazon CloudWatch Logs',
                    'AWS Config',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'Amazon CloudWatch Logs',
                'explanation' => 'Amazon CloudWatch Logs allows you to monitor, store, and access your log files from AWS services and applications.'
            ],
            [
                'text' => 'Which AWS pricing model charges based on actual usage per second or minute?',
                'options' => json_encode([
                    'Reserved Instances',
                    'On-Demand Instances',
                    'Spot Instances',
                    'Savings Plans'
                ]),
                'correct_answer' => 'On-Demand Instances',
                'explanation' => 'On-Demand pricing charges you for compute capacity by the second or minute, depending on the service, with no long-term commitments.'
            ],
            [
                'text' => 'What is Amazon Inspector used for?',
                'options' => json_encode([
                    'Managing container deployments',
                    'Assessing application security vulnerabilities',
                    'Scaling web applications',
                    'Providing DNS services'
                ]),
                'correct_answer' => 'Assessing application security vulnerabilities',
                'explanation' => 'Amazon Inspector automatically assesses applications for vulnerabilities or deviations from best practices.'
            ],
            [
                'text' => 'Which AWS service simplifies the deployment of multi-tier web applications?',
                'options' => json_encode([
                    'AWS Elastic Beanstalk',
                    'AWS CloudFormation',
                    'Amazon EC2',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'AWS Elastic Beanstalk',
                'explanation' => 'AWS Elastic Beanstalk is a Platform as a Service (PaaS) that simplifies deploying and managing applications by handling capacity provisioning, load balancing, scaling, and monitoring.'
            ],
            [
                'text' => 'Which AWS service is ideal for large-scale data transfer into AWS?',
                'options' => json_encode([
                    'AWS Snowball',
                    'Amazon S3',
                    'Amazon CloudFront',
                    'AWS Direct Connect'
                ]),
                'correct_answer' => 'AWS Snowball',
                'explanation' => 'AWS Snowball is a petabyte-scale data transport solution that uses secure appliances to transfer large amounts of data into and out of AWS.'
            ],
            [
                'text' => 'Which AWS service would you use for a managed, scalable message broker that supports MQTT?',
                'options' => json_encode([
                    'Amazon MQ',
                    'Amazon SNS',
                    'Amazon SQS',
                    'AWS IoT Core'
                ]),
                'correct_answer' => 'AWS IoT Core',
                'explanation' => 'AWS IoT Core supports MQTT protocol for device communication, enabling scalable message brokering for IoT devices.'
            ],
            [
                'text' => 'What is one of the benefits of using Amazon S3 Versioning?',
                'options' => json_encode([
                    'It increases the cost of storage',
                    'It allows you to preserve, retrieve, and restore every version of every object stored in an S3 bucket',
                    'It deletes duplicate files automatically',
                    'It encrypts data at rest'
                ]),
                'correct_answer' => 'It allows you to preserve, retrieve, and restore every version of every object stored in an S3 bucket',
                'explanation' => 'S3 Versioning enables you to maintain multiple versions of an object, which is helpful for data recovery and protection against accidental deletion.'
            ],
            [
                'text' => 'Which AWS service allows you to set up a virtual private network (VPN) connection between your on-premises network and your VPC?',
                'options' => json_encode([
                    'AWS Direct Connect',
                    'Amazon VPC',
                    'AWS VPN',
                    'Amazon CloudFront'
                ]),
                'correct_answer' => 'AWS VPN',
                'explanation' => 'AWS VPN establishes a secure connection between your on-premises network and your Amazon VPC, enabling encrypted communication over the internet.'
            ],
            [
                'text' => 'Which AWS service is best for serverless application integration through event-driven triggers?',
                'options' => json_encode([
                    'AWS Lambda',
                    'Amazon EC2',
                    'Amazon RDS',
                    'Amazon S3'
                ]),
                'correct_answer' => 'AWS Lambda',
                'explanation' => 'AWS Lambda can be triggered by events from various AWS services, enabling event-driven application architectures without server management.'
            ],
            [
                'text' => 'What does AWS CloudTrail provide?',
                'options' => json_encode([
                    'Real-time performance metrics',
                    'Detailed logs of user activity and API usage',
                    'Managed database backups',
                    'DNS hosting'
                ]),
                'correct_answer' => 'Detailed logs of user activity and API usage',
                'explanation' => 'AWS CloudTrail records API calls and user activity, providing an audit trail for compliance and security analysis.'
            ],
            [
                'text' => 'Which AWS service is designed to provide automated security assessments for EC2 instances?',
                'options' => json_encode([
                    'AWS Config',
                    'Amazon Inspector',
                    'AWS Shield',
                    'AWS WAF'
                ]),
                'correct_answer' => 'Amazon Inspector',
                'explanation' => 'Amazon Inspector performs automated security assessments on EC2 instances to help identify vulnerabilities and deviations from best practices.'
            ],
            [
                'text' => 'Which AWS service allows you to centrally view and analyze usage and billing data?',
                'options' => json_encode([
                    'AWS Budgets',
                    'AWS Cost Explorer',
                    'AWS Organizations',
                    'AWS CloudFormation'
                ]),
                'correct_answer' => 'AWS Cost Explorer',
                'explanation' => 'AWS Cost Explorer is a tool that allows you to visualize, understand, and manage your AWS costs and usage over time.'
            ],
            [
                'text' => 'What is the purpose of AWS Shield Advanced?',
                'options' => json_encode([
                    'To provide basic DDoS protection for all AWS customers',
                    'To offer enhanced DDoS protection and additional features such as 24/7 access to the AWS DDoS Response Team (DRT)',
                    'To manage security groups automatically',
                    'To monitor application performance'
                ]),
                'correct_answer' => 'To offer enhanced DDoS protection and additional features such as 24/7 access to the AWS DDoS Response Team (DRT)',
                'explanation' => 'AWS Shield Advanced provides enhanced protection against DDoS attacks, along with additional benefits like cost protection and access to the DRT.'
            ],
            [
                'text' => 'Which AWS service enables you to run code in response to triggers from file uploads or database changes?',
                'options' => json_encode([
                    'Amazon EC2',
                    'AWS Lambda',
                    'Amazon SQS',
                    'AWS CodeDeploy'
                ]),
                'correct_answer' => 'AWS Lambda',
                'explanation' => 'AWS Lambda can be triggered by events such as file uploads to S3 or database changes, allowing for automated, event-driven computing.'
            ],
            [
                'text' => 'What is the key purpose of Amazon Inspector?',
                'options' => json_encode([
                    'To optimize cloud performance',
                    'To scan for security vulnerabilities and deviations from security best practices',
                    'To automate server deployments',
                    'To manage AWS billing'
                ]),
                'correct_answer' => 'To scan for security vulnerabilities and deviations from security best practices',
                'explanation' => 'Amazon Inspector is designed to automatically assess applications for vulnerabilities and deviations from best security practices.'
            ],
            [
                'text' => 'Which AWS service provides a managed, petabyte-scale data warehouse solution?',
                'options' => json_encode([
                    'Amazon RDS',
                    'Amazon Redshift',
                    'Amazon DynamoDB',
                    'Amazon Aurora'
                ]),
                'correct_answer' => 'Amazon Redshift',
                'explanation' => 'Amazon Redshift is designed to run complex analytical queries against petabyte-scale structured data.'
            ],
            [
                'text' => 'What does the AWS “pay-as-you-go” pricing model mean?',
                'options' => json_encode([
                    'You pay a fixed monthly fee regardless of usage',
                    'You only pay for the resources you actually consume',
                    'You have to prepay for a set period',
                    'You only pay when there is a system failure'
                ]),
                'correct_answer' => 'You only pay for the resources you actually consume',
                'explanation' => 'AWS’s “pay-as-you-go” pricing means you are charged only for the services you use, without upfront commitments.'
            ],
            [
                'text' => 'Which AWS service can automatically distribute incoming application traffic across multiple targets?',
                'options' => json_encode([
                    'Amazon CloudFront',
                    'AWS Elastic Load Balancing (ELB)',
                    'AWS Auto Scaling',
                    'Amazon Route 53'
                ]),
                'correct_answer' => 'AWS Elastic Load Balancing (ELB)',
                'explanation' => 'ELB automatically distributes incoming traffic across multiple targets such as EC2 instances, containers, and IP addresses to enhance fault tolerance.'
            ],
            [
                'text' => 'Which AWS service is best for long-term, infrequently accessed data archival?',
                'options' => json_encode([
                    'Amazon S3 Standard',
                    'Amazon S3 Glacier',
                    'Amazon EBS',
                    'Amazon EFS'
                ]),
                'correct_answer' => 'Amazon S3 Glacier',
                'explanation' => 'Amazon S3 Glacier is designed for long-term data archival and backup, providing secure and durable storage at a lower cost.'
            ],
            [
                'text' => 'What is a key benefit of using AWS Marketplace?',
                'options' => json_encode([
                    'Access to free AWS credits',
                    'Quick deployment of third-party software solutions on AWS',
                    'Managed physical servers',
                    'Enhanced networking speed'
                ]),
                'correct_answer' => 'Quick deployment of third-party software solutions on AWS',
                'explanation' => 'AWS Marketplace provides a curated digital catalog that makes it easier to find, test, and deploy third-party software on AWS.'
            ],
            [
                'text' => 'Which AWS service provides a managed Hadoop framework for processing large data sets?',
                'options' => json_encode([
                    'Amazon EMR',
                    'Amazon Redshift',
                    'Amazon RDS',
                    'Amazon DynamoDB'
                ]),
                'correct_answer' => 'Amazon EMR',
                'explanation' => 'Amazon EMR is a managed Hadoop framework that makes it easy to process large amounts of data using open-source tools such as Apache Spark and HBase.'
            ],
            [
                'text' => 'Which AWS service is designed for interactive query analysis of data stored in Amazon S3 using standard SQL?',
                'options' => json_encode([
                    'Amazon Redshift Spectrum',
                    'Amazon Athena',
                    'Amazon RDS',
                    'Amazon EMR'
                ]),
                'correct_answer' => 'Amazon Athena',
                'explanation' => 'Amazon Athena is an interactive query service that makes it easy to analyze data in Amazon S3 using standard SQL without managing any infrastructure.'
            ],
            [
                'text' => 'Which AWS service provides automated scaling for Amazon EC2 instances based on demand?',
                'options' => json_encode([
                    'AWS CloudFormation',
                    'AWS Auto Scaling',
                    'Amazon CloudFront',
                    'Amazon Route 53'
                ]),
                'correct_answer' => 'AWS Auto Scaling',
                'explanation' => 'AWS Auto Scaling monitors your applications and automatically adjusts capacity to maintain steady, predictable performance at the lowest possible cost.'
            ],
            [
                'text' => 'What is the purpose of AWS Cost and Usage Reports?',
                'options' => json_encode([
                    'To provide detailed information about your AWS usage and cost',
                    'To manage AWS security groups',
                    'To automate resource provisioning',
                    'To monitor application performance'
                ]),
                'correct_answer' => 'To provide detailed information about your AWS usage and cost',
                'explanation' => 'AWS Cost and Usage Reports deliver detailed information about your AWS usage and costs, enabling you to analyze and optimize your spending.'
            ],
            [
                'text' => 'Which AWS service helps ensure that your AWS resource configurations remain compliant with best practices?',
                'options' => json_encode([
                    'AWS Config',
                    'AWS CloudTrail',
                    'AWS IAM',
                    'Amazon CloudWatch'
                ]),
                'correct_answer' => 'AWS Config',
                'explanation' => 'AWS Config continuously monitors and records your AWS resource configurations, allowing you to assess, audit, and evaluate configurations for compliance.'
            ],
            [
                'text' => 'What is the primary purpose of AWS Elastic Beanstalk?',
                'options' => json_encode([
                    'To directly manage server instances',
                    'To automate the deployment and scaling of web applications',
                    'To provide a messaging queue',
                    'To host static websites'
                ]),
                'correct_answer' => 'To automate the deployment and scaling of web applications',
                'explanation' => 'AWS Elastic Beanstalk is a PaaS that simplifies the process of deploying, managing, and scaling web applications and services.'
            ],
            [
                'text' => 'Which AWS service provides managed in-memory caching to improve application performance?',
                'options' => json_encode([
                    'Amazon Aurora',
                    'Amazon DynamoDB',
                    'Amazon ElastiCache',
                    'Amazon Redshift'
                ]),
                'correct_answer' => 'Amazon ElastiCache',
                'explanation' => 'Amazon ElastiCache offers a managed in-memory caching solution that helps improve the performance of web applications by reducing database load.'
            ],
            [
                'text' => 'Which AWS service is best for building chatbots and conversational interfaces?',
                'options' => json_encode([
                    'Amazon Polly',
                    'Amazon Lex',
                    'Amazon Rekognition',
                    'Amazon Comprehend'
                ]),
                'correct_answer' => 'Amazon Lex',
                'explanation' => 'Amazon Lex provides advanced deep learning functionalities of automatic speech recognition and natural language understanding, making it ideal for building conversational interfaces.'
            ],
            [
                'text' => 'What is the key benefit of using AWS Service Catalog?',
                'options' => json_encode([
                    'It provides detailed billing reports',
                    'It allows organizations to centrally manage commonly deployed IT services',
                    'It automates data backup',
                    'It manages DNS routing'
                ]),
                'correct_answer' => 'It allows organizations to centrally manage commonly deployed IT services',
                'explanation' => 'AWS Service Catalog helps organizations create and manage approved catalogs of resources, ensuring consistent governance and compliance.'
            ],
            [
                'text' => 'Which AWS service is designed for real-time file processing and analysis?',
                'options' => json_encode([
                    'Amazon Kinesis Data Firehose',
                    'Amazon S3',
                    'Amazon RDS',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'Amazon Kinesis Data Firehose',
                'explanation' => 'Amazon Kinesis Data Firehose reliably loads streaming data into data lakes, data stores, and analytics tools for near real-time processing.'
            ],
            [
                'text' => 'Which AWS service provides a fully managed, petabyte-scale file system for use with AWS and on-premises resources?',
                'options' => json_encode([
                    'Amazon EBS',
                    'Amazon S3',
                    'Amazon EFS',
                    'AWS Backup'
                ]),
                'correct_answer' => 'Amazon EFS',
                'explanation' => 'Amazon Elastic File System (EFS) provides a scalable file system that can be used with both AWS services and on-premises resources.'
            ],
            [
                'text' => 'What is one of the benefits of using AWS Backup?',
                'options' => json_encode([
                    'It only supports EC2 instances',
                    'It centralizes and automates data backup across AWS services',
                    'It does not support encryption',
                    'It increases operational complexity'
                ]),
                'correct_answer' => 'It centralizes and automates data backup across AWS services',
                'explanation' => 'AWS Backup simplifies and automates the backup of data across AWS services, helping ensure data protection and compliance.'
            ],
            [
                'text' => 'Which AWS service is primarily used for data migration between on-premises storage and the cloud?',
                'options' => json_encode([
                    'AWS DataSync',
                    'AWS Snowball',
                    'Amazon Kinesis',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'AWS DataSync',
                'explanation' => 'AWS DataSync is used for online data transfer, automating and accelerating moving data between on-premises storage and AWS services.'
            ],
            [
                'text' => 'What does the “elastic” in AWS Elastic Compute Cloud (EC2) refer to?',
                'options' => json_encode([
                    'The ability to automatically adjust compute capacity',
                    'The capability to store unlimited data',
                    'The feature to manage databases automatically',
                    'The integrated security features'
                ]),
                'correct_answer' => 'The ability to automatically adjust compute capacity',
                'explanation' => 'Elasticity in EC2 refers to the ability to quickly scale computing capacity up or down based on demand.'
            ],
            [
                'text' => 'Which AWS service is designed to detect sensitive data stored in AWS?',
                'options' => json_encode([
                    'Amazon Macie',
                    'AWS Shield',
                    'Amazon Inspector',
                    'AWS Config'
                ]),
                'correct_answer' => 'Amazon Macie',
                'explanation' => 'Amazon Macie uses machine learning to automatically discover, classify, and protect sensitive data in AWS.'
            ],
            [
                'text' => 'What is AWS Trusted Advisor primarily used for?',
                'options' => json_encode([
                    'Deploying applications',
                    'Providing best practice recommendations for cost optimization, security, performance, and fault tolerance',
                    'Managing user access',
                    'Creating virtual private clouds'
                ]),
                'correct_answer' => 'Providing best practice recommendations for cost optimization, security, performance, and fault tolerance',
                'explanation' => 'AWS Trusted Advisor inspects your AWS environment and provides recommendations to help improve cost efficiency, performance, security, and fault tolerance.'
            ],
            [
                'text' => 'Which AWS service would you use to build a scalable microservices architecture?',
                'options' => json_encode([
                    'AWS Lambda combined with Amazon API Gateway',
                    'Amazon RDS',
                    'Amazon S3',
                    'Amazon Redshift'
                ]),
                'correct_answer' => 'AWS Lambda combined with Amazon API Gateway',
                'explanation' => 'Using AWS Lambda with Amazon API Gateway provides a serverless way to build scalable microservices without managing underlying servers.'
            ],
            [
                'text' => 'Which AWS service is commonly used for serverless event streaming?',
                'options' => json_encode([
                    'Amazon Kinesis',
                    'Amazon S3',
                    'AWS Lambda',
                    'Amazon CloudFront'
                ]),
                'correct_answer' => 'Amazon Kinesis',
                'explanation' => 'Amazon Kinesis provides services to collect, process, and analyze streaming data in real time, which is key for serverless event streaming.'
            ],
            [
                'text' => 'Which AWS service offers automated scaling, monitoring, and management of containerized applications using Kubernetes?',
                'options' => json_encode([
                    'Amazon ECS',
                    'Amazon EKS',
                    'AWS Fargate',
                    'Amazon Lightsail'
                ]),
                'correct_answer' => 'Amazon EKS',
                'explanation' => 'Amazon EKS is a managed Kubernetes service that simplifies running Kubernetes on AWS by handling the control plane operations.'
            ],
            [
                'text' => 'Which AWS service is designed to help you migrate databases to AWS easily and securely?',
                'options' => json_encode([
                    'AWS Database Migration Service (DMS)',
                    'Amazon Aurora',
                    'Amazon Redshift',
                    'AWS Snowball'
                ]),
                'correct_answer' => 'AWS Database Migration Service (DMS)',
                'explanation' => 'AWS DMS helps you migrate databases to AWS quickly and securely, minimizing downtime during the migration process.'
            ],
            [
                'text' => 'Which AWS service allows you to create and manage encryption keys?',
                'options' => json_encode([
                    'AWS KMS',
                    'AWS IAM',
                    'AWS Shield',
                    'Amazon CloudFront'
                ]),
                'correct_answer' => 'AWS KMS',
                'explanation' => 'AWS Key Management Service (KMS) is used to create, manage, and control cryptographic keys for encrypting data.'
            ],
            [
                'text' => 'What is the main purpose of Amazon SNS (Simple Notification Service)?',
                'options' => json_encode([
                    'To store data',
                    'To provide a pub/sub messaging system for decoupled microservices',
                    'To manage databases',
                    'To host websites'
                ]),
                'correct_answer' => 'To provide a pub/sub messaging system for decoupled microservices',
                'explanation' => 'Amazon SNS is a managed pub/sub messaging service that enables decoupled, scalable, and flexible communication between microservices and distributed systems.'
            ],
            [
                'text' => 'Which AWS service can be used to automatically scale web applications without manual intervention?',
                'options' => json_encode([
                    'AWS Auto Scaling',
                    'AWS CloudFormation',
                    'AWS CodeDeploy',
                    'Amazon RDS'
                ]),
                'correct_answer' => 'AWS Auto Scaling',
                'explanation' => 'AWS Auto Scaling automatically adjusts capacity based on defined policies, ensuring web applications scale seamlessly with demand.'
            ],
            [
                'text' => 'Which AWS service is designed for creating and managing virtual servers in the cloud?',
                'options' => json_encode([
                    'Amazon S3',
                    'Amazon EC2',
                    'Amazon RDS',
                    'AWS Lambda'
                ]),
                'correct_answer' => 'Amazon EC2',
                'explanation' => 'Amazon Elastic Compute Cloud (EC2) provides scalable virtual servers in the cloud, allowing you to run applications on virtual machines.'
            ],
            [
                'text' => 'Which AWS service offers an integrated solution for continuous integration and continuous delivery (CI/CD)?',
                'options' => json_encode([
                    'AWS CodePipeline',
                    'AWS CloudTrail',
                    'AWS Config',
                    'Amazon CloudFront'
                ]),
                'correct_answer' => 'AWS CodePipeline',
                'explanation' => 'AWS CodePipeline is a continuous integration and continuous delivery service for fast and reliable application and infrastructure updates.'
            ],
            [
                'text' => 'What is one of the advantages of using AWS Multi-Factor Authentication (MFA)?',
                'options' => json_encode([
                    'It reduces the complexity of user login',
                    'It provides an additional layer of security by requiring a second form of authentication',
                    'It automatically backs up data',
                    'It eliminates the need for passwords'
                ]),
                'correct_answer' => 'It provides an additional layer of security by requiring a second form of authentication',
                'explanation' => 'MFA enhances account security by requiring users to provide two forms of authentication, reducing the risk of unauthorized access.'
            ]
        ];

        foreach ($questions as $questionData) {
            Question::create($questionData);
        }
    }
}
