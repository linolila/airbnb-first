<?php
require_once "Database/Database.php";
require_once "user/user.php";
require_once "homes/homes.php";

$user = new User($connection);
$homes = new Homes($connection);
$allHomes = $homes->getHomes();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
} 
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



.grid {
    margin-top: 50px;
    margin-bottom: 50px;
    padding: 10px;
  display: grid;
  width: 114rem;
  grid-gap: 6rem;
  grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
  align-items: start;
}
@media (max-width: 60em) {
  .grid {
    grid-gap: 3rem;
  }
}
.grid__item {
  background-color: #fff;
  border-radius: 0.4rem;
  overflow: hidden;
  box-shadow: 0 3rem 6rem rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: 0.2s;
}
.grid__item:hover {
  transform: translateY(-0.5%);
  box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.2);
}

.card__img {
  display: block;
  width: 100%;
  height: 20rem;
  object-fit: cover;
}
.card__content {
  padding: 2rem 2rem;
}
.card__header {
  font-size: 2rem;
  font-weight: 500;
  color: #0d0d0d;
  margin-bottom: 1.5rem;
}
.card__text {
  font-size: 1.2rem;
  letter-spacing: 0.1rem;
  line-height: 1.7;
  color: #3d3d3d; 
}
.card__btn {
  display: block;
  width: 100%;
  padding: 1.5rem;
  font-size: 2rem;
  text-align: center;
  color: #3363ff;
  background-color: #e6ecff;
  border: none;
  border-radius: 0.4rem;
  transition: 0.2s;
  cursor: pointer;
}
.card__btn span {
  margin-left: 1rem;
  transition: 0.2s;
}
.card__btn:hover, .card__btn:active {
  background-color: #dce4ff;
}
.card__btn:hover span, .card__btn:active span {
  margin-left: 1.5rem;
}


.homes {
  display: flex;
  justify-content: center;
  align-content: center;
  padding: 6rem;
  background-color: #f5f5f5;
  font-family: "Inter", sans-serif;
}
@media (max-width: 60em) {
  .homes{
    padding: 3rem;
  }
}


        #results {
            background-color: #f2f2f2;
            padding: 20px;
            margin-top: -1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    </style>
</head>
<body>
    <!--Header-->
    <div class="top-nav clearfix">
       <a href="homepage.html" class="logo">
        <img class="logo" src="images/Airbnb-Logo.png" alt="">
    </a> 
   
    <div id="nav-search-wrapper">
        <form action="homepage.html" method="post">
 
        </form>
    </div>

      <ul>
      <!-- <li><a href="">Become a Host</a></li>
            <li><a href="">Help</a></li> -->
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">LogOut</a></li>
      </ul>
   
</div>

    <!-- moto -->
    
    <div class="row">
            <h1 id="moto"><span> Where to? </span>Start your next trip <br> on Airbnb.</h1>
    </div>
   
<section class="search-row">
  <div>
    <input name="title" class="search-input" type="text" placeholder="Where to?" id="searchTitle">
    <div class="checks-input">
        <input name="checkInDate" class="check-in" type="date" placeholder="Check In" id="checkInDate">
        <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 0 24 24" width="24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
        </svg>
        <input name="checkOutDate" class="check-out" type="date" placeholder="Check Out" id="checkOutDate">
    </div>
    <select class="guests" name="guests" id="guests">
        <option>1 Guest</option>
        <option>2 Guests</option>
        <option>3 Guests</option>
        <option>4 Guests</option>
        <option>5 Guests</option>
        <option>6 Guests</option>
        <option>7 Guests</option>
        <option>8 Guests</option>
        <option>9 Guests</option>
        <option>10 Guests</option>
        <option>11 Guests</option>
        <option>12 Guests</option>
        <option>13 Guests</option>
        <option>14 Guests</option>
        <option>15 Guests</option>
        <option>16+ Guests</option>
    </select>
         &nbsp; &nbsp;  <input class="search-btn" type="button" value="SEARCH" id="sbtn">
           <br>
           <div>
           <div id="results" style="color:#111"></div>
 
</section>
<br>
<br>

<section class="homes">
<div class="grid">
  <?php foreach ($allHomes as $home): ?>
    <div class="grid__item">
      <div class="card">
        <img class="card__img" src="uploads/<?php echo $home['image']; ?>" alt="<?php echo $home['title']; ?>">
        <div class="card__content">
          <h1 class="card__header"><?php echo $home['title']; ?></h1>
          <p class="card__text"><?php echo $home['description']; ?></p>
          <p class="card__text"><?php echo $home['date']; ?></p>
          <p class="card__text">$<?php echo $home['price']; ?></p>
          <!--- Get username from $home['creator'] and display -->
          <p class="card__text">By <?php echo $user->getUser($home['creator'])['username']; ?></p>

          
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
  </section>










         <!-- Footer Start  -->
         <section class="footer">
    <div class="box-container" style="padding:30px;">
        <div class="box">
            <h3 style="font-size:20px;">Qick links</h3>
            <a href=""><i class="fas fa-angle-right "> </i>home</a>
            <a href=""><i class="fas fa-angle-right "> </i>about</a>
            <a href=""><i class="fas fa-angle-right "> </i>package</a>
            <a href=""><i class="fas fa-angle-right "> </i>book</a>


        </div>
        <div class="box">
            <h3 style="font-size:20px;">Extra links</h3>
            <a href="#"><i class="fas fa-angle-right "> </i>ask questions</a>
            <a href="#"><i class="fas fa-angle-right "> </i>about us</a>
            <a href="#"><i class="fas fa-angle-right "> </i>privacy policy </a>
            <a href="#"><i class="fas fa-angle-right "> </i>terms of use</a>
            

        </div>
        <div class="box">
            <h3 style="font-size:20px;">Contact links</h3>
            <a href="#"><i class="fas fa-angle-right "> </i> +251-234-234-234 </a>
 
            <a href="#"><i class="fas fa-angle-right "> </i> swegb@gmail.com </a>
            <a href="#"><i class="fas fa-angle-right "> </i> addis ababa, ethiopia- 34403</a>
            

        </div>
        <div class="box">
            <h3 style="font-size:20px;">Contact links</h3>
            <a href="#"><i class="fab fa-facebook "> </i> facebook </a>
            <a href="#"><i class="fab fa-instagram "> </i> twitter </a>
            <a href="#"><i class="fab fa-twitter "> </i> instagram </a>
            <a href="#"><i class="fab fa-linkedin "> </i> linkedin </a>

    </div>
    <div class="credit">© 2022 <span>Airbnb</span> , Inc</div>

</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sbtn').click(function() {
                var title = document.getElementById("searchTitle").value;
                var checkInDate = document.getElementById("checkInDate").value;
                var checkOutDate = document.getElementById("checkOutDate").value;
                var guests = document.getElementById("guests").value;

                $.ajax({
                    url: 'search.php',
                    type: 'POST',
                    data: {
                        title,
                        checkInDate,
                        checkOutDate
                    },
                    success: function(response) {
                        $('#results').html(response);
                    }
                });
            });
        });
    </script>
   
</body>
</html>  
