---
title: 'PHPExcel导出,长数字显示为科学计数的解决方法'
date: 2014-08-08 09:57:30
tags:
categories: Other
---

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

方式一：
在数字字符串前加一个空格使之成为字符串
$objPHPExcel->getActiveSheet()->setCellValue('A1',' '.$value);

方式二：
在设置值的时候指定数据类型
$objPHPExcel->getActiveSheet()->setCellValueExplicit('D1',123456789012345, PHPExcel_Cell_DataType::TYPE_STRING);
