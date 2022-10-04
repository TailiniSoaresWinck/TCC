<?php
include_once('../config.php');
include_once('../template/cabecalhoEmp.php');
$msg="";

if(isset($_SESSION["msg"])){

    $msg=$_SESSION["msg"];
    $status=$_SESSION["status"];

    $_SESSION["msg"]= "";
    $_SESSION["status"]="";
}
?>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/criar.css">
    </head>
<body>
<?php if($msg!=""):?>
    <div class="alert alert-<?=$status?>">
    <p><?=$msg?></p>
    </div>
<?php endif;?>
    <div class="criar-editar">
        <h5> Criar Vaga</h5>
    </div>
    <div class="info">
        <h5>Preencha os campos abaixo:</h5>
    </div>
    <div class="form">
    <form action="../process/vaga.php" method="POST">
        <div class="conteudo">
            <div class="control">
                <input name="titulo" type="text"  placeholder="Titulo" >
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <input name="cargo" type="text"  placeholder="Cargo">
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <textarea name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
            <textarea name="beneficio" cols="30" rows="10" placeholder="Beneficios"></textarea>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
            <textarea name="exigencia" cols="30" rows="10" placeholder="Exigencias"></textarea>
            </div>
        </div>
    <input type="hidden" name="type" value="cadastrar_vaga">  
    <div class="btn-div">
        <button type="submit" class="btn" name="send_criarVaga">Criar Vaga</button>
    </div>
     </form>
    </div>
</body>
</html>
<?php
include_once('../template/footer.php');