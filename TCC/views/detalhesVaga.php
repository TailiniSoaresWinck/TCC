<?php
    include_once('../config.php');
    include_once('../process/vaga.php');
    $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['idVaga']=$id;

    include_once('../template/cabecalhoEmp.php');
?>

<html lang="pt-BR">
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
        <div class="form-editar">
        <form action="../process/vaga.php" method="POST">
            <input type="hidden" name="id" value="<?=$row_vaga['id'];?>"> 
            <input type="hidden" name="type" value="edita_vaga">  
            <input type="hidden" name="finalizar" value="1"> 
            <div class="btn-editar">
            <button type="submit" class="btn">Finalizar</button> 
            </div>
            </form>
        </div>
            
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
            ?>
            <div class="sem-candidatos">
            <h3>Nenhum candidato ainda!<h3>
            </div>
            
            <?php
            }
            ?>
            
    <?php 
    }else{
        echo "Vaga não encontrada";
    }
    ?>
</body>
</html>
<?php

include_once('../template/footer.php');