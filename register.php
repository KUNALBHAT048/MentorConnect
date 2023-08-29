


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link rel="stylesheet" href="style.css">
          <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    
</head>
<body>
<center>
        
        <div class="form_dig">
        <center class="title_deg">
            Registeration Form
          </center>
            <form action="register_check.php" method="POST" class="login_form">
                
                <div>
                    <label class="label_dig">Name</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_dig">StudentID</label>
                    <input type="text" name="StudentID">
                </div>

                <div>
                    <label class="label_dig">Mobile</label>
                    <input minlength="10" maxlength="10" type="number" name="phone">
                </div>

                <div>
                    <label class="label_dig">Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                <label class="label_dig">Usertype</label>
                    <select name="usertype" style="padding:1px 2px; width:178.3px;height:25px; " >
                       <option value="mentor">Mentor</option>
                       <option value="student">Student</option>
                    </select>
                </div>
                <div>
                    <label  class="label_dig">Password</label>
                    <input minlength="8" type="password" name="password">
                </div>
                               
                <div>
                    <input class=" btn btn-primary"type="submit" name="submit" value="Register">
                </div>

                <div>
                <h4   style="color:red">
                <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['denialmessage'];
                echo $_SESSION['registeration unsuccess'];
                ?>
            </h4>
                </div>
            </form>


        </div>
    </center>
</body>
</html>