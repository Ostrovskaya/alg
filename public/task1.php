<?php
echo "<pre>";

function balanceCheck($test){
    $arr = [
        ']' => '[', 
        ')' => '(', 
        '}' => '{',
        '"' => '"',
    ];
    

    $stack = new SplStack();

    foreach(str_split($test) as $item){
        
        if(in_array($item, $arr)){
            $stack->push($item); 
            continue;
        }
        if(in_array($item, array_keys($arr))){

            if($arr[$item] != $stack->pop()) {
                return false;
            }
        }
    }

    if($stack->isEmpty()) {
        return true;
    }

    return false;
}


var_dump(balanceCheck('"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}"'));
var_dump(balanceCheck('((a + b)/ c) - 2'));
var_dump(balanceCheck('"([ошибка)"'));
var_dump(balanceCheck('"(")'));