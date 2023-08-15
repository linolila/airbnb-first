<?php
class Homes {
    private $connection;

    public function __construct(mysqli $connection) {
        $this->connection = $connection;
    }

    public function addHome( $title, $description, $price, $rating, $image, $date, $user_id) {
        $query = "INSERT INTO homes (title, description, price, rating, image, date, creator) VALUES (?, ?, ?, ?, ?,?,?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssiissi",  $title, $description, $price, $rating, $image, $date, $user_id);
        $stmt->execute();
        return $stmt->insert_id;
    }

    // fetch all homes
    public function getHomes() {
        $query = "SELECT * FROM homes";
        $result = $this->connection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    // search by title or date and return homes
    public function searchHomes($title, $date) {
        $query = "SELECT * FROM homes WHERE title LIKE ? OR date LIKE ?";
        $stmt = $this->connection->prepare($query);
        $title = "%$title%";
        $date = "%$date%";
        $stmt->bind_param("ss", $title, $date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    

}
?>