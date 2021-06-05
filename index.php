<?php
    session_start();
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 0) {
            header('location: login/index.php');
        }
    }else{
        header('location: login/index.php');
    }

    echo $_SESSION['status'] ;
?>
<?php include_once 'layouts/header.php'?>
<?php include_once 'layouts/sidebar.php'?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Welcome to Student Result Management System</h1>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'layouts/footer.php'?>
