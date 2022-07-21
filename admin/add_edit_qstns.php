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
    
    $id = $_GET["id"];
    $exam_category='';
    $res = mysqli_query($conn,"SELECT * FROM exam_category where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
    }
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Questions in <?php echo "<font color='red'>" .$exam_category. "</font>"; ?></h1>
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
                <div class="col-lg-6">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                           <div class="card">
                            <div class="card-header"><strong>Add new MCQ question</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="question" class=" form-control-label">Add Question</label>
                                    <input type="text" name="question" placeholder="Add question" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="opt1" class=" form-control-label">Add Option 1</label>
                                    <input type="text" name="opt1" placeholder="Add option 1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="opt2" class=" form-control-label">Add Option 2</label>
                                    <input type="text" name="opt2" placeholder="Add option 2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="opt3" class=" form-control-label">Add Option 3</label>
                                    <input type="text" name="opt3" placeholder="Add option 3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="opt4" class=" form-control-label">Add Option 4</label>
                                    <input type="text" name="opt4" placeholder="Add option 4" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="answer" class=" form-control-label">Add answer</label>
                                    <input type="text" name="answer" placeholder="Add answer" class="form-control">
                                </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit1" value="Add Question" class="btn btn-dark">
                                    </div>
                            </div>         
                      </div>
                  </div>


                       </form>
                </div>
            </div> <!-- .card -->
        </div>                   <!--/.col-->
    </div>
      
        <div class="row">
          <div class="col-lg-12">
             <div class="card">
              <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Questions</th>
                        <th>Opt1</th>
                        <th>Opt2</th>
                        <th>Opt3</th>
                        <th>Opt4</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
<?php
    $res=mysqli_query($conn, "SELECT * from questions where 
    category='$exam_category' order by question_no asc");
    while($row=mysqli_fetch_array($res))
    {
    echo "<tr>";
        echo "<td>"; echo $row["question_no"]; echo "</td>";
        echo "<td>"; echo $row["question"]; echo "</td>";
        echo "<td>";
            if(($row["opt1"])!==false)
            {                           
                    echo $row["opt1"]; 
            }
            else
            {
                echo "error";
            }
            echo "</td>";                              
            echo "<td>";
            if(($row["opt2"])!==false)
            {
                                echo $row["opt2"]; 
            }
            else
            {
                echo "error"; 
            }
            echo "</td>";

            echo "<td>";
            if(($row["opt3"])!==false)
            {
                echo $row["opt3"]; 
            }
            else
                              {
                echo "error"; 
            }
            echo "</td>";

            echo "<td>";
            if(($row["opt4"])!==false)
            {
                echo $row["opt4"]; 
            }
            else
            {
                echo "error"; 
            }
            echo "</td>";
            echo "<td>";
            if(($row["opt4"])!==false)
            {
            ?>
            <a href="edit_opt.php?id=<?php echo $row["id"] ?>&id1=<?php echo 
            $id; ?>">Edit</a>
            <?php
            }
            else
            {
            echo "false";
            }
            echo "</td>";
            echo "<td>";
            ?>
            <a href="delete_opt.php?id=<?php echo $row["id"] ?>&id1=<?php echo 
            $id; ?>">Delete</a>
            <?php                       
            echo "</td>";

    echo "</tr>";
    }
?>
              </table>
  
              </div>
             </div>
          </div>
        </div>
 </div>
</div> <!-- .card -->
                    <!--/.col-->

                


<?php
    if(isset($_POST["submit1"]))
    {
        $loop=0;
        $count=0;
        $res=mysqli_query($conn,"SELECT * from questions where 
        category='$exam_category' order by id asc") or die(mysqli_error($conn));
        $count = mysqli_num_rows($res);
               
        if($count==0)
        {

        }else
        {
            while($row=mysqli_fetch_array($res))
            {
            $loop=$loop+1;
            mysqli_query($conn,"UPDATE questions set question_no='$loop' 
            where id=$row[id]");
            }
        }
        $loop=$loop+1;
        mysqli_query($conn,"INSERT into questions values(NULL,'$loop',
        '$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]',
        '$_POST[opt4]','$_POST[answer]','$exam_category')") 
        or die(mysqli_errno($conn));

        ?>
        <script type="text/javascript">
                alert("added successfully");
                window.location.href=window.location.href;
        </script>
        <?php
    }
?>



        <?php
          include "footer.php";
        ?>