<?php

include_once('../config.php');

$metodo = $_SERVER['REQUEST_METHOD'];

if($metodo==="GET"){

    $query=$conn->query("SELECT * FROM projeto.curso");
    $cursos=$query->fetchAll();

}