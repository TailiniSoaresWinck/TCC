<?php
include_once('../config.php');
include_once('../settings.php');
include_once('../process/aluno.php');
include_once(''.TEMPLATE_PATH.'/cabecalhoAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/listaEmpresas.css">
</head>
<body>
<div class="lista">
        <h5>Alunos</h5>
    </div>
    <div class="lista-empresas">
    
        <table id='tabela' class="table table-sm table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Aluno</th>
            <th scope="col">Matrícula</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody style=" background: #383838;">
        <?php
        foreach($alunos as $aluno){
            ?>
            <tr>
            <td style="color:#FFF;"scope="row"><?=$aluno['id'];?></td>
            <td style="color:#FFF;"><?=$aluno['nome'];?></td>
            <td style="color:#FFF;"><?=$aluno['codmatricula'];?></td>
            <td style="color:#FFF;"><a href='<?php echo URL_VIEWS?>/detalhesAluno.php?id=<?=$aluno['id']?>'><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="12" cy="12" r="2"></circle>
   <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
</svg></a></td>
            </tr>
            <?php
            }?>
        </tbody>
        </table>
    </div>
    
</body>
</html>
<?php
include_once(''.TEMPLATE_PATH.'/footer.php');
