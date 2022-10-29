<?php
include_once('../config.php');
include_once('../settings.php');


if(empty($_SESSION['empresa_id'])){
    header('Location:'.URL_VIEWS.'/unset.php');
}

if(empty($_POST['curriculo_areaProf'])){
    header('Location:'.URL_VIEWS.'/buscaCurriculo.php');
}


$curriculo_areaProf="%".trim($_POST['curriculo_areaProf'])."%";
$query=$conn->prepare("SELECT c.id, c.area_profissional, f.instituicao, a.nome FROM projeto.curriculo as c 
inner join projeto.aluno as a 
on a.id=c.aluno_id
inner join projeto.formacao as f
on c.formacao_id=f.id
WHERE area_profissional LIKE :curriculo_areaProf
");
$query->bindParam(':curriculo_areaProf', $curriculo_areaProf, PDO::PARAM_STR);
$query->execute();
$resultados=$query->fetchAll(PDO::FETCH_ASSOC);


include_once(''.TEMPLATE_PATH.'/cabecalhoEmp.php');
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
        <h5>Resultado da busca</h5>
    </div>
    <?php
        if(count($resultados)){?>
    <div class="lista-curriculos">
        <table id='tabela' class="table table-sm table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Área Prof.</th>
            <th scope="col">Formação</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody style=" background: #383838;">
        <?php
        foreach($resultados as $resultado){?>
            <tr>
            <td style="color:#FFF;"scope="row"><?=$resultado['id']?></td>
            <td style="color:#FFF;"><?=$resultado['nome']?></td>
            <td style="color:#FFF;"><?=$resultado['area_profissional']?></td>
            <td style="color:#FFF;"><?=$resultado['instituicao']?></td>
            <td style="color:#FFF;"><a href='<?php echo URL_VIEWS?>/curriculo.php?id=<?=$resultado['id']?>'><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                <p for="">Não foi possível encontrar um currículo</p>
                <a href=".<?php echo URL_VIEWS?>/buscaCurriculo.php">Voltar</a>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>

<?php

include_once(''.TEMPLATE_PATH.'/footer.php');