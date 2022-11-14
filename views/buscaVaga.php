<?php
include_once('../config.php');
include_once('../settings.php');
include_once(''.TEMPLATE_PATH.'/cabecalhoAluno.php');


?>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/busca.css">
    </head>
<body>
<div class="busca">
    <h5>Buscar Vaga</h5>
    <form action="<?php echo URL_VIEWS?>/resultadoVaga.php" method="POST">
    <input type="text" class="form-control" placeholder="Digite a vaga que procura" aria-label="Digite a area que procura" aria-describedby="button-addon2" name="titulo_vaga">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
    </form>
</div>
<div class="info-extra">
        <h3>Encontre de forma fácil vagas de emprego!</h3>
        <p> Pratika CIMOL é uma plataforma de para cadastro de currículos, onde você pode encontrar a vaga ideal que você procurar
            Tem por objetivo otimizar todo o processo de criar um currículo, procurar vagas, candidatar-se a uma vaga para você.
            O sistema possui diversas funcionalidades e recursos que irão tornar o dia-a-dia dos candidatos mais prática.
            O sistema é totalmente web, ou seja, não é necessário instalar nenhum programa no computador.</p>
        </p>
        <div class="info-img">
        <img src="<?php echo URL_IMG?>/buscaVaga.jpg" alt="" srcset="">
        </div>
</div>
</body>
</html>
<?php

include_once(''.TEMPLATE_PATH.'/footer.php');
