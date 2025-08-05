<?php
include 'connect.php';

if (!$con) {
    die("Database connection failed: " . mysqli_error($con));
}

$sql = "SELECT * FROM doctors";
$result = mysqli_query($con, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    echo "<h1 style='text-align: center; margin-bottom: 20px;'>Doctors List</h1>";
    echo "<div style='overflow-x: auto;'>";
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 12px; width: 10%; border: 1px solid #ddd;'>Doctor ID</th>";
    echo "<th style='padding: 12px; width: 20%; border: 1px solid #ddd;'>Name</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Specialization</th>";
    echo "<th style='padding: 12px; width: 15%; border: 1px solid #ddd;'>Phone</th>";
    echo "<th style='padding: 12px; width: 40%; border: 1px solid #ddd;'>Address</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["DoctorID"]) ? $row["DoctorID"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Name"]) ? $row["Name"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Specialization"]) ? $row["Specialization"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Phone"]) ? $row["Phone"] : "")."</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>".(isset($row["Address"]) ? $row["Address"] : "")."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button style='padding: 10px 20px; background-color: #118d8f; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;' onclick='window.location.href=\"add_doctor.php\"'>Add Doctor</button>";
    echo "</div>";
    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button style='padding: 10px 20px; background-color: #118d8f; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;' onclick='window.location.href=\"home.php\"'>Go Back Home</button>";
    echo "</div>";


} else {
    echo "<p>No doctors found</p>";
}

mysqli_close($con);
?>


