<?php
   include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
       <link rel="stylesheet" href="css1/bootstrap.min.css">
       <link rel="stylesheet" href="css1/font-awesome.min.css">
      <link rel="stylesheet" href="css1/animate.css">
      <link rel="stylesheet" href="style1.css">
       <link rel="stylesheet" href="css1/responsive.css">
      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3 style="color: #2b6777; font-weight:bolder;">Register Now</h3>

			</div>
			<div class="content-error">
				<div class="container">
                        <form action="" name="form1" method="POST" class="form">
                            <div class="row" style="color: #2b6777;">
                                <div class="form-group col-md-12">
                                    <label>FirstName</label>
                                    <input type="text" name="firstname" class="form-control" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label>LastName</label>
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                                <div class="form-group col-md-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                              </div>
                            <div class="text-center">
                                <button type="submit" name="submit1" class="btn btn-block loginbtn registerbtn">Register</button>
                            </div>

                            <p class="already" style="font-size: 16px;color:#2b6777;text-align:center;">already registered?
                                <a href="login.php" style="color:#2b6777;background-color:#fff;padding:0;text-decoration:underline;">Login</a>
                            </p>
                            
                            <div class="alert alert-success" id="success" style="margin-top: 10px; display: none;">
                               <strong>Success!</strong> Account registration successfully!
                            </div>
                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none;">
                               <strong>Error</strong> Username already exists!
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>

    <?php
        if(isset($_POST["submit1"]))
        {
            $count= 0;
            $res = mysqli_query($conn, "SELECT * from registration where 
            username='$_POST[username]'") or die(mysqli_error($conn));
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="none";
                    document.getElementById("failure").style.display="block";
                </script>
                <?php
            }
            else
            {
                mysqli_query($conn,"INSERT into registration 
                values(NULL,'$_POST[firstname]','$_POST[lastname]',
                '$_POST[username]','$_POST[password]','$_POST[email]',
                '$_POST[contact]')") or die(mysqli_error($conn));
                ?>
                <script type="text/javascript">
                    document.getElementById("failure").style.display="none";  
                    document.getElementById("success").style.display="block";
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
    <script src="js/main.js"></script>

</body>

</html>