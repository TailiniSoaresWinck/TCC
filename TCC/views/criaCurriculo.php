<?php
if(empty($_SESSION['aluno_id'])){
    header('Location:../views/unset.php');
}
include_once('../config.php');
include_once('../process/curso.php');

include_once('../templates/cabecalho.php');
?>

<html lang="pt-BR">
<body>
    
<h1> Criar Curriculo</h1>
                        <form action="../process/curriculo.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="area_prof" type="text" class="input is-large" placeholder="Área Profissional" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                <textarea name="objetivo" cols="30" rows="10" placeholder="Objetivo"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="instituicao" type="text" class="input is-large" placeholder="Instituição" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="nivel" type="text" class="input is-large" placeholder="Nível" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="inicio" type="date" class="input is-large" placeholder="Inicio" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="fim" type="date" class="input is-large" placeholder="Fim" autofocus>
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
                                    <input name="empresa" type="text" class="input is-large" placeholder="Empresa" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="cargo" type="text" class="input is-large" placeholder="Cargo" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="admissao" type="date" class="input is-large" placeholder="Admissao" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="demissao" type="date" class="input is-large" placeholder="Demissão" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="curso_comp" type="text" class="input is-large" placeholder="Curso Complementar" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="duracao" type="number" class="input is-large" placeholder="Horas" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="data" type="date" class="input is-large" placeholder="Data" autofocus>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="cadastrar_curriculo">  
                            <button type="submit" class="button is-block is-link is-large is-fullwidth" name="send_criarVaga">Criar Curriculo</button>
                        </form>
</body>
</html>