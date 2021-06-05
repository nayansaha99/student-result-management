<?php
session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 0) {
        header('location: login/index.php');
    }
}else{
    header('location: login/index.php');
}


include_once 'db-config.php';
$id = $_GET['id'];
$error = '';

if (!empty($_POST)) {
    $student_name = htmlentities($_POST['student_name'], ENT_QUOTES);
    $student_id = htmlentities($_POST['student_id'], ENT_QUOTES);
    $year = htmlentities($_POST['year'], ENT_QUOTES);
    $semester = htmlentities($_POST['semester'], ENT_QUOTES);
    $result = htmlentities($_POST['result'], ENT_QUOTES);


    if (!empty($student_name) && !empty($student_id) && !empty($year) && !empty($semester) && !empty($result)) {

        $sql = "update students_results set student_id = '$student_id', student_name = '$student_name',year='$year',
            semester='$semester',result = '$result' where id =$id";
        mysqli_query($link, $sql);
        header('location: student-result.php');
    } else {
        $error = '* each field is required';
    }
}



$result = mysqli_query($link, "Select * from students_results where id = $id");
$data = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Edit Student</title>
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
        <h2 class="mb-4">Edit Student Result</h2>
        <div class="row">
            <div class="col-md-8 m-auto">
                <form class="text-center p-2" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label for="student_name" style="color: black">Student Name:</label>
                            <input type="text" id="student_name" name="student_name" value="<?= $data['student_name']?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="student_id" style="color: black">Student id:</label>
                            <input type="text" style="margin-left: 28px" id="student_id" name="student_id" value="<?= $data['student_id']?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="semester" style="color: black">Semester :</label>
                            <select style="margin-left: 28px" name="semester" id="semester">

                                <option value="Summer" <?= ($data['semester'] == 'Summer' ? 'selected' : '')?>>Summer</option>
                                <option value="Spring" <?= ($data['semester'] == 'Spring' ? 'selected' : '')?>>Spring</option>
                                <option value="Fall" <?= ($data['semester'] == 'Fall' ? 'selected' : '')?>>Fall</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="year" style="color: black">Year :</label>
                            <input style="margin-left: 63px" id="year" name="year" value="<?= $data['year']?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="result" style="color: black">Result: </label>
                            <input style="margin-left: 57px" type="text" id="result" name="result" value="<?= $data['result']?>">
                        </div>
                    </div>
                    <p style="color: red"> <?= $error?></p>
                    <button class="btn btn-primary">Update</button>
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
