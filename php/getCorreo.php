<?php
/**
* @version 1.0
*/

require("class.phpmailer.php");
require("class.smtp.php");

//echo "ingresando al formulario"."<br>,$POST["suscriber-mail"];
echo "Tipo" + 'type'; 

$name=$_POST['name'];
$email=$_POST['email'];
$quote_message=$_POST['message'];


// Valores enviados desde el formulario
if ( !isset($_POST["name"]) ) {
    echo("Es necesario completar todos los datos del formulario");
}
   //$email = $_POST["suscriber-mail"];
   //$mensaje = $_POST["Suscripcion a la información nueva de la página web"];

   // Datos de la cuenta de correo utilizada para enviar vía SMTP
   $smtpHost = "c2480282.ferozo.com";  // Dominio alternativo brindado en el email de alta 
   $smtpUsuario = "osolo1966@gmail.com";  // Mi cuenta de correo
   $smtpClave = "Clavero22";  // Mi contraseña


   // Email donde se enviaran los datos cargados en el formulario de contacto
   $emailDestino = "info@c2480282.ferozo.com";

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
   //$mail->FromName = $nombre;//
   $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

   $mensaje=   "Nombre de/la interesado/a: ".$name."\n
            Direccion de Email: ".$email."\n
            Mensaje: ".$message."\n";

   $mail->Subject = "Mensaje desde la página ".$name; // Este es el titulo del email.
   $mensajeHtml = nl2br($mensaje);   
   $mail->Body = $mensaje; // Texto del email en formato 
   $mail->AltBody = "";
   // FIN - VALORES A MODIFICAR //

   $estadoEnvio = $mail->Send(); 
   if($estadoEnvio){
      echo'<script type="text/javascript">
        alert("El correo fue enviado correctamente.");
        window.location.href="http://www.neigygroup.com.ar";
        </script>';
        
   } else {
      echo'<script type="text/javascript">
        alert("Ocurrio un erro en el envío del correo del nuevo formulario.");
        window.location.href="http://www.neigygroup.com.ar";
        </script>';
      
   }
   //{$mensaje} \n\n Formulario de ejemplo By DonWeb
?>