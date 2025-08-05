<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['PatientID']) && !empty($_POST['Name']) && !empty($_POST['DateOfBirth']) && !empty($_POST['Gender']) && !empty($_POST['phone']) && !empty($_POST['Address'])) {
        // Sanitize form data
        $PatientID = mysqli_real_escape_string($con, $_POST['PatientID']);
        $Name = mysqli_real_escape_string($con, $_POST['Name']);
        $DateOfBirth = $_POST['DateOfBirth'];
        $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $Address = mysqli_real_escape_string($con, $_POST['Address']);

       
        $sql = "INSERT INTO patients (PatientID, Name, DateOfBirth, Gender, Phone, Address) 
                VALUES ('$PatientID', '$Name', '$DateOfBirth', '$Gender', '$phone', '$Address')";
        
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<p class='success-message'>Patient added successfully!</p>";
        } else {
            echo "<p class='error-message'>Error: " . mysqli_error($con) . "</p>";
        }
    } else {
        echo "<p class='error-message'>All fields are required.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
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
    <h1>Add Patient</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="PatientID">Patient ID:</label>
        <input type="text" id="PatientID" name="PatientID" required><br>
        
        <label for="Name">Name:</label>
        <input type="text" id="Name" name="Name" required><br>
        
        <label for="DateOfBirth">Date of Birth:</label>
        <input type="date" id="DateOfBirth" name="DateOfBirth" required><br>
        
        <label for="Gender">Gender:</label>
        <select id="Gender" name="Gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="Address">Address:</label>
        <textarea id="Address" name="Address" rows="4" required></textarea><br>
        
        <input type="submit" name="submit" value="Add Patient">
    </form>
    <div class="goback-btn-container">
        <button class="goback-btn" onclick="window.location.href = 'patient_details.php';">Go Back</button>
    </div>
</body>
</html>
