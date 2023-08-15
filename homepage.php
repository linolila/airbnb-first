<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="./unsplash-api-php-main/app.css">
    <link rel="stylesheet" href="newhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!--Header-->
    <div class="top-nav clearfix">
       <a href="homepage.html" class="logo">
        <img class="logo" src="images/Airbnb-Logo.png" alt="">
    </a> 
   
    <div id="nav-search-wrapper">
        <form action="homepage.html" method="post">
            <!-- <i class="fa-thin fa-magnifying-glass"></i> -->
             <!-- <input type="text" id="nav-search" name="search" placeholder="Search"/> -->
             <!-- <button type="submit" class="search-btn" name="search"><p>search</p></button> -->

        </form>
    </div>

      <ul>
        <li><a href="">Become a Host</a></li>
        <li><a href="">Help</a> </li>
        <li><a href="signup.php">Sign Up</a> </li>
        <li><a href="login.php">Log In</a> </li>
      </ul>
   
</div>

    <!-- moto -->
    
    <div class="row">
            <h1 id="moto"><span> Where to? </span>Start your next trip <br> on Airbnb.</h1>
    </div>
   
    <section class="search-row">
            
       <input class="search-input" type="text" placeholder="Where to?"></input>
        
         <div class="checks-input">
                
            <input class="check-in" type="date" placeholder="Check In"></input>
    
            <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
            </svg>
    
            <input class="check-out" type="date" placeholder="Check Out"></input>

        </div>
    
        <select class="guests" name="guests">
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

  
            <button class="search-btn"> Search </button>
    
            
     </section>
        <!-- display sliders -->
        
        <div id="display-sliders-wrapper">
            <div class="row">
            
                <div class="display-slider">
               
        
                  
                  </div>
                </div>
                
              </div>

         <!-- Footer Start  -->
         <section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href=""><i class="fas fa-angle-right "> </i>home</a>
            <a href=""><i class="fas fa-angle-right "> </i>about</a>
            <a href=""><i class="fas fa-angle-right "> </i>package</a>
            <a href=""><i class="fas fa-angle-right "> </i>book</a>


        </div>
        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right "> </i>ask questions</a>
            <a href="#"><i class="fas fa-angle-right "> </i>about us</a>
            <a href="#"><i class="fas fa-angle-right "> </i>privacy policy </a>
            <a href="#"><i class="fas fa-angle-right "> </i>terms of use</a>
            

        </div>
        <div class="box">
            <h3>contact links</h3>
            <a href="#"><i class="fas fa-angle-right "> </i> +251-234-234-234 </a>
            <a href="#"><i class="fas fa-angle-right "> </i>  </a>
            <a href="#"><i class="fas fa-angle-right "> </i> swegb@gmail.com </a>
            <a href="#"><i class="fas fa-angle-right "> </i> addis ababa, ethiopia- 34403</a>
            

        </div>
        <div class="box">
            <h3>contact links</h3>
            <a href="#"><i class="fab fa-facebook "> </i> facebook </a>
            <a href="#"><i class="fab fa-instagram "> </i> twitter </a>
            <a href="#"><i class="fab fa-twitter "> </i> instagram </a>
            <a href="#"><i class="fab fa-linkedin "> </i> linkedin </a>

    </div>
    <div class="credit">© 2022 <span>Airbnb</span> , Inc</div>

</section>

      <!-- Footer End  -->


       
    <!-- javascript import -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="functions.js"></script>


</body>
</html>  
