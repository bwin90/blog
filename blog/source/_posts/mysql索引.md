---
title: mysql索引
date: 2014-11-07 13:09:07
tags:
categories: Database
---

对mysql来说，建立必要的索引可以大大提高查询速度。mysql包括以下几种索引类型：

1、普通索引 

2、唯一索引

3、主键索引

4、组合索引

<!-- more -->

创建索引

create index [indexName] on tableName(columnName)

ALTER table tableName add INDEX [indexName](columnName)

删除索引
alter table tableName drop INDEX indexName
drop index indexName on tableName

建立索引的时机
一般来说，在WHERE和JOIN中出现的列需要建立索引，但也不完全如此，因为MySQL只对<，<=，=，>，>=，BETWEEN，IN，以及某些时候的LIKE才会使用索引。

SELECT t.Name FROM table1 t LEFT JOIN table2 m ON t.Name=m.username WHERE m.age=20 AND m.city='郑州'

此时就需要对city和age建立索引，由于t2表的userame也出现在了JOIN子句中，也有对它建立索引的必要。

SELECT * FROM table WHERE username like'admin%'  会使用索引

SELECT * FROM table  WHERE username like'%admin' 不会使用索引 



索引的不足

虽然索引大大提高了查询速度，同时却会降低更新表的速度，如对表进行INSERT、UPDATE和DELETE。因为更新表时，MySQL不仅要保存数据，还要保 存一下索引文件。

建立索引会占用磁盘的索引空间。一般情况这个问题不太严重，但如果你在一个大表上创建了多种组合索引，索引文件的会膨胀很快。

索引只是提高效率的一个因素，如果你的MySQL有大数据量的表，就需要花时间研究建立最优秀的索引，或优化查询语句。



注意事项

索引不会包含有NULL值的列

只要列中包含有NULL值都将不会被包含在索引中，复合索引中只要有一列含有NULL值，那么这一列对于此复合索引就是无效的。所以我们在数据库设计时不要让字段的默认值为NULL。

使用短索引

对串列进行索引，如果可能应该指定一个前缀长度。例如，如果有一个CHAR(255)的列，如果在前10个或20个字符内，多数值是惟一的，那么就不要对整个列进行索引。短索引不仅可以提高查询速度而且可以节省磁盘空间和I/O操作。

索引列排序

MySQL查询只使用一个索引，如果where子句中已经使用了索引的话，那么order by中的列是不会使用索引的。因此数据库默认排序可以符合要求的情况下不要使用排序操作；尽量不要包含多个列的排序，如果需要最好给这些列创建复合索引。

like语句操作

一般情况下不鼓励使用like操作，如果非使用不可，like “%condition%” 不会使用索引,而like “condition%”可以使用索引。

不要在列上进行运算

select * from tableName where YEAR(adddate)<2007; 

将在每个行上进行运算，这将导致索引失效而进行全表扫描

select * from tableName where adddate<‘2007-01-01’;  是正确的

不使用NOT IN和<>操作