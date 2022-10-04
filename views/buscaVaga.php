<?php
include_once('../config.php');
include_once('../template/cabecalhoAluno.php');


?>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/busca.css">
    </head>
<body>
<div class="busca">
    <h5>Buscar Vaga</h5>
    <form action="../views/resultadoVaga.php" method="POST">
    <input type="text" class="form-control" placeholder="Digite a vaga que procura" aria-label="Digite a area que procura" aria-describedby="button-addon2" name="titulo_vaga">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
    </form>
</div>
<div class="info-extra">
        <h3>Encontre de forma fácil vagas de emprego!</h3>
        <div class="info-img">
        <img src="../img/buscaVaga.jpg" alt="" srcset="">
        </div>
        <p>Veja qual vaga você tem mais interesse e assim mande seu currículo de forma fácil e rápido!</p>
</div>
</body>
</html>
<?php

include_once('../template/footer.php');
