---
title: git常用命令
date: 2014-09-02 09:59:46
tags:
categories: Git
---

### 从当前分支创建并切换分支
git checkout -b  分支名称

等同于
git branch 分支名称 （创建分支）
git checkout 分支名称  （切换分支）


### 查看分支列表，会在当前开发分支前面添加一个*号，添加 -a选项会连同远程分支一起显示
git branch [-a]




### 删除分支
git branch -d {分支名称}



### 合并到当前分支
git merge ｛分支名称｝




### 修改本地分支名称
git branch -m {原分支名称} {新分支名称}



### 克隆远程代码
git clone git://github.com/schacon/grit.git [目录名称]

### 删除远程分支
git push {远程仓库名称} '此处代表一个空格':{分支名称}
