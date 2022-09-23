<?php

include_once('../config.php');
$aluno_id=$_SESSION['aluno_id'];
$curriculo_id=$_SESSION['curriculo_id'];


$metodo=$_SERVER['REQUEST_METHOD'];
if($metodo=="POST"){
    $queryVerifica=$conn->prepare("SELECT * FROM projeto.curriculo as c WHERE c.id=:curriculo_id");
    $queryVerifica->bindParam(':curriculo_id', $curriculo_id);
    $queryVerifica->execute();
    if($queryVerifica->rowCount()<=0){
        $_SESSION['msg']='Não há nenhum currículo para ser enviado!';
        $_SESSION['type']='warning';
        header('Location:../views/buscaVaga.php');
    }
    else{
    $vaga_id=$_POST['id'];
    $vaga_id=intval($vaga_id);

    $query=$conn->prepare("SELECT * FROM projeto.historico_vaga as h WHERE h.vaga_id=:vaga_id AND h.curriculo_id=:curriculo_id");
    $query->bindParam(':curriculo_id', $curriculo_id);
    $query->bindParam(':vaga_id', $vaga_id);
    $query->execute();
    if($query->rowCount()>=1){
        $_SESSION['msg']='Já foi enviado para esta vaga!';
        $_SESSION['type']='warning';
        header('Location:../views/buscaVaga.php');
    }
    else{
    $query=$conn->prepare("INSERT INTO projeto.historico_vaga(curriculo_id, aluno_id, vaga_id) VALUES (
        :curriculo_id,
        :aluno_id,
        :vaga_id
    )");
    $query->bindParam(':curriculo_id', $curriculo_id);
    $query->bindParam(':aluno_id', $aluno_id);
    $query->bindParam(':vaga_id', $vaga_id);
    $query->execute();
    if($query==true){
        $_SESSION['msg']='Currículo enviado!';
        $_SESSION['type']='success';
        header('Location:../views/buscaVaga.php');
    }
    else{
        $_SESSION['msg']='Aconteceu um erro!';
        $_SESSION['type']='warning';
        header('Location:../views/buscaVaga.php');
    }
    }
}}