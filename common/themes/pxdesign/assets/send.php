<?php 

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$subject = 'Message from context.kg';
$message = "<html>" .
	   "<head>" .
	   '<meta charset="utf-8">' .
	   "<title>{$subject}</title>" .
	   "</head> ".
	   "<body> ".
	   "Сообщение от: <b>{$name}</b><br>" .
           "ip: <b>{$ip}</b><br>" . 
	   "email: <b>{$email}</b><br>" .
	   "Сообщение:<br><b>{$message}</b>" .
	   "</body> " .
	   "</html> ";

$to      = 'manager@pxdesign.ru';
   
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: webmaster@context.kg <webmaster@context.kg>' . "\r\n";   
	   

mail($to, $subject, $message, $headers);

die;