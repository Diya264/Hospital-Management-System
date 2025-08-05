<?php
include 'connect.php';

// Initialize variables
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are filled
    if (!empty($_POST['PatientId']) && !empty($_POST['BillAmount']) && !empty($_POST['BillDate']) && !empty($_POST['PaymentStatus'])) {
        // Sanitize form data
        $PatientId = mysqli_real_escape_string($con, $_POST['PatientId']);
        $BillAmount = mysqli_real_escape_string($con, $_POST['BillAmount']);
        $BillDate = mysqli_real_escape_string($con, $_POST['BillDate']);
        $PaymentStatus = mysqli_real_escape_string($con, $_POST['PaymentStatus']);

        // Insert data into the bills table
        $sql = "INSERT INTO Bills (PatientId, BillAmount, BillDate, PaymentStatus) 
                VALUES ('$PatientId', '$BillAmount', '$BillDate', '$PaymentStatus')";
        
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "<p class='success-message'>Bill added successfully!</p>";
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
    <title>Add Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="date"],
        select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            align-self: center;
            width: 100%;
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

        .back-btn:hover {
            background-color: #ddd;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Add Bill</h1>
        <?php echo $message; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="PatientId">Patient ID:</label>
            <input type="text" id="PatientId" name="PatientId" required>
            
            <label for="BillAmount">Bill Amount:</label>
            <input type="text" id="BillAmount" name="BillAmount" required>
            
            <label for="BillDate">Bill Due Date:</label>
            <input type="date" id="BillDate" name="BillDate" required>
            
            <label for="PaymentStatus">Status:</label>
            <select id="PaymentStatus" name="PaymentStatus" required>
                <option value="">Select Status</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
            
            <input type="submit" name="submit" value="Add">
        </form>
    </div>
    <div class="goback-btn-container">
        <button class="goback-btn" onclick="window.location.href = 'Bills.php';">Go Back</button>
    </div>
</body>
</html>
