<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("DB Connection failed: " . mysqli_connect_error());
}


$result = $conn->query("SELECT * FROM view_employee");

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Employment Date</th>
        <th>Manager Name</th>
        <th>Department Name</th>
        <th>Location</th>
      </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Employee ID"] . "</td>";
        echo "<td>" . $row["First Name"] . " " . $row["Last Name"] . "</td>";
        echo "<td>" . $row["Job Title"] . "</td>";
        echo "<td>" . $row["Start Date"] . " - " . $row["End Date"] . "</td>";
        echo "<td>" . $row["Manager First Name"] . " " . $row["Manager Last Name"] . "</td>";
        echo "<td>" . $row["Department Name"] . "</td>";
        echo "<td>" . $row["Street"] . ", " . $row["Postal Code"] . ", " . $row["City"] . ", " . $row["State/Province"] . ", " . $row["Country Name"] . ", " . $row["Region Name"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}
echo "</table>";

$conn->close();
?>

