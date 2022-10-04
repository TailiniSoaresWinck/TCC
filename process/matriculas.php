<?php
include_once('../config.php');


$metodo = $_SERVER["REQUEST_METHOD"];


if($metodo==="GET"){
    $sql=$conn->query("SELECT * FROM projeto.matricula");
    $matriculas=$sql->fetchAll();
}
else if($metodo==="POST"){
    if(empty($_POST["codmatricula"])){
        header('Location:../views/criarMatricula.php');
    }
    else{
        $codmatricula=$_POST['codmatricula'];
        $sql=$conn->query("SELECT * FROM projeto.matricula WHERE codmatricula='".$codmatricula."'");
        $sql->execute();
        if($sql->rowCount()>=1){
            echo "matricula Já existente";

        }
        else if($sql->rowCount()<=0){
        $sql=$conn->query("INSERT INTO projeto.matricula(codmatricula) VALUES ('".$codmatricula."')");
        echo "Foi";
        }
    }
}