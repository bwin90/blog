---
title: linux系统下php源码安装redis扩展
date: 2015-12-03 14:12:18
tags:
categories: Server
---

安装redis（版本 2.2.4）

1、下载源码包

进入/usr/local/src目录

wget https://github.com/nicolasff/phpredis/archive/2.2.4.tar.gz

2、解压 ，安装

tar zxvf phpredis-2.2.4.tar.gz 

cd phpredis-2.2.4 #进入安装目录

/usr/local/php/bin/phpize #用phpize生成configure配置文件

./configure --with-php-config=/usr/local/php/bin/php-config  #配置

make && make install #编译安装

3、配置php

vi /usr/local/php/etc/php.ini  #编辑配置文件，在最后一行添加以下内容

extension="redis.so"

保存退出

4、 重启web服务


