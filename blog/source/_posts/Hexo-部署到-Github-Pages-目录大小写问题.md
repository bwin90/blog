---
title: Hexo 部署到 Github Pages 目录大小写问题
date: 2017-08-16 13:59:05
tags:
categories: Other
---

### 问题
使用 Hexo 部署博客到 Github Pages 时会遇到文件夹大小写问题导致的 404问题。

<!-- more -->

### 原因
git 默认忽略文件名大小写，所以文件夹大小写变更，git 也检测不到。

### 解决办法
进入到博客项目中 .deploy_git文件夹，修改 .git 下的 config 文件，将 ignorecase=true 改为 ignorecase=false

```
cd .deploy_git
vim .git/config
```

删除博客项目中 .deploy_git 文件夹下的所有文件，并 push 到 Github 上, 这一步是清空你的 github.io 项目中所有文件。

```
git rm -rf *
git commit -m 'clean all file'
git push
```

使用 Hexo 再次生成及部署

```
hexo clean
hexo g
hexo d
```

