<?php
include_once('../config.php');
include_once('../process/matriculas.php');
include_once('../template/cabecalhoAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listaEmpresas.css">
</head>
<body>
    <div class="lista">
        <h5>Matrículas</h5>
    </div>
    <div class="lista-matriculas">
        <table id='tabela' class="table table-sm table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Matrícula</th>
            </tr>
        </thead>
        <tbody style=" background: #383838;">
        <?php
        foreach($matriculas as $matricula){
            ?>
            <tr>
            <td style="color:#FFF;"scope="row"><?=$matricula['id'];?></td>
            <td style="color:#FFF;"><?=$matricula['codmatricula'];?></td>
            </tr>
            <?php
            }?>
        </tbody>
        </table>
    </div>
    <div style="text-align:center;padding:2vh;">
        <form action="../views/criarMatricula.php">
        <input  class="btn" style="background-color:#2062AD; color:#FFF; font-weight:400;" type="submit" value="Criar Matrícula">
        </form>
    </div>
</body>
</html>
<?php
include_once('../template/footer.php');