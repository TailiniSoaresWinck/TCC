<<<<<<< HEAD:process/matriculas.php
<?php
include_once('../config.php');
include_once('../settings.php');

$metodo = $_SERVER["REQUEST_METHOD"];


if($metodo==="GET"){
    $sql=$conn->query("SELECT * FROM projeto.matricula");
    $matriculas=$sql->fetchAll();
}
else if($metodo==="POST"){
    if(empty($_POST["codmatricula"])){
        $_SESSION["msg"]="Preencha os campos!";
        $_SESSION["status"]="warning";
        header('Location:'.URL_VIEWS.'/criarMatricula.php');
    }
    else{
        $codmatricula=$_POST['codmatricula'];
        $sql=$conn->query("SELECT * FROM projeto.matricula WHERE codmatricula='".$codmatricula."'");
        $sql->execute();
        if($sql->rowCount()>=1){
            $_SESSION["msg"]="Já existe esta matrícula!";
            $_SESSION["status"]="warning";
            header('Location:'.URL_VIEWS.'/criarMatricula.php');

        }
        else if($sql->rowCount()<=0){
        $sql=$conn->query("INSERT INTO projeto.matricula(codmatricula) VALUES ('".$codmatricula."')");
        $_SESSION["msg"]="Matricula cadastrada com sucesso!";
        $_SESSION["status"]="success";
        header('Location:'.URL_VIEWS.'/teste.php');
        }
    }
=======
<?php
include_once('../config.php');


$metodo = $_SERVER["REQUEST_METHOD"];


if($metodo==="GET"){
    $sql=$conn->query("SELECT * FROM projeto.matricula");
    $matriculas=$sql->fetchAll();
}
else if($metodo==="POST"){
    if(empty($_POST["codmatricula"])){
        $_SESSION["msg"]="Preencha os campos!";
        $_SESSION["status"]="warning";
        header('Location:../views/criarMatricula.php');
    }
    else{
        $codmatricula=$_POST['codmatricula'];
        $sql=$conn->query("SELECT * FROM projeto.matricula WHERE codmatricula='".$codmatricula."'");
        $sql->execute();
        if($sql->rowCount()>=1){
            $_SESSION["msg"]="Já existe esta matrícula!";
            $_SESSION["status"]="warning";
            header('Location:../views/criarMatricula.php');

        }
        else if($sql->rowCount()<=0){
        $sql=$conn->query("INSERT INTO projeto.matricula(codmatricula) VALUES ('".$codmatricula."')");
        $_SESSION["msg"]="Matricula cadastrada com sucesso!";
        $_SESSION["status"]="success";
        header('Location:../views/teste.php');
        }
    }
>>>>>>> 76f60573f412bd144741b24927ff095a90e84d46:TCC/process/matriculas.php
}