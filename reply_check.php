<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$host = "localhost";
$user = "root";
$pass = "";
$db = "mentorproject";



$Reply = $_POST['reply'];
$MentorID  = $_SESSION['MentorID'];
$StudentID = $_SESSION['StudentID'];
$Message = $_SESSION['Message'];
$Sno = $_SESSION['Sno'];
$date = date("y-m-d");

$tableName = strtolower($MentorID);

$data = mysqli_connect($host, $user, $pass, $db);


$result0 = mysqli_query($data,"SELECT * FROM `student` WHERE `StudentID`= '$StudentID'");
$row = mysqli_fetch_assoc($result0);
$studentemail= $row['email'];


$MentorID = strtolower($MentorID);
$sql2 = "SELECT * FROM `$MentorID` WHERE  ";
$result = mysqli_query($data, $sql2);



if ($data === false) {
    die("connection error");
}

$tableName = strtolower($MentorID);

$sql1 = "UPDATE  `messagetable` SET `REPLY` = '$Reply' , `DATE` = '$date' WHERE `Message` = '$Message' AND `StudentID` = '$StudentID'";


$result1 = mysqli_query($data, $sql1);



$sql2 = "DELETE FROM `$tableName`  WHERE `Message` = '$Message' AND `StudentID` = '$StudentID'";
$result2 = mysqli_query($data, $sql2);


if ($result1 == 1 && $result2 == 1) {
   


   //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mentorconnectproject@gmail.com';                     //SMTP username
    $mail->Password   = 'ecgfwkqqwqnevptb';                                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mentorconnectproject@gmail.com', 'Mentorproject');
    $mail->addAddress($studentemail, 'MENTOR WEBSITE');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'reply to' . $Topic;
    $mail->Body    = 'You got a reply of your query by the mentor..login below to check...!
                      <br><a href ="index.php">MentorConnect</a>';

    $mail->send();
    $rep = "Reply sent successfully";
    $_SESSION['rep'] = $rep;
    header("location:mentorhome.php");


}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else {
    $rep = "There is some error ";
    $_SESSION['rep'] = $rep;
    header("location:mentorhome.php");
}
