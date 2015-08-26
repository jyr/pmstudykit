<?php 
include_once('PHPMailer/class.phpmailer.php');
include("PHPMailer/class.smtp.php");
class UtilsFunctions{
	
	// found at http://www.denbag.us/2013/09/perfect-php-email-regex.html
	public static function validEMail($email) {
		$regex = '/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i';
		return preg_match($regex, $email);
	}
	
	public static function destroySession(){
		$id = Yii::app()->session['id'];
		unset(Yii::app()->session['userid']); # Remove the session
		unset(Yii::app()->session['token']); # Remove the session
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		UsersDao::cleanAuthTokenForUserWithId($id);
		Yii::app()->runController('site/login');
		//$this->redirect('index.php?r=site/login');
	}
	
	public static function createAuthToken($username) {
		return md5("pmstudy".$username."toolkit". time());
	}
	
	public static function cleanAuthTokenForUserWithId($id){
		$command2 = Yii::app()->db->createCommand();
		$command2->update('users', array( 'authToken'=>''), 'idusers=:id', array(':id'=>$id));
	}
	
	public static function sendMail($to,$subject,$headMessage,$urlActivacion,$footerMessage){
		try{
			$mail = new PHPMailer;
	
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'md-66.webhostbox.net';//;smtp2.example.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = Constants::ADMIN_EMAILS_FROM;                 // SMTP username
			$mail->Password = 'qwaszx..';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
			//	$mail->SMTPDebug = 1;
			$mail->Port = 465;
	
			$mail->From = Constants::ADMIN_EMAILS_FROM;
			$mail->FromName = utf8_decode('PM-STUDY-KIT');
			$mail->addAddress($to, '');     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('ogascon@iasanet.com.mx');
			 $mail->addBCC('pmstudykit@gmail.com');
			//$mail->addBCC('jperez@iasanet.com.mx');
	
			//$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML
	
			//$mail->AltBody = 'Favor de activa tu cuenta con el siguiente enlace ';
			//$mail¬≠->CharSet = "UTF¬≠8";
			//$mail¬≠->Encoding = "quoted¬≠printable";
			$mail->Subject = utf8_decode('Activación pmstudykit.com');
			$mail->Body    = "<!doctype html>
			     <html>
			      <head>
			         <meta name='viewport' content='width=device-width, initial-scale=1.0'>
			      </head>
			      <body>
			        <div id='section1'>
			          <div style='font-family:verdana;font-size:12px;color:#555555;line-height:14pt'>
			              <div style='width:590px'>
			                <div style='background:url(http://pmstudykit.com/resources/topMail.png) no-repeat;width:100%;min-height:75px;display:block'>
			                  <div style='background-repeat-y:no-repeat;background-size:contain;margin: 0px 14px 0px 16px;background-size:contain;overflow:hidden;background:#357ca5;min-height:75px;  line-height: 68px;font-size: 29px;text-align: left;padding-left: 22px;color:#fff'>
								PM STUDY-KIT
			                  <!--<a href='http://www.nyce.org.mx/' target='_blank'>
			                    <img src='http://pmstudykit.com/kitsgdp/images/nyce_logo.png' alt='nyce' style='border: none;
padding: 1em;' target=_blank></a>-->
	
								<!--<a href='http://www.nyce.org.mx/' target='_blank'>
				                    <img src='http://www.nyce.org.mx/templates/theme_full/images/header-object.png' alt='nyce' style='border: none;
padding: 1.5em;
float: right;' target=_blank>
								</a>-->
			                  </div>
			                </div>
		
			                <div style='background:url(http://pmstudykit.com/resources/contentMail.png) repeat-y;width:100%;display:block'>
			                  <div style='padding-left:50px;padding-right:50px;padding-bottom:1px'>
			                  <div style='border-bottom:1px solid #ededed'>
			                  </div>
			                  <div style='margin:20px 0px;font-size:20px;line-height:30px'>
			                   ".$subject."
				                   </div>
				                   <div style='margin-bottom:30px'>
				                   <div>
				                   $headMessage
				                   </div>
				                   <br>
				                   <div style='margin-bottom:20px'>
				                   <b>$urlActivacion<br></b>
				                   $footerMessage
				                   </div>
				                   </div>
				                   <div>
				                   <span></span>
				                   <div style='border-bottom:1px solid #ededed'>
				                   </div>
				                   </div>
				                   	
				                   <div style='margin:20px 0'>
				                   <a href='http://pmstudykit.com/'>http://pmstudykit.com/</a>
				                   </div>
				                   <div style='margin:10px 5px;display:inline-block'></div>
				                   	
				                   <div style='border-bottom:1px solid #ededed'></div>
				                    
				                   	
				                   <div style='font-size:9px;color:#707070'>
				                   <br>No respondas a este mensaje.<br>
				                   </div></div></div><div class='yj6qo'></div>
				                   <div style='background:url(http://pmstudykit.com/resources/footerMail.png) no-repeat;width:100%;min-height:50px;display:block' class='adL'></div></div>
				                   </div>
				                   </div>
				                   </body>
				                   	</html>";
	
				                   	if(!$mail->send()) {
				                   	//echo 'Message could not be sent.';
				                   	//echo 'Mailer Error: ' . $mail->ErrorInfo;
				return false;
			} else {
				//echo 'Message has been sent';
				return true;
			}
			} catch (phpmailerException $e) {
				echo $e->errorMessage(); //error messages from PHPMailer
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
}
?>
