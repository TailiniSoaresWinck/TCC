<?php

session_start();

$user = 'root';
$pass="";
$db="projeto";
$host="localhost";

try{

    $conn=new PDO("mysql:host={$host};dbame={$db};",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e){

    echo "Erro:".$e->getMessage()."</br>";
    
}