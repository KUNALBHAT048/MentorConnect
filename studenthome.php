<?php

session_start();

if (!isset($_SESSION['StudentID'])) {
  header("location:login.php");
} elseif ($_SESSION['usertype'] == 'mentor') {
  header("location:login.php");
}


$host = "localhost";
$user = "root";
$pass = "";
$db = "mentorproject";
$data = mysqli_connect($host, $user, $pass, $db);

$result = mysqli_query($data, "SELECT * FROM mentor");

$StudentID  = $_SESSION['StudentID'];
$StudentData = "SELECT * FROM `student` WHERE `StudentID`='$StudentID' ";
$values = mysqli_query($data,$StudentData);
while ($row = mysqli_fetch_assoc($values)) {
  $name = $row['name'];
  $password = $row['password'];
  $mobile = $row['phone'];
  $email = $row['email'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check the value of the "modalId" field

  if ($_POST["modalId"] == "1" && $_POST["password"]==$password ) {
    
    if($name != $_POST["name"])
    {
      $name = $_POST["name"];
      $UpdateData = "UPDATE `student` SET `name` = '$name' WHERE `StudentID` = '$StudentID' ";
      $values = mysqli_query($data,$UpdateData);
    }
    elseif($mobile != $_POST["mobile"])
    {
      $mobile = $_POST["mobile"];
      $UpdateData = "UPDATE `student` SET `phone` = '$mobile' WHERE `StudentID` = '$StudentID' ";
      $values = mysqli_query($data,$UpdateData);
    }
    elseif($email != $_POST["email"])
    {
      $email = $_POST["email"];
      $UpdateData = "UPDATE `student` SET `email` = '$email' WHERE `StudentID` = '$StudentID' ";
      $values = mysqli_query($data,$UpdateData);
    }


  } 
  elseif ($_POST["modalId"] == "2" && $_POST["password"]==$password ) {
    
    if($_POST["newpassword"]!=$_POST["verifypassword"] )
    {
       echo "new password and verify password should be same";
    }
    else if($_POST["newpassword"]==$password )
    {
      echo "samepassword";
    }
    else if ($_POST["newpassword"]==$_POST["verifypassword"] )
    {
      $password = $_POST["newpassword"];
      $UpdateData = "UPDATE `student` SET `password` = '$password' WHERE `StudentID` = '$StudentID' ";
      $values = mysqli_query($data,$UpdateData);
    }
}
else 
echo "wrong password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style2.css">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Optional theme -->
  <style>
  </style>

</head>

<body>
  <header class="header">
    <div><a href="studenthome.php" class="btn">Student Dashboard</a></div>
    <div class="logout">
      <a href="logout.php" class="btn">Logout</a>
    </div>
    <div><a href="recent.php" class="btn">Recent Queries</a></div>
    <div><a href="discussionforum.php" class="btn">Forum</a></div>
    <div>
      <a class="btn" data-bs-toggle="modal" data-bs-target="#UpdateModalpass">Setting</a>
    </div>
  </header>
  <?php
   include 'partials/setting.php';
   ?>


  <center>

    <h1 style="color: green;">
      <?php
      error_reporting(0);
      echo $_SESSION['mess'];
      unset($_SESSION['mess']);
      ?>

    </h1>
    <div class="table-responsive" style="margin: auto;">
      <table style="width:50%;" class="table align-middle table-striped table-hover table-bordered  ">
        <thead class="table-dark">
          <tr>
            <th scope="col">Sno.</th>
            <th scope="col">StudentID</th>
            <th scope="col">Mentor Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sl = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sl++;
          ?>
            <tr>
              <td><?php echo $sl ?></td>
              <td><?php echo $row['StudentID']; ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><button type="button" class="btn btn-dark"><a style="color:white" href="message.php?StudentID=<?php echo $row['StudentID'] ?>&name=<?php echo $row['name'] ?>">Message</a>
                </button></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Latest compiled and minified JavaScript -->
</body>

</html>