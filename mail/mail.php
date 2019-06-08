<?php
ini_set('display_errors',1);
require("PHPMailer/class.phpmailer.php");
require("PHPMailer/class.smtp.php");
header("Content-Type: text/html;charset=utf-8");
//https://www.google.com/settings/security/lesssecureapps
//http://phpmailer.worxware.com/
function sendgmail($name, $email, $phone, $message)
{
	$mail = new PHPMailer() ;
	
	$body = "
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	</head>
	<table style='max-width: 800px; padding: 10px; margin:0 auto; border-collapse: collapse; '>


	<tr>
		<td style='background-color: #a25983; height: 30px; padding: 20px; font-family: Arial;'><b style='color: white;'>¡Estimada(o)!</b></td>
	</tr>
	<tr>
		<td>
			<div style='color: #34495e; margin: 4% 3% 2%; text-align: justify;font-family: sans-serif'>
				<h2 style='color: #784b65; margin: 0 0 8px'>&#161;Tienes una nueva consulta!</h2>
				<p style='margin: 2px; font-size: 15px'>
					<h3 style='color: #784b65; margin: 0 0 8px'>Datos de contacto de quién envía la consulta:</h3>
					Nombre: <b>".$name."</b><br>
					Correo: <b>".$email."</b><br>
					Teléfono de contacto: <b>".$phone."</b><br><br>
					Mensaje: <br><b>".$message."</b><br><br>
				<div style='width: 100%; text-align: center'>
					<p><br>
				</div>
				<p style='color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0'></p>
			</div>
		</td>
	</tr>
	<tr>
		<td style='background-color: #a25983; height: 30px; padding: 20px; font-family: Arial;'><b style='color: white;'></b></td>
	</tr>

	</table>	
";
				 				 
		$body .= "";

		$mail->IsSMTP(); 

		//Sustituye (ServidorDeCorreoSMTP)  por el host de tu servidor de correo SMTP
 		$mail->Host = "smtp.gmail.com";		
		$mail->Port       = 465;  
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl"; 
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		
		//Sustituye  ( CuentaDeEnvio )  por la cuenta desde la que deseas enviar por ejem. prueba@domitienda.com  
		$mail->From     = "webtestingluis@gmail.com";
		$mail->FromName = "noreply";
		$mail->Subject  = "Nueva consulta";
		$mail->AltBody  = "Leer"; 
		$mail->MsgHTML($body);

		// Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. usuario@destino.com  
		$mail->AddAddress($email,'');
		$mail->SMTPAuth = true;

		// Sustituye (CuentaDeEnvio )  por la misma cuenta que usaste en la parte superior en este caso  prueba@midominio.com  y sustituye (ContraseñaDeEnvio)  por la contraseña que tenga dicha cuenta 
		$mail->Username = "webtestingluis@gmail.com";
		$mail->Password = "testingluis2341"; 
		if($mail->Send())
		{			
			return $body;
			return true;
			echo true;
		}else
		{
			echo false;
			return false;
			die();
		}
	}



$html = sendgmail($name, $email, $phone, $message);

