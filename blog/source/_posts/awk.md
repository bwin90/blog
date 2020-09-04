---
title: awk
date: 2019-08-01 22:04:45
tags:
categories: Linux
---

### 知识点
#### 内建变量
|  变量 |描述   |
| :------------ | :------------ |
|   $0| 代表整行信息   |
| $1~$n  | 当前行的第{n}个字段   |
| FS  | 字段分隔符，可指定多个。field separator  |
| NF  | 字段数量。number field  |
|  NR | 行号，多个文件累加。number record  |
|  FNR |  行号，单个文件。file number record |
|  RS |  记录分割符，默认为换行。record separator |
|  OFS |  输出的字段分隔符。output field separator |
|  ORS |  输出的记录分割符。output record separator |
|  FILENAME |  当前文件名称 |

#### 事例
```
// 单个分隔符
awk  -F: '{print $1,$3,$6}' /etc/passwd

// 指定多个分隔符
awk  -F '[:;]' '{print $1,$3,$6}' /etc/passwd

// 字符串匹配，第一列包含abc的行
awk '$1 ~ /abc/ || NR==1 {print NR,$1,$2,$3}' OFS="\t" /etc/passwd

// 字符串匹配，取反
awk '$1 !~ /abc/ || NR==1 {print NR,$1,$2,$3}' OFS="\t" /etc/passwd

// 根据某列的值拆分为多个文件
awk '{print > $6}' netstat.txt

// 指定具体列输出
awk 'NR>1{print $1,$2 > $6}' netstat.txt

// 复杂条件
awk 'NR!=1{if($6 ~ /TIME|ESTABLISHED/) print > "1.txt";
else if($6 ~ /LISTEN/) print > "2.txt";
else print > "3.txt" }' netstat.txt
```



参考链接： https://coolshell.cn/articles/9070.html
手册：http://www.gnu.org/software/gawk/manual/gawk.html
