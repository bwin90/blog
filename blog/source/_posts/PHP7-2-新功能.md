---
title: PHP7.2 新功能
date: 2018-04-16 14:15:45
tags:
categories: PHP
---

参数类型声明
返回类型声明
参数类型泛化
列表语法中的尾随逗号
密码哈希中的Argon2算法
Argon2 是荣获 2015 年密码哈希算法比赛中的冠军的强大哈希算法，PHP7.2将其作为Bcrypt算法的替代品，新版PHP引入了PASSWORD_ARGON2I常量，可以在password_*系列函数中使用。
Libsodium成为PHP核心组成部分
Libsodium是一个跨平台和跨语言的库，用于加密，解密，签名和密码哈希等
