<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $articles = [
            // Core Foundations
            [
                'track' => 'aws-ccp',
                'order' => 1,
                'title' => 'Introduction to the AWS Cloud Practitioner',
                'slug' => 'introduction-to-aws-cloud-practitioner',
                'excerpt' => 'Certification overview, domains, exam logistics, and study tips.',
                'body' => <<<'MARKDOWN'
# Introduction to the AWS Certified Cloud Practitioner (CLF‑C02)

Welcome to your first step on the AWS certification journey! In this module you will gain a deep understanding of:

1. **What the AWS Certified Cloud Practitioner (CLF‑C02) is** and who it’s for
2. **Exam structure and domains** you must master
3. **Why this certification matters** and how it fits into AWS career paths
4. **A study plan** with hands‑on practice, resources, and tips to ensure success

---

## 1. What Is the AWS Certified Cloud Practitioner?
The AWS Certified Cloud Practitioner is an entry‑level credential that validates your overall understanding of the AWS Cloud. It’s intended for:

- **Business professionals** (sales, finance, project managers) who need to discuss AWS services with technical teams
- **Newcomers to cloud computing** seeking a broad overview of AWS capabilities
- **IT generalists** who want to demonstrate foundational AWS knowledge before specializing

### Exam Blueprint
| Domain                        | % of Exam | Key Topics                                        |
|-------------------------------|----------:|---------------------------------------------------|
| Cloud Concepts                | 26%       | Cloud definition, deployment models, value prop   |
| Security & Compliance         | 25%       | IAM, Shared Responsibility, encryption, compliance|
| Technology                    | 33%       | Core services (Compute, Storage, Database, Network)|
| Billing & Pricing             | 16%       | Pricing models, TCO, billing tools, account mgmt  |

- **Questions**: 65 multiple‑choice, multiple‑response
- **Time**: 90 minutes
- **Passing Score**: 700 out of 1000
- **Cost**: USD 100 (practice exam USD 20)

---

## 2. Why This Certification Matters

1. **Validated baseline**: Proves you understand AWS terminology, concepts, and services—not just memorized trivia.
2. **Career accelerator**: Opens doors in cloud‑focused roles and sets you up for AWS Associate‑level exams.
3. **Cross‑functional communication**: Equips non‑engineers to collaborate effectively with architects and developers.
4. **Confidence builder**: Hands‑on AWS experience and exam prep cultivate the skills you’ll use day‑to‑day.

> **Pro tip:** Even if you’re technical, start here to cement your grasp of AWS at a high level before diving into specialty or associate tracks.

---

## 3. Recommended Study Plan

| Phase             | Activities                                                   | Timeframe    |
|-------------------|--------------------------------------------------------------|-------------:|
| Prepare           | Review exam guide, watch overview videos                     | 1 week       |
| Hands‑On Labs     | Free Tier: launch EC2, build S3 buckets, create IAM users     | 2–3 weeks    |
| Domain Deep‑Dive  | Study each domain: read docs, take notes, create flashcards   | 3–4 weeks    |
| Practice & Review | Take practice exams, revisit weak areas, join study group     | 1–2 weeks    |

**Key Resources**
- AWS CLF‑C02 Exam Guide (official)  
- AWS Skill Builder digital training  
- Stéphane Maarek’s slide decks and hands‑on labs  
- ACloudGuru / Linux Academy practice tests

---

## 4. Hands‑On Kickoff
1. **Create a Free Tier account** at aws.amazon.com/free  
2. **Enable IAM users**: turn off root access, create an Admin group with MFA  
3. **Launch your first EC2 instance**: choose Amazon Linux 2, SSH in, explore metadata  
4. **Store and retrieve an object** in S3 via console and AWS CLI (`aws s3 cp`)  

These exercises will familiarize you with the AWS console, CLI, and core service workflows.

---

### Next Up
In Module 2, we’ll map AWS’s global infrastructure—Regions, Availability Zones, Edge Locations—and learn design patterns for resilience and low latency.

Ready? Let’s build your cloud foundation!  
MARKDOWN
            ],
            [
                'track' => 'aws-ccp',
                'order' => 2,
                'title' => 'AWS Global Infrastructure',
                'slug' => 'aws-global-infrastructure',
                'excerpt' => 'Regions, AZs, Edge Locations, resiliency design patterns.',
                'body' => <<<'MARKDOWN'
# AWS Global Infrastructure (Module 2)

This module expands on the foundation in Module 1 by exploring how AWS’s worldwide network of data centers, edge locations, and hybrid extensions delivers the resilience, scalability, and performance required for mission‑critical applications.

---

## 1. AWS Regions & Availability Zones (AZs)

- **Region**: A fully isolated geographic area (e.g., `us-east-1`, `eu-west-3`), each with independent power, cooling, and network.
- **Availability Zone (AZ)**: One or more discrete data centers within a Region. AZs are physically separated to prevent single‑point failures but connected via high‑speed, low‑latency links (< 1 ms).
- **Design Pattern**: Deploy across at least two AZs for high availability (HA) and fault tolerance. Use multi‑AZ for databases and stateless tiers behind load balancers.

| Characteristic        | Single‑AZ Deployment | Multi‑AZ Deployment      |
|-----------------------|---------------------:|-------------------------:|
| Fault Isolation       | ✘                    | ✔                        |
| SLA (EC2)             | 99.5%                | 99.99%                   |
| Maintenance Windows   | Potential downtime   | Rolling updates, no downtime |
| Data Residency        | Single DC            | Synchronous replication  |

> **Exercise**: List all AZs in your default Region (`aws ec2 describe-availability-zones --output table`).

---

## 2. Edge Locations & Content Delivery (CDN)

- **Edge Location**: Over 400 points of presence (PoPs) globally where CloudFront caches content—static (images, JS/CSS) and dynamic (API responses).
- **Regional Edge Cache**: Mid‑tier cache between origin and edge to improve cache hit ratio and reduce origin load.
- **Benefit**: Typical latency reductions from 100+ ms to 20–50 ms for global audiences.

**Use Cases**:
- Static website hosting with S3 + CloudFront
- Video streaming and media distribution
- API acceleration (cache GET/OPTIONS responses)

---

## 3. Global DNS & Traffic Management

- **Amazon Route 53**
  - **Latency‑Based Routing**: Directs users to the Region with lowest network latency.
  - **Geo‑DNS**: Route based on user location for compliance or language localization.
  - **Health Checks & Failover**: Automatically fail over DNS to healthy endpoints in other Regions.

- **AWS Global Accelerator**
  - Provides two static Anycast IP addresses that front multiple Regional endpoints (ALB, NLB, EC2).
  - Uses AWS’s global network to optimize path, improving performance by up to 60%.
  - Automated failover across Regions in < 30 s.

---

## 4. Hybrid & Edge Extensions

| Service       | Scope              | Use Case                                      |
|---------------|--------------------|-----------------------------------------------|
| **Local Zones**   | Metro areas        | Single‑digit ms latency for media/AR/VR      |
| **Wavelength**    | 5G network edge    | Ultra-low-latency mobile applications         |
| **Outposts**      | On‑premises DC     | Local data processing, compliance, migration  |

**Scenarios**:
- Real‑time gaming servers in Local Zones
- Industrial IoT analytics on Snowball Edge
- Low-latency stock trading via Wavelength

---

## 5. Resiliency & Scalability Patterns

1. **Multi‑Region Active‑Passive**: Primary in `us-east-1`, DR in `eu-west-1`. Route 53 failover.
2. **Multi‑Region Active‑Active**: Read/write in multiple Regions using DynamoDB Global Tables or Aurora Global Database.
3. **Edge‑Optimized APIs**: API Gateway + CloudFront for global API endpoints.

> **Pro tip**: Combine Route 53 health checks, Global Accelerator, and multi‑AZ/multi‑Region deployments to achieve 4‑9s “five nines” availability.

---

### Quick Summary

- **Regions & AZs**: Isolate failures, enable high availability.
- **Edge Locations**: Cache and accelerate content globally.
- **Route 53 & Global Accelerator**: Intelligent, low‑latency user routing.
- **Local Zones, Wavelength, Outposts**: Extend AWS to edge and on‑prem for specialized workloads.
- **Resiliency Patterns**: Multi‑AZ, multi‑Region, active‑active/passive architectures.

> **Next**: Module 3 covers Security & Identity—IAM, Cognito, and Directory Services.
MARKDOWN
            ],
            // IAM & Identity
            [
                'track' => 'aws-ccp',
                'order' => 3,
                'title' => 'Security & Identity: IAM, Cognito, Directory Services',
                'slug' => 'security-identity-iam-cognito-directory',
                'excerpt' => 'Users, groups, roles, policies, MFA, Cognito, and AD integration.',
                'body' => <<<'MARKDOWN'
# Security & Identity (Module 3)

In this module you'll master AWS’s identity foundation: how to securely control access to AWS resources, authenticate application users, and integrate with enterprise directories.

---

## 1. AWS Identity and Access Management (IAM)

### Core Components
- **Users**: Long‑term credentials (password + access keys) for human or service identities.
- **Groups**: Logical collections of users sharing permission sets.
- **Roles**: Temporary credentials assumed by AWS services (EC2, Lambda), federated users, or cross‑account principals.
- **Policies**: JSON documents attached to users, groups, or roles specifying **Allow** or **Deny** for actions on resources.

### Example Policy Snippet
```json
{
  "Version": "2012-10-17",
  "Statement": [{
      "Effect": "Allow",
      "Action": "s3:ListBucket",
      "Resource": "arn:aws:s3:::my-bucket"
  }]
}
```

### Best Practices
1. **Least Privilege**: Grant only required permissions—start from deny and open up.
2. **MFA Everywhere**: Enforce MFA on root and privileged IAM users.
3. **Credential Hygiene**: Rotate access keys, use roles for EC2 & Lambda, avoid long‑lived credentials.
4. **Audit & Review**: Use IAM Access Advisor and the IAM Credential Report to detect unused permissions.

> **Hands‑On**: Create an IAM policy allowing `ec2:DescribeInstances` only, attach to a new user, and verify with AWS CLI.

---

## 2. AWS Cognito for Application Authentication

### Cognito User Pools
- Managed user directory with built‑in sign‑up, sign‑in, and password recovery.
- Supports OAuth2, SAML, and social identity providers (Google, Facebook).
- Issues JWT tokens (ID, Access, Refresh) for secure API access.

### Cognito Identity Pools (Federated Identities)
- Exchange User Pool tokens (or external IdP tokens) for temporary AWS credentials.
- Use to grant fine‑grained access to AWS resources (S3, DynamoDB) directly from client apps.

### Typical Flow
1. User authenticates with User Pool → receives JWT.
2. App exchanges JWT at Identity Pool → receives AWS STS credentials.
3. App calls AWS services with temporary credentials.

> **Exercise**: Build a simple React app that signs in via Cognito User Pool and lists objects in an S3 bucket using federated credentials.

---

## 3. AWS Directory Services

| Service                 | Description                                          | Use Case                                    |
|-------------------------|------------------------------------------------------|---------------------------------------------|
| Managed Microsoft AD    | Full‑featured Active Directory in AWS                | Join Windows EC2 to domain, group policies  |
| Simple AD               | Samba‑based, low‑scale directory                     | Lightweight Linux/Windows AD needs          |
| AD Connector            | Proxy to on‑premises Microsoft AD                    | No password sync; use existing AD credentials |

### Integration Scenarios
- **EC2 Windows Domain Join**: Automate via CloudFormation/User Data.
- **SSO for Enterprise Apps**: Leverage SAML integration with Managed AD.
- **SharePoint / SQL Server**: Use Managed AD for authentication.

> **Pro tip**: Use AD Connector when you need AWS resources to authenticate against on‑prem AD without syncing password hashes.

---

## 4. Module 3 Quick Summary

- **IAM**: Master users, groups, roles, and policies—foundation for AWS resource security.
- **Cognito**: Authenticate and authorize application end users, issue JWTs, federate to AWS.
- **Directory Services**: Bring your enterprise AD to AWS or connect seamlessly to on‑prem AD.

> **Next**: Module 4 will dive into Compute Services—EC2, Lambda, and how to choose between them.
MARKDOWN
            ],
            // Compute Fundamentals
            [
                'track' => 'aws-ccp',
                'order' => 4,
                'title' => 'Compute Services: EC2 & Lambda',
                'slug' => 'compute-services-ec2-lambda',
                'excerpt' => 'EC2 instance components, pricing, user data, roles; Lambda basics.',
                'body' => <<<'MARKDOWN'
# Compute Services (Module 4)

In this module you’ll learn how to choose, configure, and secure AWS compute options: virtual servers with EC2 and serverless functions with Lambda.

---

## 1. Amazon EC2: Virtual Servers in the Cloud

### Key Components
- **AMI (Amazon Machine Image)**: Pre‑configured template (OS, applications, data).
- **Instance Type**: vCPU, RAM, network performance (e.g., `t3.micro`, `m5.large`).
- **Storage Options**:
  - **EBS**: Persistent block storage in same AZ; snapshot to S3.
  - **Instance Store**: Ephemeral local SSD; high IOPS, data lost on stop.
- **Networking**:
  - **ENI**: Elastic Network Interface, assign multiple per instance.
  - **Security Groups**: Stateful firewall at instance level.
- **User Data**: Bootstrap scripts run on first launch for automated configuration.
- **IAM Roles**: Grant permissions to instances without embedding credentials.

### Purchasing Options
| Option               | Description                                            | Use Case                        |
|----------------------|--------------------------------------------------------|---------------------------------|
| On‑Demand            | Pay per second; no commitment                         | Spiky, unpredictable workloads  |
| Reserved Instances   | 1–3 year commitment; up to 72% discount               | Steady state, predictable load  |
| Savings Plans        | Commit $/hour for 1–3 years; flexible across families | Broad usage commitments         |
| Spot Instances       | Up to 90% discount; can be reclaimed                   | Fault‑tolerant, batch jobs      |
| Dedicated Hosts      | Physical server dedicated to you                       | Licensing, compliance           |

> **Hands‑On**: Launch a `t2.micro` instance, connect via SSH, inspect metadata (`curl http://169.254.169.254/latest/meta-data/`).

---

## 2. AWS Lambda: Serverless Functions

### Fundamentals
- **Function**: Upload code (ZIP or container); define handler and runtime (Node.js, Python, Java, etc.).
- **Triggers**: Event sources—API Gateway, S3 events, DynamoDB streams, EventBridge cron.
- **Scaling**: Automatic, per‑request concurrency; no servers to manage.
- **Execution Limits**: 15 min max, 512 MB–10 GB memory, ephemeral `/tmp` storage up to 512 MB.
- **IAM Role**: Each function assumes a role to call other AWS services.

### Pricing Model
- **Requests**: First 1M requests/month free; $0.20 per million thereafter.
- **Duration**: GB‑seconds (memory × execution time); 400K GB‑seconds free.

### When to Use Lambda
| Scenario                     | EC2                                  | Lambda                        |
|------------------------------|--------------------------------------|-------------------------------|
| Long‑running processes       | ✅                                    | ❌ (15 min limit)             |
| Event‑driven workloads       | ✅ via custom polling                | ✅ (native triggers)          |
| Micro‑services & APIs        | ✅ (with ALB/NLB)                     | ✅ (with API Gateway)         |
| Custom OS or drivers         | ✅                                    | ❌                            |

> **Lab**: Create a Lambda that resizes images uploaded to S3 (trigger on `s3:ObjectCreated:*`).

---

### Module 4 Quick Summary
- **EC2**: Full control VMs; choose AMI, instance type, storage, networking. Use IAM roles and user data for secure automation.
- **Lambda**: Serverless, event‑driven compute; no infra to manage, scales automatically, ideal for short tasks and microservices.
- **Decision Path**: If you need OS-level control or long‑running compute → EC2. For highly scalable, event‑based functions → Lambda.

> **Next**: Module 5 covers Load Balancing & Auto Scaling for resilient architectures.
MARKDOWN
            ],
            // Load Balancing & Scaling
            [
                'track' => 'aws-ccp',
                'order' => 5,
                'title' => 'Elastic Load Balancing & Auto Scaling',
                'slug' => 'elb-auto-scaling',
                'excerpt' => 'ELB types, health checks, ASG elasticity concepts.',
                'body' => <<<'MARKDOWN'
## Elastic Load Balancing (ELB)
- **Types**: Application (HTTP/S), Network (TCP), Gateway (third‑gen).
- **Features**: Multi‑AZ, health checks, SSL termination.

## Auto Scaling Groups (ASG)
- **Elasticity**: Scale EC2 fleet based on metrics or schedules.
- **Health Replacement**: Automatically replace unhealthy instances.
- **Scaling Policies**: Target tracking, step scaling, simple scaling.

### Benefits
- High availability, cost optimization, performance under load.
MARKDOWN
            ],
            // Storage Expanded
            [
                'track' => 'aws-ccp',
                'order' => 6,
                'title' => 'Storage Services: S3, Snow, & Storage Gateway',
                'slug' => 'storage-services-s3-snow-storage-gateway',
                'excerpt' => 'Advanced S3 features, Snow family, Storage Gateway hybrid options.',
                'body' => <<<'MARKDOWN'
## Amazon S3 Advanced
- **Security**: Bucket policies, IAM policies, encryption (SSE‑S3, SSE‑KMS, SSE‑C).
- **Versioning**: Preserve, retrieve, and restore every version.
- **Replication**: Cross‑Region (CRR), Same‑Region (SRR).
- **Storage Classes**: Standard, Standard‑IA, One Zone‑IA, Intelligent‑Tiering, Glacier Instant/Flexible/Deep.

## AWS Snow Family
- **Snowball Edge**, **Snowcone**: Edge storage & compute for disconnected environments.
- **OpsHub**: Desktop app to manage devices.

## AWS Storage Gateway
- **File Gateway**: NFS/SMB backed by S3.
- **Volume Gateway**: iSCSI volumes with Snapshot to S3.
- **Tape Gateway**: Virtual tape libraries.
MARKDOWN
            ],
            // Database & Analytics
            [
                'track' => 'aws-ccp',
                'order' => 7,
                'title' => 'Database & Analytics Services',
                'slug' => 'database-analytics-services',
                'excerpt' => 'RDS, Aurora, ElastiCache, DynamoDB, Redshift, EMR, Athena, QuickSight, and more.',
                'body' => <<<'MARKDOWN'
## Relational & OLTP
- **RDS**: Managed MySQL, PostgreSQL, Oracle, SQL Server. Multi‑AZ, read replicas.
- **Aurora**: MySQL/PostgreSQL‑compatible, auto‑scaling storage, high performance.

## In‑Memory & NoSQL
- **ElastiCache**: Redis/Memcached for caching.
- **DynamoDB**: Key‑value & document store; DAX for in‑memory acceleration.

## Analytics & Data Lake
- **Redshift**: Petabyte‑scale data warehousing.
- **EMR**: Managed Hadoop/Spark clusters.
- **Athena**: Serverless SQL over S3.
- **QuickSight**: BI dashboards and ML‑powered insights.

## Specialized Databases
- **DocumentDB**: MongoDB‑compatible.
- **QLDB**: Immutable ledger with cryptographic verifiability.
- **Neptune**: Graph database (SPARQL, Gremlin).
- **Glue**: Serverless ETL.
- **DMS**: Database migration service.
- **Managed Blockchain**: Ethereum frameworks.
MARKDOWN
            ],
            // Serverless & Containers
            [
                'track' => 'aws-ccp',
                'order' => 8,
                'title' => 'Serverless & Container Services',
                'slug' => 'serverless-container-services',
                'excerpt' => 'ECS, ECR, Fargate, Lightsail, Batch, API Gateway & Lambda integration.',
                'body' => <<<'MARKDOWN'
## Containers
- **ECR**: Private Docker registry.
- **ECS**: Container orchestration; EC2 or Fargate launch types.
- **Fargate**: Serverless compute for containers.
- **Lightsail**: Simplified VPS and container hosting.
- **Batch**: Managed batch computing.

## API & Serverless Integration
- **API Gateway**: Expose REST/WebSocket to Lambda or HTTP endpoints.
- **Lambda**: Function compute billed per 100 ms; integrates with 200+ AWS services.
MARKDOWN
            ],
            // Deployment & DevOps
            [
                'track' => 'aws-ccp',
                'order' => 9,
                'title' => 'Deployment & DevOps Tools',
                'slug' => 'deployment-devops-tools',
                'excerpt' => 'CloudFormation, Beanstalk, Systems Manager, OpsWorks, Code* services, Cloud9 IDE.',
                'body' => <<<'MARKDOWN'
## Infrastructure as Code
- **CloudFormation**: Declarative templates for AWS resources.
- **CDK**: Define infra with familiar programming languages.

## PaaS & Configuration
- **Beanstalk**: App deployment with auto‑provisioned infrastructure.
- **Systems Manager**: Centralized patching, configuration, Run Command.
- **OpsWorks**: Chef & Puppet automation.

## CI/CD Services
- **CodeCommit**, **CodeBuild**, **CodeDeploy**, **CodePipeline**.
- **CodeArtifact**: Package repository.
- **CodeStar**: Unified project dashboard.
- **Cloud9**: Browser‑based IDE with AWS context.
MARKDOWN
            ],
            // Networking Advanced
            [
                'track' => 'aws-ccp',
                'order' => 10,
                'title' => 'Advanced VPC & Networking',
                'slug' => 'advanced-vpc-networking',
                'excerpt' => 'NACLs, peering, endpoints, VPN, Direct Connect, Transit Gateway.',
                'body' => <<<'MARKDOWN'
## VPC Controls
- **Network ACLs**: Stateless subnet‑level rules.
- **Security Groups**: Stateful instance‑level firewall.
- **VPC Peering**: Connect non‑overlapping VPCs.
- **Elastic IPs**: Static public IPv4.
- **Endpoints**: Private connectivity to AWS services (Interface & Gateway).
- **PrivateLink**: Private service endpoints.

## Hybrid Connectivity
- **Site‑to‑Site VPN**: IPSec tunnel to on‑premises.
- **Client VPN**: OpenVPN‑based client access.
- **Direct Connect**: Dedicated network link.
- **Transit Gateway**: Central hub for thousands of VPCs and on‑prem networks.
MARKDOWN
            ],
            // Messaging & Integration
            [
                'track' => 'aws-ccp',
                'order' => 11,
                'title' => 'Messaging & Integration Services',
                'slug' => 'messaging-integration-services',
                'excerpt' => 'SQS, SNS, Kinesis, MQ for decoupling and streaming.',
                'body' => <<<'MARKDOWN'
## SQS & SNS
- **SQS**: Decoupled queuing; 14‑day retention; polling.
- **SNS**: Pub/Sub notifications; fan‑out to email, SMS, Lambda, SQS.

## Streaming & Brokers
- **Kinesis**: Real‑time data streams and analytics.
- **MQ**: Managed ActiveMQ and RabbitMQ brokers.

## Use Cases
- Decouple microservices, fan‑out events, real‑time analytics pipelines.
MARKDOWN
            ],
            // Monitoring & Observability
            [
                'track' => 'aws-ccp',
                'order' => 12,
                'title' => 'Monitoring & Observability',
                'slug' => 'monitoring-observability',
                'excerpt' => 'CloudWatch, CloudTrail, X‑Ray, Health Dashboards, CodeGuru.',
                'body' => <<<'MARKDOWN'
## Amazon CloudWatch
- Metrics, Logs, Alarms, Events (EventBridge), Dashboards.

## AWS CloudTrail
- Audit API calls; Insights for unusual activity.

## Distributed Tracing
- **X‑Ray**: Trace requests across microservices.

## Health Dashboards
- **AWS Health Dashboard**: Service status.
- **Account Health**: Events affecting your resources.

## Code Analysis
- **CodeGuru**: Automated code reviews and profiling.
MARKDOWN
            ],
            // Security & Compliance
            [
                'track' => 'aws-ccp',
                'order' => 13,
                'title' => 'Advanced Security & Compliance',
                'slug' => 'advanced-security-compliance',
                'excerpt' => 'Shield, WAF, GuardDuty, Inspector, Macie, Security Hub, Config.',
                'body' => <<<'MARKDOWN'
## DDoS & Firewall
- **Shield**: Standard (free) & Advanced.
- **WAF**: Web ACLs, custom rules, bot control.
- **Network Firewall**: Stateful inspection at VPC.

## Threat Detection
- **GuardDuty**: Intelligent threat detection.
- **Inspector**: Vulnerability scanning.
- **Macie**: Sensitive data discovery in S3.

## Governance
- **AWS Config**: Resource configuration tracking.
- **Security Hub**: Central security posture.
- **Detective**: Root cause analysis of security findings.
- **IAM Access Analyzer**: Detect unintended resource sharing.

## Compliance
- **Artifact**: Download AWS compliance reports.
- **CloudHSM**: Hardware key storage.
- **Certificate Manager**: SSL/TLS provisioning.
MARKDOWN
            ],
            // Edge & Hybrid
            [
                'track' => 'aws-ccp',
                'order' => 14,
                'title' => 'Hybrid & Edge Services',
                'slug' => 'hybrid-edge-services',
                'excerpt' => 'Outposts, Wavelength, Local Zones for low‑latency and on‑prem.',
                'body' => <<<'MARKDOWN'
## AWS Outposts
- Fully managed racks on‑premises; same APIs, hardware.

## Local Zones
- Extend AWS regions closer to users for low latency.

## Wavelength
- 5G‑edge compute with telco partners.

## Use Cases
- Real‑time gaming, media processing, healthcare imaging.
MARKDOWN
            ],
            // ML Overview
            [
                'track' => 'aws-ccp',
                'order' => 15,
                'title' => 'Machine Learning & AI Services',
                'slug' => 'machine-learning-ai-services',
                'excerpt' => 'Rekognition, Lex, Connect, Comprehend, and AI building blocks.',
                'body' => <<<'MARKDOWN'
## Pre‑built AI Services
- **Rekognition**: Image/video analysis.
- **Comprehend**: NLP sentiment, entity extraction.
- **Lex**: Build conversational chatbots.
- **Connect**: Cloud contact center.

## Use Cases
- Automated moderation, customer service bots, analytics.
MARKDOWN
            ],
            // Governance & Billing
            [
                'track' => 'aws-ccp',
                'order' => 16,
                'title' => 'Account Management & Billing Best Practices',
                'slug' => 'account-management-billing-best-practices',
                'excerpt' => 'Control Tower, tagging, cost Explorer, budgets, Trusted Advisor.',
                'body' => <<<'MARKDOWN'
## Multi‑Account Strategy
- **Control Tower**: Automate account setup, guardrails.
- **AWS Organizations**: Consolidated billing, SCPs.

## Cost Management
- **Tags & Cost Allocation**: Track by project, team.
- **Cost Explorer & Budgets**: Forecast spend, alerts.
- **Pricing Calculator**: Estimate monthly costs.
- **Trusted Advisor**: Cost optimization recommendations.

## Governance
- **Service Control Policies**: Enforce permissions across accounts.
- **CloudTrail & Config**: Audit and compliance.
MARKDOWN
            ],
        ];

        foreach ($articles as $data) {
            Article::updateOrCreate([
                'slug' => $data['slug'],
                'track' => $data['track'],
            ], $data);
        }
    }

}
