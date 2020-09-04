---
title: Linux命令 - tee
date: 2020-05-17 23:37:45
tags:
categories: Linux
---

tee 用于读取标准输入以及写到标准输出的同时写到文件中

### 常用操作

- 输出到文件
```
echo 123 | tee out.log

# 检查文件内容是否和输出一致
cat out.log
```
<!-- more -->
- 追加方式输出到文件
```
echo 123 | tee -a out.log
```

- 同时输出到多个文件
```
echo 123 | tee out.log out2.log
```

- 提高写入文件的权限等级
编辑文件后保存的时候才发现无操作权限，tee命令可以解决此问题，在文件保存时输入`:w !sudo tee %`，输入正确的密码，文件就可以保存了。


参考链接：https://man.linuxde.net/tee
