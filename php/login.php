<html>
    <head>
<script src="js/index.js"></script>
    <script src="js/validateForm.js"></script>
    <script>
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState = 4 && xhttp.status == 200)
          xhttp.responseText;
      };
      xhttp.open("GET", "conn.php?action=is_logged_in", false);
      xhttp.send();

      //alert(xhttp.responseText);
      if(xhttp.responseText == "")
        window.location.href = "http://localhost/Pharmacy-Management/index.html";
      if(xhttp.responseText == "true")
        window.location.href = "http://localhost/Pharmacy-Management/home.php";

    </script>
    </head>
<?php

session_start();
include "conn.php" ;

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	 $username = validate($_POST['username']);
	 $password = validate($_POST['password']);

	if (empty($username)) {
		//header("Location: ../index.php?error=Username is required");
        header("Location: ../index.php?echo '<script> alert('username is required');</script>';");
        //echo "<script> alert('Username is required');</script>";
	    exit();
	}else if(empty($password)){
        header("Location: ../index.php?echo '<script> alert('Password is required');</script>';");
        //header("Location: ../index.php?error=Password is required");
        //echo '<script> alert("Password is required");</script>';
	    exit();
	}
    else{
		if($_SERVER["REQUEST_METHOD"] == "POST"){

            $username=validate($_POST["username"]);
            $password=validate($_POST["password"]);
            
            $sql= "SELECT * FROM login WHERE username ='".$username."' AND password ='".$password."'";
            
            $result = mysqli_query($data,$sql);
            $row = mysqli_fetch_assoc($result);
            
            if($row["usertype"] =="admin")
            {
                $_SESSION["username"]=$username;
               header("location:../Dashboard.php");
              // echo "admin";
              exit();
                
            }
            else if($row["usertype"] == "cashier"){
                $_SESSION["username"]=$username;
               header("location:../Sell_Medicine.php");
               exit();
            //echo "user";
            } else if($row["usertype"] == "pharmacist"){
                $_SESSION["username"]=$username;
               header("location:../Medicine stock 2.php");
            //echo "user";
            exit();
            }
            
		        
				
            else{
				header("Location: ../index.php?error=Incorect Username or Password");
		        exit();
			}
		}
		else{
			header("Location: ../index.php?error=Incorect Username or Password");
	        exit();
		}
	}
	
}
else{
	header("Location: ../index.php");
	exit();
}



?>

</html>
<!-- if($_SERVER["REQUEST_METHOD"] == "POST"){

$username=$_POST["username"];
$password=$_POST["password"];

$sql= "SELECT * FROM login WHERE username ='".$username."' AND password ='".$password."'";

$result = mysqli_query($data,$sql);
$row = mysqli_fetch_assoc($result);

if($row["usertype"] =="admin")
{
    $_SESSION["username"]=$username;
   header("location:Dashboard.php");
  // echo "admin";
    
}
else if($row["usertype"] == "casher"){
    $_SESSION["username"]=$username;
   header("location:Sell_Medicine.php");
//echo "user";
} else if($row["usertype"] == "pharmacy"){
    $_SESSION["username"]=$username;
   header("location:Medicine stock.php");
//echo "user";
}
else 
{
    echo"username or password is not correcrt";
}
} -->