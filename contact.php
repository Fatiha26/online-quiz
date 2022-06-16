<section class="contact" id="contact">
        <div class="container">
            <div class="row contact-us">
                <div class="col-md-6 ">
                    <div class="query">
                        <h2>Contact Us</h2>
                   <p><i class="fa-solid fa-phone"></i>+88 12345678</p>
                    <p><i class="fa-solid fa-envelope-open-text"></i>quizclan1234@gmail.com</p>
                    <div class="social-icon">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="query">
                    <h2>Your Feedback</h2>
                    <form action="" method="post">
                      <input type="text" name="name" id="" placeholder="Enter Your Name"><br>
                      <input type="text" name="district" id="" placeholder="District"><br>
                      <textarea name="comment" placeholder="Comment"></textarea><br>
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
