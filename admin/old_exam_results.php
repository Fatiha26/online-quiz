<?php
    session_start();
    include "header.php";
    include "../connection.php";
    if(!isset($_SESSION["admin"]))
    {
        ?>
          <script type="text/javascript">
              window.location="index.php";
          </script>
        <?php
    }

?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All Exam Results</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                    <div class="card-body">
                            <h1 style="text-align: center; padding-bottom: 10px;">Old Exam Results</h1>
<?php
     $count=0;
     $res=mysqli_query($conn,"SELECT * FROM exam_results order by id asc");
     $count=mysqli_num_rows($res);

    if($count==0)
    {
    ?>
         <h1 style="text-align: center;">No Results Found</h1>
     <?php
    }
    else
    {
    echo "<table class='table table-bordered'>";
        echo "<tr style='background-color: #000; color:#fff;'>";
        echo "<th>"; echo "No"; echo "</th>";
        echo "<th>"; echo "Username"; echo "</th>";
        echo "<th>"; echo "Exam Type"; echo "</th>";
        echo "<th>"; echo "Total Question"; echo "</th>";
        echo "<th>"; echo "Correct Answer"; echo "</th>";
        echo "<th>"; echo "Wrong Answer"; echo "</th>";
        echo "<th>"; echo "Exam Time"; echo "</th>";
        echo "<th>"; echo "Action"; echo "</th>";

        echo "</tr>";

        while($row=mysqli_fetch_array($res))
        {
        echo "<tr>";
        echo "<th>"; echo $row["id"]; echo "</th>";
        echo "<td>"; echo $row["username"]; echo "</td>";
        echo "<td>"; echo $row["exam_type"]; echo "</td>";
        echo "<td>"; echo $row["total_question"]; echo "</td>";
        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
        echo "<td>"; echo $row["exam_time"]; echo "</td>";
        echo "<td>"; 
            ?>
                <a href="delete_result.php?id=<?php echo $row['id']?>">Delete</a>
            <?php 
        echo "</td>";
        echo "</tr>";

        }                      
    echo "</table>";
    }
?>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->

        <?php
          include "footer.php";
        ?>