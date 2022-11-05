<?php
include_once('../config.php');
include_once('../settings.php');
include_once(''.TEMPLATE_PATH.'/cabecalhoEmp.php');

if(empty($_SESSION['empresa_id'])){
    header('Location:'.URL_VIEWS.'/unset.php');
}
?>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/criar.css">
    </head>
<body>
    <div class="criar-editar">
        <h5> Criar Vaga</h5>
    </div>
    <div class="info">
        <h5>Preencha os campos abaixo:</h5>
    </div>
    <div class="form">
    <form action="<?php echo URL_PROCESS?>/vaga.php" method="POST">
        <div class="conteudo">
            <div class="control">
                <input name="titulo" type="text"  placeholder="Titulo" oninput="javascript: if(this.value.length>this.maxLength)this.value = this.value.slice(this.minLength, this.maxLength)" minlength="10" maxlength="20"  required>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <input name="cargo" type="text"  placeholder="Cargo" oninput="javascript: if(this.value.length>this.maxLength)this.value = this.value.slice(this.minLength, this.maxLength)" minlength="" maxlength="20"  required>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <textarea name="descricao" cols="30" rows="10" placeholder="Descrição" required></textarea>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
            <textarea name="beneficio" cols="30" rows="10" placeholder="Beneficios"required></textarea>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
            <textarea name="exigencia" cols="30" rows="10" placeholder="Exigencias" required></textarea>
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
include_once(''.TEMPLATE_PATH.'/footer.php');