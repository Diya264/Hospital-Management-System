<?php
include 'connect.php';

// Initialize variables
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are filled
    if (!empty($_POST['AppointmetID']) && !empty($_POST['PatientID']) && !empty($_POST['DoctorID']) && !empty($_POST['AppointmenrDateTime'])) {
        // Sanitize form data
        $AppointmetID = mysqli_real_escape_string($con, $_POST['AppointmetID']);
        $PatientID = mysqli_real_escape_string($con, $_POST['PatientID']);
        $DoctorID = mysqli_real_escape_string($con, $_POST['DoctorID']);
        $AppointmenrDateTime = mysqli_real_escape_string($con, $_POST['AppointmenrDateTime']);

        // Insert data into the appointments table
        $sql = "INSERT INTO Appointments (AppointmetID, PatientID, DoctorID, AppointmenrDateTime) 
                VALUES ('$AppointmetID', '$PatientID', '$DoctorID', '$AppointmenrDateTime')";
        
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "<p class='success-message'>Appointment added successfully!</p>";
        } else {
            $message = "<p class='error-message'>Error: " . mysqli_error($con) . "</p>";
        }
    } else {
        $message = "<p class='error-message'>All fields are required.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
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
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
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

        .message {
            text-align: center;
            margin-top: 20px;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Appointment</h1>
        <?php echo $message; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="AppointmetID">Appointment ID:</label>
            <input type="text" id="AppointmetID" name="AppointmetID" required>
            
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID" name="PatientID" required>
            
            <label for="DoctorID">Doctor ID:</label>
            <input type="text" id="DoctorID" name="DoctorID" required>
            
            <label for="AppointmenrDateTime">Appointment Date & Time:</label>
            <input type="datetime-local" id="AppointmenrDateTime" name="AppointmenrDateTime" required>
            
            <input type="submit" name="submit" value="Add Appointment">
        </form>
    </div>
    <div class="goback-btn-container">
        <button class="goback-btn" onclick="window.location.href = 'appointments.php';">Go Back</button>
    </div>
</body>
</html>
