<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
/*session_set_cookie_params(3600,"/");*/
session_start();
?>
<html>
<head>
<title>Login form</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class ="login-page">
<div class="form">
<form action="action.php" method="post">
  <input name="email" type="text" placeholder ="username"/>
  <input name="password" type="password" placeholder ="password"/>
  <button name= "login" type="submit">Login </button>
<p class="message">Not Registered? <a href = "#"> Register </a></p>
<a href="index.php" style="color: black;"> Back to Homepage </a>
</form>

</div>
</div>

<script src='https://code.jquery.com/jquery-3.2.1.min.js'>
</script>

<script>
$('.message a').click(function(){
$('form').animate({height: "toggle", opacity:"toggle"}, "slow");


});



</script>

</body>

</html>
