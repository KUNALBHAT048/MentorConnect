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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
 #ques {
min-height: 433px ;
 }
 body{
 background-color: #0c1022;
 }

</style>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>

  <?php
  $id = $_GET['threadid'];
  $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
  $result = mysqli_query($data, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
  }

  $method = $_SERVER['REQUEST_METHOD'];
  $showAlert = false ;
  if ($method == 'POST') {
    //inserting in thread database
    $comment_content = $_POST['comment_content'];
    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `name`, `comment_time`)
             VALUES ('$comment_content', '$id', '0', current_timestamp());";
    $result = mysqli_query($data, $sql);
    $showAlert = true;
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your thread has been added! Please wait for community to respond
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
</div>';
}

  }
  ?>

  <!-- CategoryCards -->
  <div class="container my-4">
    <div class="jumbotron">
      <h1 class="display-4"><?php echo $title; ?></h1>
      <p class="lead"><?php echo $desc ?></p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p class=""><b>Posted By:-</b></p>
    </div>
  </div>

  <div class="container text-light">
    <h1 class="py-2"><u>POST A COMMENT</u></h1>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Type Your Comment</label>
        <textarea class="form-control" id="comment_content" name="comment_content" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>

  <div class="container text-light" id="ques">
    <h1 class="py-2">Disscussion</h1>

<?php
   
?>


    <?php

    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id = $id ";
    $result = mysqli_query($data, $sql);
    $noresult = true; 
    while ($row = mysqli_fetch_assoc($result)) {
      $noresult =false;
      $id = $row['comment_id'];
      $content = $row['comment_content'];
      $comment_time = $row['comment_time'];
      echo ' <div class="media my-3">
      <img src="images/guest-user.webp" width="54px" class="mr-3" alt="...">
      <div class="media-body">
      <p class="font-weight-bold my-0">Anonymous at '. $comment_time . '</p>
      <p class="font-weight-light "> ' . $content . ' </p>
      </div>
  </div>';
    }
    if ($noresult){
      echo '<h3 class="font-weight-light text-muted ">No Comments Yet</h3>';
      echo '<p class="blockquote-footer">You can Start the conversation...</p>';
    }

    ?>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    </body>

</html>