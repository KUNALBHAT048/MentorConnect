<?php
session_start();
  if ($_SESSION['usertype'] != 'mentor' && $_SESSION['usertype'] != 'student' ) {
  header("location:login.php");
}
?>





<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
 #ques {
min-height: 433px ;
 }
 body{
 background-color: #0c1022;
 }
</style>

</head>

<body style= text-light">
  <?php include 'partials/_dbconnect.php'; ?>
  <!-- CategoryCards -->
  <div class="container " id="ques">
    <h1 class="text-center my-5 text-light">Welcome to the Discussion Forum!</h1>
    <div class="row">
      <!-- fetch all the categories -->
      <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($data, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        //  echo $row['category_id'];
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $description = $row['category_description'];
        echo
        ' <div class="col-md-4 my-2 ">
           <div class="card " style="width: 18rem;">
           <img src="images/cat' .$id. '.jpg "  width="286" height="200"alt="...">
          <div class="card-body">
          <h5 class="card-title">'.$cat.'</h5>
          <p class="card-text">'.substr($description,0,90 ).'... </p>
          <a href="threads.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
         </div>
        </div>
       </div> ';
      }

      ?>




    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>