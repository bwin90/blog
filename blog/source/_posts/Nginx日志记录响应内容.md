---
title: Nginx日志记录响应内容
date: 2019-04-12 12:18:24
tags:
categories: Server
---

Nginx 本身可以通过 `$request_body` 变量记录请求内容，但响应内容需要通过 Lua 模块来记录：

<!-- more -->

步骤如下：

安装 LuaJIT：

```
wget http://luajit.org/download/LuaJIT-2.0.5.tar.gz
tar zxvf LuaJIT-2.0.5.tar.gz
cd LuaJIT-2.0.5
make
make install
```

安装 Lua：

```
yum install readline-devel
wget http://www.lua.org/ftp/lua-5.3.3.tar.gz
tar zxvf lua-5.3.3.tar.gz
cd lua-5.3.3
make linux
make install
```

安装 Nginx 开发包：

```
cd /usr/local
git clone https://github.com/simpl/ngx_devel_kit.git
```

安装 LuaNginx 模块：
```
cd /usr/local
git clone https://github.com/chaoslawful/lua-nginx-module.git
```

重新编译 Nginx，加入以下两个参数：
```
./configure \
    ...
    --add-module=/usr/local/ngx_devel_kit \
    --add-module=/usr/local/lua-nginx-module

make

# 平滑升级
mv /usr/local/nginx/sbin/nginx /usr/local/nginx/sbin/nginx.bak
\cp objs/nginx /usr/local/nginx/sbin/nginx
make upgrade
```

修改nginx配置文件（server段内），新增如下内容
```
lua_need_request_body on;

set $resp_body "";
body_filter_by_lua '
    local resp_body = string.sub(ngx.arg[1], 1, 1000)
    ngx.ctx.buffered = (ngx.ctx.buffered or "") .. resp_body
    if ngx.arg[2] then
        ngx.var.resp_body = ngx.ctx.buffered
    end
';
```

在日志格式中添加`$resp_body`变量即可记录响应内容
