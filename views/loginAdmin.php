<?php
include_once('../config.php');
include_once('../settings.php');
include_once(''.TEMPLATE_PATH.'/msg.php');
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
    <link rel="stylesheet" href="<?php echo URL_CSS?>/login.css">
    <title>Login</title>
</head>
<body>
<div class="container login-container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 login-form-1">
                    <h3>Administrador</h3>
                    <form action="<?php echo URL_PROCESS?>/administrador.php" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control"  name="email" placeholder="Email" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" placeholder="Senha *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="type" value="login_admin">
                            <input type="submit" class="btnSubmit" value="Login" required/>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo URL_VIEWS?>/cadastroAdmin.php" class="SRegistro">Não tem cadastro?</a>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo URL_VIEWS?>/recuperarSenha.php" class="SRegistro">Esqueceu a senha?</a>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo URL_VIEWS?>/login.php" class="SRegistro">Voltar</a>
                        </div>
                    </form>
                </div>
</body>
</html>