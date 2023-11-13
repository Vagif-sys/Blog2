<?php

try{
    $pdo  = new PDO('mysql:host=localhost; dbname=blog2; charset=utf8;','root','root');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch(Exception $e){
   
    echo 'Connetion failed'.$e->getMessage();
}