<!DOCTYPE html>
<html>
    <head>
        <title>Student Registration Form</title>
    </head>
    <body>
        <h2>Student Registration Form</h2>
        <form method="POST" action="">
            First Name:
            <input type="text" name="first_name" required><br><br>
            Middle Name:
            <input type="text" name="middle_name"><br><br>
            Last Name:
            <input type="text" name="last_name" required><br><br>
            Suffix:
            <input type="text" name="suffix" maxlength="20"><br><br>
            Course:
            <input type="text" name="course" required><br><br>
            Year and Section:
            <input type="text" name="year_and_section" required><br><br>
            <input type="submit" value="Add">
            <input type="reset" value="Clear">
            <a href="home.php"><input type="button" value="Back"></a>
        </form>

        <?php
            include 'db.php'; 

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $firstname = $_POST['first_name'];
                $middlename = $_POST['middle_name'];
                $lastname = $_POST['last_name'];
                $suffix = $_POST['suffix'];
                $course = $_POST['course'];
                $year_section = $_POST['year_and_section'];

                
                $stmt = $conn->prepare("INSERT INTO students (first_name, middle_name, last_name, suffix, course, year_and_section) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $firstname, $middlename, $lastname, $suffix, $course, $year_section);

                if ($stmt->execute()) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
                }

                $stmt->close();
                $conn->close();
            }
        ?>
    </body>
</html>
