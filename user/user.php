<?php
class User {
    private $connection;

    public function __construct(mysqli $connection) {
        $this->connection = $connection;
    }

    public function addUser($name, $email, $password) {
        $query = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        // hash a password before inserting
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        return $stmt->insert_id;
    }

    // login user 
    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password_hash"])) {
            // set session variables
            session_start();
            $_SESSION["user_id"] = $user["id"];
            session_write_close();
            return True;
        } else {
            return false;
        }
    }
    public function getUser($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($id, $name, $email, $password) {
        $query = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sssi", $name, $email, $password, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    // change profile picture of user 
    public function updateProfilePicture($id, $image) {
        $query = "UPDATE users SET profile_pic = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $image, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}



?>