<<<<<<< HEAD:views/curriculo.php
<?php
include_once('../config.php');
$curriculo_id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
include_once('../settings.php');

if(empty($_SESSION['empresa_id'])){
    header('Location:'.URL_VIEWS.'/unset.php');
}

include_once(''.TEMPLATE_PATH.'/cabecalhoEmp.php');
?>
<html lang="pt-BR">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/detalhes.css">
    </head>
<body>
    <div class="detalhes">
        <h5>Detalhes do Currículo</h5>
    </div>
    <?php
    if(!empty($curriculo_id)){
        $query = "SELECT c.id,c.area_profissional, c.objetivo, c.aluno_id, c.experiencia_id, c.formacao_id,c.curso_complementar_id, f.id,  f.instituicao, f.nivel, f.inicio, f.fim, f.curso_id, e.id,e.empresa, e.cargo, e.admissao, e.demissao,p.id, p.curso, p.duracao, p.data,t.id, t.nome, a.nome as aluno, a.email
        FROM projeto.curriculo c, projeto.formacao f, projeto.experiencia e, projeto.curso_complementar p, projeto.curso t, projeto.aluno as a
        WHERE c.id=:id AND c.formacao_id=f.id AND c.experiencia_id=e.id AND c.curso_complementar_id=p.id AND f.curso_id=t.id AND c.aluno_id=a.id LIMIT 1";
        $result_curriculo = $conn->prepare($query);
        $result_curriculo->bindParam(':id', $curriculo_id);
        $result_curriculo->execute();
        $row_curriculo=$result_curriculo->fetch(PDO::FETCH_ASSOC)?>
        <div class="curriculo">
        <div class="dados-pessoais">
            <h5>Dados Pessoais</h5>
            <div class="aluno-nome">
                <label for="">Nome Completo:</label>
                <h3><?=$row_curriculo['aluno'];?></h3>
            </div>
            <div class="aluno-email">
                <label for="">Email:</label>
                <h3><?=$row_curriculo['email'];?></h3>
            </div>
        </div>
        <div class="dados-pessoais">
            <h5>Objetivo</h5>
            <div class="aluno-nome">
                <h3><?=utf8_encode($row_curriculo['objetivo']);?></h3>
            </div>
        </div>
        <div class="dados-formacao">
            <h5>Formação</h5>
            <div class="instituicao">
                <label for="">Instituição:</label>
                <h3><?=$row_curriculo['instituicao'];?></h3>
            </div>
            <div class="nivel">
                <label for="">Email:</label>
                <h3><?=$row_curriculo['nivel'];?></h3>
            </div>
            <div class="curso">
                <label for="">Curso:</label>
                <h3><?=utf8_encode($row_curriculo['nome']);?></h3>
            </div>
            <div class="data-formacao">
                <label for="">Data Início:</label>
                <h3><?=$row_curriculo['inicio'];?></h3>
                <label for="">Data Fim:</label>
                <h3><?=$row_curriculo['fim'];?></h3>
            </div>
        </div>
        <div class="dados-experiencia">
            <h5>Experiencia</h5>
            <div class="empresa">
                <label for="">Empresa:</label>
                <h3><?=$row_curriculo['empresa'];?></h3>
            </div>
            <div class="cargo-aluno">
                <label for="">Cargo:</label>
                <h3><?=$row_curriculo['cargo'];?></h3>
            </div>
            <div class="data">
                <label for="">Data Admissao:</label>
                <h3><?=$row_curriculo['admissao'];?></h3>
                <label for="">Data Demissao:</label>
                <h3><?=$row_curriculo['demissao'];?></h3>
            </div>
        </div>
        <div class="dados-cursoCompl">
            <h5>Curso Complementar</h5>
            <div class="curso_compl">
                <label for="">Curso Complementar:</label>
                <h3><?=$row_curriculo['curso'];?></h3>
            </div>
            <div class="duracao">
                <label for="">Duração:</label>
                <h3><?=$row_curriculo['duracao'];?></h3>
            </div>
            <div class="data">
                <label for="">Data de Conclusão:</label>
                <h3><?=$row_curriculo['data'];?></h3>
            </div>
    </div>
        </div>
    <?php 
    }else{?>
        <div class="erro">
                <h3>Erro ao carregar</h3>
        </div>
        <?php
    }
    ?>
</body>
</html>
<?php

include_once(''.TEMPLATE_PATH.'/footer.php');
=======
<?php
include_once('../config.php');
$curriculo_id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

include_once('../template/cabecalhoEmp.php');
?>
<html lang="pt-BR">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/detalhes.css">
    </head>
<body>
    <div class="detalhes">
        <h5>Detalhes da Currículo</h5>
    </div>
    <?php
    if(!empty($curriculo_id)){
        $query = "SELECT c.id,c.area_profissional, c.objetivo, c.aluno_id, c.experiencia_id, c.formacao_id,c.curso_complementar_id, f.id,  f.instituicao, f.nivel, f.inicio, f.fim, f.curso_id, e.id,e.empresa, e.cargo, e.admissao, e.demissao,p.id, p.curso, p.duracao, p.data,t.id, t.nome, a.nome as aluno, a.email
        FROM projeto.curriculo c, projeto.formacao f, projeto.experiencia e, projeto.curso_complementar p, projeto.curso t, projeto.aluno as a
        WHERE c.id=:id AND c.formacao_id=f.id AND c.experiencia_id=e.id AND c.curso_complementar_id=p.id AND f.curso_id=t.id AND c.aluno_id=a.id LIMIT 1";
        $result_curriculo = $conn->prepare($query);
        $result_curriculo->bindParam(':id', $curriculo_id);
        $result_curriculo->execute();
        $row_curriculo=$result_curriculo->fetch(PDO::FETCH_ASSOC)?>
        <div class="curriculo">
        <div class="dados-pessoais">
            <h5>Dados Pessoais</h5>
            <div class="aluno-nome">
                <label for="">Nome Completo:</label>
                <h3><?=$row_curriculo['aluno'];?></h3>
            </div>
            <div class="aluno-email">
                <label for="">Email:</label>
                <h3><?=$row_curriculo['email'];?></h3>
            </div>
        </div>
        <div class="dados-pessoais">
            <h5>Objetivo</h5>
            <div class="aluno-nome">
                <h3><?=utf8_encode($row_curriculo['objetivo']);?></h3>
            </div>
        </div>
        <div class="dados-formacao">
            <h5>Formação</h5>
            <div class="instituicao">
                <label for="">Instituição:</label>
                <h3><?=$row_curriculo['instituicao'];?></h3>
            </div>
            <div class="nivel">
                <label for="">Email:</label>
                <h3><?=$row_curriculo['nivel'];?></h3>
            </div>
            <div class="curso">
                <label for="">Curso:</label>
                <h3><?=utf8_encode($row_curriculo['nome']);?></h3>
            </div>
            <div class="data-formacao">
                <label for="">Data Início:</label>
                <h3><?=$row_curriculo['inicio'];?></h3>
                <label for="">Data Fim:</label>
                <h3><?=$row_curriculo['fim'];?></h3>
            </div>
        </div>
        <div class="dados-experiencia">
            <h5>Experiencia</h5>
            <div class="empresa">
                <label for="">Empresa:</label>
                <h3><?=$row_curriculo['empresa'];?></h3>
            </div>
            <div class="cargo-aluno">
                <label for="">Cargo:</label>
                <h3><?=$row_curriculo['cargo'];?></h3>
            </div>
            <div class="data">
                <label for="">Data Admissao:</label>
                <h3><?=$row_curriculo['admissao'];?></h3>
                <label for="">Data Demissao:</label>
                <h3><?=$row_curriculo['demissao'];?></h3>
            </div>
        </div>
        <div class="dados-cursoCompl">
            <h5>Curso Complementar</h5>
            <div class="curso_compl">
                <label for="">Curso Complementar:</label>
                <h3><?=$row_curriculo['curso'];?></h3>
            </div>
            <div class="duracao">
                <label for="">Duração:</label>
                <h3><?=$row_curriculo['duracao'];?></h3>
            </div>
            <div class="data">
                <label for="">Data de Conclusão:</label>
                <h3><?=$row_curriculo['data'];?></h3>
            </div>
    </div>
        </div>
    <?php 
    }else{?>
        <div class="erro">
                <h3>Erro ao carregar</h3>
        </div>
        <?php
    }
    ?>
</body>
</html>
<?php

include_once('../template/footer.php');
>>>>>>> 76f60573f412bd144741b24927ff095a90e84d46:TCC/views/curriculo.php
