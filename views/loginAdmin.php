<?php
include_once('../config.php');

$msg="";

if(isset($_SESSION["msg"])){

    $msg=$_SESSION["msg"];
    $status=$_SESSION["status"];

    $_SESSION["msg"]= "";
    $_SESSION["status"]="";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
<?php if($msg!=""):?>
    <div class="alert alert-<?=$status?>">
    <p><?=$msg?></p>
    </div>
<?php endif;?>
<div class="container login-container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 login-form-1">
                    <h3>Administrador</h3>
                    <form action="../process/administrador.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="email" placeholder="Email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" placeholder="Senha *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="type" value="login_admin">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="cadastroAdmin.php" class="SRegistro">Não tem cadastro?</a>
                        </div>
                        <div class="form-group">
                            <a href="login.php" class="SRegistro">Voltar</a>
                        </div>
                    </form>
                </div>
</body>
</html>