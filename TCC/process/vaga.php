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
            echo "Preencha todos os campos";
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
            echo "Houve o cadastro";
            }
            else{
            echo "Não foi possível cadastrar";
            }
                
        }
    }
    else if($type==="edita_vaga"){
        if(empty($_POST['finalizar'] && $_POST['id'])){
            echo "Preencha todos os campos";
        }
        else{
            $finalizado=$_POST['finalizar'];
            $id = $_POST['id'];

            $editaVaga = $conn->query("UPDATE projeto.vaga SET finalizado=".$finalizado." WHERE id=".$id."");

            if($editaVaga==true){
            echo "Houve a edição";
            }
            else{
            echo "Não foi possível editar";
            }
                
        }
    }
}