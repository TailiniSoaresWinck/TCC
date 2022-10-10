<?php
include_once('../config.php');
$empresa_id = $_SESSION['empresa_id'];

$metodo = $_SERVER["REQUEST_METHOD"];

if($metodo==="GET"){
    $vagasQuery=$conn->query("SELECT * FROM projeto.vaga v WHERE v.empresa_id =".$empresa_id." ORDER BY v.id DESC");
    $vagas = $vagasQuery->fetchAll();
    
}
else if($metodo==="POST"){
    $type=$_POST["type"];

    if($type==="cadastrar_vaga"){
        if(empty($_POST['titulo'] && $_POST['cargo'] && $_POST['descricao'] && $_POST['beneficio'] && $_POST['exigencia'])){
            $_SESSION['msg']='Preencha todos os campos';
            $_SESSION['status']='warnig';
            header('Location:../views/criaVaga.php');
        }
        else{
            $titulo = $_POST['titulo'];
            $cargo = $_POST['cargo'];
            $descricao = $_POST['descricao'];
            $beneficio = $_POST['beneficio'];
            $exigencia = $_POST['exigencia'];
            $finalizado=0;

            $cadastraVaga = $conn->query("INSERT INTO projeto.vaga(titulo, cargo, descricao, beneficio, exigencia, finalizado, empresa_id) VALUES (
            '$titulo',
            '$cargo',
            '$descricao',
            '$beneficio',
            '$exigencia',
            $finalizado,
            $empresa_id
            )");

            if($cadastraVaga==true){
                $_SESSION['msg']='Vaga cadastrada com sucesso!';
                $_SESSION['status']='success';
            header('Location:../views/listaVagas.php');
            }
            else{
                $_SESSION['msg']='Não foi possível cadastrar';
                $_SESSION['type']='warning';
            header('Location:../views/criaVaga.php');
            }
                
        }
    }
    else if($type==="edita_vaga"){
        if(empty($_POST['finalizar'] && $_POST['id'])){
           
        }
        else{
            $finalizado=$_POST['finalizar'];
            $id = $_POST['id'];

            $editaVaga = $conn->query("UPDATE projeto.vaga SET finalizado=".$finalizado." WHERE id=".$id."");

            if($editaVaga==true){
                $_SESSION['msg']='Vaga finalizada com sucesso!';
                $_SESSION['status']='success';
                header('Location:../views/listaVagas.php');
            }
            else{
                $_SESSION['msg']='Não foi possível finalizar';
                $_SESSION['status']='warning';
                header('Location:../views/listaVagas.php');
            }
                
        }
    }
}