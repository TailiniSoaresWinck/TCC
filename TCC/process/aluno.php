<?php
include_once('../config.php');


$metodo = $_SERVER["REQUEST_METHOD"];



if($metodo==="POST"){
    $type=$_POST["type"];

    
    if($type==="cadastrar_aluno"){
        if(empty($_POST['nome'] && $_POST['email'] && $_POST['matricula'] && MD5($_POST['senha']))){

            echo 'preencha todos os campos';
            
        
        }else{
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $matricula = $_POST['matricula'];
            $senha = MD5($_POST['senha']);
            //Verificando se o usuário tem matricula correspondente na tabela matricula

            $verificaQuery= $conn->query("SELECT m.codmatricula FROM projeto.matricula m WHERE m.codmatricula = '".$matricula."'");

            if($verificaQuery -> rowCount()>0){
                //Verificando se não existe um cadastro já com este código de matrícula
                $verificaQuery= $conn->query("SELECT a.codmatricula, a.email FROM projeto.aluno a WHERE a.codmatricula = '".$matricula."' AND a.email = '".$email."'");
                
            if($verificaQuery -> rowCount()>0){
                
                echo "aluno já cadastrado";
            }
            else{
                $cadastraAluno = $conn->query("INSERT INTO projeto.aluno(nome, email, senha, codmatricula) VALUES (
                    '$nome',
                    '$email',
                    '$senha',
                    '$matricula'
                    )");

                    if($cadastraAluno==true){
                        echo "Houve o cadastro";
                    }
                    else{
                        echo "Não foi possível cadastrar";
                    }
                }
        }
        else{
            echo 'Código de matricula inválido';
        }
    }
    }
    else if($type==="login_aluno"){
        if(empty($_POST['email'] && $_POST['senha'])){
            echo "Preencha todos os campos";
        }
        else{
            $email = $_POST['email'];
            $senha = MD5($_POST['senha']);

            $verificaQuery = $conn->query("SELECT e.email, e.senha FROM  projeto.aluno e WHERE e.email='".$email."' AND e.senha='".$senha."'");

            if($verificaQuery->rowCount()<1){
                echo "Erro ao fazer login";
            }
            else if($verificaQuery->rowCount()>0){
                $sql = $conn->query("SELECT e.id FROM projeto.aluno e WHERE e.email='".$email."' AND e.senha='".$senha."'");
                $sql->execute();
                $dados = $sql->fetchAll(PDO::FETCH_COLUMN, 0);
                $aluno_id=$dados[0];
                $_SESSION['aluno_id']=$aluno_id;
                $query=$conn->query("SELECT c.id FROM projeto.curriculo c WHERE c.aluno_id=".$aluno_id."");
                $query->execute();
                $dados_c=$query->fetchAll(PDO::FETCH_COLUMN, 0);
                $curriculo_id=$dados_c[0];
                $_SESSION['curriculo_id']=$curriculo_id;
                echo "Você fez login";
            }
        }
    }

}