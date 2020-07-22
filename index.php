<?php
echo '<pre>';

function spiral($col, $row){

    if($col == 0 || $row == 0){
        return "Ошибка!";
    }
    $result = [];
    $maxX = $row-1;
    $maxY = $col;
    $min = 0;
    $x = 0;
    $y = $col-1;
    for ($i=1; $i <= $col; $i++) { 
        $result[$x][$i-1] = $i;
    }
    
    for($i=$col+1; $i<= $row*$col; ) { 
        
        if($x == floor($min)){         
            for ($j=0; $j < $maxX; $j++) {        
                $x++; 
                $result[$x][$y] = $i++;                
            }  
        }else {   
            for ($j=0; $j < $maxX; $j++) {  
                $x--;   
                $result[$x][$y] = $i++;            
            }
        }
        $min += 0.25;
        $maxY--;

        if($i > $row*$col){
        break;
    }

        if($y == floor($min)){
            for ($j=0; $j < $maxY; $j++) {  
                $y++;   
                $result[$x][$y] = $i++;          
            }     
        }else {
            for ($j=0; $j < $maxY; $j++) { 
                $y--;
                $result[$x][$y] = $i++;                  
            }
        }

        $maxX--;
        $min += 0.25;  
    }       
    return $result;
}

var_dump(spiral(4, 3));
