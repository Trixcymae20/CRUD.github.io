<?php
    include 'db.php'; 

    if(isset($_GET['student_id'])) {
        $id = $_GET['student_id'];
        $sql = "DELETE FROM students WHERE student_id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Successfully Deleted.")</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo '<script>alert("Deletion Failed.")</script>';
    }

    echo "<script>window.location = 'home.php';</script>";
    exit();

    mysqli_close($conn);
?>