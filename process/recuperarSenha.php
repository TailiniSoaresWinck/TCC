<?php
include_once('../config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
include_once('../settings.php');
include_once('../vendor/autoload.php');

if(!isset($_POST['email']) && !isset($_POST['usuario']) && !isset($_POST['env']) && $_POST['env']== 'form_rec_senha'){
    header('Location: '.URL_VIEWS.'/recuperarSenha.php');
    exit();
}


$usuario = $_POST['usuario'];
$email = $_POST['email'];

if($usuario == 'aluno'){
    $sql = $conn->query("SELECT * FROM projeto.aluno WHERE email = '$email'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($row>0){
        $senha = rand(10000, 99999);
        $sql=$conn->query("UPDATE projeto.aluno SET senha='".md5($senha)."' WHERE email='$email'");
        $sql->execute();
        if($sql==true){
            $mail = new PHPMailer(true);
            $assunto="Nova senha - Pratika CIMOL";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $mensagem = '<html><head>';
            $mensagem="
            <h2>Você solicitou uma nova senha?</h2>
            <hr>
            <p>Se sim, aqui está sua nova senha:<p>
            <p>Senha: '".$senha."'</p>
            </hr>
            </head></html>";

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'pratikacimol@gmail.com';                     //SMTP username
                $mail->Password   = 'knsrjmmwrpumsmop';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('pratikacimol@gmail.com');
                $mail->addAddress($email);     //Add a recipient
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "$assunto";
                $mail->Body    ="$mensagem";
                
                if($mail->send()){
                    $_SESSION['msg'] = 'Sua nova senha foi enviada para o seu email!';
                    $_SESSION['status'] = 'success';
                    header('Location: '.URL_VIEWS.'/login.php');
                }else{
                    $_SESSION['msg'] = 'Erro ao enviar nova senha para o seu email!';
                    $_SESSION['status'] = 'warning';
                    header('Location: '.URL_VIEWS.'/recuperarSenha.php');
                }
            } catch (Exception $e) {
                $_SESSION['msg'] = 'Erro ao enviar email: {$mail->ErrorInfo}';
                $_SESSION['status'] = 'warning';
                header('Location: '.URL_VIEWS.'/recuperarSenha.php');
            }
        }
    }else{
        $_SESSION['msg'] = 'Email inválido!';
        $_SESSION['status'] = 'warning';
        header('Location: '.URL_VIEWS.'/recuperarSenha.php');
    }
}
else if($usuario == 'empresa'){
    $sql = $conn->query("SELECT * FROM projeto.empresa WHERE email = '$email'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($row>0){
        $senha = rand(100000, 999999);
        $sql=$conn->query("UPDATE projeto.aluno SET senha='".md5($senha)."' WHERE email='$email'");
        $sql->execute();
        if($sql==true){
            $mail = new PHPMailer(true);
            $assunto="Nova senha - Pratika CIMOL";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $mensagem = '<html><head>';
            $mensagem="
            <h2>Você solicitou uma nova senha?</h2>
            <hr>
            <p>Se sim, aqui está sua nova senha:<p>
            <p>Senha: '".$senha."'</p>
            </hr>
            </head></html>";

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'pratikacimol@gmail.com';                     //SMTP username
                $mail->Password   = 'knsrjmmwrpumsmop';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('pratikacimol@gmail.com');
                $mail->addAddress($email);     //Add a recipient
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "$assunto";
                $mail->Body    ="$mensagem";
                
                if($mail->send()){
                    $_SESSION['msg'] = 'Sua nova senha foi enviada para o seu email!';
                    $_SESSION['status'] = 'success';
                    header('Location: '.URL_VIEWS.'/login.php');
                }else{
                    $_SESSION['msg'] = 'Erro ao enviar nova senha para o seu email!';
                    $_SESSION['status'] = 'warning';
                    header('Location: '.URL_VIEWS.'/recuperarSenha.php');
                }
            } catch (Exception $e) {
                $_SESSION['msg'] = 'Erro ao enviar email: {$mail->ErrorInfo}';
                $_SESSION['status'] = 'warning';
                header('Location: '.URL_VIEWS.'/recuperarSenha.php');
            }
        }
    }else{
        $_SESSION['msg'] = 'Email inválido!';
        $_SESSION['status'] = 'warning';
        header('Location: '.URL_VIEWS.'/recuperarSenha.php');
    }
}
elseif($usuario == 'administrador'){
    $sql = $conn->query("SELECT * FROM projeto.administrador WHERE email = '$email'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($row>0){
        $senha = rand(100000, 999999);
        $sql=$conn->query("UPDATE projeto.aluno SET senha='".md5($senha)."' WHERE email='$email'");
        $sql->execute();
        if($sql==true){
            $mail = new PHPMailer(true);
            $assunto="Nova senha - Pratika CIMOL";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $mensagem = '<html><head>';
            $mensagem="
            <h2>Você solicitou uma nova senha?</h2>
            <hr>
            <p>Se sim, aqui está sua nova senha:<p>
            <p>Senha: '".$senha."'</p>
            </hr>
            </head></html>";

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'pratikacimol@gmail.com';                     //SMTP username
                $mail->Password   = 'knsrjmmwrpumsmop';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('pratikacimol@gmail.com');
                $mail->addAddress($email);     //Add a recipient
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "$assunto";
                $mail->Body    ="$mensagem";
                
                if($mail->send()){
                    $_SESSION['msg'] = 'Sua nova senha foi enviada para o seu email!';
                    $_SESSION['status'] = 'success';
                    header('Location: '.URL_VIEWS.'/login.php');
                }else{
                    $_SESSION['msg'] = 'Erro ao enviar nova senha para o seu email!';
                    $_SESSION['status'] = 'warning';
                    header('Location: '.URL_VIEWS.'/recuperarSenha.php');
                }
            } catch (Exception $e) {
                $_SESSION['msg'] = 'Erro ao enviar email: {$mail->ErrorInfo}';
                $_SESSION['status'] = 'warning';
                header('Location: '.URL_VIEWS.'/recuperarSenha.php');
            }
        }
    }
    else{
        $_SESSION['msg'] = 'Email inválido!';
        $_SESSION['status'] = 'warning';
        header('Location: '.URL_VIEWS.'/recuperarSenha.php');
    }
}