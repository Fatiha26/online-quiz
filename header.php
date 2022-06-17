<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>QuizClan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">

</head>

<body>

<div class="all-content-wrapper">

    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="header-top-menu">
                                        <ul class="nav navbar-nav">
                                            <li class="nav-item"><a href="index1.php" class="nav-link" style="color: #52ab98;font-size:18px;">Home</a>
                                            <li class="nav-item"><a href="select_exam.php" class="nav-link" style="color: #52ab98;font-size:18px;">Select Exam</a>
                                            </li>
                                            <li class="nav-item"><a href="old_exam_results.php" class="nav-link" style="color: #52ab98;font-size:18px;">Last Results</a>
                                            </li>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav">
                                            <li class="nav-item admin-name">
                                            Hello <?php echo $_SESSION["username"]; ?>
                                            </li>
                                            <li class="nav-item"><a href="logout.php" class="out"><i class="fa-solid fa-power-off"></i>Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->

        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">

                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                                    <ul class="breadcome-menu">
                                       <span><img src="img/clock.gif" width="50"></span>
                                        <li><div id="countdowntimer" style="display: block;font-size:20px;color:#2b6777">
                                        </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }

    </script>