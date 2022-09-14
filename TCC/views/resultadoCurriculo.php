<?php
if(empty($_SESSION['empresa_id'])){
    header('Location:../views/unset.php');
}
include_once('../config.php');

if(empty($_POST['curriculo_areaProf'])){
    header('Location:../views/buscaCurriculo.php');
}


$curriculo_areaProf="%".trim($_POST['curriculo_areaProf'])."%";
$query=$conn->prepare("SELECT * FROM projeto.curriculo WHERE area_profissional LIKE :curriculo_areaProf");
$query->bindParam(':curriculo_areaProf', $curriculo_areaProf, PDO::PARAM_STR);
$query->execute();
$resultados=$query->fetchAll(PDO::FETCH_ASSOC);

include_once('../templates/cabecalho.php');
?>
<html lang="pt-BR">
<body>
<h2>Resultados da busca</h2>

    <?php
    if(count($resultados)){
        foreach($resultados as $resultado){?>

            <label for=""><?php echo $resultado['area_profissional'];?></label>
    <?php
        }
    }else{
    ?>
            <label for="">Não foi possível encontrar o curriculo</label>
    <?php
    }
    ?>
</body>
</html>