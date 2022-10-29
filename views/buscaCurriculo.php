<?php
include_once('../config.php');
include_once('../settings.php');
include_once(''.TEMPLATE_PATH.'/cabecalhoEmp.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/busca.css">
    </head>
<body>
    <div class="busca">
    <h5>Buscar Currículo</h5>
    <form action="<?php echo URL_VIEWS?>/resultadoCurriculo.php" method="POST">
    <input type="text" class="form-control" placeholder="Digite a área que procura" aria-label="Digite a area que procura" aria-describedby="button-addon2" name="curriculo_areaProf">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
    </form>
    </div>
    <div class="info-extra">
        <h3>Encontre o melhor profissional para a vaga que você procura!</h3>
        <div class="info-img">
        <img src="<?php echo URL_IMG?>/buscarCurriculo.jpg" alt="" srcset="">
        </div>
        <p>Selecione da melhor forma e com rapidez os perfis que você acredita ser adequados para a vaga!</p>
    </div>
</body>
</html>
<?php

include_once(''.TEMPLATE_PATH.'/footer.php');