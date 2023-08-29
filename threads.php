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
      min-height: 433px;
    }
  </style>
</head>

<body style="background-color: #181D31;">
  <?php include 'partials/_dbconnect.php'; ?>

  <?php
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `categories` WHERE category_id=$id";
  $result = mysqli_query($data, $sql);
  while ($row = mysqli_fetch_assoc($result)) {

    $cat_name = $row['category_name'];
    $cat_desc = $row['category_description'];
  }

  ?>

  <?php
  $method = $_SERVER['REQUEST_METHOD'];
  $showAlert = false ;
  if ($method == 'POST') {
    //inserting in thread database
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) 
       VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($data, $sql);
    $showAlert = true;
    if($showAlert){
       echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> Your Thread Has Been Added.Wait For The Community To
                Respond.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }

  }
  ?>
  <!-- CategoryCards -->
  <div class="container my-4">
    <div class="jumbotron">
      <h1 class="display-4 text-center">Welcome to <?php echo $cat_name; ?></h1>
      <p class="lead"><?php echo $cat_desc ?></p>
      <hr class="my-4">
      <p>
  <strong>Forum Rules:</strong> 
  Please read and abide by the following rules to maintain a respectful and enjoyable community:
  <ol>
    <li>Be respectful to fellow members and refrain from personal attacks or offensive language.</li>
    <li>Avoid spamming, advertising, or promoting unrelated content.</li>
    <li>Stay on-topic within relevant threads and categories.</li>
    <li>Do not share or distribute any illegal or inappropriate material.</li>
  </ol>
  Failure to comply with these rules may result in warnings, temporary suspensions, or permanent bans.
</p>
 
    </div>
  </div>


  <div class="container text-light">
    <h1 class="py-2"><u>Start a discussion</u></h1>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as possible.</small>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>


  <div class="container text-light" id="ques">
    <h1 class="py-2"><u>Browse Questions</u></h1>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id ";
    $result = mysqli_query($data, $sql);
    $noresult = true;
    while ($row = mysqli_fetch_assoc($result)) {
      $noresult = false;
      $id = $row['thread_id'];
      $title = $row['thread_title'];
      $desc = $row['thread_desc'];

      echo ' <div class="media my-3"> 
      <img src="images/guest-user.webp" width="54px" class="mr-3" alt="...">
      <div class="media-body">
      <h5 class="mt-0"> <a href ="threadcontent.php?threadid=' . $id . ' "> ' . $title . ' </a> </h5>
      <p> ' . $desc . ' </p>
      </div> 
  </div>';
    }

    //IF THERE ARE NO QUESTIONS
    if ($noresult) {
      echo '<h3 class="font-weight-light text-muted ">No Threads Found</h3>';
      echo '<p class="blockquote-footer">Be the first person to ask  a Question</p>';
    }
    ?>



    <!-- remove later to check alignmnt -->
    <!-- <div class="media my-3">
      <img src="images/guest-user.webp" width="54px" class="mr-3" alt="...">
      <div class="media-body">
        <h5 class="mt-0">Unable to install vs code in windows 11</h5>
        <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
      </div>
    </div> -->

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