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
                        <h1>All Users</h1>
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
                    <h1 style="text-align: center; padding-bottom: 10px;">List of Users</h1>
<?php
    $count=0;
    $res=mysqli_query($conn,"SELECT * FROM registration order by id asc");
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
        echo "<th>"; echo "firstname"; echo "</th>";
        echo "<th>"; echo "lastname"; echo "</th>";
        echo "<th>"; echo "username"; echo "</th>";
        echo "<th>"; echo "email"; echo "</th>";
        echo "<th>"; echo "contact"; echo "</th>";
        echo "</tr>";

        while($row=mysqli_fetch_array($res))
        {
        echo "<tr>";
                        
        echo "<th>"; echo $row["id"]; echo "</th>";
        echo "<td>"; echo $row["firstname"]; echo "</td>";
        echo "<td>"; echo $row["lastname"]; echo "</td>";
        echo "<td>"; echo $row["username"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["contact"]; echo "</td>";
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