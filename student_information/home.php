<?php
    include 'db.php'; 

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:#a9a9a9;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #dcdcdc;
        }
        th, td {
            border: 2px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            und-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Registered Students</h2>
    <a href="add.php"><button>Add</button></a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Suffix</th>
            <th>Course</th>
            <th>Year and Section</th>
            <th>Action</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['middle_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['suffix'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['year_and_section'] . "</td>";
                echo "<td>";
                echo "<a href='delete.php?student_id=" . $row['student_id'] . "'><button>Delete</button></a>";
                echo "<a href='update.php?student_id=" . $row['student_id'] . "'><button>Update</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>