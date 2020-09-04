---
title: linux sed 用法
date: 2018-07-27 16:12:00
tags:
categories: Linux
---

sed全名叫stream editor，流编辑器，用程序的方式来编辑文本。本质上是正则模式匹配，所以可以玩转sed的人，一般来说，正则表达式能力都比较强。

### 知识点

#### 行合并

#### 合并指定行（eg：合并第二行和第三行）
```
// 结果输出到屏幕
sed '2{N;s/\n//;}' file

// 直接修改文件
sed -i '2{N;s/\n//;}' file
```





参考链接：https://coolshell.cn/articles/9104.html
sed手册：http://www.gnu.org/software/sed/manual/sed.html
