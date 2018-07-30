---
title: Github + Hexo 搭建博客
date: 2018-07-27 16:55:41
category: 工具
tags:
---

Hexo是一款基于Node.js的静态博客框架，依赖少，易于安装使用，可以方便的生成静态网页托管在GitHub上

# 准备工作
Git
Node.js
Npm
<!-- more -->
# 步骤
## 获得个人网站域名
    购买个人域名

## GitHub创建个人仓库
    仓库名约定为：{用户名}.github.io，比如我的仓库名为：bwin90.github.io

## 安装Hexo
1.在本地电脑创建一个目录，比如Blog。Hexo框架与自己发布的网页都会存储在这个目录下
2.进入Blog目录，安装Hexo
npm install -g hexo-cli
3. 等待安装完成，初始化博客
hexo init blog
4. 进入blog目录
hexo new {文章名称}
hexo g # hexo generate
hexo s # hexo server
以上命令执行完后，打开浏览器输入地址：localhost:4000, 可以看到刚才创建的文章

Hexo命令：https://hexo.io/docs/commands.html

## 推送网站
1.将我们的Hexo与GitHub关联起来，打开站点的配置文件_config.yml，翻到最后修改为：
deploy: 
type: git
repo: GitHub上仓库的完整路径
branch: master

2.安装Git部署插件
npm install hexo-deployer-git -save

3.输入如下命令，完成推送
hexo clean
hexo g
hexo d #deploy

在浏览器地址栏输入{用户名}.github.io，即可看到博客内容

## 绑定域名
如果想使用我们自己的域名，就需要进行绑定域名
1.进入域名解析，CNAME {用户名}.github.io
2.登录GitHub，进入创建的仓库，点击settings，设置Custom domain，输入自己的域名
3.进入本地博客文件夹 ，进入blog/source目录下，新建CNAME文件，保存自己的域名

## 更多设置，待续...

