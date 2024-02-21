<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentName = $_POST["studentName"];
    $subject1 = $_POST["subject1"];
    $subject2 = $_POST["subject2"];
    $subject3 = $_POST["subject3"];

    // Store data in MySQL database (Assuming you have a MySQL database setup)
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'lab_report')or die('connection failed');

    // SQL query to insert data into the database
    $sql = "INSERT INTO student_marks (student_name, subject1, subject2, subject3)
            VALUES ('$studentName', $subject1, $subject2, $subject3)";

    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "Form data stored successfully.";
    } else {
        echo "Error: " . $sql . "<br>".mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
</head>
<body>
    <h1>Student Information and Marks</h1>

    <form method="post">
        Student Name:
        <input type="text" id="studentName" name="studentName" required>
        <br>
        <br>
        Subject 1 Marks:
        <input type="number" id="subject1" name="subject1" min="0" max="100" required>
        <br>
        <br>

       Subject 2 Marks:
        <input type="number" id="subject2" name="subject2" min="0" max="100" required>
        <br>
        <br>

        Subject 3 Marks:
        <input type="number" id="subject3" name="subject3" min="0" max="100" required>
        <br>
        <br>

        <input type="submit" value="Submit">
    </form>


    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'lab_report')or die('connection failed');
$sql = "SELECT * FROM student_marks";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Student Results</h1>";
    echo "<table border='1'>
            <tr>
                <th>Student Name</th>
                <th>Subject 1 Marks</th>
                <th>Subject 2 Marks</th>
                <th>Subject 3 Marks</th>
                <th>GPA</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $gpa = calculateGPA($row["subject1"], $row["subject2"], $row["subject3"]);
        echo "<tr>
                <td>" . $row["student_name"] . "</td>
                <td>" . $row["subject1"] . "</td>
                <td>" . $row["subject2"] . "</td>
                <td>" . $row["subject3"] . "</td>
                <td>" . $gpa . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}

mysqli_close($conn);

function calculateGPA($subject1, $subject2, $subject3)
{
    $averageMarks = ($subject1 + $subject2 + $subject3) / 3;

    if ($averageMarks >= 90) {
        return 'A';
    } elseif ($averageMarks >= 80) {
        return 'B';
    } elseif ($averageMarks >= 70) {
        return 'C';
    } elseif ($averageMarks >= 60) {
        return 'D';
    } else {
        return 'F';
    }
}
?>


</body>
</html>
