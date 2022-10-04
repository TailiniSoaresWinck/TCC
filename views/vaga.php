<?php
    include_once('../config.php');
    $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['idVaga']=$id;
    $curriculo_id= $_SESSION['curriculo_id'];
    include_once('../template/cabecalhoAluno.php');
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
        <h5>Detalhes da Vaga</h5>
    </div>
    
    <?php
    if(!empty($id)){
        $queryVaga = "SELECT v.id, v.titulo, v.cargo, v.descricao, v.beneficio, v.exigencia, v.empresa_id, e.nome, e.email FROM projeto.vaga v
        inner join projeto.empresa as e
        on e.id=v.empresa_id
         WHERE v.id=:id LIMIT 1";
        $result_vaga = $conn->prepare($queryVaga);
        $result_vaga->bindParam(':id', $id);
        $result_vaga->execute();
        $row_vaga=$result_vaga->fetch(PDO::FETCH_ASSOC)?>
        <div class="vaga">
            <div class="titulo">
            <h3><?=$row_vaga['titulo'];?></h3>
            </div> 
           <div class="cargo">
            <label for="">Empresa:</label>
           <h5><?=$row_vaga['nome'];?></h5>
            <label for="">Email:</label>
           <h5><?=$row_vaga['email'];?></h5>
           </div>
           <div class="cargo">
            <label for="">Cargo:</label>
           <h5><?=$row_vaga['cargo'];?></h5>
           </div>
            <div class="descricao">
            <label for="">Descrição:</label>
            <p><?=$row_vaga['descricao'];?></p>
            </div>
            <div class="beneficio">
            <label for="">Benefícios:</label>
            <p><?=$row_vaga['beneficio'];?></p>
            </div>
            <div class="exigencia">
            <label for="">Exigências:</label>
            <p><?=$row_vaga['exigencia'];?></p>
            </div>
        </div>
        <?php
        $query=$conn->prepare("SELECT * FROM projeto.historico_vaga as h WHERE h.curriculo_id=:curriculo_id and h.vaga_id=:id");
        $query->bindParam(':curriculo_id', $curriculo_id);
        $query->bindParam(':id', $id);
        $query->execute();
        if($query->rowCount()>=1){?>
        <div style='display:none;'class="form-editar">
            <form action="../process/historico.php" method="POST">
                <input type="hidden" name="id" value="<?=$row_vaga['id']?>">
                <button class='btn' type="submit">Enviar Currículo</button>
            </form>
        </div>
        <?php
        }
        else{
        ?>
        <div class="form-editar">
            <form action="../process/historico.php" method="POST">
                <input type="hidden" name="id" value="<?=$row_vaga['id']?>">
                <button class='btn' type="submit">Enviar Currículo</button>
            </form>
        </div>
        <?php
        }}
        ?>
</body>
</html>
<?php
include_once('../template/footer.php');