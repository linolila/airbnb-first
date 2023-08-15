<?php
include 'Database.php';
if (empty($_POST["username"])) {
    die("Username is required");
}
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("valid email is required");
}
if (strlen($_POST["password"]) < 8) {
    die("password must be at least 8 characters");
}
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("password must contain at least one letter");
}
if (!preg_match("/[0-9]/i", $_POST["password"])) {
    die("password must contain at least one number");
}
if ($_POST["password"] !== $_POST["password_conformition"]) {
    die("password must match");
}
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username,email,password_hash) VALUES(?,?,?)";
$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param(
    "sss",
    $_POST["username"],
    $_POST["email"],
    $password_hash
);
if ($stmt->execute()) {
    echo "Your Created";
    //header("Location: signup-success.html");
    exit;
} else {
    echo "Error";
    die($mysqli->error . "" . $mysqli->error);
}
