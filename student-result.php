<?php
session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 0) {
        header('location: login/index.php');
    }
}else{
    header('location: login/index.php');
}

$link = mysqli_connect('localhost', 'root', 'test', 'srms');

$result = mysqli_query($link, "select * from students_results");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Student Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Jquery Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
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
        <h2 class="mb-4">Sidebar #04</h2>

        <div class="row">
            <div class="col-md-12">
                <a href="add-student-result.php">
                    <button class="btn btn-primary m-2 p-1">Add Student Result</button>
                </a>
                <table class="table table-striped display" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Year</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Result</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                    <tr>
                        <td><?=$row['student_id']?></td>
                        <td><?=$row['student_name']?></td>
                        <td><?=$row['year']?></td>
                        <td><?=$row['semester']?></td>
                        <td><?=$row['result']?></td>
                        <td>
                            <a href="edit-student.php?id=<?= $row['id'] ?>">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            <a href="delete-student.php?id=<?= $row['id']?>" onclick="return confirm('Are you sure to delete this user?')">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


<script>
    var table = $('#myTable').DataTable();
    $(document).ready( function () {
        $(table).DataTable();
    } );

</script>
</body>
</html>
