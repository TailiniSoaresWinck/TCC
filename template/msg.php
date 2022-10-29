<?php
include_once('../config.php');

$msg = "";

if(isset($_SESSION["msg"])){

    $msg=$_SESSION["msg"];
    $status=$_SESSION["status"];

    $_SESSION["msg"]= "";
    $_SESSION["status"]="";
}
if($msg!=""):?>
<section id='msg'>
    <div  class="alert alert-<?=$status?>">
        <p><?=$msg?></p>
    </div>
</section>
    
<?php endif; ?>

<script>
    setTimeout(()=>{document.querySelector('#msg').innerHTML=''},3000);
</script>