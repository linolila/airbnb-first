<?php
require_once 'Database.php';

// Retrieve the search parameters from the AJAX request
$title = $_POST['title'];
$checkIn = $_POST['checkInDate'];
$checkOut = $_POST['checkOutDate'];

// Prepare the SQL query to fetch available rooms based on the search parameters
// select * from homes where title like '%title%' and date between 'checkIn' and 'checkOut'
$query = "SELECT * FROM homes WHERE title LIKE ? OR date BETWEEN ? AND ?";
$stmt = $connection->prepare($query);
$title = "%$title%";
$stmt->bind_param("sss", $title, $checkIn, $checkOut);
$stmt->execute();
$result = $stmt->get_result();


if ($result){
    // display into table
    echo "<table>";
    echo "<tr>";
    echo "<th>title</th>";
    echo "<th>price</th>";
    echo "<th>rating</th>";
    echo "<th>date</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} else {
    echo "No results found";
}
?>
