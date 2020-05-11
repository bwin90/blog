---
title: 排序
date: 2019-05-05 21:03:04
tags:
categories: 算法
---

今天温习下最常用、最经典的排序算法。

## 冒泡排序（Bubble Sort）
冒泡排序只会操作相邻的两个数据。每次冒泡操作都会对相邻的两个元素进行比较，看是否满足大小关系要求。如果不满足就让它俩互换。一次冒泡会让至少一个元素移动到它应该在的位置，重复 n 次，就完成了 n 个数据的排序工作。

> 优化：当某次冒泡操作已经没有数据交换时，说明已经达到完全有序，不用再继续执行后续的冒泡操作。

```
public void bubbleSort(int[] a, int n) {

    if (n <= 1) {
        return;
    }

    for (int i = 0; i < n; ++i) {
        // 提前退出冒泡循环的标志位
        boolean flag = false;
        for (int j = 0; j < n - i - 1; ++j) {
            if (a[j] > a[j+1]) { // 交换
                int tmp = a[j];
                a[j] = a[j+1];
                a[j+1] = tmp;
                flag = true;  // 表示有数据交换
            }
        }

        if (! flag) {
            break;  // 没有数据交换，提前退出
        }
    }
}
```

<!-- more -->

## 插入排序（Insertion Sort）
插入排序包含两种操作，一种是元素的比较，一种是元素的移动。当我们需要将一个数据 a 插入到已排序区间时，需要拿 a 与已排序区间的元素依次比较大小，找到合适的插入位置。找到插入点之后，我们还需要将插入点之后的元素顺序往后移动一位，这样才能腾出位置给元素 a 插入。

对于不同的查找插入点方法（从头到尾、从尾到头），元素的比较次数是有区别的。但对于一个给定的初始序列，移动操作的次数总是固定的，就等于逆序度。

```
public void insertionSort(int[] a, int n) {
    if (n <= 1) {
        return;
    }

    for (int i = 1; i < n; ++i) {
        int value = a[i];
        int j = i - 1;
        // 查找插入的位置
        for (; j >= 0; --j) {
            if (a[j] > value) {
                a[j+1] = a[j];  // 数据移动
            }
            else {
                break;
            }
        }

        a[j+1] = value; // 插入数据
    }
}
```

## 选择排序（Selection Sort）

选择排序算法的实现思路有点类似插入排序，也分已排序区间和未排序区间。但是选择排序每次会从未排序区间中找到最小的元素，将其放到已排序区间的末尾。

```
public void selectionSort(int[] a, int n) {
    if (n <= 1) {
        return;
    }

    for (int i = 0; i < n; ++i) {
        // 查找最小值
        for (int j = i + 1; j < n; ++j) {
            if (a[i] > a[j]) {
                int tmp = a[i];
                a[i] = a[j];
                a[j] = tmp;
            }
        }
    }
}
```
