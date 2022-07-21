<?php
   include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizClan</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">

</head>
<body>
    <section class="section">
        <div class="container">
            <div class="row">
                <header>
                    <div class="logo"><a href="#" style="text-decoration: none;">QuizClan</a></div>
                    <nav>
                        <a href="index.php" style="text-decoration: none;"><i class="fi fi-sr-home"></i>Home</a>
                        <a href="#about" style="text-decoration: none;">About</a>
                        <a href="https://www.w3schools.com/" target="_blank" style="text-decoration: none;">Education</a>
                        <a href="#contact" style="text-decoration: none;">Contact</a>

                    </nav>
                </header>
            </div>
            <div class="row">
                <div class="col-md-5 text-area">
                    <h1>Take Part In A Quiz</h1>
                    <p>QuizClan plays an important role in the classroom as a means to quickly 
                        assess the progress of both individual students and entire classes.</p>
                    <a href="login.php" class="btn1" style="text-decoration: none;">LogIn</a>
                    <a href="register.php" class="btn1" style="text-decoration: none;">Register</a>
                </div>
                <div class="col-md-7 img-area">
                    <img src="img/b-1.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="abouts" id="about">
        <div class="container">
            <div class="row" style="margin: 100px 40px;">
                <div class="col-md-3 about">
                    <img src="img/notebook.gif" alt="" class="about-img">
                    <h2>100+ Quizes</h2>
                    <p>
                     Give students plenty of choices in to choose quizzes of every variety.
                    </p>
                </div>
                <div class="col-md-3 about">
                    <img src="img/clock.gif" alt="" class="about-img">
                    <h2>Finish On Time</h2>
                    <p>Timer is started as soon as the category is selected.
                    </p>
                </div>
                <div class="col-md-3 about">
                    <img src="img/mortarboard.gif" alt="" class="about-img">
                    <h2>Certification</h2>
                    <p>Report Generation and Certification system available
                    </p>
                </div>
                <div class="col-md-3 about">
                    <img src="img/social-media.gif" alt="" class="about-img">
                    <h2>Secure</h2>
                    <p>We maintain the privacy of every student
                    </p>
                </div>
            </div>
        </div>
       
    </section>

    <section class="grow" id="education">
        <div class="container">
            <div class="row">
                <div class="col-md-6 grow-img">
                     <img src="img/skills.png" alt="">
                </div>
                <div class="col-md-6 grow">
                   <div class="grow-text">
                    <h3>Grow Your Skills,</h3>
                    <h3>Define Your Future With<span> QuizClan</span></h3>
                    <p>Grow your skills by participating more and more quizes. Save your time. Enjoy the quiz!
                    </p>
                    <a href="login.php" class="btn1" style="text-decoration: none;">Participate Now</a>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="container">
            <div class="row contact-us">
                <div class="col-sm-6">
                    <div class="query">
                        <h2 class="col-md-12">Contact Us</h2>
                   <p><i class="fa-solid fa-phone"></i>+88 12345678</p>
                    <p><i class="fa-solid fa-envelope-open-text"></i>quizclan1234@gmail.com</p>
                    <div class="social-icon">
                        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                   <div class="query">
                    <h2 class="col-md-12">Your Feedback</h2>
                    <form action="" method="post">
                      <input type="text" name="name" id="" placeholder="Enter Your Name" required><br>
                      <input type="text" name="district" id="" placeholder="District" required><br>
                      <textarea name="comment" placeholder="Comment" required></textarea><br>
                      <input type="submit" value="Submit" name="submit1">
                      <div class="alert alert-success" id="success" style="margin-top: 10px; display: none; width:80%;">
                        <strong>Thank You!</strong> For Your Feedback!
                      </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </section>

        <footer>
            <p>&copy; <?php echo date("Y");?>. All Rights Reserved by LamiaFatiha</p>
        </footer>


    <?php
        if(isset($_POST["submit1"]))
        {
            $name = $_POST['name'];
            $district = $_POST['district'];
            $comment = $_POST['comment'];

            $sql= "INSERT into contact(id,name,district,comment) values(NULL,'$name','$district','$comment')";

            $res=mysqli_query($conn,$sql);
            if($res)
            {
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="block";
                </script>
                <?php
            }
            else 
            {
                "failed";
            }
        }
    ?>

    

</body>
</html>