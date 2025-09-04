<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require '../vendor/autoload.php';

class MailerController {

	private $layout;

	public function __construct($layout) {
		$this->layout = $layout;
	}

	public function emailForm() {
		$template = 'emailForm.php';
		$data = '';

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->Debugoutput = 'error_log';

			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth = true;                                   //Enable SMTP authentication
			$mail->Username = 'myname@gmail.com';                     //SMTP username
			$mail->Password = 'pass from the App passwords';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('myname@gmail.com', 'Xyu');
			$mail->addAddress('myname@gmail.com', 'Xyu');     //Add a recipient
			//$mail->addAddress('ellen@example.com');               //Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			$data = 'Message has been sent';
		} catch (Exception $e) {
			$data = "<b>Message could not be sent. Mailer Error:</b><br/>{$mail->ErrorInfo}";
		}

		return $this->layout->getContent($template, $data);
	}
}