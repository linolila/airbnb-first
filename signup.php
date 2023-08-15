<?php
require_once "User/user.php";
require_once "Database.php";
// create instant user object
$user = new User($connection);
// get sign up information from post 
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_conformition = $_POST['password_conformition'];

    // validate password to contain 6 length and at least one alphabet character 
    if (strlen($password) < 6 || !preg_match('/[a-zA-Z]/', $password)) {
        echo "Password must be at least 6 characters and contain at least one alphabet character";
        exit();
    }
    if ($password != $password_conformition) {
        echo "Password does not match";
        exit();
    }

    $user->addUser($name, $email, $password);

    header("Location: signup-success.html");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>sign up</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script  src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"defer></script>
 
  </head>
  <body>
    <div>
        <img src="data:image/jpeg;base64,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">
        </div>
    <h1>Signup</h1>
     <form action="" method="post" id="signup">

      <div> 
        <label for="username">Username</label>
        <input name="name" type="text" id="username" />
      </div>
      <div>
        <label for="Email">Email</label>
        <input name="email" type="text" id="email" />
      </div>
      <div>
        <label for="password">Password</label>
        <input name="password" type="password" id="password" />
      </div>
      
      <div>
        <label for="password_conformition">Confirm</label>
        <input name="password_conformition" type="password" id="password_conformition" />
      </div>
      <input name="signup" type="submit" value="Signup" />
    </form>
    <div>
      Already have account? <a href="login.php">Login</a>
    </div>
  </body>
</html>




