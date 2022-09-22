<?php

include_once('../config.php');
$aluno_id=$_SESSION['aluno_id'];
$curriculo_id=$_SESSION['curriculo_id'];


$metodo=$_SERVER['REQUEST_METHOD'];
if($metodo=="POST"){
    $vaga_id=$_POST['id'];
    $vaga_id=intval($vaga_id);

    $query=$conn->prepare("SELECT * FROM projeto.historico_vaga as h WHERE h.vaga_id=:vaga_id AND h.curriculo_id=:curriculo_id");
    $query->bindParam(':curriculo_id', $curriculo_id);
    $query->bindParam(':vaga_id', $vaga_id);
    $query->execute();
    echo "Já foi enviado para esta vaga";

    if($query->rowCount()<0){
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
        echo "Inseriu no banco de dados";
    }
    else{
        echo "Aconteceu um erro";
    }
    }
}