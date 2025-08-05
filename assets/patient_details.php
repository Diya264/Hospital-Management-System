<?php
include 'connect.php';

if (!$con) {
    die("Database connection failed: " . mysqli_error($con));
}

// Fetch all patients from the database
$sql = "SELECT * FROM patients";
$result = mysqli_query($con, $sql);

// Check if there are any patients
if ($result && mysqli_num_rows($result) > 0) {
    echo "<h1 style='text-align: center; margin-bottom: 20px;'>Patients List</h1>";
    echo "<div style='overflow-x: auto;'>";
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 12px; width: 10%; border: 1px solid #ddd;'>Patient ID</th>";
    echo "<th style='padding: 12px; width: 20%; border: 1px solid #ddd;'>Name</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Date of Birth</th>";
    echo "<th style='padding: 12px; width: 10%; border: 1px solid #ddd;'>Gender</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Phone</th>";
    echo "<th style='padding: 12px; width: 30%; border: 1px solid #ddd;'>Address</th>";
    echo "</tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["PatientID"]) ? $row["PatientID"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Name"]) ? $row["Name"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["DateOfBirth"]) ? $row["DateOfBirth"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Gender"]) ? $row["Gender"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["phone"]) ? $row["phone"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Address"]) ? $row["Address"] : "")."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button style='padding: 10px 20px; background-color: #118d8f; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;' onclick='window.location.href=\"add_patients.php\"'>Add Patient</button>";
    echo "</div>";
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button style='padding: 10px 20px; background-color: #118d8f; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;' onclick='window.location.href=\"home.php\"'>Go Back Home</button>";
    echo "</div>";


} else {
    echo "<p>No patients found</p>";
}

// Close database connection
mysqli_close($con);
?>
