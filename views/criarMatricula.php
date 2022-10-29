<?php
include_once('../config.php');
include_once('../settings.php');
include_once(''.TEMPLATE_PATH.'/cabecalhoAdmin.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/criar.css">
    </head>
<body>
    <div class="criar-editar">
        <h5>Adicionar Matrícula</h5>
    </div>
    <div class="info">
        <h5>Preencha os campos abaixo:</h5>
    </div>
    <form action="<?php echo URL_PROCESS?>/matriculas.php" method="POST">
        <div style="min-height:35vh;"class="conteudo">
        <h5>Código de Matrícula</h5> 
            <div class="control">
            <input type='text' name="codmatricula" required   placeholder="Código Matrícula" />
            </div>
            </div>
        <input type="hidden" name="type" value="criar_matricula">  
        <div class="btn-div">
        <button type="submit" class="btn">Criar Matrícula</button>
        </div>
    </form>
</body>
</html>
<?php
include_once(''.TEMPLATE_PATH.'/footer.php');
?>