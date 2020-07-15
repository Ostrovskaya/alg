<?php
echo "<pre>";

$num = 600851475143;
$result = 0;

function getFactors($num)
{
    $arr = [];
    for($i = 2;  $i * $i < $num ; $i ++){
        if(($i % 2 != 0) && ($num % $i == 0) ){
            $arr[] = $i ;
            $arr[] = $num / $i; 
        }
    }
    return $arr;
}

$arr = getFactors($num);

var_dump($arr);

foreach($arr as $item){
    $factors = getFactors($item);

    if(count($factors) > 0){
        continue;
    }
    else if( $item > $result ){
        $result = $item;
    }
}

echo $result;