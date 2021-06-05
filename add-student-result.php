<?php

session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 0) {
        header('location: login/index.php');
    }
}else{
    header('location: login/index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>


        <h1><a href="index.php" class="logo">Project Name</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="index.php"><span class="fa fa-home mr-3"></span> Homepage</a>
            </li>
            <li class="active">
                <a href="student-result.php"><span class="fa fa-user mr-3"></span> Students Result List</a>
            </li>
            <li class="active">
                <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>

        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Add Student Result</h2>
        <div class="row">
            <div class="col-md-8 m-auto">
                <form class="text-center p-2" action="store-student-result.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label for="student_name" style="color: black">Student Name:</label>
                            <input type="text" id="student_name" name="student_name" placeholder="Student name...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="student_id" style="color: black">Student id:</label>
                            <input type="text" style="margin-left: 28px" id="student_id" name="student_id" placeholder="Student Id...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="semester" style="color: black">Semester :</label>
                            <select style="margin-left: 28px" name="semester" id="semester">
                                <option value="Summer">Summer</option>
                                <option value="Spring">Spring</option>
                                <option value="Fall">Fall</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="year" style="color: black">Year :</label>
                            <input style="margin-left: 63px" id="year" name="year" placeholder="Current Year...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="result" style="color: black">Result: </label>
                            <input style="margin-left: 57px" type="text" id="result" name="result" placeholder="Result">
                        </div>
                    </div>
                    <p style="color: red"> <?= (isset($_SESSION['error'])) ? $_SESSION['error'] : ''?></p>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
<?php session_destroy()?>
