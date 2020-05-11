---
title: pure-ftpd日志
date: 2020-04-19 20:35:59
tags:
categories: Linux
---

### 前提
CentOS系统使用LNMP一键安装包安装Pureftpd服务

### 步骤
<!-- more -->

1、修改`/etc/rsyslog.conf`

找到如下行
```
*.info;mail.none;authpriv.none;cron.none       /var/log/messages
```
修改为
```
*.info;mail.none;authpriv.none;cron.none;ftp.none       /var/log/messages
```

2、添加以下内容
```
ftp.*                                                   -/var/log/pureftpd.log
```
> 不要去掉/var前面的-号,否则日志会在/var/log/messages与/var/log/purefpd.log里各记录一份. 添加了-号,就只会记录在/var/log/pureftpd.log内

3、修改`/usr/local/pureftpd/etc/pure-ftpd.conf`
找到`VerboseLog`配置项，将值修改为`yes`

4、重启服务
```
service rsyslog restart
/etc/init.d/pureftpd restart
```
