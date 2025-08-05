<?php
include 'connect.php';

// Initialize variables
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are filled
    if (!empty($_POST['doctorID']) && !empty($_POST['name']) && !empty($_POST['specialization']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['address'])) {
        // Sanitize form data
        $doctorID = mysqli_real_escape_string($con, $_POST['doctorID']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);

        // Insert data into the doctors table
        $sql = "INSERT INTO doctors (doctorID, name, specialization, phone, email, address) 
                VALUES ('$doctorID', '$name', '$specialization', '$phone', '$email', '$address')";
        
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "<p style='text-align: center; color: green;'>Doctor added successfully!</p>";
        } else {
            $message = "<p style='text-align: center; color: red;'>Error: " . mysqli_error($con) . "</p>";
        }
    } else {
        $message = "<p style='text-align: center; color: red;'>All fields are required.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: calc(100% - 130px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .goback-btn-container {
            text-align: center;
            margin-top: 20px;
            
        }

        .goback-btn {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .back-btn:hover {
            background-color: #ddd;
        }

        button:hover {
            background-color: #005f7f;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Doctor</h1>
        <?php echo $message; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="doctorID">Doctor ID:</label>
            <input type="text" id="doctorID" name="doctorID" required><br><br>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization" required><br><br>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea><br><br>
            
            <input type="submit" name="submit" value="Add Doctor">
        </form>
    </div>
    <div class="goback-btn-container">
        <button class="goback-btn" onclick="window.location.href = 'doctor_dashboard.php';">Go Back</button>
    </div>
</body>
</html>
