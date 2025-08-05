<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #18656e;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #194a59;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .logout-btn {
  
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #194a59;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #194a59; 
        }

        
        .options-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: black;
        }

        .options form {
            text-align: center;
        }

        .options button {
            display: inline-block;
            width: 200px;
            padding: 15px;
            margin: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .options button:hover {
            background-color: #45a049;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .options-container {
                max-width: 400px;
            }

            .options button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <div class="options-container">
        <h2>Welcome</h2>
        <div class="options">
            <form action="patient_details.php" method="GET">
                <button type="submit">Patient</button>
            </form>
            <br>
            <form action="doctor_dashboard.php" method="GET">
                <button type="submit">Doctor's Dashboard</button>
            </form>
            <br>
            <form action="appointments.php" method="GET">
                <button type="submit">Appointments</button>
            </form>
            <br>
            <form action="Bills.php" method="GET">
                <button type="submit">Bills</button>
            </form>
            <br>
            <form action="medical_procedure.php" method="GET">
                <button type="submit">Medical Records</button>
            </form>
        </div>
    </div>
</body>
</html>
