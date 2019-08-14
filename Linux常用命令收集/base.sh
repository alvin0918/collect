#!/usr/bin/env bash

# 统计某一天网站的访问量
awk '{print $1}' /var/log/access.log | sort | uniq | wc -l