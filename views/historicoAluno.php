<?php
include_once('../config.php');
include_once('../settings.php');
include_once(''.TEMPLATE_PATH.'/cabecalhoAluno.php');

$_SESSION['curriculo_id']=$curriculo_id;
$query=$conn->prepare('SELECT h.curriculo_id, h.vaga_id, v.id, v.titulo, v.finalizado, v.exigencia, v.beneficio, v.descricao, v.cargo, v.empresa_id, e.nome, e.email FROM projeto.historico_vaga as h
INNER JOIN projeto.vaga as v
on v.id=h.vaga_id
INNER JOIN projeto.empresa as e
on v.empresa_id=e.id
WHERE h.curriculo_id=:curriculo_id');
$query->bindParam(':curriculo_id', $curriculo_id);
$query->execute();
$resultados=$query->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo URL_CSS?>/resultado.css">
    </head>
<body>
    <div class="resultado">
        <h5>Histórico</h5>
    </div>
    <?php
        if(count($resultados)){?>
    <div class="lista-curriculos">
        <table id='tabela' class="table table-sm table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Empresa</th>
            <th scope="col">Ativo</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody style=" background: #383838;">
        <?php
        foreach($resultados as $resultado){
            if($resultado['finalizado']==1){
                $resultado['finalizado']='Não';
            }
            else{
                $resultado['finalizado']='Sim';
            }
            ?>
            <tr>
            <td style="color:#FFF;"scope="row"><?=$resultado['id']?></td>
            <td style="color:#FFF;"><?=$resultado['titulo']?></td>
            <td style="color:#FFF;"><?=$resultado['nome']?></td>
            <td style="color:#FFF;"><?=$resultado['finalizado']?></td>
            <td><a href='../views/vaga.php?id=<?=$resultado['id']?>'><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="2"></circle>
            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
            </svg></a></td>
            </tr>
            <?php
            }?>
        </tbody>
        </table>
        <?php
        }else{
        ?>
        <div class="sem-resultado">
                <p for="">Não há nada no histórico ainda!</p>
        </div>
        <?php
        }
        ?>
    </div>
  
</body>
</html>

<?php

include_once("".TEMPLATE_PATH."/footer.php");