<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshiementor</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

    <center>
        <div class="form_dig">
            <center class="title_deg">
                Login Form
                <h4 style="color: red; ">
                    <?php
                    error_reporting(0);
                    echo $_SESSION['loginMessage'];
                    ?>
                </h4>
            </center>
            <form action="login_check.php" method="POST" class="login_form">
                <div>
                    <label class="label_dig">StudentID</label>
                    <input placeholder="StudentID" type="text" name="StudentID">
                </div>
                <div>
                    <label class="label_dig">Password</label>
                    <input placeholder="password" type="password" name="password">
                </div>
                <div>
                    <label class="label_dig">Usertype</label>
                    <select name="usertype" style="padding:1px 2px; width:178.3px;height:26px; ">
                        <option value="0">Usertype</option>
                        <option value="mentor">Mentor</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div>
                    <label class="label_dig" for="captcha">Captcha:</label>
                    <input type="text" name="captcha" id="captcha">
                </div>
                <div>
                <img src="captcha.php" alt="captcha">
                </div>
                <div>
                    <input class=" btn btn-primary" style="margin-top:20px;" type="submit" name="submit" value="login">
                </div>
                <br>
                <div>
                    <a href="register.php" class="btn btn-link">Register Here </a>
                </div>

                <h4 style="color: green; ">
                    <?php
                    error_reporting(0);
                    echo $_SESSION['registeration success'];
                    ?>
                </h4>

            </form>

        </div>
    </center>

    <?php
    session_destroy();
    ?>

</body>

</html>