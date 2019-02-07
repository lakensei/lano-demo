---
layout: post
title:  "ruby语法"
date:   2019-02-07 17:21:00 +0800
categories: jekyll update
---
#标记第一行有点特别，在 Unix 操作系统下， 井字符开头的第一行告诉了系统的 Shell 如何执行这个文件。其他井字符引导的注释只是起说明的作用。  
instance_methods 查看类有哪些方法  
instance_methods(false) 只查看本类的方法  
nil? 是否为nil  
respond_to? 是否支持某个方法  
join(",") 数组转字符串，用,拼接


if __FILE__ == $0  允许代码作为库调用的时候不运行启动代码， 而在作为执行脚本的时候调用启动代码  
