<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    form {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
    }
    input[type="text"], input[type="email"], select, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<?php
// Define file path
$file = 'applications.txt';

// Function to handle form submission
function handleFormSubmission($file) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $data = "Application Submitted:\n";
        foreach ($_POST as $key => $value) {
            $data .= ucfirst($key) . ": " . $value . "\n";
        }
        $data .= "\n";

        // Append data to the file
        if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
            // Redirect to a thank you page or display a success message
            echo "<h2>Thank You!</h2>";
            echo "<p>Your application has been submitted successfully.</p>";
        } else {
            echo "<h2>Error!</h2>";
            echo "<p>Failed to save application data. Please try again later.</p>";
        }
    }
}

// Call the function to handle form submission
handleFormSubmission($file);
?>
<H1>Student Information</H1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required>

    <label for="address">Address:</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <label for="qualification">Highest Qualification:</label>
    <input type="text" id="qualification" name="qualification" required>

    <label for="prev_job">Previous Job Title:</label>
    <input type="text" id="prev_job" name="prev_job" required>

    <label for="prev_company">Previous Company:</label>
    <input type="text" id="prev_company" name="prev_company" required>

    <label for="prev_salary">Previous Salary:</label>
    <input type="text" id="prev_salary" name="prev_salary" required>

    <label for="message">Additional Information:</label>
    <textarea id="message" name="message" rows="4"></textarea>

    <input type="submit" value="Submit">
</form>

</body>
</html>
