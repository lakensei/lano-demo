---
layout: post
title:  "MySQL server has gone away"
date:   2019-01-27 09:55:21 +0800
categories: jekyll question
---

mysql数据库服务8小时不做数据处理操作后，mysql server连接自动断开。
查看超时时间：（interactive_timeout和wait_timeout两个参数）
SHOW VARIABLES LIKE '%out%';
