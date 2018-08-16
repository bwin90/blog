---
title: linux禁止用户名密码登录，只能使用密钥方式登录
date: 2016-05-02 11:00:00
tags:
categories: Linux
---

编辑
vim /etc/ssh/sshd_config

修改以下内容
PasswordAuthentication no //禁止密码方式登录
PubkeyAuthentication yes //允许的方式登录

重启
/etc/init.d/sshd reload
