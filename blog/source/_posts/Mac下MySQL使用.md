---
title: Mac下MySQL使用
date: 2018-04-04 15:23:06
tags:
categories: Database
---

此文建议使用Homebrew工具安装

ps：Homebrew是一款自由及开放源代码的软件包管理系统，用以简化Mac OS系统上的软件安装过程

一. 安装Homebrew

点击打开：brew官网

二. 安装MySQL

brew install mysql

三. 设置用户及数据存放地址

mysql_install_db --verbose --user="" --basedir="" --datadir="" --tmpdir=""

四. 启动

mysql.server start

可用参数：「start|stop|restart|reload|force-reload|status」

五. 配置

1.使用mysql的配置脚本

/usr/local/opt/mysql/bin/mysql_secure_installation，启动此脚本，即可根据提示进行初始化设置

2.自定义配置

mysqld --help --verbose | more (空格键下翻)，执行此命令，可以看到默认配置文件的读取顺序 

 /etc/my.cnf   /etc/mysql/my.cnf   /usr/local/etc/my.cnf   ~/.my.cnf

查看以上路径下是否有my.cnf文件，如果没有的话，在其中一个路径下新建my.cnf文件，用于自定义配置