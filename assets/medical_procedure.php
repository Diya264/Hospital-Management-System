<?php
include 'connect.php';

if (!$con) {
    die("Database connection failed: " . mysqli_error($con));
}


$sql = "SELECT * FROM medicalrecords";
$result = mysqli_query($con, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    echo "<h1 style='text-align: center; margin-bottom: 20px;'>Medical Records</h1>";
    echo "<div style='overflow-x: auto;'>";
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Record ID</th>";
    echo "<th style='padding: 12px; width: 25%; border: 1px solid #ddd;'>Patient ID</th>";
    echo "<th style='padding: 12px; width: 30%; border: 1px solid #ddd;'>Doctor ID</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Date</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Diagnosis</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Treatment</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["RecordID"]) ? $row["RecordID"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["PatientID"]) ? $row["PatientID"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["DoctorID"]) ? $row["DoctorID"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Date"]) ? $row["Date"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Diagnosis"]) ? $row["Diagnosis"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Treatment"]) ? $row["Treatment"] : "")."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button style='padding: 10px 20px; background-color: #118d8f; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;' onclick='window.location.href=\"add_medicalprocedure.php\"'>Add</button>";
    echo "</div>";
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button style='padding: 10px 20px; background-color: #118d8f; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;' onclick='window.location.href=\"home.php\"'>Go Back Home</button>";
    echo "</div>";


} else {
    echo "<p>No medical procedures found</p>";
}


mysqli_close($con);
?>
