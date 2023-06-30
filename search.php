<?php
require_once 'database/Database.php';

// Retrieve the search parameters from the AJAX request
$title = $_POST['title'];
$checkIn = $_POST['checkInDate'];
$checkOut = $_POST['checkOutDate'];

// Prepare the SQL query to fetch available rooms based on the search parameters
$query = "SELECT * FROM homes WHERE date >= ? AND date >= ? OR title = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("sss",$checkIn ,$checkOut, $title);
$stmt->execute();
$result = $stmt->get_result();
return $result->fetch_all(MYSQLI_ASSOC);

if ($result){
    // display into table
    echo "<table>";
    echo "<tr>";
    echo "<th>title</th>";
    echo "<th>description</th>";
    echo "<th>price</th>";
    echo "<th>rating</th>";
    echo "<th>image</th>";
    echo "<th>date</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "<td>" . $row['image'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}
?>
