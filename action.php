<?php
require 'db.php';
session_start();

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$result = $mysqli->query("SELECT * FROM users WHERE username='$email'");

    	if ( $result->num_rows == 0 ){ // User doesn't exist
            echo "<script type='text/javascript'>
            alert('user not found!!!');
            window.location.href ='login.php';
            </script>";
        }
        else { // User exists
            $user = $result->fetch_assoc();
            if ( $user['password'] == $pass ) {
                $_SESSION['logged'] = 1;
                $_SESSION['name']=$user['fname'].' '.$user['lname'];
            	header("location: profile.php");
            }
            else{
            	echo "<script type='text/javascript'>
            	alert('incorrect password!!!');
            	window.location.href ='login.php';
            	</script>";
            }
        }
}

if(isset($_POST['regis'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$loc = $_POST['loc'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	if ($cpass == $pass){

	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

	if ( $result->num_rows > 0 ) {
        
        echo "<script type='text/javascript'>
            alert('exsisting user!!!');
            window.location.href ='register.php';
            </script>";
          
    }
    else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (fname, lname, email, password, username, loc) " 
    . "VALUES ('$fname','$lname','$email','$pass','$uname','$loc')";
    if ( $mysqli->query($sql) ){
    		 echo "<script type='text/javascript'>
            	alert('Successfully Created');
            		</script>";
            header("location: index.php");
    	}
	}

}

	else{
			echo "<script type='text/javascript'>
            	alert('Password dont match');
            	window.location.href ='register.php';
            		</script>";
	}
}

if(isset($_POST['insert'])){

    $name = $_POST['hname'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    
    echo $a.$b.$c;

    $sql = "INSERT INTO benefits (hname, plan_a, plan_b, plan_c)" 
    . "VALUES ('$name','$a','$b','$c')";
    if ( $mysqli->query($sql) ){
             echo "<script type='text/javascript'>
                alert('Successfully Created');
                window.location.href='test.php';
                    </script>";
        }
    else {
        echo "<script type='text/javascript'>
                alert('ERROR in saving');
                    </script>";
    }
    
}

if(isset($_POST['check'])){

    $name = $_POST['hname'];
    $in = $_POST['in'];
    $out = $_POST['out'];
    $plan = $mysqli->escape_string($_POST['plan']);
    $pro = $_POST['pro'];
    $client = $_SESSION['name'];

    $result = $mysqli->query("SELECT * FROM hotels WHERE hname='$name'");
    $user=$result->fetch_assoc();
    $nice = $user["$pro"];

    $sql = "INSERT INTO records (hname, dep, check_in, check_out, client, plan) " 
    . "VALUES ('$name','$plan','$in','$out','$client', '$nice')";
    if ( $mysqli->query($sql) ){
             echo "<script type='text/javascript'>
                alert('Successfully Created');
                    </script>";
            header("location: list.php");
        }
    
}

    