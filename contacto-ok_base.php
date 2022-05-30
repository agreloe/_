<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$submit = $_POST['submit'];

if ($_POST['submit']) {
			
	if (preg_match("@(http://|https://|ftp://|mailto:|smb://|afp://|file://|gopher://|news://|ssl://|sslv2://|sslv3://|tls://|tcp://|udp://)+@se", $mensaje) || preg_match("@(www\.[a-zA-Z0-9\@:%_+*~#?&=.,/;-]*[a-zA-Z0-9\@:%_+~#\&=/;-])+@se", $mensaje))
	{
		// Hay enlaces en el mensaje
		echo "<script language='javascript'>
		alert('No tiene permisos para enviar enlaces.\\nEsta es una medida anti-spam.');
		window.location.href = 'http://www.derigoargentina.com.ar/contacto.html';
		</script>";
	}else{
		// No hay enlaces en el mensaje
		//$to = 'info@derigoargentina.com.ar';
		$to = 'herpr22@gmail.com';
		$subject = 'Contacto Web DE RIGO';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: ' . $nombre . ' <' . $email . '>' . "\r\n";			
		$message = '<html><body>';
		$message .= '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif;"><tbody>';
		$message .= '<tr  style="background-color:#fff">        
						<td width="17" style="padding-top:15px;"></td>        
						<td width="131" style="padding-top:15px;"><img src="http://www.derigoargentina.com.ar/img/logo-mail.png" width="210" height="53" border="0"></a></td>
						<td style="padding-top:15px;"></td>
					</tr>';			
		$message .= '<tr>
						<td colspan="3" style="border-bottom:1px solid #ccc;">&nbsp;</td>
					</tr>';
		$message .= '<tr>
						<td colspan="3" style="padding:20px 20px 10px 20px;font-size:14px;color:#3d4292;line-height:18px;">
						<p><strong>NOMBRE: </strong>' . $nombre . '</p>
						<p><strong>EMAIL: </strong>' . $email . '</p>
						<p><strong>ASUNTO: </strong>' . $asunto . '</p>
						<p><strong>MENSAJE: </strong>' . $mensaje . '</p>
						</td>
					</tr>';
		$message .= '</tbody></table>';
		$message .= '</body></html>';
		if (mail($to, $subject, $message, $headers)) {
			// Se envia
			echo "<script language='javascript'>
			alert('Gracias por contactarnos!\\nNos comunicaremos con usted a la brevedad.');
			window.location.href = 'http://www.derigoargentina.com.ar/contacto.html';
			</script>";
		} else {
			//No se envia
			echo "<script language='javascript'>
			alert('Falló el envio del mensaje, intentelo nuevamente.');
			window.location.href = 'http://www.derigoargentina.com.ar/contacto.html';
			</script>";
		}
	}
	
}
?>