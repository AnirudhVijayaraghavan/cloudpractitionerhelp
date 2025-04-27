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
## Quick Summary
- **Elastic Load Balancers (ELB)** spread client traffic across multiple targets (EC2, IPs, Lambdas) to ensure fault tolerance and even load distribution.
- **Auto Scaling Groups (ASG)** automatically add or remove EC2 instances based on demand, schedules, or predictive models.
- **ELB Types**:  
  - *Application Load Balancer* (L7 – HTTP/HTTPS, host- and path-based routing)  
  - *Network Load Balancer* (L4 – ultra-low latency, TCP/UDP, static IP)  
  - *Gateway Load Balancer* (L3 – for 3rd-party virtual appliances)  
  - *Classic Load Balancer* (legacy L4/L7)
- **Scaling Policies**: Target Tracking, Step Scaling, Simple Scaling, Scheduled, and Predictive.

---

## Elastic Load Balancing (ELB)
### Key Features
- **Multi-AZ**: Distributes traffic across AZs for high availability.
- **Health Checks**: Continuously monitor targets and route around unhealthy ones.
- **SSL Termination**: Offload TLS to the load balancer.
- **Sticky Sessions**: (Session affinity) route repeat clients to the same target.
- **Cross-Zone Load**: Evenly routes to targets in all AZs.

### Hands-On Lab: Create an Application Load Balancer
1. In the Console, navigate to **EC2 → Load Balancers → Create Load Balancer**.
2. Choose **Application Load Balancer**, assign subnets in two AZs.
3. Define a security group allowing HTTP/HTTPS.
4. Create a **Target Group**, register your EC2 instances.
5. Configure listener on port 80, point to your target group.
6. Verify traffic distribution by curling the ALB’s DNS name from multiple clients.

---

## Auto Scaling Groups (ASG)
### ASG Components
- **Launch Template/Configuration**: AMI, instance type, key pair, IAM role.
- **Min/Desired/Max Capacity**: Bounds for number of running instances.
- **Health Checks**: ELB or EC2 status checks trigger replacement.

### Scaling Policies
- **Target Tracking**: Auto-scale to maintain a metric at a target value (e.g., CPU 50%).
- **Step Scaling**: Add/remove instances in steps when alarms breach thresholds.
- **Simple Scaling**: Single adjustment after alarm triggers.
- **Scheduled Scaling**: Scale at known times (e.g., weekdays 9 AM).
- **Predictive Scaling**: ML-powered forecast of future demand.

### Hands-On Lab: Configure an Auto Scaling Group
1. Navigate to **EC2 → Auto Scaling Groups → Create Auto Scaling group**.
2. Select your launch template and attach the ALB’s target group.
3. Set min=2, desired=2, max=5.
4. Add a Target Tracking policy on **Average CPU Utilization = 50%**.
5. Generate load (e.g., `stress --cpu 2`) to observe scale-out, then stop to see scale-in.

---

## Real-World Patterns
- **Blue/Green Deployments**: Use two ASGs behind an ALB, switch traffic by adjusting listener rules.
- **Disaster Recovery**: Pair ASG+ELB across multi-region with Route 53 failover.
- **Cost Optimization**: Combine on-demand with Spot Instances in your ASG for non-critical workloads.

These fundamentals will ensure your applications remain responsive, available, and cost-efficient under any load.  
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
## Quick Summary
- **Amazon S3** – Object storage with 11 9’s durability, multiple storage classes (Standard, IA, One-Zone, Intelligent-Tiering, Glacier), versioning, encryption, replication, and static website hosting.  
- **AWS Snow Family** – Physical devices (Snowcone, Snowball Edge, Snowmobile) for offline data transfer (up to Exabytes) and edge computing in disconnected environments.  
- **AWS Storage Gateway** – Hybrid cloud service exposing S3-backed storage via file (NFS/SMB), volume (iSCSI), or tape interfaces for on-prem applications.

---

## Amazon S3 Advanced Features

### Storage Classes & Cost Optimization
| Class                    | Use Case                                  | Availability | Min. Retention | Retrieval latency    |
|--------------------------|-------------------------------------------|-------------:|---------------:|---------------------:|
| Standard                 | Frequent access                           | 99.99%       | None           | Millisecond         |
| Standard-IA               | Infrequent access                         | 99.9%        | 30 days        | Millisecond         |
| One Zone-IA               | Infrequent, non-critical                  | 99.5%        | 30 days        | Millisecond         |
| Intelligent-Tiering       | Unknown or changing access patterns       | 99.9%        | None           | Millisecond         |
| Glacier Instant Retrieval | Archival, occasional immediate retrieval  | 99.99%       | 90 days        | Millisecond         |
| Glacier Flexible Retrieval| Archival, standard or bulk retrieval      | 99.99%       | 90 days        | Minutes–hours       |
| Glacier Deep Archive      | Long-term archiving                       | 99.99%       | 180 days       | Hours–days          |

**Lab:**  
1. Create an S3 bucket with versioning and default encryption (SSE-S3).  
2. Upload an object, then overwrite it; verify you can retrieve previous versions.  
3. Configure a lifecycle rule to transition objects > 30 days to Standard-IA and > 90 days to Glacier.  

### Security & Access
- **Bucket Policies** & **IAM Policies** to grant or deny at scale.  
- **Block Public Access** settings to prevent accidental exposure.  
- **SSE-S3**, **SSE-KMS**, **SSE-C** for server-side encryption; **Client-side encryption** as option.  
- **IAM Access Analyzer** for S3 to detect unintended public or cross-account access.  

### Data Protection & Resilience
- **Cross-Region Replication (CRR)** & **Same-Region Replication (SRR)** (requires versioning).  
- **Multi-Object Delete** & **Batch Operations** for large-scale object management.  
- **S3 Access Logs** & **CloudTrail Data Events** for audit trails.  

---

## AWS Snow Family

| Device              | Storage     | Compute            | Use Case                        |
|---------------------|-------------|--------------------|---------------------------------|
| Snowcone            | 8 TB        | 2 vCPU, 4 GB RAM   | Edge computing, small data sets |
| Snowball Edge       | 80 TB / 100 TB | 52 vCPU, 208 GB RAM | Data migration, edge compute    |
| Snowmobile          | 100 PB      | N/A                | Exabyte-scale data transfer     |

**Lab Scenario:**  
- Simulate ordering a Snowball Edge, unlock the device (via CLI), copy 50 GB of test files, create a manifest, and initiate the return job to S3.  

**Edge Compute:**  
- Run EC2 or Lambda functions on Snowball Edge to preprocess data before shipping.  

---

## AWS Storage Gateway

| Gateway Type   | Interface   | Backing Storage | Ideal For                              |
|----------------|-------------|-----------------|----------------------------------------|
| File Gateway   | NFS/SMB     | S3              | File shares, lift-and-shift to cloud   |
| Volume Gateway | iSCSI       | EBS snapshots   | Block storage for on-prem apps         |
| Tape Gateway   | VTL (iSCSI) | Glacier         | Backup to virtual tape library         |

**Configuration Steps:**  
1. Deploy a Storage Gateway VM (VMware/Hyper-V) or EC2 instance.  
2. Activate gateway and choose type (File/Volume/Tape).  
3. Configure local cache storage and connect to target (S3 bucket or Glacier vault).  
4. Mount NFS share or iSCSI volume on on-prem server and validate read/write.  

---

By mastering these storage services, you'll handle any data requirement— from hot object serving to massive offline migrations and seamless on-prem to cloud integration—ensuring both performance and cost efficiency on your CCP exam and in real-world AWS architectures.  
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
## Quick Summary
- **Relational & OLTP**: RDS (MySQL, PostgreSQL, SQL Server, Oracle) with Multi-AZ, read replicas; Aurora for cloud-native high performance.  
- **In-Memory & NoSQL**: ElastiCache (Redis/Memcached) for sub-ms caching; DynamoDB for serverless key-value/document with DAX acceleration.  
- **Analytics & Data Lakes**: Redshift for petabyte data warehousing; EMR for Hadoop/Spark; Athena for serverless SQL over S3; QuickSight for BI.  
- **Specialty Stores**: DocumentDB (MongoDB-compatible), QLDB (immutable ledger), Neptune (graph), Timestream (time-series), Glue (ETL), DMS (migration), Managed Blockchain.

---

## 1. Relational & OLTP

### Amazon RDS
- **Engines**: MySQL, PostgreSQL, MariaDB, Oracle, SQL Server  
- **High Availability**: Multi-AZ synchronous replication  
- **Read Scaling**: Read replicas (up to 15)  
- **Backups & PITR**: Automated snapshots & point-in-time restore  
- **Lab**: Launch a Multi-AZ RDS MySQL, create a read replica, simulate AZ failure and observe failover.

### Amazon Aurora
- **Compatibility**: MySQL & PostgreSQL  
- **Performance**: 5× MySQL, 3× PostgreSQL on RDS  
- **Storage**: Auto-scales to 128 TB, distributed across AZs  
- **Serverless**: Aurora Serverless v2 auto-scales capacity on demand  
- **Lab**: Create an Aurora Serverless cluster, run variable load queries, observe auto-scaling.

---

## 2. In-Memory & NoSQL

### ElastiCache
- **Redis**: Persistent, replication, clustering, snapshot backups  
- **Memcached**: Simple, multi-node caching  
- **Use Case**: Session stores, leaderboards, caching DB queries  
- **Lab**: Deploy a Redis cluster, configure an EC2-hosted app to cache DB lookups.

### DynamoDB
- **Model**: Key–value and document, single-digit ms latency  
- **Scalability**: Virtually unlimited; auto scaling of read/write capacity  
- **DAX**: In-memory cache for microsecond reads  
- **Global Tables**: Multi-region active-active replication  
- **Lab**: Create a DynamoDB table with Auto Scaling, enable DAX, benchmark read latency with/without DAX.

---

## 3. Analytics & Data Lake

### Amazon Redshift
- **Architecture**: Columnar storage, Massively Parallel Processing (MPP)  
- **Scalability**: Pause/resume clusters; RA3 nodes with managed storage  
- **Serverless**: Redshift Serverless for on-demand analytics  
- **Lab**: Load 100 GB of sample data, run complex JOIN queries, monitor query plan and performance.

### Amazon EMR
- **Frameworks**: Hadoop, Spark, Presto, Hive, HBase  
- **Autoscaling**: Use Spot instances for cost optimization  
- **Lab**: Spin up an EMR cluster, process a large log dataset with Spark, write results to S3.

### Amazon Athena & QuickSight
- **Athena**: Serverless Presto-based SQL on S3; pay per TB scanned  
- **QuickSight**: ML-powered dashboards, auto-scaling, embedded analytics  
- **Lab**: Define an Athena table over S3 logs, write SQL to aggregate, visualize in QuickSight.

---

## 4. Specialized Databases

| Service        | Model               | Use Case                              |
|----------------|---------------------|---------------------------------------|
| DocumentDB     | MongoDB-compatible  | JSON/document applications            |
| QLDB           | Immutable ledger    | Financial transactions, audit trails  |
| Neptune        | Graph (Gremlin/SPARQL) | Social networks, recommendation engines |
| Timestream     | Time-series         | IoT telemetry, metrics monitoring     |

**Lab:**  
- Deploy a Neptune cluster, load a social-graph dataset, run Gremlin queries to find shortest paths.  
- Create a Timestream database, ingest synthetic IoT sensor data, query for time-windowed aggregates.

---

## 5. Data Integration & Migration

### AWS Glue
- **ETL**: Serverless Extract-Transform-Load, Data Catalog integration  
- **Triggers**: Schedule or event-driven jobs  
- **Lab**: Build a Glue job to transform CSV in S3 to Parquet and register in Data Catalog.

### AWS DMS
- **Migration**: Homogeneous & heterogeneous migrations with minimal downtime  
- **Continuous replication**: Keep source live during migration  
- **Lab**: Migrate an on-prem MySQL schema to RDS Aurora with DMS, validate data consistency.

---

By mastering these database and analytics services—covering OLTP, caching, NoSQL, data warehousing, big data, and specialized stores—you’ll be fully prepared to architect and optimize data solutions for the AWS CCP exam and real-world scenarios.  
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
## Quick Summary
- **Containers**:  
  - **ECR**: Private Docker registry.  
  - **ECS**: Orchestrate containers on EC2 or Fargate.  
  - **Fargate**: Serverless container runtime—no EC2 to manage.  
  - **Lightsail**: Simplified VPS & containers with predictable pricing.  
  - **Batch**: Managed batch compute for large-scale, parallel jobs.  
- **Serverless Integration**:  
  - **Lambda**: Event-driven functions (up to 15 min, 128 MB–10 GB RAM).  
  - **API Gateway**: Expose REST/WebSocket endpoints to Lambda or HTTP backends.  
  - **EventBridge**: Schedule or react to 200+ AWS service events.  

---

## 1. Container Services

### Amazon ECR (Elastic Container Registry)
- **Secure** private Docker registry.  
- **Features**: Image scanning, lifecycle policies, IAM-based access.  
- **Lab**: Push a “hello-world” Docker image to ECR, pull from an ECS task.

### Amazon ECS (Elastic Container Service)
- **Launch types**: EC2 (you manage instances) or Fargate (serverless).  
- **Task Definitions**: JSON specs for containers (CPU, memory, ports, IAM role).  
- **Service**: Ensures desired task count, integrates with ALB/NLB.  
- **Lab**: Create an ECS cluster with Fargate, deploy a simple web service behind an ALB.

### AWS Fargate
- **Serverless containers**: Specify CPU/RAM; AWS provisions infrastructure.  
- **Scaling**: Automatic based on service definitions.  
- **Use case**: Microservices without EC2 management.  
- **Lab**: Modify your ECS service to use Fargate; observe zero-EC2 provisioning.

### Amazon Lightsail
- **Pre-configured stacks**: LAMP, Node.js, containers.  
- **Predictable pricing**: Bundled compute, storage, networking.  
- **Use case**: Simple web apps, dev/test, small databases.  
- **Lab**: Launch a Lightsail container service with a public endpoint.

### AWS Batch
- **Batch jobs** as Docker containers.  
- **Compute environments**: Mix of On-Demand and Spot, automatic scaling.  
- **Job queues & definitions**: Control priorities, retries.  
- **Lab**: Submit a CPU-heavy “hello-world” batch job; watch Spot instances spin up.

---

## 2. Serverless Compute & Integration

### AWS Lambda
- **Execution model**: Pay per request & duration (100 ms granularity).  
- **Triggers**: S3, API Gateway, EventBridge, DynamoDB Streams, Kinesis, etc.  
- **Limits**: 15 min max, /tmp up to 512 MB, ephemeral.  
- **Lab**: Create a Lambda function that resizes images uploaded to S3.

### Amazon API Gateway
- **REST APIs**: Mapping to Lambda or HTTP backends.  
- **WebSocket APIs**: Real-time two-way communication.  
- **Features**: Caching, throttling, API keys, usage plans, custom domain names.  
- **Lab**: Define a REST API with GET/POST methods backed by two separate Lambda functions.

### Amazon EventBridge (CloudWatch Events)
- **Event buses**: AWS services, custom apps, SaaS partners.  
- **Rules**: Route events to targets (Lambda, SQS, SNS, Step Functions).  
- **Scheduling**: Cron/Rate expressions.  
- **Lab**: Schedule a Lambda to run every hour to clean up stale S3 objects.

---

## 3. When to Choose What

| Scenario                                | Container (ECS/Fargate) | Lambda + API Gateway    | Lightsail         |
|-----------------------------------------|-------------------------:|-------------------------:|------------------:|
| Long-running microservice               | ✔️                       | ❌ (time limit)          | ❌                |
| Event-driven processing (files, streams)| ❌                       | ✔️                       | ❌                |
| Simple website or dev/test environment  | ❌                       | ❌                       | ✔️                |
| Batch jobs & high-performance compute   | ✔️ (Batch)               | ❌                       | ❌                |

---

### Hands-On Challenge
1. **Container pipeline**:  
   - Build & push a Docker image to ECR.  
   - Deploy to ECS Fargate behind an ALB.  
2. **Serverless API**:  
   - Create a Lambda function (Node.js/Python).  
   - Expose via API Gateway with JSON schema validation.  
3. **Scheduled tasks**:  
   - Use EventBridge to trigger a Lambda that writes a heartbeat to DynamoDB.  
   - Visualize entries in QuickSight.

By mastering serverless functions and container orchestration, you’ll be equipped to architect scalable, cost-efficient, and operationally simple applications—key skills for the AWS CCP exam and beyond.  
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
## Quick Summary
- **Infrastructure as Code**:  
  - **CloudFormation**: Declarative YAML/JSON templates.  
  - **CDK**: Define infra in TypeScript/Python/Java/C#.  
- **Platform & Configuration**:  
  - **Elastic Beanstalk**: PaaS for web apps.  
  - **Systems Manager**: Fleet-wide patching, Run Command, Parameter Store.  
  - **OpsWorks**: Chef & Puppet automation.  
- **CI/CD Pipeline**:  
  - **CodeCommit**, **CodeBuild**, **CodeDeploy**, **CodePipeline**.  
  - **CodeArtifact**: Private package repo.  
  - **Cloud9**: Browser-based IDE with AWS context.  

---

## 1. Infrastructure as Code

### AWS CloudFormation
- **Templates** declare AWS resources and their relationships.  
- **Stacks** manage create/update/delete as a unit.  
- **Drift Detection**: Identify manual changes.  
- **Lab**: Write a template to provision a VPC, public subnet, and an EC2 instance.

### AWS CDK (Cloud Development Kit)
- **Languages**: TypeScript, Python, Java, C#.  
- **Constructs**: High-level building blocks.  
- **cdk synth** → generates CloudFormation; **cdk deploy** → provisions it.  
- **Lab**: Define an S3 bucket and Lambda function in CDK; deploy with one CLI command.

---

## 2. Platform Services & Configuration

### Elastic Beanstalk
- **Managed platform** for web apps (Node, Java, .NET, PHP, Python, Ruby, Docker).  
- **Environments**: Single-instance (dev) or Load-balanced Auto-scaled (prod).  
- **Deployment policies**: All-at-once, Rolling, Immutable.  
- **Lab**: Deploy a “Hello World” Node.js app from CodeCommit to Beanstalk.

### AWS Systems Manager
- **Run Command**: Execute scripts on EC2/on-prem at scale.  
- **Patch Manager**: Automate OS patching.  
- **Parameter Store**: Secure storage for config, secrets (with KMS).  
- **Session Manager**: SSH-less shell to instances.  
- **Lab**: Store DB password in Parameter Store; have EC2 retrieve it at boot.

### AWS OpsWorks
- **Chef Automate** & **Puppet Enterprise** managed.  
- **Layers**: Define app, database, load-balancer layers.  
- **Use case**: Existing Chef/Puppet codebases.  

---

## 3. CI/CD Services

### AWS CodeCommit
- **Private Git** repo.  
- **Triggers**: push events → CodePipeline, Lambda, SNS.

### AWS CodeBuild
- **Build projects** run in managed containers.  
- **Pay per build minute**.  
- **Integrations**: CodeCommit, GitHub, S3.

### AWS CodeDeploy
- **Deploy** to EC2, on-prem, Lambda, ECS.  
- **Strategies**: Blue/Green, in-place.  
- **Hooks** for pre-/post-deployment scripts.

### AWS CodePipeline
- **Orchestrates** stages: Source → Build → Test → Deploy.  
- **Integrates** with CodeCommit, CodeBuild, CodeDeploy, CloudFormation, Elastic Beanstalk.

### AWS CodeArtifact
- **Artifact repo** for Maven, npm, pip, NuGet.  
- **Upstream sources**: Cache public registries.

### AWS Cloud9
- **Browser IDE** with AWS credentials.  
- **Pre-installed** AWS CLI, SDKs, Docker.  
- **Collaboration**: Share environments in real-time.

---

## 4. Hands-On Challenge
1. **Template & CDK**  
   - Build a CloudFormation template for a 3-tier web app.  
   - Re-implement it in CDK; deploy and compare.  
2. **Beanstalk Pipeline**  
   - Commit code to CodeCommit.  
   - CodePipeline: CodeBuild → deploy to Beanstalk.  
3. **Configuration Automation**  
   - Use Systems Manager Run Command to install Nginx on a fleet of EC2.  
   - Store Nginx config in Parameter Store and apply via Automation document.  

Mastering these tools ensures repeatable, auditable, and automated deployments—critical for both the CCP exam and real-world DevOps practices.  
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
## Quick Summary
- **Network isolation & security**: VPC, subnets, route tables, Internet/NAT gateways  
- **Firewalls**: Security Groups (stateful) vs Network ACLs (stateless)  
- **Private connectivity**: VPC Peering, VPC Endpoints (Interface & Gateway), AWS PrivateLink  
- **Hybrid links**: Site-to-Site VPN, Client VPN, Direct Connect  
- **Scale & simplify**: Transit Gateway for hub-and-spoke architectures  

---

## 1. VPC Recap & Routing
- **VPC**: Virtual network (CIDR block, e.g. 10.0.0.0/16) spanning AZs  
- **Subnets**: Segment by AZ; public (route to IGW) vs private (route to NAT)  
- **Route tables**: Control egress—public subnets → Internet Gateway; private → NAT Gateway/instance  
- **IGW vs NAT**  
  - **Internet Gateway**: Bi-directional Internet access for resources with public IP  
  - **NAT Gateway**: Outbound Internet for private-subnet resources; no inbound  

---

## 2. Network Security: Security Groups vs NACLs

| Feature               | Security Group            | Network ACL                 |
|-----------------------|---------------------------|-----------------------------|
| Level                 | Instance-level (ENI)      | Subnet-level                |
| Stateful              | Yes                       | No                          |
| Rules                 | Allow only                | Allow & Deny                |
| Evaluation order      | All rules evaluated       | Lowest number first         |
| Default behavior      | Deny all inbound, allow outbound | Allow all (default)     |

> **Exam tip:**  
> - **Stateful** means return traffic is automatically allowed.  
> - NACLs require explicit allow on both inbound and outbound.

---

## 3. VPC Peering & Its Limits
- **VPC Peering**: Private IPv4/IPv6 routing between two VPCs—same or different accounts/regions  
- **Non-transitive**: A↔B and B↔C does _not_ imply A↔C  
- **Use cases**: Shared services, cross-account access, isolation  
- **Limitations**: No overlap in CIDRs; no edge-to-edge routing through a gateway or Transit Gateway (use TGW for that)

---

## 4. VPC Endpoints & AWS PrivateLink
- **Gateway Endpoint** (S3 & DynamoDB): Route table entry → AWS service, no public IP  
- **Interface Endpoint** (most AWS services): ENI in your subnet, private IP to AWS API  
- **AWS PrivateLink**: Partner service exposure via NLB → Interface Endpoint in customer VPC  
  - Secure, scalable, no IGW/NAT required  

---

## 5. Hybrid Connectivity
| Connectivity     | Encryption | Management        | Use case                         |
|------------------|------------|-------------------|----------------------------------|
| Site-to-Site VPN | IPSec      | AWS VPN Gateway   | Secure branch office ➔ VPC       |
| Client VPN       | OpenVPN    | AWS Client VPN    | Remote user ➔ private VPC        |
| Direct Connect   | Dedicated  | DX Gateway        | High-bandwidth, low-latency link |

- **VPN** rides over Internet; **Direct Connect** is private fiber with optional VPN encryption  
- **DX Gateway** lets multiple VPCs use the same Direct Connect  

---

## 6. Transit Gateway (TGW)
- **Hub-and-spoke**: Connect hundreds of VPCs & on-premises via a single managed gateway  
- **Transitive routing**: VPC A ↔ TGW ↔ VPC B without peering  
- **Scales**: Centralized route tables, supports multicast, inter-region peering  
- **Billing**: Per-hour attachment + data processing charges  

---

## 7. Hands-On Challenge
1. **Firewalls**:  
   - Create a public & private subnet in a VPC.  
   - Launch EC2 in private subnet; verify Internet egress via NAT Gateway.  
   - Demonstrate that inbound SSH fails.  
2. **VPC Endpoint**:  
   - Add a Gateway Endpoint for S3; upload/download without IGW/NAT.  
3. **Hybrid link**:  
   - Configure a Site-to-Site VPN between a customer gateway (on-prem simulator) and VPC.  
4. **Transit Gateway**:  
   - Peer three VPCs via TGW; demonstrate cross-VPC ping.

---

## Exam Pro Tips
- NACLs: numbered rules, stateless → require mirror rules  
- SGs: stateful → only define ingress for inbound needs  
- Peering can’t cross through NAT/IGW or TGW (use TGW directly)  
- Endpoint vs PrivateLink: Endpoint is AWS service; PrivateLink is customer/partner service  
- Direct Connect still needs a Virtual Private Gateway or Transit Gateway on AWS side  

Master these advanced networking patterns to architect resilient, secure, and high-performance AWS environments—and nail the CCP’s networking questions!  
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
## Quick Summary
- **Decouple** components with asynchronous queues (SQS) and pub/sub (SNS).  
- **Stream** high-volume data in real-time with Kinesis Data Streams & Firehose.  
- **Migrate** legacy brokers via Amazon MQ (ActiveMQ/RabbitMQ).  
- **Integrate** using EventBridge for serverless event routing.  

---

## 1. Amazon SQS – Simple Queue Service
- **Standard Queues**  
  - Unlimited throughput, at-least-once delivery, best-effort ordering.  
  - Retention up to 14 days; consumers poll and delete messages.  
- **FIFO Queues**  
  - Exactly-once processing, first-in-first-out ordering, limited throughput.  
- **Key Concepts**  
  - Visibility Timeout, Dead-Letter Queues, Delay Queues, long polling.  

### When to use SQS  
- Buffer requests between microservices  
- Smooth traffic spikes (batch processing)  
- Retry failed workflows  

---

## 2. Amazon SNS – Simple Notification Service
- **Pub/Sub**: One publisher → many subscribers.  
- **Endpoints**: SQS, Lambda, HTTP/S, email, SMS, mobile push.  
- **Fan-out**: Send a single message to multiple queues/functions.  
- **Filtering**: Message attributes drive subscription filters.  

### When to use SNS  
- Alerting & notifications (Ops, security)  
- Fan-out processing pipelines  
- Mobile push campaigns  

---

## 3. Amazon Kinesis
- **Data Streams**: Real-time ingestion of millions of events/sec.  
  - Shards, producers, consumers, retention (24h–7d).  
- **Data Firehose**: Serverless delivery to S3, Redshift, OpenSearch, Splunk.  
- **Data Analytics**: SQL queries on streaming data (Kinesis Data Analytics).  

### When to use Kinesis  
- Clickstream analysis, metrics collection  
- Real-time dashboards and monitoring  
- Streaming ETL into data lake  

---

## 4. Amazon MQ
- Managed **ActiveMQ** & **RabbitMQ** brokers.  
- Supports standard protocols: AMQP, MQTT, STOMP, OpenWire, WSS.  
- Multi-AZ deployment for high availability.  
- Lift-and-shift legacy applications without code change.  

### When to use Amazon MQ  
- Migrating on-prem JMS/RabbitMQ workloads  
- Protocol compatibility requirements  
- Stateful message broker features  

---

## 5. Amazon EventBridge (CloudWatch Events)
- **Event bus** for AWS services, custom apps, SaaS partners.  
- **Routing rules**: pattern-match events to targets (Lambda, SQS, SNS, Step Functions…).  
- **Schema Registry**: discover and generate code bindings.  
- **Replay**: archive and replay past events.  

### When to use EventBridge  
- Serverless application integration  
- Audit and compliance event routing  
- Cross-account event distribution  

---

## 6. Hands-On Challenge
1. **SQS + Lambda**:  
   - Create a Standard queue; trigger a Lambda consumer; log message body.  
   - Implement a Dead-Letter Queue for failures.  
2. **SNS Fan-Out**:  
   - Create an SNS topic with SQS and email subscriptions; publish a test message.  
3. **Kinesis Stream**:  
   - Create a data stream; write sample records via AWS CLI; consume with a simple Python app.  
4. **Amazon MQ**:  
   - Launch a RabbitMQ broker; connect via a test client; publish/subscribe messages.  
5. **EventBridge Rule**:  
   - Route EC2 state-change events to an SQS queue; verify messages on instance start/stop.  

---

## Exam Pro Tips
- SQS = pull-based; SNS = push-based.  
- FIFO vs Standard: ordering & duplication guarantees.  
- Kinesis Shard limits throughput (1 MB/s write, 2 MB/s read per shard).  
- MQ for protocol compatibility; SQS/SNS are AWS-native.  
- EventBridge can replace custom polling architectures.  

Master these patterns to architect loosely-coupled, event-driven solutions—and excel on the CCP’s integration questions!  
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
## Quick Summary
- **CloudWatch** for metrics, logs, alarms, events, and dashboards.  
- **CloudTrail** to audit API activity and detect anomalies.  
- **X-Ray** for distributed tracing across microservices.  
- **Health Dashboards** for global AWS service status and account-specific alerts.  
- **CodeGuru** for ML-powered code reviews and performance profiling.  

---

## 1. Amazon CloudWatch
### Metrics
- Monitors AWS resources (EC2 CPU, EBS I/O, RDS connections) and custom metrics.
- Default granularity 5 min; enable **Detailed Monitoring** for 1 min.

### Alarms
- Trigger when a metric breaches a threshold.
- Actions: SNS notification, Auto Scaling, EC2 recover/stop/terminate.

### Logs
- Collect from EC2 (CloudWatch agent), Lambda, API Gateway, VPC Flow Logs.
- Create **Log Groups**, set retention, filter patterns, and metric filters.

### Events (EventBridge)
- Schedule cron jobs or react to AWS service events.
- Route to Lambda, SQS, SNS, Step Functions, Batch, etc.

### Dashboards
- Customizable, shareable graphs and single-pane views of key metrics.
- Combine metrics, text widgets, and alarms.

---

## 2. AWS CloudTrail
- **Audit Trail**: captures all API calls (console, SDK, CLI) across your account.
- **Trails**: deliver logs to S3 and optionally CloudWatch Logs.
- **Insights**: detect unusual API patterns (e.g., spikes in CreateUser calls).
- Use for security investigations, compliance, and change tracking.

---

## 3. Distributed Tracing with AWS X-Ray
- **Segments & Subsegments**: trace requests end-to-end across services.
- **Service Map**: visualize dependencies and latencies between microservices.
- **Annotations & Metadata**: add custom data for filtering traces.
- **Sampling**: control data volume and costs.
- Identify performance bottlenecks, error hotspots, and throttling.

---

## 4. AWS Health Dashboards
### Service Health Dashboard
- Public view of AWS service status globally.

### Account Health Dashboard
- Personalized alerts for your resources (scheduled maintenance, incidents).
- Integrates with SNS for notifications.
- Can aggregate across an AWS Organization.

---

## 5. Automated Code Analysis: Amazon CodeGuru
### Reviewer
- Static code scans for Java/Python: security, resource leaks, best practices.
- Integrates with GitHub, Bitbucket, CodeCommit.

### Profiler
- Runtime analysis: identifies CPU/memory hotspots in production.
- Provides recommendations to reduce latency and cost.

---

## 6. Hands-On Challenge
1. **CloudWatch Metrics & Alarms**  
   - Create an alarm on EC2 CPU > 70% for 3 consecutive periods; notify via SNS.  
2. **Log Collection**  
   - Install CloudWatch agent on EC2; push `/var/log/nginx/access.log` to CloudWatch Logs; create a metric filter for 5xx errors.  
3. **EventBridge Rule**  
   - Schedule a rule to invoke a Lambda function every night at midnight UTC.  
4. **CloudTrail & Insights**  
   - Enable CloudTrail in all regions; simulate an unusual API call pattern; observe an Insights event.  
5. **X-Ray Tracing**  
   - Instrument a sample Lambda function with X-Ray SDK; generate traces; explore the service map.  
6. **CodeGuru Profiler**  
   - Profile a Java application; identify the top latency contributor; apply the suggested optimization.

---

## Exam Pro Tips
- CloudWatch = your “eyes” on AWS resources; know Metrics vs Logs vs Events.  
- CloudTrail = your “audit camera”; always enabled by default.  
- X-Ray for microservices—understand basic segments/subsegments.  
- Health Dashboard (account) ≠ Service Health (global).  
- CodeGuru is nice-to-know for “automated recommendations” questions.  

Master these observability tools to ensure robust monitoring and to ace CCP scenario questions on detection and troubleshooting!
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
## Quick Summary
- **DDoS Protection**: AWS Shield Standard (free) & Advanced (24×7 support, cost protection).  
- **Web Application Firewall**: AWS WAF for custom rules, bot control, OWASP top-10 mitigation.  
- **Threat Detection**: GuardDuty for intelligent threat monitoring; Inspector for host-level vulnerability scans; Macie for S3 data classification.  
- **Central Security Posture**: Security Hub aggregates findings & compliance checks; AWS Config tracks resource configuration and drift.  
- **Compliance Reporting**: AWS Artifact provides on-demand compliance documents; CloudHSM & ACM manage keys and certificates.

---

## 1. DDoS Mitigation & Firewalling
### AWS Shield
- **Standard**: automatic network & transport layer protection at no extra cost.  
- **Advanced**: additional detection, 24×7 DDoS response team access, cost protection credits.

### AWS WAF
- **Web ACLs** with allow/deny rules on IP, headers, SQL injection, XSS.  
- **Managed rule groups** (AWS, Marketplace).  
- **Bot Control** to block common bots.  
- **Integration**: CloudFront, ALB, API Gateway, AppSync.

### AWS Network Firewall
- Stateful, managed firewall in your VPC; intrusion prevention; domain filtering.

---

## 2. Threat Detection & Vulnerability Management
### Amazon GuardDuty
- Continuous “intelligent” monitoring of VPC Flow Logs, CloudTrail, DNS logs.  
- Finds reconnaissance, instance compromise, privilege escalation.  
- Sends findings to CloudWatch Events or Security Hub.

### Amazon Inspector
- Agent-based assessment for EC2: CIS benchmarks, network reachability.  
- Generates prioritized security findings and remediation steps.

### Amazon Macie
- ML-driven S3 data inspection for PII, intellectual property.  
- Automated discovery, classification, and protection of sensitive data.

---

## 3. Centralized Security & Compliance
### AWS Security Hub
- Aggregates findings from GuardDuty, Inspector, Macie, Firewall Manager.  
- Provides compliance checks against CIS AWS Foundations and PCI DSS.  
- Custom insights, automated response via EventBridge.

### AWS Config & Config Rules
- **Config**: records snapshots of resource configurations and relationships.  
- **Config Rules**: continuous evaluation against best-practice policies (e.g., “root account MFA enabled”).  
- **Remediation**: automatic rollback or notification when drift detected.

### AWS Artifact
- Self-service access to AWS SOC, ISO, PCI, FedRAMP reports and agreements.

---

## 4. Key Management & Encryption
### AWS KMS & CloudHSM
- **KMS**: managed envelope-encryption keys with IAM & GRANT policies; automatic key rotation.  
- **CloudHSM**: dedicated Hardware Security Modules for FIPS-compliant, customer-managed keys.

### AWS Certificate Manager (ACM)
- Free public TLS certificates; automatic renewal; integrated with ELB, CloudFront, API Gateway.

---

## 5. Hands-On Challenge
1. **Enable GuardDuty** in three regions; simulate an unauthorized API call and view findings.  
2. **Create a WAF Web ACL** on CloudFront to block requests from a test IP range.  
3. **Run Inspector assessment** on an EC2 instance; review and remediate high-severity findings.  
4. **Classify S3 data** with Macie; generate a report of objects containing PII.  
5. **Author a Config Rule** to enforce encryption on all new EBS volumes; test by launching an unencrypted volume.  
6. **Aggregate findings** in Security Hub; create a custom insight for “IAM users without MFA.”

---

## Exam Pro Tips
- Shield Standard is automatic; Advanced is optional for high-risk workloads.  
- WAF vs Network Firewall: WAF is L7, Network Firewall is VPC-centric L3–L4.  
- GuardDuty is **always on**—no agents to manage.  
- Config tracks drift; Security Hub unifies alerts; Artifact delivers compliance docs.  
- KMS keys vs CloudHSM: managed vs dedicated HSM.  

Understand these managed security services and their shared-responsibility boundaries to tackle CCP scenario questions on protecting and auditing your AWS environment.
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
## Quick Summary
- **AWS Outposts** brings native AWS services on-premises in a managed rack.  
- **AWS Local Zones** extend AWS Regions close to major metro areas for ultra-low latency.  
- **AWS Wavelength** embeds AWS compute in 5G telco networks for single-digit ms latency.  
- **AWS Snow Family** (Snowcone, Snowball Edge) delivers portable edge storage & compute.

---

## 1. AWS Outposts
- **What it is**: Fully managed racks of AWS compute & storage installed in your data center.  
- **Key features**: Same APIs, hardware, tooling as public AWS Regions; hybrid connectivity via AWS Direct Connect or VPN.  
- **Use cases**:  
  - Low-latency access to on-prem systems (e.g. manufacturing control).  
  - Data residency & local processing (e.g. healthcare imaging).  
  - Gradual migration of legacy apps to cloud-native.

---

## 2. AWS Local Zones
- **What it is**: Extension of an AWS Region in major metro locations (e.g. LA, Boston).  
- **Key features**:  
  - Run EC2, EBS, ECS, EKS, RDS closer to end-users.  
  - Single VPC spans Region & its Local Zones.  
- **Use cases**:  
  - Media & entertainment rendering with <10 ms latency.  
  - Real-time gaming, live streaming.  
  - Financial trading platforms.

---

## 3. AWS Wavelength
- **What it is**: AWS infrastructure embedded within 5G telco networks (Edge Zones).  
- **Key features**:  
  - Ultra-low network latency by processing at 5G edge.  
  - Two components: Wavelength Zones (compute) + AWS Region for management.  
- **Use cases**:  
  - AR/VR applications with sub-20 ms round-trip.  
  - Connected vehicles, IoT telemetry analytics.  
  - Industrial automation on mobile networks.

---

## 4. AWS Snow Family for Edge Compute
- **Snowcone**: Smallest edge device (2 TB storage, 8 GB RAM) for disconnected environments.  
- **Snowball Edge**: Edge storage optimized (up to 210 TB) and compute optimized (EC2-capable) devices.  
- **Features**:  
  - Run EC2 instances & Lambda functions on device.  
  - Secure data transfer back to AWS when reconnected.  
- **Use cases**:  
  - Data collection/processing in remote sites (oil rigs, ships).  
  - Edge ML inference, local caching.

---

## Hands-On Challenge
1. **Explore Outposts**: In the console, review Outposts configuration (Regions → Outposts).  
2. **Launch in a Local Zone**: Enable a Local Zone in your account; launch an EC2 instance there and measure latency.  
3. **Wavelength Preview**: Read the Wavelength developer guide; identify available carriers and zones.  
4. **Simulate Snowball Edge**: Download the Snow Device SDK; run a Docker container as if on Snowball Edge.  

---

## Exam Pro Tips
- Outposts = on-prem rack; Local Zones = metro-area extension; Wavelength = telco 5G edge.  
- Snow Family is for **disconnected** or **intermittent** connectivity—portable compute/storage.  
- All hybrid services integrate with your VPC; know which use cases require physical deployment vs console enablement.  
- Remember billing: Local Zones & Wavelength incur regional pricing; Snow devices have job-based fees.  
- Focus on latency, data residency, and migration patterns to answer scenario questions.
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
## Quick Summary  
- **SageMaker** for building, training, tuning, and deploying ML models at scale.  
- **Autopilot** automates best-practices model creation.  
- **Ground Truth** simplifies high-quality data labeling.  
- **Pre-built AI services** cover Vision (Rekognition, Textract), Language (Comprehend, Translate), Speech (Transcribe, Polly), and Decision (Personalize, Forecast).  
- **Serverless ML** patterns: Lambda + AI services for event-driven inference; Batch + SageMaker for bulk scoring.

---

## 1. Amazon SageMaker  
### SageMaker Studio  
- Integrated IDE for data science and ML.  
- Notebooks, experiments, model registry in one place.  

### Model lifecycle  
1. **Prepare data** in S3; optionally label with Ground Truth.  
2. **Train** using built-in algorithms or your own container.  
3. **Tune** hyperparameters with automatic model tuning.  
4. **Deploy** to real-time endpoints or batch transform jobs.  

### Autopilot & Ground Truth  
- **Autopilot**: automatically explores algorithms and feature engineering.  
- **Ground Truth**: managed workflows for human-in-the-loop labeling with built-in quality controls.

---

## 2. Pre-Built AI Services  

| Category        | Service       | Use Case                                     |
|-----------------|---------------|-----------------------------------------------|
| Vision          | Rekognition   | Image & video object, face, text analysis     |
|                 | Textract      | Extract text & data from scanned documents    |
| Language        | Comprehend    | Sentiment, entity, syntax, topic extraction   |
|                 | Translate     | Neural language translation                   |
| Speech          | Transcribe    | Speech-to-text for audio/video                |
|                 | Polly         | Text-to-speech synthesis                      |
| Conversational  | Lex           | Build chatbots with automatic speech         |
| Decision        | Personalize   | Real-time product recommendations              |
|                 | Forecast      | Time-series forecasting with ML               |

---

## 3. Serverless ML Workflows  
- **Event-driven inference**: S3 upload → EventBridge/S3 event → Lambda → Rekognition/Comprehend → store results in DynamoDB.  
- **Batch scoring**: SageMaker Batch Transform on CSVs in S3; results back to S3.  

---

## 4. Security & Monitoring for ML  
- **IAM Roles**: grant least-privilege to SageMaker notebooks, endpoints, and data in S3.  
- **VPC Endpoints**: keep traffic between SageMaker and S3 off the public internet.  
- **CloudWatch**: track training job metrics, endpoint invocation errors, latency.  
- **Cost controls**: use spot instances for training, choose appropriate instance sizes, delete unused endpoints.

---

## 5. Hands-On Challenge  
1. **SageMaker Notebook**: launch Studio, explore a sample notebook, train a built-in XGBoost model on sample data.  
2. **Autopilot experiment**: point Autopilot at a CSV in S3; review candidate models and deploy best.  
3. **Use Rekognition**: from a Lambda function, detect labels in an S3-uploaded image and write to DynamoDB.  
4. **Build a chatbot**: create a simple Lex bot that recognizes intents and integrate with the test console.  

---

## Exam Pro Tips  
- Remember **SageMaker** covers the full ML lifecycle; **Autopilot** is not a separate service.  
- Pre-built AI services require no ML expertise—just IAM and triggers.  
- Know the difference between **Real-time endpoints** vs **Batch Transform**.  
- **Ground Truth** is for data labeling; **Personalize** and **Forecast** are for decision-making use cases.  
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
## Quick Summary  
- **AWS Organizations & Control Tower** for multi-account governance and guardrails.  
- **Consolidated Billing** centralizes invoices and enables cost sharing.  
- **Cost Explorer & Budgets** to visualize spend, forecast, and set alerts.  
- **AWS Cost and Usage Report (CUR)** for detailed line-item billing data.  
- **Tagging strategies** and **Resource Groups** to allocate costs by project or team.  
- **Trusted Advisor** cost checks and **Billing Alarms** for overspend protection.

---

## 1. AWS Organizations & Control Tower  
### Organizations  
- Create multiple AWS accounts under a single root.  
- **Consolidated billing** rolls all account charges into one invoice, applies volume discounts.  
- **Service Control Policies (SCPs)** enforce permissions across member accounts.

### Control Tower  
- Automates account provisioning with pre-configured guardrails (mandatory and strongly recommended).  
- Provides a **Landing Zone** with OUs, identity, logging, and security baseline.

---

## 2. Cost Visibility & Reporting  
### AWS Cost Explorer  
- Pre-built and custom reports: daily, monthly spend, usage by service/account/tag.  
- Forecast future spend based on historical trends.  

### Cost and Usage Report (CUR)  
- Delivers the most granular billing data to S3 in CSV or Parquet.  
- Integrate with Athena or Redshift for custom analysis.

### Budgets  
- Create budgets for cost, usage, or reservation utilization.  
- Alert via email or SNS when thresholds (actual or forecasted) are breached.

---

## 3. Tagging & Resource Management  
- Define a **tagging taxonomy** (CostCenter, Project, Environment, Owner).  
- Enforce via **IAM policies** or **AWS Config rules** to require tags on resource creation.  
- Use **Resource Groups** to group and view tagged resources in console and reports.

---

## 4. Cost Optimization Tools  
### AWS Trusted Advisor  
- **Cost Optimization** checks: idle load balancers, underutilized EC2, RDS.  
- Review **Saving Opportunities** and implement recommendations.

### Billing Alarms (CloudWatch)  
- Monitor the “EstimatedCharges” metric in us-east-1.  
- Trigger SNS notifications when account spend exceeds thresholds.

---

## 5. Account & IAM Best Practices  
- **Root user**: lock away, enable MFA, use only for signup/billing.  
- **IAM users/groups/roles** for daily operations; apply least-privilege.  
- **AWS Single Sign-On (SSO)** or integrate with an identity provider for centralized access.  

---

## 6. Hands-On Challenge  
1. **Organizations Setup**: Create an OU structure with two accounts; apply an SCP denying S3 deletions.  
2. **Cost Explorer**: Generate a report of last month’s service-by-service spend; forecast next month.  
3. **Budget Alert**: Configure a cost budget at \$50/month; trigger an SNS email when 80% reached.  
4. **Tag Enforcement**: Create a Config rule that flags EC2 instances missing the “Project” tag.  
5. **Trusted Advisor**: Review cost recommendations and implement one (e.g., terminate idle instances).

---

## Exam Pro Tips  
- Consolidated billing doesn’t merge permissions—accounts remain isolated.  
- CUR is the source of truth for any deep-dive cost analysis.  
- Tag early and often: untagged resources default into “other” buckets in reports.  
- Control Tower guardrails are implemented as SCPs—know the difference.  
- Billing alarms use CloudWatch’s “EstimatedCharges” metric in us-east-1.  
- Trusted Advisor cost checks are free—even without Business support plan.  
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
