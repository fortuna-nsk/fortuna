<?php

// Читаем настройки config
require_once($_SERVER['DOCUMENT_ROOT'].'/config_mail.php');

// Подключаем класс FreakMailer
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/MailClass.inc');

// инициализируем класс
$mailer = new FreakMailer();

// Устанавливаем тему письма
$mailer->Subject = 'Это тест';

// Задаем тело письма
$mailer->Body = 'Это тест моей почтовой системы!';

// Добавляем адрес в список получателей
$mailer->AddAddress('cemeh@ngs.ru', 'Eric Rosebrock');

if(!$mailer->Send())
{
  echo 'Не могу отослать письмо!';
}
else
{
  echo 'Письмо отослано!';
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();

?>