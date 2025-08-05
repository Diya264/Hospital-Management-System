<?php
include 'connect.php';

// Initialize variables
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are filled
    if (!empty($_POST['RecordID']) && !empty($_POST['PatientID']) && !empty($_POST['DoctorID']) && !empty($_POST['Date']) && !empty($_POST['Diagnosis']) && !empty($_POST['Treatment'])) {
        // Sanitize form data
        $RecordID = mysqli_real_escape_string($con, $_POST['RecordID']);
        $PatientID = mysqli_real_escape_string($con, $_POST['PatientID']);
        $DoctorID = mysqli_real_escape_string($con, $_POST['DoctorID']);
        $Date = mysqli_real_escape_string($con, $_POST['Date']);
        $Diagnosis = mysqli_real_escape_string($con, $_POST['Diagnosis']);
        $Treatment = mysqli_real_escape_string($con, $_POST['Treatment']);

        // Insert data into the medical_procedure table
        $sql = "INSERT INTO medicalrecords (RecordID, PatientID, DoctorID, Date, Diagnosis, Treatment) 
                VALUES ('$RecordID', '$PatientID', '$DoctorID', '$Date', '$Diagnosis', '$Treatment')";
        
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "<p class='success-message'>Medical procedure added successfully!</p>";
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
    <title>Add Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: calc(100% - 130px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
            color: #666;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
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

        p.error-message {
            text-align: center;
            color: red;
        }

        p.success-message {
            text-align: center;
            color: green;
        }
    </style>
</head>
<body>
    <h1>Add Record</h1>
    <?php echo $message; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="RecordID">Record ID:</label>
        <input type="text" id="RecordID" name="RecordID" required><br>
        
        <label for="PatientID">Patient ID:</label>
        <input type="text" id="PatientID" name="PatientID" required><br>
        
        <label for="DoctorID">Doctor ID:</label>
        <input type="text" id="DoctorID" name="DoctorID" required><br>
        
        <label for="Date">Date:</label>
        <input type="date" id="Date" name="Date" required><br><br>

        <label for="Diagnosis">Diagnosis:</label>
        <input type="text" id="Diagnosis" name="Diagnosis" required><br>

        <label for="Treatment">Treatment:</label>
        <input type="text" id="Treatment" name="Treatment" required><br>
        
        <input type="submit" name="submit" value="Add">
    </form>
    <div class="goback-btn-container">
        <button class="goback-btn" onclick="window.location.href = 'medical_procedure.php';">Go Back</button>
    </div>
</body>
</html>
