<?php
    if(empty($_SESSION['empresa_id'])){
        header('Location:../views/unset.php');
    }
    include_once('../templates/cabecalho.php');
?>
<html lang="pt-BR">
<body>
    
<h1> Criar Vaga</h1>
                        <form action="../process/vaga.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="titulo" type="text" class="input is-large" placeholder="Titulo" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="cargo" type="text" class="input is-large" placeholder="Cargo">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <textarea name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                <textarea name="beneficio" cols="30" rows="10" placeholder="Beneficios"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                <textarea name="exigencia" cols="30" rows="10" placeholder="Exigencias"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="cadastrar_vaga">  
                            <button type="submit" class="button is-block is-link is-large is-fullwidth" name="send_criarVaga">Criar Vaga</button>
                        </form>
</body>
</html>