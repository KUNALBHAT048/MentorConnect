<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FeedBack Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="temp.css">
</head>

<body>
<header class="header">
    <div><a href="studenthome.php" class="btn">Student Dashboard</a></div>
    <div class="logout">
      <a href="logout.php" class="btn">Logout</a>
    </div>
    <div><a href="recent.php" class="btn">Recent Queries</a></div>
    <div><a href="discussionforum.php" class="btn">Forum</a></div>
  </header>
  <div class="main">
    <center>
    <div class="login_form_container">
      <form action="message_check.php" method="POST">
      <div class="login_form">
        <h2> Message Box</h2>
        <div class="input_group">
           <textarea placeholder="Enter a brief description of your problem or concern"  name = "topic" rows="5"></textarea>
        </div>
        <div class="input_group">
        <textarea placeholder="Write your queries or concerns here. Your message is secure and confidential." name = "message"  rows="8"></textarea>
        </div>

        <div class="input_group" id="button">
        <button type="submit" > <a>SEND </a> </button>
        </div>
      </div>
    </form>
    </div>
  </center>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(".input_text").focus(function () {
      $(this).prev('.fa').addclass('glowIcon')
    })
    $(".input_text").focusout(function () {
      $(this).prev('.fa').removeclass('glowIcon')
    })
  </script>
</body>

</html>