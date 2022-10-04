<?php
include_once('../config.php');


if(isset($_SESSION['empresa_id'])){
    unset($_SESSION['empresa_id']);
    header('Location:../views/login.php');
}
else if(isset($_SESSION['aluno_id'])){
    unset($_SESSION['aluno_id']);
    header('Location:../views/login.php');
}
else{
    header('Location:../views/login.php');
}
?>

