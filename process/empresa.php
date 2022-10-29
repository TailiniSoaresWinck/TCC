<<<<<<< HEAD:process/empresa.php
<?php
include_once('../config.php');
include_once('../settings.php');

$metodo = $_SERVER["REQUEST_METHOD"];



if($metodo==="POST"){
    $type=$_POST["type"];

    if($type==="cadastrar_emp"){
        if(empty($_POST['email'] && $_POST['nome'] && $_POST['cnpj'] && MD5($_POST['senha']))){
            //nao Preencheu todos os campos;
            $_SESSION["msg"]="Preencha todos os campos!";
            $_SESSION["status"]="warning";
            header('Location:'.URL_VIEWS.'/cadastro.php');
        }
        else{
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cnpj = $_POST['cnpj'];
            $senha = MD5($_POST['senha']);

            $verificaQuery= $conn->query("SELECT e.cnpj FROM  projeto.empresa e WHERE e.cnpj=".$cnpj."");


            if($verificaQuery -> rowCount()>0){
                //ja tem cadastro
                $_SESSION["msg"]="Já existe este cadastro!";
                $_SESSION["status"]="warning";
                header('Location:'.URL_VIEWS.'/cadastro.php');
            }
            else {

                $cadastraEmp = $conn->query("INSERT INTO projeto.empresa(nome, email, cnpj, senha) VALUES (
                    '$nome',
                    '$email',
                    '$cnpj',
                    '$senha'
                    )");

                    if($cadastraEmp==true){
                        $_SESSION["msg"]="Cadastro realizado com sucesso!";
                        $_SESSION["status"]="success";
                        header('Location:'.URL_VIEWS.'/login.php');
                    }
                    else{
                        //nao deu certo
                        $_SESSION["msg"]="Erro ao realizar cadastro!";
                        $_SESSION["status"]="warning";
                        header('Location:'.URL_VIEWS.'/cadastro.php');
                    }
                }
        }
    }
    else if($type==="login_emp"){
        if(empty($_POST['email'] && MD5($_POST['senha']))){
            $_SESSION["msg"]="Preencha todos os campos!";
            $_SESSION["status"]="warning";
            header('Location:'.URL_VIEWS.'/login.php');
        }
        else{
            $email = $_POST['email'];
            $senha = MD5($_POST['senha']);

            $verificaQuery = $conn->query("SELECT e.email, e.senha FROM  projeto.empresa e WHERE e.email='".$email."' AND e.senha='".$senha."'");

            if($verificaQuery->rowCount()<1){
                $_SESSION["msg"]="Senha ou email inválidos!";
                $_SESSION["status"]="warning";
                header('Location:'.URL_VIEWS.'/login.php');
            }
            else if($verificaQuery->rowCount()>0){
                $sql = $conn->query("SELECT e.id FROM projeto.empresa e WHERE e.email='".$email."' AND e.senha='".$senha."'");
                $sql->execute();
                $dados = $sql->fetchAll(PDO::FETCH_COLUMN, 0);
                $empresa_id=$dados[0];
                $_SESSION['empresa_id']=$empresa_id;
               header('Location:'.URL_VIEWS.'/buscaCurriculo.php');
            }
        }
    }

}
else if($metodo==="GET"){

    $sql=$conn->query("SELECT * FROM projeto.empresa");
    $empresas=$sql->fetchAll();

=======
<?php
include_once('../config.php');


$metodo = $_SERVER["REQUEST_METHOD"];



if($metodo==="POST"){
    $type=$_POST["type"];

    if($type==="cadastrar_emp"){
        if(empty($_POST['email'] && $_POST['nome'] && $_POST['cnpj'] && MD5($_POST['senha']))){
            //nao Preencheu todos os campos;
            $_SESSION["msg"]="Preencha todos os campos!";
            $_SESSION["status"]="warning";
            header('Location:../views/cadastro.php');
        }
        else{
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cnpj = $_POST['cnpj'];
            $senha = MD5($_POST['senha']);

            $verificaQuery= $conn->query("SELECT e.cnpj FROM  projeto.empresa e WHERE e.cnpj=".$cnpj."");


            if($verificaQuery -> rowCount()>0){
                //ja tem cadastro
                $_SESSION["msg"]="Já existe este cadastro!";
                $_SESSION["status"]="warning";
                header('Location:../views/cadastro.php');
            }
            else {

                $cadastraEmp = $conn->query("INSERT INTO projeto.empresa(nome, email, cnpj, senha) VALUES (
                    '$nome',
                    '$email',
                    '$cnpj',
                    '$senha'
                    )");

                    if($cadastraEmp==true){
                        $_SESSION["msg"]="Cadastro realizado com sucesso!";
                        $_SESSION["status"]="success";
                        header('Location:../views/login.php');
                    }
                    else{
                        //nao deu certo
                        $_SESSION["msg"]="Erro ao realizar cadastro!";
                        $_SESSION["status"]="warning";
                        header('Location:../views/cadastro.php');
                    }
                }
        }
    }
    else if($type==="login_emp"){
        if(empty($_POST['email'] && MD5($_POST['senha']))){
            $_SESSION["msg"]="Preencha todos os campos!";
            $_SESSION["status"]="warning";
            header('Location:../views/login.php');
        }
        else{
            $email = $_POST['email'];
            $senha = MD5($_POST['senha']);

            $verificaQuery = $conn->query("SELECT e.email, e.senha FROM  projeto.empresa e WHERE e.email='".$email."' AND e.senha='".$senha."'");

            if($verificaQuery->rowCount()<1){
                $_SESSION["msg"]="Senha ou email inválidos!";
                $_SESSION["status"]="warning";
                header('Location:../views/login.php');
            }
            else if($verificaQuery->rowCount()>0){
                $sql = $conn->query("SELECT e.id FROM projeto.empresa e WHERE e.email='".$email."' AND e.senha='".$senha."'");
                $sql->execute();
                $dados = $sql->fetchAll(PDO::FETCH_COLUMN, 0);
                $empresa_id=$dados[0];
                $_SESSION['empresa_id']=$empresa_id;
               header('Location:../views/buscaCurriculo.php');
            }
        }
    }

}
else if($metodo==="GET"){

    $sql=$conn->query("SELECT * FROM projeto.empresa");
    $empresas=$sql->fetchAll();

>>>>>>> 76f60573f412bd144741b24927ff095a90e84d46:TCC/process/empresa.php
}