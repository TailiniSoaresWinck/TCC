<?php
include_once('../config.php');
include_once('../process/aluno.php');
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

include_once('../template/cabecalhoAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/detalhes.css">
</head>
<body>
<div class="detalhes">
        <h5>Detalhes do Aluno</h5>
    </div>
    
    <?php
    if(!empty($id)){
        $queryAluno = "SELECT * FROM projeto.aluno as v
         WHERE v.id=:id LIMIT 1";
        $result_aluno = $conn->prepare($queryAluno);
        $result_aluno->bindParam(':id', $id);
        $result_aluno->execute();
        $row_aluno=$result_aluno->fetch(PDO::FETCH_ASSOC)?>

        <div class="vaga">
            <div class="titulo">
            <h3><?=$row_aluno['nome'];?></h3>
            </div> 
           <div class="cargo">
            <label for="">Nome:</label>
           <h5><?=$row_aluno['nome'];?></h5>
            <label for="">Email:</label>
           <h5><?=$row_aluno['email'];?></h5>
            <label for="">Código Matrícula:</label>
           <h5><?=$row_aluno['codmatricula'];?></h5>
           </div>
        </div>
    <?php
    }?>
</body>
</html>
<?php
include_once('../template/footer.php');