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
                        <h1>Add Exam Category</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                       <form action="" name="form1" method="POST">
                        <div class="card-body">
                          <div class="col-lg-6">
                           <div class="card">
                            <div class="card-header"><strong>ADD</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="examname" class=" form-control-label">Exam Category</label>
                                    <input type="text" name="examname" placeholder="Enter category name" class="form-control">
                                </div>
                                    <div class="form-group">
                                        <label for="examtime" class=" form-control-label">Exam Time</label>
                                        <input type="text" name="examtime" placeholder="60 minutes" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit1" value="Add Exam" class="btn btn-dark">
                                    </div>
                                    <div class="alert alert-success" id="success" style="display: none;">
                                       <strong>Success!</strong> Exam Added successfully
                                    </div>
                            </div>         
                      </div>
                  </div>

                  <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Categories</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
      $count=0;
      $res = mysqli_query($conn, "SELECT * from exam_category");
      while($row=mysqli_fetch_array($res))
      {
      $count=$count+1;
     ?>
     <tr>
        <th scope="row"><?php echo $count; ?></th>
        <td><?php echo $row["category"]; ?></td>
        <td><?php echo $row["exam_time_in_minutes"]; ?></td>
        <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
    </tr>
    <?php
    }
?>                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- .card -->
                </form> 
            </div>   <!--/.col-->
        </div>
     </div><!-- .animated -->
 </div><!-- .content -->

 <?php
    if(isset($_POST["submit1"]))
    {
        mysqli_query($conn,"INSERT into exam_category
                         values(NULL,'$_POST[examname]','$_POST[examtime]')") 
                         or die (mysqli_error($conn));

             ?>  
             <script type="text/javascript">
                document.getElementById("success").style.display="block";      
                 window.location.href=window.location.href;
             </script>  
             <?php        
    }
 ?>

        <?php
          include "footer.php";
        ?>