<?php
session_start();
echo "<pre>";

$name = "";

//unset($_SESSION['path']);

if(array_key_exists('prev', $_GET)){
    if($_SESSION['path']){
        $path = $_SESSION['path'];
        $path = substr($path,0,-1);
        while ($path[strlen($path)-1] != '/') {
            $path = substr($path,0,-1);
        }
    }
    else{
        $path = "/";
    }
}
else {
    if (array_key_exists('dir', $_GET)){
        $name = $_GET['dir'] . "/";       
    }

    if($_SESSION['path']){
        $path = $_SESSION['path'] . $name;
    }
    else{
        $path = "/" . $name;
    }
}



$_SESSION['path'] = $path;


var_dump($path);
$dir = new DirectoryIterator ( $path );
?>
<p><?=$path?></p>
<a href="/?prev" class=""><---</a>
<?php foreach ($dir as $item): ?>
    <a href="/?dir=<?=$item?>" class=""><?=$item?></a><br>
<?php endforeach;?>