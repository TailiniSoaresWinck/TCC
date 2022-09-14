<?php
if(empty($_SESSION['aluno_id'])){
    header('Location:../views/unset.php');
}
include_once('../config.php');
include_once('../process/curriculo.php');

$curriculo_id=$_SESSION['curriculo_id'];
include_once('../templates/cabecalho.php');
?>
<html lang="pt-BR">
<body>
    <h1>Detalhes Curriculo</h1>
    <?php
    if(!empty($curriculo_id)){
        $query = "SELECT c.id,c.area_profissional, c.objetivo, c.aluno_id, c.experiencia_id, c.formacao_id,c.curso_complementar_id, f.id,  f.instituicao, f.nivel, f.inicio, f.fim, f.curso_id, e.id,e.empresa, e.cargo, e.admissao, e.demissao,p.id, p.curso, p.duracao, p.data,t.id, t.nome
        FROM projeto.curriculo c, projeto.formacao f, projeto.experiencia e, projeto.curso_complementar p, projeto.curso t
        WHERE c.id=:id AND c.formacao_id=f.id AND c.experiencia_id=e.id AND c.curso_complementar_id=p.id AND f.curso_id=t.id LIMIT 1";
        $result_curriculo = $conn->prepare($query);
        $result_curriculo->bindParam(':id', $curriculo_id);
        $result_curriculo->execute();
        $row_curriculo=$result_curriculo->fetch(PDO::FETCH_ASSOC)?>
            <h3><?=$row_curriculo['area_profissional'];?></h3>
            <p><?=$row_curriculo['instituicao'];?></p>
            <p><?=$row_curriculo['nivel'];?></p>
            <p><?=$row_curriculo['nome'];?></p>
            <p><?=$row_curriculo['inicio'];?></p>
            <p><?=$row_curriculo['fim'];?></p>
            <p><?=$row_curriculo['empresa'];?></p>
            <p><?=$row_curriculo['cargo'];?></p>
            <p><?=$row_curriculo['admissao'];?></p>
            <p><?=$row_curriculo['demissao'];?></p>
            <p><?=$row_curriculo['curso'];?></p>
            <p><?=$row_curriculo['duracao'];?></p>
            <p><?=$row_curriculo['data'];?></p>
            <a href="editaCurriculo.php?id=<?=$curriculo_id?>">Editar curriculo</a>
    <?php 
    }else{
        echo "Currículo não encontrado";
    }
    ?>
</body>
</html>