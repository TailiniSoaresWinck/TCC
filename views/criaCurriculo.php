<?php
include_once('../config.php');
include_once('../process/curso.php');

include_once('../template/cabecalhoAluno.php');
?>

<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/criar.css">
    </head>
<body>
    <div class="criar-editar">
        <h5> Criar Currículo</h5>
    </div>
    <div class="info">
        <h5>Preencha os campos abaixo:</h5>
    </div>
    <div class="form">
    <form action="../process/curriculo.php" method="POST">
        <div class="conteudo">
        <h5>Objetivo</h5> 
            <div class="control">
            <textarea type='text' name="objetivo" cols="30" rows="10"  placeholder="Objetivo" pattern="[a-zA-Z\s]+$"></textarea>
            </div>
        </div>
        <div class="conteudo">
            <h5>Formação</h5>
            <div class="control">
                <input name="area_prof" type="text" class="" placeholder="Área Profissional" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <input name="instituicao" type="text" class="" placeholder="Instituição" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <div class="control" style='display:flex;text-align:center;justify-content:center;align-item:center;'>
                <select  class="form-select form-select-lg mb-3"  name="nivel">
                    <option value="">Escolha o nível de estudo</option>
                    <option value="Médio/Técnico">Médio/Técnico</option> 
                    <option value="Técnico">Técnico</option> 
                </select>
            </div>
        </div>
        <div class="conteudo">
            <label for="">Data de Início</label>
            <div class="control">
                <input name="inicio" type="date" class="" placeholder="Inicio" maxlength='10' min="1960-07-11" max="2022-12-31" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <label for="">Data de Formação</label>
            <div class="control">
                <input name="fim" type="date" class="" placeholder="Fim" maxlength='10' min="1960-07-11" max="2022-12-31" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <div class="control" style='display:flex;text-align:center;justify-content:center;align-item:center;'>
                <select  class="form-select form-select-lg mb-3"  name="curso">
                    <option value="">Escolha o curso técnico</option>
                    <?php foreach($cursos as $curso):?>
                    <option value="<?=$curso['id']?>"><?=utf8_encode($curso['nome'])?></option> 
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="conteudo">
        <h5>Experiência</h5>
            <div class="control">
                <input name="empresa" type="text" class="" placeholder="Empresa" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <input name="cargo" type="text" class="" placeholder="Cargo" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <label for="">Data de Admissão</label>
            <div class="control">
                <input name="admissao" type="date" class="" placeholder="Admissao" maxlength='10' min="1960-07-11" max="2022-12-31" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <label for="">Data de Demissão</label>
            <div class="control">
                <input name="demissao" type="date" class="" min="1960-07-11" maxlength='10'  max="2022-12-31" placeholder="Demissão" autofocus>
            </div>
        </div>
        <div class="conteudo">
        <h5>Curso Complementar</h5>
            <div class="control">
                <input name="curso_comp" type="text" class="" placeholder="Curso Complementar" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <div class="control">
                <input name="duracao" type="number" class="" placeholder="Horas" autofocus>
            </div>
        </div>
        <div class="conteudo">
            <label for="">Data de Conclusão</label>
            <div class="control">
                <input name="data" type="date" class="" maxlength='10' min="1960-07-11" max="2022-12-31" placeholder="Data" autofocus>
            </div>
        </div>
        <input type="hidden" name="type" value="cadastrar_curriculo">  
        <div class="btn-div">
        <button type="submit" class="btn" name="send_criarVaga">Criar Currículo</button>
        </div>
        
    </form>
    </div>
</body>
</html>
<?php
include_once('../template/footer.php');