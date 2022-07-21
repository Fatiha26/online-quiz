<?php
   session_start();
   include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login" style="margin-top:100px;">
				<h3 style="color: #52ab98;"><span style="color: #2b6777; font-size:40px;">QuizClan</span> LOGIN FORM</h3>

			</div>
			<div class="content-error">
                    <div class="panel-body">
                        <form action="" name="form1" method="post" class="form">
                            <div class="form-group">
                                <label class="control-label" for="username" style="color: #2b6777; font-size:18px;">Username</label>
                                <input type="text" placeholder="Enter your Username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password" style="color: #2b6777; font-size:18px;">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">

                            </div>

                            <button type="submit" name="login" class="btn btn-block loginbtn">Login</button>
                            <a class="btn btn-block registerbtn" href="register.php">Register</a>

                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none;">
                               <strong>Error</strong> Username or Password dosen't match!
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>

    <?php
       if(isset($_POST["login"]))
       {
            $count= 0;
            $res = mysqli_query($conn, "SELECT * from registration where 
            username='$_POST[username]' && password='$_POST[password]'") 
            or die(mysqli_error($conn));
            $count = mysqli_num_rows($res);

            if($count==0)
            {
                ?>
                <script type="text/javascript">
                    document.getElementById("failure").style.display="block";
                </script>
                <?php
            }else
            {
                $_SESSION["username"]=$_POST["username"];
                ?>
                <script type="text/javascript">
                     window.location="select_exam.php" 
                </script>
                <?php
            }
       }
    ?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>


</body>

</html>