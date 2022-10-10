<?php
include_once('../config.php');
include_once('../template/msg.php');
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
    <title>Cadastro</title>
</head>
<body>
<div class="container login-container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 login-form-1">
                    <h3>Administrador</h3>
                    <form action="../process/administrador.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="nome" placeholder="Nome" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="email" placeholder="Email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="cod_acesso" placeholder="Código" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" placeholder="Senha *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="type" value="cadastrar_admin">
                            <input type="submit" class="btnSubmit" value="Cadastrar-se" />
                        </div>
                        <div class="form-group">
                            <a href="loginAdmin.php" class="SRegistro">Já tem cadastro?</a>
                        </div>
                        <div class="form-group">
                            <a href="cadastro.php" class="SRegistro">Voltar</a>
                        </div>
                    </form>
                </div>
</body>
</html>