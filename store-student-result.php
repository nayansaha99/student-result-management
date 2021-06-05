<?php
include 'db-config.php';
session_start();

if (!empty($_POST)){
    $student_name = htmlentities($_POST['student_name'],ENT_QUOTES);
    $student_id = htmlentities($_POST['student_id'],ENT_QUOTES);
    $year = htmlentities($_POST['year'],ENT_QUOTES);
    $semester = htmlentities($_POST['semester'],ENT_QUOTES);
    $result = htmlentities($_POST['result'],ENT_QUOTES);


    if (!empty($student_name) && !empty($student_id) && !empty($year) && !empty($semester) && !empty($result)){

        $sql = "insert into students_results(student_id,student_name,year,semester,result)
                values('$student_id','$student_name','$year','$semester','$result')";
        mysqli_query($link, $sql);
        header('location: student-result.php');
    }else{
        $_SESSION['error'] = "* Each field is required";
        header('location: add-student-result.php');
    }
}
