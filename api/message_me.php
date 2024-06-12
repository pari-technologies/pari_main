<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
// require_once "../config/config.php";
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $i_company_name = $_POST["company_name"];
    $i_user_name = $_POST["user_name"];
    $i_phone_no = $_POST["phone_no"];
    $i_user_email = $_POST["user_email"];
     $i_message = $_POST["message"];
 
   
    //   $to = "helmi.hasman@gmail.com";
      $subject = "PARI - New message from ".$i_user_name;

      $message = 'New message from '.$i_user_name.'<br>
                  Company name - '.$i_company_name.'<br>    
                  Phone Number - '.$i_phone_no.'<br>
                  Email - '.$i_user_name.'<br>
                  Message - '.$i_message; 

    //   // Always set content-type when sending HTML email
    //   $headers = "MIME-Version: 1.0" . "\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //   // More headers
    //   $headers .= 'From: <info@painsboard.com>' . "\r\n";

    //   mail($to,$subject,$message,$headers);

    //   echo "<script>";
    //   echo "alert('Thank you for writing to us!');";
    //   echo "window.location = ' ../index.php'"; // redirect with javascript, after page loads
    //   echo "</script>";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->From = "contact@pari.com.my";
    $mail->FromName =  "Contact @ PARI";
    // $mail->SMTPDebug = 1;
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.pari.com.my";
    $mail->Port = 465; // or 587
    
    //Authentication
    $mail->Username = "contact@pari.com.my";
    $mail->Password = "QZb^@8Ut*q=o";

    
    // $mail->addAddress("info@painsboard.com", $i_name);
    $mail->addAddress("contact@pari.com.my");
    
    
    $mail->isHTML(true);
    
    $mail->Subject = $subject;
    $mail->Body = $message ;
    //$mail->AltBody = "This is the plain text version of the email content";
    
    try {
        $mail->send();
        // echo "Message has been sent successfully";

        echo "<script>";
      echo "alert('Thank you for writing to us! We will get back to you soon.');";
      echo "window.location = ' ../'"; // redirect with javascript, after page loads
      echo "</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

?>

