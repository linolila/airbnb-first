<?php
require_once "database/Database.php";
require_once "user/user.php";
require_once "homes/homes.php";
$user = new User($connection);
$homes = new Homes($connection);
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
}
$user_id = $_SESSION["user_id"];
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $rating = $_POST["rating"];

    
    // File upload handling
    $image = $_FILES["image"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $extensions_arr)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File moved successfully
            $date = date("Y-m-d");
            $homes->addHome($title, $description, $price, $rating, $image, $date, $user_id);
            echo "Home uploaded successfully";
            header("Location: index.php");
            exit(); // Add an exit() after header to prevent further execution
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "Invalid file type";
    }
}
 elseif (isset($_POST["changeProfile"])) {
    $image = $_FILES["profile_image"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $extensions_arr)) {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // File moved successfully
            $user_id = $_SESSION["user_id"];
            $user->updateProfilePicture($user_id, $image);
            echo "Profile picture updated successfully";
            header("Location: profile.php");
            exit();
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "Invalid file type";
    }
}


// Fetch user profile
$userProfile = $user->getUser($_SESSION["user_id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="./unsplash-api-php-main/app.css">
    <link rel="stylesheet" href="css/newhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Add custom CSS for profile section and home upload form */
        #profile_section {
            float: left;
            width: 50%;
        }

        #home_upload_section {
            float: right;
            width: 50%;
        }

        /* #home_upload_section form {
            /* Add your custom styling for the form */
         */

        .container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}



.card-img-top {
  width: 100%;
  margin: 0 auto;
}
.card {
  padding: 1.5em 0.5em 0.5em;
  text-align: center;
  border-radius: 2em;
}
.card-title {
  font-weight: bold;
  font-size: 1.5em;
}
.btn-primary {
  border-radius: 2em;
  padding: 0.5em 1.5em;
}


</style>
</head>
<body>
    <div class="top-nav clearfix">
        <a href="homepage.html" class="logo">
            <img class="logo" src="images/Airbnb-Logo.png" alt="">
        </a> 
       
        <div id="nav-search-wrapper">
            <form action="homepage.html" method="post">
                <!-- Add your search form HTML code here -->
            </form>
        </div>
    
        <ul>
            <li><a href="">Become a Host</a></li>
            <li><a href="">Help</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">LogOut</a></li>
        </ul>
    </div>
    <section>
        <div id="profile_section" style="margin-left:100px; margin-top:30px;">
          
        
        <div class="card" style="width: 18rem;">
    <img src="uploads/<?php echo $userProfile['profile_pic']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $userProfile['username']; ?></h5>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="profile_image" accept="image/*" style="display: none;" id="profile_image_input">
            <label style="font-size:15px;" for="profile_image_input" class="btn btn-primary">Change Profile</label><br>
            <button class="btn btn-primary" type="submit" name="changeProfile" style="">Submit</button>
        </form>
    </div>
</div>
</div>
        </div>

        <div id="home_upload_section" style="margin-top:-320px;">
            <div class="container">  
                <form id="contact" action="" method="post" enctype="multipart/form-data">
                 
                    <h4>Upload Your Home</h4>
                    <fieldset>
                    <input name="title"  placeholder="Title" type="text" tabindex="1" required autofocus>
                    </fieldset>
                    <fieldset>
                    <textarea name="description" placeholder="Type your description here...." tabindex="5" required></textarea>
                    </fieldset>
                    <fieldset>
                    <input placeholder="Price" type="text" name="price"tabindex="3" required>
                    </fieldset>
                    <fieldset>
                    <input placeholder="Rating" type="text" name="rating" tabindex="4" required>
                    </fieldset>
                    <fieldset>
                    <input type="file" id="image" name="image" required>  </fieldset>
                    <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Upload</button>
                    </fieldset>
                   </form>
                </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="functions.js"></script>
</body>
</html>
