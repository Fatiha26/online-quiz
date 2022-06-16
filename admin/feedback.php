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
                        <h1>Feedbacks From Users</h1>
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
                    <h1 style="text-align: center; padding-bottom: 10px;">User Feedback</h1>
                <?php
                   $count=0;
                   $res=mysqli_query($conn,"SELECT * FROM contact order by id asc");
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
                        echo "<th>"; echo "Name"; echo "</th>";
                        echo "<th>"; echo "District"; echo "</th>";
                        echo "<th>"; echo "Comment"; echo "</th>";
                        echo "<th>"; echo "Action"; echo "</th>";

                      echo "</tr>";

                      while($row=mysqli_fetch_array($res))
                      {
                        echo "<tr>";
                        
                        echo "<th>"; echo $row["id"]; echo "</th>";
                        echo "<td>"; echo $row["name"]; echo "</td>";
                        echo "<td>"; echo $row["district"]; echo "</td>";
                        echo "<td>"; echo $row["comment"]; echo "</td>";
                        echo "<td>";
                        ?>
                        <a href="delete_feedback.php?id=<?php echo $row["id"] ?>">Delete</a>
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
        </div>



<?php
    include "footer.php";
?>