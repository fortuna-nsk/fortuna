<?php
function smtpmail($to, $subject, $content, $attach=false){

    require_once('config.php'); //путь до конфигурационного файла для вашего smtp сервера
    require_once('PHPMailer/class.phpmailer.php'); //путь до класса phpmailer
    $mail = new PHPMailer(true);
     
    $mail->IsSMTP();
    try {
          $mail->Host       = $__smtp['host'];
          $mail->SMTPDebug  = $__smtp['debug'];
          $mail->SMTPAuth   = $__smtp['auth'];
          $mail->Port       = $__smtp['port'];
          $mail->Username   = $__smtp['username'];
          $mail->Password   = $__smtp['password'];
          $mail->AddReplyTo($__smtp['addreply'], $__smtp['username']);
          $mail->AddAddress($to);                //кому письмо
          $mail->SetFrom($__smtp['addreply'], $__smtp['username']); //от кого (желательно указывать свой реальный e-mail на используемом SMTP сервере
          $mail->AddReplyTo($__smtp['addreply'], $__smtp['username']);
          $mail->Subject = htmlspecialchars($subject);
          $mail->MsgHTML($content);
          if($attach)  $mail->AddAttachment($attach);
          $mail->Send();
          echo "Message sent Ok!</p>\n";
        } catch (phpmailerException $e) {
          echo $e->errorMessage();
        } catch (Exception $e) {
          echo $e->getMessage();
        }
}



smtpmail('cemeh@ngs.ru','123','123456');
?>