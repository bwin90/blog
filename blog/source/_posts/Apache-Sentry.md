---
title: Apache Sentry
date: 2020-06-21 21:54:03
tags:
categories: 大数据
---

# APACHE SENTRY
Sentry 针对 Hadoop 集群上的数据提供了细粒度的基于角色的访问控制。

## Prerequisites
https://docs.cloudera.com/documentation/enterprise/latest/topics/sg_sentry_before_you_install.html


## Architecture Overview

[![sentry_components.png](https://wx1.sbimg.cn/2020/06/21/sentry_components.png)](https://sbimg.cn/image/252Xn)


## Sentry Integration with the Hadoop Ecosystem
[![sentry_hadoop_ecosystem.png](https://wx2.sbimg.cn/2020/06/21/sentry_hadoop_ecosystem.png)](https://sbimg.cn/image/252Xn)

## Documentation
[Document](https://cwiki.apache.org/confluence/display/SENTRY/Documentation)

Sentry Tutorial
https://cwiki.apache.org/confluence/display/SENTRY/Sentry+Tutorial


Example
Hive and Sentry



Impala and Sentry



## Sentry Service Configuration
Sentry Service 是一个 RPC 服务，对外（Hive/Impala等）提供接口用于获取和维护权限信息，所有授权相关的信息存储在后台的关系型数据库中，注意一点，Service 只是纯粹提供授权信息不做任何验证逻辑。

[Detail >>](https://cwiki.apache.org/confluence/display/SENTRY/Sentry+Service+Configuration)