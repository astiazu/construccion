<?php
/**
* @version 1.0
*/

require("class.phpmailer.php");
require("class.smtp.php");

//echo "ingresando al formulario"."<br>,$POST["suscriber-mail"];

$name=$_POST['name'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];


// Valores enviados desde el formulario
if ( !isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["mensaje"]) ) {
      echo'<script type="text/javascript">
         alert("Es necesario completar todos los datos del mensaje.");
         window.location.href="http://www.neigygroup.com.ar";
      </script>';
}
   //$email = $_POST["suscriber-mail"];
   //$mensaje = $_POST["Suscripcion a la información nueva de la página web"];

   // Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2480282.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "ftp@c2480282.ferozo.com";  // Mi cuenta de correo
$smtpClave = "fero25riFO";  // Mi contraseña


// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@neigygroup.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $name;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

   //$mensaje=   "Nombre de/la interesado/a: ".$name."\n
   //         Direccion de Email: ".$email."\n
   //         Mensaje: ".$message."\n";

$mail->Subject = "Mensaje desde la página "; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);   
$mail->Body = "{$mensajeHtml} <br /><br />Formulario de ejemplo. By DonWeb<br />"; // Texto del email en formato HTML 
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
   // FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
   echo'<script type="text/javascript">
      alert("El correo fue enviado correctamente nuevo ftp.");
      window.location.href="http://www.neigygroup.com.ar";
      </script>';
} else {
   echo'<script type="text/javascript">
      alert("Ocurrio un error en el envío del correo del nuevo formulario. FTP");
      window.location.href="http://www.neigygroup.com.ar";
      </script>';
}
   //{$mensaje} \n\n Formulario de ejemplo By DonWeb
?>