<?php
 session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "mentorproject";
$data = mysqli_connect($host, $user, $pass, $db);

$StudentID = $_SESSION['StudentID'];

$result = mysqli_query($data, "select * from messagetable WHERE `StudentID` = '$StudentID'");

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Document</title>

  <style>
    body {
      background-color: #181D31;
      text-decoration: none;
    }

    h1,p,h2   {color: #678983;}

    #heading {
      text-decoration: none;
      color: #F4EEE0;
      font-size: 2rem;
    }
    a{
      text-decoration: none;
    }

    table,
    th,
    td {
      color: white !important;
    }

    .header {
      line-height: 70px;
      padding-left: 30px;
      margin-bottom: 100px;
      color: white;
      text-decoration: none;
    }
    .header  div{
      display:inline-block;
      margin-right: 3%;
    }
    .header a {
  background-color: #7DB9B6;
}
 .logout {
      float: right;
      padding-right: 30px;
    }
  </style>

</head>
<body>
<header class="header">
    <div><a  href="studenthome.php" class="btn">Student Dashboard</a></div>
    <div class="logout">
      <a href="logout.php" class="btn">Logout</a>
    </div>
    <div><a href="recent.php" class="btn">Recent Queries</a>
  </div>
  </header>

  <center>

<h1 style="color: green;">
  <?php
  error_reporting(0);
  echo $_SESSION['mess'];
  ?>

</h1>
<div class="table-responsive" style="margin: auto;">
  <table style="width:50%;" class="table align-middle table-striped table-hover table-bordered  ">
    <thead class="table-dark">
      <tr>
      <th scope="col">Sno.</th>
            <th scope="col">MentorID</th>
            <th scope="col">StudentID</th>
            <th scope="col">Message</th>
            <th scope="col">REPLY</th>
            <th scope="col">DATE</th>
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
          <td><?php echo $row['MentorID']; ?></td>
          <td><?php echo $row['StudentID']; ?></td>
          <td><?php echo $row['Message']; ?></td>
          <td><?php echo $row['REPLY']; ?></td>
          <td><?php echo $row['DATE']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</center>
</body>
</html>