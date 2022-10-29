<?php
include_once('../settings.php');
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
    <title>Recuperar Senha</title>
</head>
<body>
<div class="container login-container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 login-form-1">
                    <h3>Recuperar senha:</h3>
                    <form action="<?php echo URL_PROCESS?>/recuperarSenha.php" method="POST">
                        <div class="form-group">
                            <select class="form-control" name="usuario" id="" required>
                                <option value="">Selecione o tipo de usuário</option>
                                <option value="aluno">Aluno</option>
                                <option value="empresa">Empresa</option>
                                <option value="administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"  name="email" placeholder="Email" value="" required/>
                        </div>
                        <code>Preencha com email cadastrado para receber sua nova senha por email.</code>
                        <br></br>
                        <div class="form-group">
                            <input type="hidden" name="env" value="form_rec_senha">
                            <input type="submit" class="btnSubmit" value="Enviar dados" required/>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo URL_VIEWS?>/login.php" class="SRegistro">Voltar</a>
                        </div>
                    </form>
                </div>
</body>
</html>