---
title: Apache Impala
date: 2020-06-21 20:44:25
tags:
categories: 大数据
---

# Impala
A Modern, Open-Source SQL Engine for Hadoop. [Guide >>](https://impala.apache.org/docs/build/html/index.html)

## Overview & Architecture
[![impala.png](https://wx2.sbimg.cn/2020/06/21/impala.png)](https://sbimg.cn/image/24IF6)

[Detail >> ](https://impala.apache.org/overview.html)

<!--more-->

## Components of the Impala Server
- Impala Daemon
负责接收客户端的SQL请求，在集群内分发查询任务，执行数据查询和写入，聚合查询结果返回给客户端。
- Statestore
负责检查每个 Impala Daemon 的健康状态
- Catalogd
同步每个 Impala Daemon 的 metadata 信息

[Detail >>](https://impala.apache.org/docs/build/html/topics/impala_components.html)


## Guidelines for designing impala schemas

### Prefer binary file formats over text-based formats. （parquet/avro）

- For an efficient and scalable format for large, performance-critical tables, use the Parquet file format.

- To deliver intermediate data during the ETL process, in a format that can also be used by other Hadoop components, Avro is a reasonable choice.

- For convenient import of raw data, use a text table instead of RCFile or SequenceFile, and convert to Parquet in a later stage of the ETL process.

### Use Snappy compression where practical.

### Prefer numeric types over strings.

### Partition, but do not over-partition.

### Always compute stats after loading data.
- COMPUTE STATS
- SHOW STATS

### Verify sensible execution plans with EXPLAIN and SUMMARY.

[Detail >>](https://impala.apache.org/docs/build/html/topics/impala_schema_design.html)

## Tuning Impala for Performance.

[Detail >>](https://impala.apache.org/docs/build/html/topics/impala_performance.html)

## Resource Management

[Detail](https://impala.apache.org/docs/build/html/topics/impala_admission.html) and [Configuration](https://impala.apache.org/docs/build/html/topics/impala_admission_config.html)


## Impala Security
- [authorization](https://impala.apache.org/docs/build/html/topics/impala_authorization.html#authorization)
- [authentication](https://impala.apache.org/docs/build/html/topics/impala_kerberos.html#kerberos)
- [auditing](https://impala.apache.org/docs/build/html/topics/impala_auditing.html#auditing)

[Detail >>](https://impala.apache.org/docs/build/html/topics/impala_security.html)

