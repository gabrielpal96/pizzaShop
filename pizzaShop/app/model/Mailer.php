<?php
/**
 * Created by PhpStorm.
 * User: GreeN
 * Date: 5/6/2018
 * Time: 20:55
 */
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/Exception.php');
	require_once('PHPMailer/src/SMTP.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer
{
    public function sendMail($email, $subject, $message )
    {
        $mail = new PHPMailer(true);

        $mail->IsSMTP();

        $mail->SMTPDebug = 0;

        $mail->SMTPAuth = true;

        $mail->SMTPSecure = "tsl";

        $mail->Host = gethostbyname('tls://smtp.gmail.com');

        $mail->Port = 587;

        $mail->AddAddress($email);

        $mail->Username = 'pizzashopnbu@gmail.com';

        $mail->Password = 'pizzashopnbu2';

        $mail->SetFrom( $mail->Username, 'TEST');

        $mail->AddReplyTo( $mail->Username);

        $mail->Subject = $subject;

        $mail->MsgHTML($message);

        $mail->send();
    }
}