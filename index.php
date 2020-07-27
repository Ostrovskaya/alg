3*. Доработать алгоритм бинарного поиска для нахождения кол-ва повторений в массиве. 
Сложность O(logn) не должна измениться. 
Учтите, что массив длиной n может состоять из одного значения [4, 4, 4, 4, ...(n)..., 4]

<?php
echo '<pre>';

function binarySearch($myArray, $num)
{ 
    $result = [];
	$start = 0;
	$end = count($myArray) - 1;
    $result = search($myArray, $num, $start, $end );
	return $result;
}

function search($myArray, $num, $start, $end)
{
    $result = [];

    while ($start <= $end) {
        $base = floor(($start + $end) / 2);

        if ($myArray[$base] == $num) {
            array_push($result, $base); 

            $left = search($myArray, $num, $start, $base-1 );
            if(!empty($left)){    
                $result = array_merge($result, $left);
            }
            $right = search($myArray, $num, $base+1 , $end );
            if(!empty($right)){    
                $result = array_merge($result, $right);
            }
            break;
        }
        elseif ($myArray[$base] < $num){
            $start = $base + 1;
        }
        else{
            $end = $base - 1;
        }
            
    }
    return $result;
}

var_dump(binarySearch([1,2, 2,4,4,4,4,4,4,5,5,6], 2));