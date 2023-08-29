<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$host = "localhost";
$user = "root";
$pass = "";
$db = "mentorproject";

$Topic = $_POST['topic'];
$Message = $_POST['message'];
$MentorID = $_SESSION['Mentor_ID'];
$StudentID = $_SESSION['StudentID'];
$date = date("y-m-d");

$data = mysqli_connect($host, $user, $pass, $db);

$result0 = mysqli_query($data,"SELECT * FROM `student` WHERE `StudentID`= '$StudentID'");
$row = mysqli_fetch_assoc($result0);
$name = $row['name'];

$resul = mysqli_query($data,"SELECT * FROM `mentor` WHERE `StudentID`= '$MentorID'");
$row = mysqli_fetch_assoc($resul);
$mentoremail = $row['email'];



if ($data === false) {
    die("connection error");
}

$sql1 = "INSERT INTO `messagetable` (`MentorID`, `StudentID`, `Message`, `REPLY`, `DATE`) 
         VALUES ('$MentorID', '$StudentID', '$Message', 'You will get the reply soon😊', '$date')";
$result1 = mysqli_query($data, $sql1);

$tableName = strtolower($MentorID);

$sql2 = "INSERT INTO `$tableName` (`Sno.`, `StudentID`, `Studentname`, `Topic`, `Message`,`REPLY`,`DATE`) 
         VALUES ('', '$StudentID', '$name', '$Topic', '$Message','You will get the reply soon😊' , '$date')";
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
    $mail->addAddress($mentoremail, 'MENTOR WEBSITE');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $Topic;
    $mail->Body    = 'You have a new message from a student..login below to check...!
                      <br><a href ="index.php">MentorConnect</a>';

    $mail->send();
    $mess = "Message sent successfully";
    $_SESSION['mess'] = $mess;
    header("location:studenthome.php");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
   
} else {
    $mess = "There is some error ";
    $_SESSION['mess'] = $mess;
    header("location:studenthome.php");
}
