---
title: linux定时任务crontab
date: 2014-10-29 17:07:10
tags:
categories: Linux
---

usage:    crontab [-u user] file
    crontab [-u user] [ -e | -l | -r ]
        (default operation is replace, per 1003.2)
    -e    (edit user's crontab)
    -l    (list user's crontab)
    -r    (delete user's crontab)
    -i    (prompt before deleting user's crontab)
    -s    (selinux context)
<!-- more -->
六个字段对应的含义如下：
  9         9        *        *        *     *
  分钟     小时     日期      月份    星期   执行文件

1. 每天凌晨1点20分清除/var/log/slow.log这个文件；

2. 每周日3点执行’/bin/sh /usr/local/sbin/backup.sh’；

3. 每月14号4点10分执行’/bin/sh /usr/local/sbin/backup_month.sh’；

4. 每隔8小时执行’ntpdate time.windows.com’；

5. 每天的1点，12点，18点执行’/bin/sh /usr/local/sbin/test.sh’；

6. 每天的9点到18点执行’/bin/sh /usr/local/sbin/test2.sh’；

答案：

1. 20 1 * * * echo “”>/var/log/slow.log

2. 0 3 * * 0 /bin/sh /usr/local/sbin/backup.sh

3. 10 04 14 * * /bin/sh /usr/local/sbin/backup_month.sh

4. 0 */8 * * * ntpdate time.windows.com

5. 0 1,12,18 * * /bin/sh /usr/local/sbin/test.sh

6. 0 9-18 * * * /bin/sh /usr/local/sbin/test2.sh