<?php
include_once('../config.php');
include_once('../settings.php');

if(isset($_SESSION['empresa_id'])){
    unset($_SESSION['empresa_id']);
    header('Location:'.URL_VIEWS.'/login.php');
}
else if(isset($_SESSION['aluno_id'])){
    unset($_SESSION['aluno_id']);
    header('Location:'.URL_VIEWS.'/login.php');
}
else if(isset($_SESSION['admin_id'])){
    unset($_SESSION['admin_id']);
    header('Location:'.URL_VIEWS.'/loginAdmin.php');
}
else{
    header('Location:'.URL_VIEWS.'/login.php');
}
