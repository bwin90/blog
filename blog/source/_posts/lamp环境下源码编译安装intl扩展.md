---
title: lamp环境下源码编译安装intl扩展
date: 2015-10-20 17:11:22
tags:
categories: Server
---

安装intl扩展

1、需要先在本地安装icu

wget http://download.icu-project.org/files/icu4c/53.1/icu4c-53_1-src.tgz

tar -xzf icu4c-53_1-src.tgz

cd icu/source

./configure –prefix=/usr/local/icu

make

make install

2、从Pecl下载intl扩展模块

wget http://pecl.php.net/get/intl-3.0.0.tgz

tar -xzf intl-3.0.0.tgz

cd intl-3.0.0

/usr/local/php/bin/phpize
./configure –enable-intl –with-icu-dir=/usr/local/icu/ –with-php-config=/usr/local/php/bin/php-config
make
make install
3、配置php.ini

php.ini里添加下面一行

extension=intl.so 

4、重启apache即可
