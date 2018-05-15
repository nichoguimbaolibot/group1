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
  $plan= $_GET['plan'];
  if(empty($id)){
    header("Location: search.php");
  }
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
    <div class="col-sm-3">
    <a href="index.php"><img src="img/logo.png" width="75px" height="75px"></a>
     <form action ="search.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" name ="find" placeholder="Search ..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <hr>

      <select name="sort" placeholder="Sort BY">
            <option value="hname">Hotels</option>
            <option value="plan_c">Prices</option>
            <option value="loc">Location</option>
            <option value="rating">Rates</option>
      </select>
      <hr>
      <select name="order" placeholder="Order BY">
            <option value="ASC">ASCENDING</option>
            <option value="DESC">DESCENDING</option>
      </select>
      <hr>
      <button class="btn btn-default" type="submit">
            <span> SEARCH </span>
          </button>
    </form>
    </div>

    <div class="col-sm-9">
    <br>
      <?php
          $result = $mysqli->query("SELECT * FROM benefits where id= '$id' ");
          $hotel = $result->num_rows;
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              ?>
                <div class="wells">
                <form action="action.php" method="post">
                  <h3><?php echo $row['hname']; ?></h3>
                  <p><?php echo $row["$plan"]; ?></p>
                  CHECK IN:
                  <input type="date" name="in" required>
                  CHECK OUT:
                  <input type="date" name="out" required>
                  <input type="hidden" name="pro" value="<?php echo $plan; ?>">
                  <input type="hidden" name="plan" value="<?php echo $row["$plan"]; ?>">
                  <input type="hidden" name="hname" value="<?php echo $row['hname']; ?>">
                  <button class="btn btn-default" name="check" type="submit">VERIFY</button>
                </form>
                </div>
              <?php
            }
          }
          ?>

    </div>
  </div>
</div>
</body>
</html>
