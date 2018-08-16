---
title: apache配置https服务
date: 2015-10-20 12:10:25
tags:
categories: Server
---

Apache开启https服务首先确保服务器安装ssl模块。

1、生成私钥

openssl genrsa -out server.key 1024

2、生成公钥

openssl req -new -key server.key -out server.csr

在生成公钥的过程中需要填写一些信息

3、利用生成的公钥向证书颁发机构申请证书

生成自签署证书（供测试用）

openssl x509 -req -days 365 -in server.csr -signkey server.key -out server.crt

真正运行的时候，将CSR发送到一个证书颁发机构返回真正的证书.
