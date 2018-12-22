<?php
require_once "vendor/autoload.php";
use App\Core\Session;
use App\Core\Redirect;

if (Session::exists('user')) {
    Redirect::to('Views/Admin/index.php');
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>University Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="Views/assets/images/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!--  for bootstrap  -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Views/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Views/assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center login-title login_welcome">Welcome to University of Washington</h1>
            <div class="col-sm-6 col-md-4 col-md-offset-4">
<!--                <h1 class="text-center login-title login_welcome">Welcome to University of Washington</h1>-->
                <div class="account-wall">
                    <img class="profile-img" src="Views/assets/images/logo.gif"
                         alt="LOGO">
                    <?php
                    if (Session::exists('error')) {
                        echo '<p style="text-align: center; color: red;">'.Session::get('error'). '</p>';
                        Session::delete('error');
                    }
                    ?>
                    <form action="Views/Admin/login.php" method="post" class="form-signin">
                        <input name="email" type="text" class="form-control" placeholder="Email"  autofocus autocomplete="none">
                        <input name="password" type="password" class="form-control" placeholder="Password"  autocomplete="none">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<!--                        <label class="checkbox pull-left">-->
<!--                            <input type="checkbox" value="remember-me">-->
<!--                            Remember me-->
<!--                        </label>-->
<!--                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>-->
                    </form>
                </div>
<!--                <a href="#" class="text-center new-account">Create an account </a>-->
            </div>
        </div>
    </div>

<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
    <script src="Views/assets/js/jquery-3.1.1.min.js"></script>
    <script src="Views/assets/js/bootstrap.min.js"></script>
    <script src="Views/assets/js/main.js"></script>
</body>
</html>