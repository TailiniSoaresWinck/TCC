<?php
if(empty($_SESSION['aluno_id'])){
    header('Location:../views/unset.php');
}
include_once('../config.php');
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
include_once('../templates/cabecalho.php');
?>

<html lang="pt-BR">
<body>
<h1> Edita Curriculo</h1>

                        <form action="../process/curriculo.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="area_prof" type="text" class="input is-large" value="<?=$row_curriculo['area_profissional'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                <textarea name="objetivo" cols="30" rows="10"><?=$row_curriculo['objetivo'];?></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="instituicao" type="text" class="input is-large" value="<?=$row_curriculo['instituicao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="nivel" type="text" class="input is-large" value="<?=$row_curriculo['nivel'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="inicio" type="date" class="input is-large" value="<?=$row_curriculo['inicio'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="fim" type="date" class="input is-large" value="<?=$row_curriculo['fim'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <select name="curso">
                                        <option value="">Escolha o curso técnico</option>
                                        <?php foreach($cursos as $curso):?>
                                        <option value="<?=$curso['id']?>"><?=utf8_encode($curso['nome'])?></option> 
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="empresa" type="text" class="input is-large" value="<?=$row_curriculo['empresa'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="cargo" type="text" class="input is-large" value="<?=$row_curriculo['cargo'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="admissao" type="date" class="input is-large" value="<?=$row_curriculo['admissao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="demissao" type="date" class="input is-large" value="<?=$row_curriculo['demissao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="curso_comp" type="text" class="input is-large" value="<?=$row_curriculo['curso'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="duracao" type="number" class="input is-large" value="<?=$row_curriculo['duracao'];?>" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="data" type="date" class="input is-large" value="<?=$row_curriculo['data'];?>" autofocus>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="editar_curriculo">  
                            <button type="submit" class="button is-block is-link is-large is-fullwidth" name="send_editarVaga">Salvar</button>
                        </form>

</body>
</html>