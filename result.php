<?php
   session_start();
   include "connection.php";
   $date=date("Y-m-d H:i:s");
   $_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
   include "header.php"
?>



        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            
            <h1 style="text-align: center; padding-top:30px; color:#2b6777;">You Result Is Ready</h1>   
                 
                 <?php
                    $correct=0;
                    $wrong=0;

                    if(isset($_SESSION["answer"]))
                    {
                        for($i=0;$i<=sizeof($_SESSION["answer"]);$i++)
                        {
                           $answer="";
                           $res=mysqli_query($conn,"SELECT * from questions where category='$_SESSION[exam_category]' && question_no=$i");
                           while($row=mysqli_fetch_array($res))
                           {
                             $answer=$row["answer"];
                           }
                           if(isset($_SESSION["answer"][$i]))
                           {
                              if($answer==$_SESSION["answer"][$i])
                              {
                                $correct=$correct+1;
                              }
                              else
                              {
                                $wrong=$wrong+1;
                              }
                           }
                           else
                           {
                               $wrong=$wrong+1;
                           }
                        }
                    }

                    $count=0;
                    $res=mysqli_query($conn,"SELECT * from questions where category='$_SESSION[exam_category]'");
                    $count=mysqli_num_rows($res);
                    $wrong=$count-$correct;
                    echo "<table class='table table-bordered' style='text-align:center;'>";

                    echo "<tr>";
                    echo "<th style='text-align:center;color:#2b6777;font-size:20px'>"; echo "Total Question "; echo "</th>";
                    echo "<th style='text-align:center;color:#2b6777;font-size:20px'>"; echo "Correct Answer "; echo "</th>";
                    echo "<th style='text-align:center;color:#2b6777;font-size:20px'>"; echo "Wrong Answer "; echo "</th>"; 
                    echo "<tr>";                     

                    echo "<tr>";
                      echo "<td style='text-align:center;color:#52ab98;font-size:25px'>"; echo $count; echo "</td>";
                      echo "<td style='text-align:center;color:#52ab98;font-size:25px'>"; echo $correct; echo "</td>";
                      echo "<td style='text-align:center;color:#52ab98;font-size:25px'>"; echo $wrong; echo "</td>"; 
                     echo "<tr>";                     
                    echo "</table>";
                 ?>
                  <div class="text-center">
                  <a href="current_result_print.php" class="btn btn-success" style="width:130px;">Print</a>
            </div>
            </div>
           

        </div>

      <?php
         if(isset($_SESSION["exam_start"]))
         {
            $date=date("Y-m-d");
            mysqli_query($conn,"INSERT into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)
                      values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");

            if(isset($_SESSION["exam_start"]))
            {
                unset($_SESSION["exam_start"]);
                ?>
                  <script type="text/javascript">
                       window.location.href=window.location.href;
                  </script>
                <?php
            }

         }
         
      ?>


       <?php
           include "footer.php";
       ?>