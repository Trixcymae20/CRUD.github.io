<?php
    include 'db.php'; 

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
  
  include 'db.php';


  if(isset($_REQUEST['student_id'])) {
      $id = $_REQUEST['student_id'];

     
      $sql = "SELECT * FROM students WHERE student_id = $id";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          
          $fname = $row['first_name'];
          $mname = $row['middle_name'];
          $lname = $row['last_name']; 
          $suffix = $row['suffix']; 
          $course = $row['course']; 
          $year_section = $row['year_and_section'];
      } else {
          echo "No user found with the given ID.";
          exit(); 
      }
  } else {
      echo "No ID provided.";
      exit(); 
  }

 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $id = $_POST['student_id'];
      $fname = $_POST['first_name'];
      $mname = $_POST['middle_name'];
      $lname = $_POST['last_name']; 
      $suffix = $_POST['suffix']; 
      $course = $_POST['course']; 
      $year_section = $_POST['year_and_section'];  

     
      $sql = "UPDATE students SET first_name='$fname', middle_name='$mname', last_name='$lname', suffix='$suffix', course='$course', year_and_section='$year_section' WHERE student_id = '$id'";
      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Data updated successfully!');</script>";
      } else {
          echo "Error updating data: " . mysqli_error($conn);
      }
  }


  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Citizen</title>
  
  <style>
      
  </style>
</head>
<body>
  <form method="POST">
      Student Form<br><br>
      <input type="hidden" name="student_id" value="<?php echo $id ?>"><br> 
      First Name:
          <input type="text" name="first_name" required><br><br>
          Middle Name:
          <input type="text" name="middle_name" required><br><br>
          Last Name:
          <input type="text" name="last_name" required><br><br>
          Suffix:
          <input type="text" name="suffix" required><br><br>
          Course:
          <input type="text" name="course" required><br><br>
          Year and Section:
          <input type="text" name="year_and_section" required><br><br>
      <input type="submit" value="Update"> 
      <a href="home.php"><input type="button" value="Back"></a>
  </form>
</body>
</html>