
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QuizClan | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">QuizClan Admin</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="exam_category.php"> <i class="menu-icon fa fa-plus"></i>Add & Edit Exam</a>
                    </li>
                    <li>
                        <a href="add_edit_examqstn.php"> <i class="menu-icon fa fa-plus"></i>Add & Edit Questions</a>
                    </li>
                    <li>
                        <a href="old_exam_results.php"> <i class="menu-icon fa fa-clipboard"></i>All Exam Results</a>
                    </li>
                    <li>
                        <a href="users.php"> <i class="menu-icon fa fa-user"></i>Users</a>
                    </li>
                    <li>
                        <a href="feedback.php"> <i class="menu-icon fa fa-comment"></i>User Feedback</a>
                    </li>
                    <li>
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                    </a>

                        <div class="user-menu dropdown-menu">
                        </div>
                    </div>
                </div>
            </div>
        </header>
         <!-- /header -->
        <!-- Header-->
