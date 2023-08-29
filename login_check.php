<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "mentorproject";

$usertype = $_POST['usertype'];
$password = $_POST['password'];

if ($usertype == 'student')
    $StudentID = $_POST['StudentID'];
else
    $MentorID = $_POST['StudentID'];

$data = mysqli_connect($host, $user, $pass, $db);

if ($data === false) {
    die("connection error");
}

if (!isset($_POST['captcha']) || empty($_POST['captcha'])) {
    $message = "Enter the Captcha";
    $_SESSION['loginMessage'] = $message;
    header("location:login.php");
    exit;
}



if ($_SESSION['CAPTCHA_CODE'] !== $_POST['captcha']) {
    $message = "Invalid Captcha Code ";
    $_SESSION['loginMessage'] = $message;
    header("location:login.php");
    exit;
}

if ($usertype == 'student') {
    $sql = "SELECT * FROM `student` WHERE `StudentID`='$StudentID'  AND `password` ='$password'";
} else {
    $sql = "SELECT * FROM `mentor` WHERE `StudentID`='$MentorID'  AND `password` ='$password'";
}

$result = mysqli_query($data, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['password'] = $password;
    $_SESSION['usertype'] = $usertype;
    if ($usertype == "student") {
        $_SESSION['StudentID'] = $StudentID;
        $_SESSION['usertype'] = "student";
        header("location:studenthome.php");
    } else if ($usertype == "mentor") {
        $_SESSION['MentorID'] = $MentorID;
        $_SESSION['usertype'] = "mentor";
        header("location:mentorhome.php");
    }
} else {
    $message = "StudentID or password do not match";
    $_SESSION['loginMessage'] = $message;
    header("location:login.php");
}

?>
