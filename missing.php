1. Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1). 
Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
[] => 1

<?php
echo '<pre>';

function missing($arr){
    $start = 0;
	$end = count($arr) - 1;
	while ($start < $end) {

        $base = floor(($start + $end) / 2);

        if ($arr[$base] - $arr[$base-1] > 1 ) 
			return $arr[$base] - 1;
        if ($arr[$base+1] - $arr[$base] > 1 ) 
			return $arr[$base] + 1;
        
        if($arr[$base] > ($base+1)) 
            $end = $base - 1;
        else 
            $start = $base + 1;
    }
    return $arr[count($arr) - 1] + 1;
}

var_dump(missing([]));

