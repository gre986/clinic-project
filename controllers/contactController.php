<?php
session_start();

class contact extends Controller
{
	public function index()
	{
		$this->getView('headerView');

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [];
			// the form has fields for name, email, and message
		    $name = stripslashes(trim($_POST["fullname"]));
		    $email = stripslashes(trim($_POST["email"]));
		    $subject = stripslashes(trim($_POST['subject']));
		    $message = stripslashes(trim($_POST["message"]));
		    array_push($data, $name, $email, $subject, $message);

		    // the fields name, email, and message are required
		    if ($name == "" OR $email == "" OR $subject == "" OR $message == "") {
		        $error_message = "You must specify a value for name, email address, subject, and message.";
		    }

		    // this code checks for malicious code attempting
		    // to inject values into the email header
		    if (!isset($error_message)) {
		        foreach( $_POST as $value ){
		            if( stripos($value,'Content-Type:') !== FALSE ){
		                $error_message = "There was a problem with the information you entered.";
		            }
		        }
		    }

		    // the field named address is used as a spam honeypot
		    // it is hidden from users, and it must be left blank
		    if (!isset($error_message) && $_POST["address"] != "") {
		        $error_message = "Your form submission has an error.";
		    }

		    require_once '../app/vendors/phpmailer/class.phpmailer.php';
		    $mail = new PHPMailer();

		    if (!isset($error_message) && !$mail->ValidateAddress($email)){
		        $error_message = "You must specify a valid email address.";
		    }

		    // if, after all the checks above, there is no message, then we
		    // have a valid form submission; let's send the email
		    if (!isset($error_message)) {
		        $email_body = "";
		        $email_body = $email_body . "Name: " . $name . "<br>";
		        $email_body = $email_body . "Email: " . $email . "<br>";
		        $email_body = $email_body . "Message: " . $message;

		        $mail->SetFrom($email, $name);
		        $address = "yuanbo0109@gmail.com";
		        $mail->AddAddress($address, "Smart Clinic");
		        $mail->Subject = "Smart Clinic Form Submission | " . $name;
		        $mail->MsgHTML($email_body); 

		        // if the email is sent successfully, redirect to a thank you page;
		        // otherwise, set a new error message
		        if($mail->Send()) {
		        	$this->getView('contact/successView');
		        } else {
		        	$error_message = "There was a problem sending the email: " . $mail->ErrorInfo;
		        	array_push($data, $error_message);
		        	$this->getView('contact/indexView', $data);
		        }

		    }else {
		    	array_push($data, $error_message);
		    	$this->getView('contact/indexView', $data);
		    }
		}else {
			$this->getView('contact/indexView');
		}
		$this->getView('footerView');
	}
}