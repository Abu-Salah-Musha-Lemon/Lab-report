<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $checkboxes = isset($_POST["checkboxes"]) ? implode(", ", $_POST["checkboxes"]) : "";
    $multiCheckboxes = isset($_POST["multiCheckboxes"]) ? implode(", ", $_POST["multiCheckboxes"]) : "";
    $radioButtons = isset($_POST["radioButtons"]) ? $_POST["radioButtons"] : "";
    $listBox = $_POST["listBox"];
    $password = $_POST["password"];


    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'lab_report')or die('connection failed');

    // SQL query to insert data into the database
    $sql = "INSERT INTO user_data (name, email, message, checkboxes, multi_checkboxes, radio_buttons, list_box, password)
            VALUES ('$name', '$email', '$message', '$checkboxes', '$multiCheckboxes', '$radioButtons', '$listBox', '$password')";
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
    <title>Form Example</title>
    <style>
        body{
            display: flex;
    justify-content: center;
       align-items: center;
    flex-direction: column;
        }
    </style>
</head>
<body >
   <h1>Submit Form</h1>

    <form method="post" >
        Name:
        <input type="text" id="name" name="name" required>
        <br>
        <br>

        Email:
        <input type="text" id="email" name="email" required>
        <br>
        <br>

        Message:
        <textarea id="message" name="message" rows="4" required></textarea>
        <br>
        <br>

        Checkboxes:
        <input type="checkbox" id="checkbox1" name="checkboxes[]" value="Option 1">
        <label for="checkbox1">Option 1</label>
        <input type="checkbox" id="checkbox2" name="checkboxes[]" value="Option 2">
        <label for="checkbox2">Option 2</label>
        <br>
        <br>

        <label>Multiple Checkboxes:</label>
        <input type="checkbox" id="multiCheckbox1" name="multiCheckboxes[]" value="Option A">
        <label for="multiCheckbox1">Option A</label>
        <input type="checkbox" id="multiCheckbox2" name="multiCheckboxes[]" value="Option B">
        <label for="multiCheckbox2">Option B</label>
        <input type="checkbox" id="multiCheckbox3" name="multiCheckboxes[]" value="Option C">
        <label for="multiCheckbox3">Option C</label>
        <br>
        <br>

       Radio Buttons:
        <input type="radio" id="radio1" name="radioButtons" value="Radio A">
        <label for="radio1">Radio A</label>
        <input type="radio" id="radio2" name="radioButtons" value="Radio B">
        <label for="radio2">Radio B</label>
        <br>
        <br>

       List Box:
        <select id="listBox" name="listBox" required>
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select>
        <br>
        <br>

        Password:
        <input type="password" id="password" name="password" required>
        <br>
        <br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
