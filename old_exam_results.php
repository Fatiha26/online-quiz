<?php
   session_start();
   include "connection.php";
   include "header.php";
   if(!isset($_SESSION["username"]))
   {
    ?> 
      <script type="text/javascript">
         window.location="login.php";
       </script>
        
    <?php
   }

?>

        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-8 col-lg-push-2" style="min-height: 500px; background-color: white;">
                <h1 style="text-align: center;color:#2b6777;">Old Exam Results</h1>
                <?php
                   $count=0;
                   $res=mysqli_query($conn,"SELECT * FROM exam_results where 
                   username='$_SESSION[username]' order by id desc");
                   $count=mysqli_num_rows($res);

                   if($count==0)
                   {
                    ?>
                        <h1 style="text-align: center;">No Results Found</h1>
                    <?php
                   }
                   else
                   {
                    echo "<table id='example' class='table table-bordered' style='color:#2b6777;font-size:18px;'>";
                      echo "<tr>";
                        echo "<th>"; echo "Username"; echo "</th>";
                        echo "<th>"; echo "Exam Type"; echo "</th>";
                        echo "<th>"; echo "Total Question"; echo "</th>";
                        echo "<th>"; echo "Correct Answer"; echo "</th>";
                        echo "<th>"; echo "Wrong Answer"; echo "</th>";
                        echo "<th>"; echo "Exam Time"; echo "</th>";
                      echo "</tr>";

                      while($row=mysqli_fetch_array($res))
                      {
                        echo "<tr>";
                        echo "<td>"; echo $row["username"]; echo "</td>";
                        echo "<td>"; echo $row["exam_type"]; echo "</td>";
                        echo "<td>"; echo $row["total_question"]; echo "</td>";
                        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                        echo "<td>"; echo $row["exam_time"]; echo "</td>";
                        echo "</tr>";
                      }
                      
                    echo "</table>";
                   }
                ?>
                <div class="text-center">
                  <a href="user_data_print.php" class="btn btn-success" style="width: 130px;">Print</a>
                </div>

                <div class="logo" style="float: right;margin-top:50px;">
               <p style="font-size: 16px;">Examined by <span style="color: #2b6777;font-size:20px;font-weight:bold;">QuizClan</span></p>
               </div>

            </div>           
      </div>
         

       <?php
           include "contact.php";
           include "footer.php";          
       ?>
