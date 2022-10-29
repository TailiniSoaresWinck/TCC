<?php
include_once('../config.php');
include_once('../settings.php');
include_once('../process/empresa.php');
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['empresaId']=$id;

include_once(''.TEMPLATE_PATH.'/cabecalhoAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/detalhes.css">
</head>
<body>
<div class="detalhes">
        <h5>Detalhes da Empresa</h5>
    </div>
    
    <?php
    if(!empty($id)){
        $queryEmpresa = "SELECT * FROM projeto.empresa as v
         WHERE v.id=:id LIMIT 1";
        $result_empresa = $conn->prepare($queryEmpresa);
        $result_empresa->bindParam(':id', $id);
        $result_empresa->execute();
        $row_empresa=$result_empresa->fetch(PDO::FETCH_ASSOC)?>

        <div class="vaga">
            <div class="titulo">
            <h3><?=$row_empresa['nome'];?></h3>
            </div> 
           <div class="cargo">
            <label for="">Empresa:</label>
           <h5><?=$row_empresa['nome'];?></h5>
            <label for="">Email:</label>
           <h5><?=$row_empresa['email'];?></h5>
            <label for="">Cnpj:</label>
           <h5><?=$row_empresa['cnpj'];?></h5>
           </div>
        </div>
    <?php
    }?>
</body>
</html>
<?php
include_once(''.TEMPLATE_PATH.'/footer.php');