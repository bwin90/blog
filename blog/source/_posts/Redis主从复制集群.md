---
title: Redis 主从复制集群实践
date: 2018-08-23
tags:
categories: 数据库
---

### 环境说明


### 配置
- 编辑从服务器的 `redis.conf`
```
slaveof <master ip> <master port>

# 如果设置密码，同步更改
masterauth <password>
```

- 重启 Redis

### 配置文件主要配置参数
- Master
```


```

- Slave
```

```
