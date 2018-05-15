<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
/*session_set_cookie_params(3600,"/");*/
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD HOTEL</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="login-page">

  <div class="form">
<h3>ADD HOTEL</h3>
    <form class="register-form" action="action.php" method="post">
      <input name="hname" type="text" placeholder="Hotel Name"/>
      <p>benefits</p>
      <input name="a" type="text" placeholder="Plan A"/>
      <input name="b" type="text" placeholder="Plan B"/>
      <input name="c" type="text" placeholder="Plan C"/>


      <button type="submit" name="insert" >Create</button>

      <p class="message">Already Registered? <a href="#">Login </a></p>
      <a href="index.php" style="color: black;"> Back to Homepage </a>
    </form>
  </div>
</div>

<script src='https://code.jquery.com/jquery-3.2.1.min.js'>
</script>


</body>

</html>
