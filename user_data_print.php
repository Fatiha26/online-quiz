<?php
   session_start();
   include "connection.php";
   if(!isset($_SESSION["username"]))
   {
    ?> 
      <script type="text/javascript">
         window.location="login.php";
       </script>
        
    <?php
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" media="print">
</head>
<body>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

<div class="col-lg-8 col-lg-push-2" style="min-height: 500px; background-color: white;">
   
    <h1 style="text-align: center; padding-top:60px;color:#2b6777;">Old Exam Results</h1>
    <?php
       $count=0;
       $res=mysqli_query($conn,"SELECT * FROM exam_results where username='$_SESSION[username]' order by id desc");
       $count=mysqli_num_rows($res);

       if($count==0)
       {
        ?>
            <h1 style="text-align: center; color:#2b6777;">No Results Found</h1>
        <?php
       }
       else
       {
        echo "<table id='example' class='table table-bordered'>";
          echo "<tr style='color:#2b6777;font-size:16px'>";
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
        <button onclick="window.print()" class="btn btn-success" id="print-btn" style="width:140px">Print</button>
    </div>

</div>           
</div>
</body>
</html>