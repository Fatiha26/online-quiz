<?php
session_start();
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
?>
<?php
include "connection.php";
include "header.php";
?>


    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

        <div class="col-lg-6 col-lg-push-3" style="min-height: 300px; background-color: white;">

            <?php
            $res=mysqli_query($conn,"select * from exam_category");
            while($row=mysqli_fetch_array($res))
            {
                ?>
            <input type="button" class="btn btn-block" value="<?php echo $row["category"]; ?>" 
            style="margin-top: 10px; background-color: #fff; 
            color: #2b6777;border:1px solid #2b6777;font-size:25px;height:50px;" 
            onclick="set_exam_type_session(this.value);">
                <?php
            }
            ?>
        </div>

    </div>

<?php
include "contact.php";
include "footer.php";
?>

<script type="text/javascript">
    function set_exam_type_session(exam_category)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ 
        exam_category,true);
        xmlhttp.send(null);
    }
</script>
