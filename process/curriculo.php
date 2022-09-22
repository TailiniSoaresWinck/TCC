<?php
include_once('../config.php');
$aluno_id = $_SESSION['aluno_id'];

$metodo = $_SERVER["REQUEST_METHOD"];

if($metodo==="POST"){
    $type=$_POST["type"];

    if($type==="cadastrar_curriculo"){
        if(empty($_POST['area_prof'] && $_POST['objetivo'] && $_POST['instituicao'] && $_POST['nivel'] && $_POST['inicio'] && $_POST['fim'] && $_POST['curso'] && $_POST['empresa'] && $_POST['cargo'] && $_POST['admissao'] && $_POST['demissao'] && $_POST['curso_comp'] && $_POST['duracao'] && $_POST['data'] )){
            echo "Preencha todos os campos";
        }
        else{
            $area_prof=$_POST['area_prof'];
            $objetivo=$_POST['objetivo'];
            $instituicao=$_POST['instituicao'];
            $nivel=$_POST['nivel'];
            $inicio=$_POST['inicio'];
            $fim=$_POST['fim'];
            $curso=$_POST['curso'];
            $empresa=$_POST['empresa'];
            $cargo=$_POST['cargo'];
            $admissao=$_POST['admissao'];
            $demissao=$_POST['demissao'];
            $curso_com=$_POST['curso_comp'];
            $duracao=$_POST['duracao'];
            $data=$_POST['data'];            

            $verificaQuery=$conn->query("SELECT * FROM projeto.curriculo c WHERE c.aluno_id=".$aluno_id."");

            if($verificaQuery->rowCount()>0){
                echo 'Você já tem um currículo cadastrado';
            }
            else{

            $cadastraExp=$conn->query("INSERT INTO projeto.experiencia(empresa,cargo,admissao,demissao,aluno_id) VALUES (
            '$empresa',
            '$cargo',
            '$admissao',
            '$demissao',
            $aluno_id
            )");

                if($cadastraExp==true){
                    $query = $conn->query("SELECT e.id FROM projeto.experiencia e WHERE e.aluno_id=".$aluno_id." LIMIT 1");
                    $query->execute();
                    $dados = $query->fetchAll(PDO::FETCH_COLUMN, 0);
                    $experiencia_id=$dados[0];
                    $_SESSION['experiencia_id']=$experiencia_id;
                    echo $experiencia_id."<br>";
                }

            $cadastraFormacao=$conn->query("INSERT INTO projeto.formacao(instituicao,nivel,inicio,fim,curso_id,aluno_id) VALUES (
                '$instituicao',
                '$nivel',
                '$inicio',
                '$fim',
                $curso,
                $aluno_id
            )");

                if($cadastraFormacao==true){
                    $query = $conn->query("SELECT f.id FROM projeto.formacao f WHERE f.aluno_id=".$aluno_id." LIMIT 1");
                    $query->execute();
                    $dados = $query->fetchAll(PDO::FETCH_COLUMN, 0);
                    $formacao_id=$dados[0];
                    $_SESSION['formacao_id']=$formacao_id;
                    echo $formacao_id."<br>";
                }


            $cadastraCursoComp=$conn->query("INSERT INTO projeto.curso_complementar(curso,duracao,data, aluno_id) VALUES (
                '$curso_com',
                $duracao,
                '$data',
                $aluno_id
            )");
                if($cadastraCursoComp==true){
                    $query = $conn->query("SELECT c.id FROM projeto.curso_complementar c WHERE c.aluno_id=".$aluno_id." LIMIT 1");
                    $query->execute();
                    $dados = $query->fetchAll(PDO::FETCH_COLUMN, 0);
                    $curso_complementar_id=$dados[0];
                    $_SESSION['curso_complementar_id']=$curso_complementar_id;
                    echo $curso_complementar_id."<br>";
                }
            
            
            $cadadastraCurriculo=$conn->query("INSERT INTO projeto.curriculo(area_profissional, objetivo, aluno_id, experiencia_id, formacao_id, curso_complementar_id) VALUES (
                '$area_prof',
                '$objetivo',
                $aluno_id,
                $experiencia_id,
                $formacao_id,
                $curso_complementar_id)"); 

                    if($cadadastraCurriculo==true){
                        $query = $conn->query("SELECT c.id FROM projeto.curriculo c WHERE c.aluno_id=".$aluno_id." LIMIT 1");
                        $query->execute();
                        $dados = $query->fetchAll(PDO::FETCH_COLUMN, 0);
                        $curriculo_id=$dados[0];
                        $_SESSION['curriculo_id']=$curriculo_id;
                    }

            }
        }
    }else if($type==="editar_curriculo"){

        if(empty($_POST['area_prof'] && $_POST['objetivo'] && $_POST['instituicao'] && $_POST['nivel'] && $_POST['inicio'] && $_POST['fim'] && $_POST['curso'] && $_POST['empresa'] && $_POST['cargo'] && $_POST['admissao'] && $_POST['demissao'] && $_POST['curso_comp'] && $_POST['duracao'] && $_POST['data'] )){
            echo "Preencha todos os campos";
        }
        else{
            $area_prof=$_POST['area_prof'];
            $objetivo=$_POST['objetivo'];
            $instituicao=$_POST['instituicao'];
            $nivel=$_POST['nivel'];
            $inicio=$_POST['inicio'];
            $fim=$_POST['fim'];
            $curso=$_POST['curso'];
            $empresa=$_POST['empresa'];
            $cargo=$_POST['cargo'];
            $admissao=$_POST['admissao'];
            $demissao=$_POST['demissao'];
            $curso_com=$_POST['curso_comp'];
            $duracao=$_POST['duracao'];
            $data=$_POST['data'];            

            $queryExp=$conn->query("UPDATE projeto.experiencia e SET e.empresa='".$empresa."', e.cargo='".$cargo."', e.admissao='".$admissao."', e.demissao='".$demissao."' WHERE e.aluno_id=".$aluno_id." ");
            $queryForm=$conn->query("UPDATE projeto.formacao i SET i.instituicao='".$instituicao."', i.nivel='".$nivel."', i.inicio='".$inicio."', i.fim='".$fim."', i.curso_id=".$curso." WHERE i.aluno_id=".$aluno_id."");
            $queryCursoComp=$conn->query("UPDATE projeto.curso_complementar c SET c.curso='".$curso_com."', c.duracao=".$duracao.", c.data='".$data."' WHERE c.aluno_id=".$aluno_id."");
            $queryCurriculo=$conn->query("UPDATE projeto.curriculo c SET c.area_profissional='".$area_prof."', c.objetivo='".$objetivo."' WHERE c.aluno_id=".$aluno_id."");
            
            if($queryCurriculo==true && $queryCursoComp==true && $queryExp==true && $queryForm==true){
                echo 'Curriculo atualizado!';
            }
            else{
                echo "Houve um erro tente novamente";
            }
    }
}
}
else if($metodo==="GET"){

    $query=$conn->query("SELECT * FROM projeto.curriculo c WHERE c.aluno_id=".$aluno_id."");
    $curriculo_query=$query->fetchAll();
}