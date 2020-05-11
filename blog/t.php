<?php
 function  selectionSort(array $a, int $n) {
		if ($n <= 1) {
			return;
		}

		for ($i = 0; $i < $n; ++$i) {
			// 查找最小值
			for ($j = $i + 1; 
$j < 
$n; ++$j) {
				if ($a[$i] > 
$a[$j]) {
					$tmp = $a[$i];
					$a[$i] = $a[$j];
					$a[$j] = $tmp;
				}
			}
		}
		
	print_r($a);
	}

selectionSort([2,3,6,5,1,4], 6);
