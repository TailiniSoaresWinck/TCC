<?php

include_once('../config.php');
include_once('../settings.php');
include_once('../process/curriculo.php');
include_once('../process/curso.php');
$curriculo_id=$_SESSION['curriculo_id'];
$query = "SELECT c.id,c.area_profissional, c.objetivo, c.aluno_id, c.experiencia_id, c.formacao_id,c.curso_complementar_id, f.id,  f.instituicao, f.nivel, f.inicio, f.fim, f.curso_id, e.id,e.empresa, e.cargo, e.admissao, e.demissao,p.id, p.curso, p.duracao, p.data,t.id, t.nome
        FROM projeto.curriculo c, projeto.formacao f, projeto.experiencia e, projeto.curso_complementar p, projeto.curso t
        WHERE c.id=:id AND c.formacao_id=f.id AND c.experiencia_id=e.id AND c.curso_complementar_id=p.id AND f.curso_id=t.id LIMIT 1";
$result_curriculo = $conn->prepare($query);
$result_curriculo->bindParam(':id', $curriculo_id);
$result_curriculo->execute();
$row_curriculo=$result_curriculo->fetch(PDO::FETCH_ASSOC);
include_once(''.TEMPLATE_PATH.'/cabecalhoAluno.php');
?>

<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_CSS?>/criar.css">
    </head>
<body>
    <div class="criar-editar">
        <h5>Editar Currículo</h5>
    </div>
    <div class="info">
        <h5>Atualize os campos abaixo:</h5>
    </div><div class="form">
                        <form action="<?php echo URL_PROCESS?>/curriculo.php" method="POST">
                            <div class="conteudo">
                            <h5>Objetivo</h5>
                            <div class="conteudo">
                                <div class="control">
                                <textarea name="objetivo" cols="30" rows="10" required><?=$row_curriculo['objetivo'];?></textarea>
                                </div>
                            </div>
                            <h5>Formação</h5>
                                <div class="control">
                                    <input name="area_prof" type="text"  required value="<?=$row_curriculo['area_profissional'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="instituicao" type="text"  required value="<?=$row_curriculo['instituicao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="nivel" type="text" required  value="<?=$row_curriculo['nivel'];?>"  autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="inicio" type="date" maxlength='10' min="1960-07-11"  max="<?php echo date("Y-m-d");?>" required value="<?=$row_curriculo['inicio'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="fim" type="date"maxlength='10' min="1960-07-11"   required value="<?=$row_curriculo['fim'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control" style='display:flex;text-align:center;justify-content:center;align-item:center;'>
                                    <select  class="form-select form-select-lg " name="curso">
                                        <option required value="">Escolha o curso técnico</option>
                                        <?php foreach($cursos as $curso):?>
                                        <option value="<?=$curso['id']?>"><?=utf8_encode($curso['nome'])?></option> 
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="conteudo">
                            <h5>Experiência</h5>
                                <div class="control">
                                    <input name="empresa" type="text"  value="<?=$row_curriculo['empresa'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="cargo" type="text"  value="<?=$row_curriculo['cargo'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="admissao" type="date" maxlength='10' min="1960-07-11"  max="<?php echo date("Y-m-d");?>"  value="<?=$row_curriculo['admissao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="demissao" type="date" maxlength='10' min="1960-07-11"  max="<?php echo date("Y-m-d");?>"  value="<?=$row_curriculo['demissao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                            <h5>Curso Complementar</h5>
                                <div class="control">
                                    <input name="curso_comp" type="text"  value="<?=$row_curriculo['curso'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="duracao" type="number"  value="<?=$row_curriculo['duracao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="conteudo">
                                <div class="control">
                                    <input name="data" type="date"  maxlength='10' min="1960-07-11"  max="<?php echo date("Y-m-d");?>" value="<?=$row_curriculo['data'];?>" autofocus>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="editar_curriculo">  
                            <div class="btn-div">
                            <button type="submit" class="btn" name="send_editarVaga">Salvar</button>
                            </div>
                        </form>
                    </div>

</body>
</html>
<?php
include_once(''.TEMPLATE_PATH.'/footer.php');