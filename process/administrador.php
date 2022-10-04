<?php

include_once('../config.php');


$metodo = $_SERVER["REQUEST_METHOD"];



if($metodo==="POST"){
    $type=$_POST["type"];

    if($type==="cadastrar_admin"){

        if(empty($_POST['nome']  && $_POST['cod_acesso'] && $_POST['email'] && MD5($_POST['senha']))){

            $_SESSION["msg"]="Preencha todos os campos!";
            $_SESSION["status"]="warning";
            header('Location:../views/cadastroAdmin.php');

        }
        else{
            $cod_acesso=$_POST['cod_acesso'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = MD5($_POST['senha']);

            $query=$conn->query("SELECT * FROM projeto.cod_acesso as c WHERE c.codigo=".$cod_acesso."");
            if($query->rowCount()<=0){
                $_SESSION["msg"]="Código de acesso inválido!";
                $_SESSION["status"]="warning";
                header('Location:../views/cadastroAdmin.php');
            }
            else{
            $verificaQuery=$conn->query("SELECT * FROM projeto.administrador as a WHERE a.nome='".$nome."' and a.email='".$email."'");

                 
            if($verificaQuery -> rowCount()>0){
                
                $_SESSION["msg"]="Já existe este cadastro!";
                $_SESSION["status"]="warning";
                header('Location:../views/cadastroAdmin.php');
            }
            else{
                $cadastraAdmin = $conn->query("INSERT INTO projeto.administrador(nome, email, senha, cod_acesso) VALUES (
                    '$nome',
                    '$email',
                    '$senha',
                    $cod_acesso
                    )");

                    if($cadastraAdmin==true){
                        header('Location:../views/loginAdmin.php');
                    }
                    else{
                        $_SESSION["msg"]="Erro! Tente novamente.";
                        $_SESSION["status"]="warning";
                        header('Location:../views/cadastroAdmin.php');
                    }
                }
            }
        }
    }
    else if($type==="login_admin"){
        if(empty($_POST['email'] && $_POST['senha'])){
            $_SESSION["msg"]="Preencha todos os campos!";
            $_SESSION["status"]="warning";
            header('Location:../views/loginAdmin.php');
        }
        else{
            $email = $_POST['email'];
            $senha = MD5($_POST['senha']);

            $verificaQuery = $conn->query("SELECT a.email, a.senha FROM  projeto.administrador a WHERE a.email='".$email."' AND a.senha='".$senha."'");

            if($verificaQuery->rowCount()<1){
                $_SESSION["msg"]="Senha ou email inválidos!";
                $_SESSION["status"]="warning";
                header('Location:../views/loginAdmin.php');
            }
            else if($verificaQuery->rowCount()>0){
                $sql = $conn->query("SELECT a.id FROM projeto.administrador a WHERE a.email='".$email."' AND a.senha='".$senha."'");
                $sql->execute();
                $dados = $sql->fetchAll(PDO::FETCH_COLUMN, 0);
                $admin_id=$dados[0];
                $_SESSION['admin_id']=$admin_id;
                var_dump($_SESSION['admin_id']);
                header('Location:../views/teste.php');
            }
        }
    }
}