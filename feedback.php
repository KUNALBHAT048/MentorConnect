<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FeedBack Form</title>
  <link rel="stylesheet" href="css_feedback.css">
</head>
<body>
    <form action="send.php" method="post">
      <div class="container">
          <h2>FeedBack Form</h2>
          <div class="row100">
              <div class="col">
                  <div class="inputBox">
                      <input type="text" name="" required="required">
                      <span class="text">First Name</span>
                      <span class="line"></span>
                  </div> 
              </div>

              <div class="col">
                <div class="inputBox">
                    <input type="text" name="" required="required">
                    <span class="text">Last Name</span>
                    <span class="line"></span>
                </div> 
              </div>
          </div>

          <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="" required="required">
                    <span class="text">Email</span>
                    <span class="line"></span>
                </div> 
            </div>

            <!-- <div class="col">
              <div class="inputBox">
                  <input type="text" name="" required="required">
                  <span class="text">Mobile</span>
                  <span class="line"></span>
              </div> 
            </div> -->
        </div>

        <div class="row100">
          <div class="col">
              <div class="inputBox textarea">
                  <input type="text" name="" required="required">
                  <span class="text">Type Your Message Here...</span>
                  <span class="line"></span>
              </div> 
          </div>
        </div>

        <div class="row100">
          <div class="col">
            <input type="submit" value="Send">
          </div>
        </div>
        
      </div>
    </form>
</body>
</html>