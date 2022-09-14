<?php
if(empty($_SESSION['empresa_id'])){
    header('Location:../views/unset.php');
}
    include_once('../config.php');
    include_once('../process/vaga.php');
    $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['idVaga']=$id;

    include_once('../templates/cabecalho.php');
?>

<html lang="pt-BR">
<body>
    <a href='listaVagas.php'>Voltar</a>
    <h1>Detalhes da Vaga</h1>
    <?php
    if(!empty($id)){
        $queryVaga = "SELECT v.id, v.titulo, v.cargo, v.descricao, v.beneficio, v.exigencia FROM projeto.vaga v WHERE v.id=:id LIMIT 1";
        $result_vaga = $conn->prepare($queryVaga);
        $result_vaga->bindParam(':id', $id);
        $result_vaga->execute();
        $row_vaga=$result_vaga->fetch(PDO::FETCH_ASSOC)?>
            <h3><?=$row_vaga['titulo'];?></h3>
            <p><?=$row_vaga['cargo'];?></p>
            <p><?=$row_vaga['descricao'];?></p>
            <p><?=$row_vaga['beneficio'];?></p>
            <p><?=$row_vaga['exigencia'];?></p>
            <form action="../process/vaga.php" method="POST">
            <input type="hidden" name="id" value="<?=$row_vaga['id'];?>"> 
            <input type="hidden" name="type" value="edita_vaga">  
            <input type="hidden" name="finalizar" value="1"> 
            <button type="submit" class="button is-block is-link is-large is-fullwidth">Finalizar</button> 
            </form>
            <?php
            $query=$conn->prepare("SELECT * FROM projeto.historico_vaga as h WHERE h.vaga_id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            if($query->rowCount()>0){
                $queryGet=$conn->prepare("SELECT h.curriculo_id, h.vaga_id, c.area_profissional, c.objetivo, f.instituicao, f.nivel, f.inicio, f.fim,e.empresa, e.cargo, e.admissao, e.demissao, p.curso, p.duracao, p.data, t.nome
                FROM projeto.historico_vaga as h
                INNER JOIN projeto.vaga as v
                ON h.vaga_id=v.id
                INNER JOIN projeto.curriculo as c
                ON h.curriculo_id=c.id
                INNER JOIN projeto.aluno as a
                ON c.aluno_id=a.id
                INNER JOIN projeto.formacao as f
                ON c.formacao_id=f.id
                INNER JOIN projeto.experiencia as e
                ON c.experiencia_id=e.id
                INNER JOIN projeto.curso_complementar as p
                ON c.curso_complementar_id=p.id
                INNER JOIN projeto.curso as t
                ON f.curso_id=t.id");
                $queryGet->execute();
                $historico=$queryGet->fetch(PDO::FETCH_ASSOC);

                ?>
            <p><?=$historico['curriculo_id'];?></p>
            <?php
            }
            else{
                echo "Nenhum candidato a vaga ainda";
            }
            ?>
            
    <?php 
    }else{
        echo "Vaga não encontrada";
    }
    ?>
</body>
</html>