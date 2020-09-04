---
title: Apache Ranger
date: 2020-06-21 21:53:52
tags:
categories: 大数据
---

## Architecture
![stickPicture.png](https://wx2.sbimg.cn/2020/06/21/stickPicture.png)

## Components
- Ranger Admin
UI，用于创建、更新安全访问策略，这些策略被存储在一个关系型数据库中。各个组件的Plugin定期对这些策略进行轮询。

- Ranger Plugins
Plugin 嵌入在各个集群组件的进程里，是一个轻量级的Java程序。这些 Plugin 从服务端拉取策略，并缓存在本地文件中。当接收到客户端请求时，Ranger Plugin 会验证该请求。

- User UserSync
同步用户信息，可以从Unix或者LDAP中拉取用户和用户组的信息。这些用户和用户组的信息被存储在服务端的数据库中，可以在定义策略时使用。





