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

<div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

<h1 style="text-align: center; padding-top:30px;">Result OF <?php echo $_SESSION["username"]; ?></h1>   
     
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
        echo "<th style='text-align:center;'>"; echo "Total Question "; echo "</th>";
        echo "<th style='text-align:center;'>"; echo "Correct Answer "; echo "</th>";
        echo "<th style='text-align:center;'>"; echo "Wrong Answer "; echo "</th>"; 
        echo "<tr>";                     

        echo "<tr>";
          echo "<td>"; echo $count; echo "</td>";
          echo "<td>"; echo $correct; echo "</td>";
          echo "<td>"; echo $wrong; echo "</td>"; 
         echo "<tr>";                     
        echo "</table>";
     ?>
      <div class="text-center">
        <button onclick="window.print()" class="btn btn-primary" id="print-btn">Print</button>
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
</body>
</html>    