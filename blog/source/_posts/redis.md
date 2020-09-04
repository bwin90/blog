---
title: Redis 配置文件解析
date: 2018-08-22 22:16:21
tags:
categories: 数据库
---

```
# redis进程是否以守护进程的方式运行，yes为是，no为否(不以守护进程的方式运行会占用一个终端)。
daemonize no

# 指定redis进程的PID文件存放位置
pidfile /var/run/redis.pid

# redis进程的端口号
port 6379

# 绑定的主机地址
bind 127.0.0.1

# 客户端闲置多长时间后关闭连接，默认此参数为0即关闭此功能
timeout 300

# redis日志级别，可用的级别有debug.verbose.notice.warning
loglevel verbose

# log文件输出位置，如果进程以守护进程的方式运行，此处又将输出文件设置为stdout的话，就会将日志信息输出到/dev/null里面去了
logfile stdout

# 设置数据库的数量，默认为0可以使用select <dbid>命令在连接上指定数据库id
databases 16

# 指定在多少时间内刷新次数达到多少的时候会将数据同步到数据文件
save <seconds> <changes>

# 指定存储至本地数据库时是否压缩文件，默认为yes即启用存储
rdbcompression yes

# 指定本地数据库文件名
dbfilename dump.db

# 指定本地数据问就按存放位置
dir ./

# 指定当本机为slave服务时，设置master服务的IP地址及端口，在redis启动的时候他会自动跟master进行数据同步
slaveof <masterip> <masterport>

# 当master设置了密码保护时，slave服务连接master的密码
masterauth <master-password>

# 设置redis连接密码，如果配置了连接密码，客户端在连接redis是需要通过AUTH<password>命令提供密码，默认关闭
requirepass footbared

# 设置同一时间最大客户连接数，默认无限制。
# redis可以同时连接的客户端数为redis程序可以打开的最大文件描述符，如果设置 maxclients 0，表示不作限制。
# 当客户端连接数到达限制时，Redis会关闭新的连接并向客户端返回 max number of clients reached 错误信息
maxclients 128

# 指定redis最大内存限制，redis在启动时会把数据加载到内存中，达到最大内存后，redis会先尝试清除已到期或即将到期的Key。
# 当此方法处理后，仍然到达最大内存设置，将无法再进行写入操作，但仍然可以进行读取操作。
# 如果不设置maxmemory或者设置为0（默认为0），64位系统不限制内存，32位系统最多使用3GB内存。
maxmemory <bytes>

# 指定是否在每次更新操作后进行日志记录，Redis在默认情况下是异步的把数据写入磁盘
# 如果不开启，可能会在断电时导致一段时间内的数据丢失。
# 因为redis本身同步数据文件是按上面save条件来同步的，所以有的数据会在一段时间内只存在于内存中。默认为no。
appendonly no

# 指定日志文件名，默认为appendonly.aof
appendfilename appendonly.aof

# 指定更新日志的条件，有三个可选参数
# no：表示等操作系统进行数据缓存同步到磁盘(快)
# always：表示每次更新操作后手动调用fsync()将数据写到磁盘(慢，安全)
# everysec：表示每秒同步一次(折衷，默认值)
appendfsync everysec

```
