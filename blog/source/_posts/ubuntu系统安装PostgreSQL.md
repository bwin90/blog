---
title: ubuntu系统安装PostgreSQL
date: 2018-08-10 09:17:36
tags:
categories: 数据库
---

# 安装步骤

第一步：sudo add-apt-repository “deb http://apt.postgresql.org/pub/repos/apt/ xenial-pgdg main” 
如果提示 The program ‘add-apt-repository’ is currently not installed 
执行 sudo apt-get install software-properties-common

第二步：wget –quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -

第三步：sudo apt-get update

第四步：sudo apt-get install postgresql-9.6

安装完成后，会自动注册为服务，并随操作系统自动启动。会自动添加一个名为postgres的操作系统用户，并且会自动生成一个名字为postgres的数据库，用户名也为postgres

<!-- more -->

## 修改postgres数据库用户的密码 
打开客户端工具（psql）

sudo -u postgres psql

其中，sudo -u postgres 是使用postgres 用户登录的意思 
postgres=# ALTER USER postgres WITH PASSWORD ‘{password}’;

## 退出PostgreSQL 客户端 
postgres=# \q

## 修改PostgresSQL数据库配置实现远程访问

vi /etc/postgresql/9.6/main/postgresql.conf

1.监听任何地址访问，修改连接权限

listen_addresses = ‘localhost’ 改为 listen_addresses = ‘*’
2.启用密码验证

password_encryption = on 改为 password_encryption = on
vi /etc/postgresql/9.6/main/pg_hba.conf

在文档末尾加上以下内容

host all all 0.0.0.0 0.0.0.0 md5

## 重启服务

/etc/init.d/postgresql restart
## 5432端口的防火墙设置

5432为postgreSQL默认的端口

iptables -A INPUT -p tcp -m state –state NEW -m tcp –dport 5432 -j ACCEPT

# 内部登录，管理数据库、新建数据库、用户和密码

## 登录postgre SQL数据库

psql -U postgres -h 127.0.0.1

## 创建新用户，但不给建数据库的权限

postgres=# create user “{username}” with password ‘{password}’ no createdb;

## 建立数据库，并指定所有者

postgres=# create database “{database}” with owner = “{owner}”;
