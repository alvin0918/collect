#!/usr/bin/env bash

# 统计某一天网站的访问量
awk '{print $1}' /var/log/access.log | sort | uniq | wc -l

# 查看物理cpu个数
grep 'physical id' /proc/cpuinfo | sort -u

# 查看核心数量
grep 'core id' /proc/cpuinfo | sort -u | wc -l

# 查看线程数
grep 'processor' /proc/cpuinfo | sort -u | wc -l
