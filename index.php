<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
/*session_set_cookie_params(3600,"/");*/
session_start();

 if ($_SESSION['logged'] == 1) {
   header("location: profile.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Hotel Reservation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googlepis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="normalize.css">
</head>

</head>

<body>

  <div class= "navbar">
    <ul>
      <li><a href="#home"><b> HOME</b> </a>
        <ul>
            <li><a href="aboutUs.html"><b>About Us</b></a></li>
            <li><a href="vision.html"><b>Vision and Mission</b></a></li>

          </ul>
      </li>
      <li><a href="#booking"><b> BOOKING</b></a>
        <ul>
              <li><a href="list.php"><b>Reservation</b></a></li>
        </ul>
      </li>
      <li><a href="#"><b>GALLERY</b></a>
        <ul>
          <li><a href="gallery.html"><b>Timeline Photos</b></a></li>
        </ul>
      </li>

      <li><a href="contact.html"><b>CONTACT</b></a></li>
      <li style="float: right; padding: 0px;"><a href="login.php"><i class="fa fa-circle-o-notch"></i></a></li>
      <li style="float: right;"><a href="register.php"><b>REGISTER</b></a></li>

    </ul>
  </div>

  <section class= "aaa_image">
    <div class="aaa_wrapper">
      <h1><b>WELCOME to BOOK NOW!</b></h1>

    <a href="#" style="display: flex; justify-content: center;"><img src="img/logo.png" width="250px" height="250px" align="middle"></a>



      <form class="form_code" method="post" action="search.php">
        <input class="post_code" type="text" name="find"  placeholder="Find Hotel...">
        <button type="Submit" > Search </button>
      </form>

    </div>
  </section>

  <section class="product">
    <div class="product_list_item">
      <img class=.img-responsive" src="img/1.jpg" alt="">
      <h2 class="product_heading">
        Green Garden court
      </h2>
      <p> THIS HOTEL LOOKS PRETTY GOOD!! SUPERGOOD!!</p>
    </div>

    <div class="product_list_item">
      <img class=.img-responsive" src="img/2.jpg" alt="">
      <h2 class="product_heading">
        Paradise Resort
      </h2>
      <p> THIS HOTEL LOOKS LIKE GOOD!! SUPERGOOD!!</p>
    </div>

    <div class="product_list_item">
      <img class=.img-responsive" src="img/3.jpg" alt="">
      <h2 class="product_heading">
        Galilie Mansion
      </h2>
      <p> THIS HOTEL LOOKS SUPERGOOD!!</p>
    </div>
  </section>
</body>
</html>
