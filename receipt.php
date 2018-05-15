<?php
require 'db.php';
session_start();

if ($_SESSION['logged'] == 1){
   $inn = "logout.php";
 }
 else {
   $inn = "login.php";
 }

 if(!$_SESSION['logged']){
     echo "<script type='text/javascript'>
            alert('Log in First!!!');
            window.location.href ='login.php';
            </script>";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>

</head>
<body>

<?php
  $id = $_GET['id'];
?>
<nav class="navbar navbar-inverse" style="background-color: #77DE92">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="list.php">Reservation</a></li>
        <li><a href="gallery.html">GALLERY</a></li>
        <li><a href="contact.html">CONTACT</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $inn; ?>"><span class="glyphicon glyphicon-log-in"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container">
    <div class="row content">
    <div class="col-sm-2">
    
    </div>
   
    <div id="nice" class="col-sm-8">
    <br>
      <h1 align="center">Thanks for using HBR</h1>
    
      <table class="table borderless">
        <tbody>
          <?php
          $result = $mysqli->query("SELECT * FROM records where id = '$id' ");
          $hotel = $result->num_rows;
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              ?>
              <tr>
                  <td><STRONG>HOTEL</STRONG></td>
                  <td align="right"><?php echo $row['hname']; ?></td>
              </tr>
              <tr>
                  <td><STRONG>BENEFITS</STRONG></td>
                  <td align="right"><?php echo $row['dep']; ?></td>
              </tr>
              <tr>
                  <td><STRONG>CHECK IN DATE</STRONG></td>
                  <td align="right"><?php echo $row['check_in']; ?></td>
              </tr>
              <tr>
                  <td><STRONG>CHECK OUT DATE</STRONG></td>
                  <td align="right"><?php echo $row['check_out']; ?></td>
              </tr>
              <tr>
                  <td><STRONG>PRICE</STRONG></td>
                  <td align="right"><?php echo $row['plan']; ?></td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
      <div align="right">
      <a href="list.php" class="btn btn-warning">back</a> &nbsp&nbsp <button onclick="print()" class="btn btn-default">PRINT</button></div>
      
    </div>
  <div class="col-sm-2">
    
    </div>
  </div>
</div>

<script>
function print() {
  var prtContent = document.getElementById("nice");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=500,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

</body>
</html>

