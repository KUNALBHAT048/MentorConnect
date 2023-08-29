<?php

session_start();

$host = "localhost";
$user="root";
$pass="";
$db ="mentorproject";

$data = mysqli_connect($host,$user,$pass,$db);

$name = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];
$phone = $_POST['phone'];
$email = $_POST['email'];
if ($usertype=='student')
$StudentID = $_POST['StudentID'];
else
$MentorID = $_POST['StudentID'];



if ($data===false)
{
    die("connection error");
}

if ($usertype == "mentor") {
    // Check if mentor already exists
    $sql = "SELECT * FROM `mentor_data` WHERE `StudentID`='$MentorID'";
    $result1 = mysqli_query($data, $sql);
    if (!$result1) {
      die("Error executing query: " . mysqli_error($data));
    }
    if (mysqli_num_rows($result1) == 0) {
       $message = "Permission Denied";
       $_SESSION['denialmessage'] = $message;
       header("location:register.php");
       exit();
       }
       else {
        $sql1 = "SELECT * FROM `mentor` WHERE `StudentID`='$MentorID'";
        $result2 =  mysqli_query($data, $sql1);

         if (!$result2) {
          die("Error executing query: " . mysqli_error($data));
         }
    
        if (mysqli_num_rows($result2) == 0){ 
        
         $sql = "INSERT INTO mentor ( `StudentID`,`name`, `phone`, `email`, `password`,`message`) VALUES ('$MentorID','$name', '$phone','$email', '$password','')";
        
        $sqltable = "CREATE TABLE `$MentorID` (`Sno.` INT NOT NULL AUTO_INCREMENT , `StudentID` VARCHAR(10) NOT NULL , `Studentname` VARCHAR(50) NOT NULL , `Topic` VARCHAR(50 ) NOT NULL ,
        `Message` VARCHAR(1000) NOT NULL , `REPLY` VARCHAR(1000) NOT NULL , `DATE` DATE NOT NULL , PRIMARY KEY (`Sno.`))";

        
        $result3 = mysqli_query($data,$sqltable);
        
        $message = "User registered succesfully";
        $_SESSION['registeration success'] = $message;
        header("location:login.php");
       } 
       else {
        $message = "User Already exists";
        $_SESSION['registeration unsuccess'] = $message;
        header("location:register.php");
        }
      }
    }
   else  if($usertype =="student"){
       $sql1 = "SELECT * FROM `student` WHERE `StudentID`='$StudentID'";
       $result2 =  mysqli_query($data, $sql1);

       if (!$result2) {
        die("Error executing query: " . mysqli_error($data));
       }
       if (mysqli_num_rows($result2) == 0){
       $sql ="INSERT INTO student  ( `StudentID`,`name`, `phone`, `email`, `password`,`message`) VALUES ('$StudentID','$name', '$phone','$email', '$password','')";    
       $message = "User registered succesfully";
       $_SESSION['registeration success'] = $message;
       header("location:login.php");
      }

       else {
        $message = "User Already exists";
        $_SESSION['registeration unsuccess'] = $message;
        header("location:register.php");
        exit();
        }
    }
    
    $result4=mysqli_query($data,$sql);









?>