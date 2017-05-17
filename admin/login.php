<?php
ob_start();
//include 'login.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Admin @ Adventist BNB</title>
        <!-- CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../fonts/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="../css/custom.css" rel="stylesheet"/>
    </head>
    <body style="background:url(../images/bg.png) repeat;">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form role="form" id="adminloginform" action="" method="post">
                        <h1>Login Form</h1>

                        <div id="adminerror_login">

                        </div>
                        <div>
                            <input type="text" name="email" id="email"  class="form-control" placeholder="Username"  />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="logpassword" id="logpassword" placeholder="Password"  />
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success submit">Log In <span class="fa fa-arrow-circle-right"></span></button>
<!--                            <a class="btn btn-success submit" href="#">Log In <span class="fa fa-arrow-circle-right"></span></a>-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div>
                                <h1>Admin @ Adventist BNB</h1>
                                <p>© 2016 All Rights Reserved. Admin @ Adventist BNB</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>

    </body>
</html>

<!-- Javascripts -->
<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/jquery-validate.bootstrap-tooltip.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!--<script type="text/javascript" src="../js/custom.js"></script>-->
<script type="text/javascript" src="../script/admin.js"></script>
