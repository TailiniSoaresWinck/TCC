<?php
    include_once('../config.php');
    include_once('../settings.php');
    include_once('../process/vaga.php');
    
    if(empty($_SESSION['empresa_id'])){
        header('Location:'.URL_VIEWS.'/unset.php');
    }

    $id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['idVaga']=$id;
    
    include_once(''.TEMPLATE_PATH.'/cabecalhoEmp.php');
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/detalhes.css">
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
        $query=$conn->prepare("SELECT * FROM projeto.vaga as v WHERE v.id=:id and v.finalizado=1");
        $query->bindParam(':id', $id);
        $query->execute();
        if($query->rowCount()>=1){?>
        <div style='display:none;'class="form-editar">
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
        }else{
        ?>
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
        }
            $query=$conn->prepare("SELECT  h.curriculo_id, h.vaga_id, c.area_profissional, f.instituicao, a.nome FROM projeto.historico_vaga as h
            INNER JOIN projeto.vaga as v
            ON h.vaga_id=v.id
            INNER JOIN projeto.curriculo as c
            ON h.curriculo_id=c.id
            INNER JOIN projeto.aluno as a
            ON c.aluno_id=a.id
            INNER JOIN projeto.formacao as f
            ON c.formacao_id=f.id WHERE h.vaga_id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            $resultados=$query->fetchAll(PDO::FETCH_ASSOC);
                if(count($resultados)){
                    ?>
                    <div class="lista-curriculos">
                    <table id='tabela' class="table table-sm table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Área Prof.</th>
                        <th scope="col">Formação</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody style=" background: #383838;">
                    <?php
                    foreach($resultados as $resultado){
                        ?>
                        <tr>
                        <td style="color:#FFF;"scope="row"><?=$resultado['curriculo_id']?></td>
                        <td style="color:#FFF;"><?=$resultado['nome']?></td>
                        <td style="color:#FFF;"><?=$resultado['area_profissional']?></td>
                        <td style="color:#FFF;"><?=$resultado['instituicao']?></td>
                        <td><a href='../views/curriculo.php?id=<?=$resultado['curriculo_id']?>'><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                        </svg></a></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                    </table>
                    </div>
                    <?php
                    }else{
                    ?>
            <div class="sem-candidatos">
            <h3>Nenhum candidato ainda!<h3>
            </div>
            
            <?php 
            }}
            ?>
            
</body>
</html>
<?php

include_once(''.TEMPLATE_PATH.'/footer.php');