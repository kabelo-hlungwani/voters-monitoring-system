<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>App.VMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Table-Fixed-Header.css">
    <link rel="stylesheet" href="assets/css/Customizable-Background--Overlay.css">
    <link rel="stylesheet" href="assets/css/LinkedIn-like-Profile-Box.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<?php
 
 include 'connect.php'; 

if(isset($_POST['email']) && isset($_POST['password'])){
 //Assign
 session_start();
$email=$_POST['email'];
$password=md5($_POST['password']);
$lati=$_POST['lati'];
$long=$_POST['long'];


//check record


$query="select * from staff where email='$email'and password='$password' and position='Photographer'";



$result=mysqli_query($conn,$query) or die(mysqli_error($conn));


$row=mysqli_fetch_array($result);


if($row !== null && strtolower($row['email'])==strtolower($email) && $row['password']==$password)
{


   
    $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];
    $_SESSION['staff_id']=$row['staff_id'];
    $id=$_SESSION['staff_id'];
    $_SESSION['latitude']=$lati;
    $_SESSION['longitude']=$long;
   
    
echo '<script>window.location = "profile.php";</script>';  
    

}else
{


echo '<script>alert("Wrong login credentials provided.");window.location = "index.php";</script>';  
 exit;

}

}

?>
<script>

    
    function validateForm() 
    {
    var uerror=document.getElementById("uerror");
    var perror=document.getElementById("perror");
    



    
    if(document.forms["form"]["email"].value=="" && document.forms["form"]["password"].value=="")
    {
    
    uerror.innerHTML="<span style='color:red;,font-family: Alata, sans-serif;''>"+" email address required *</span>"
    perror.innerHTML="<span style='color:red;,font-family: Alata, sans-serif;''>"+" password required *</span>"
   
    
    return false;
    
    }
    else
    {



    if(document.forms["form"]["email"].value=="")
    {
    
    uerror.innerHTML="<span style='color:red;,font-family: Alata, sans-serif''>"+" email address required *</span>"
    
    return false;
    
    }else
    {
     
        uerror.innerHTML="";

    }

    
    if(document.forms["form"]["password"].value=="")
    {
    
    perror.innerHTML="<span style='color:red;,font-family: Alata, sans-serif''>"+" password required *</span>"
    
    return false;
    
    }
    else
    {

        perror.innerHTML="";


    }

//

    }
    
    }
    </script>
<body style="font-family: Arsenal, sans-serif;">
    <section class="login-dark" style="background: transparent;height: 749px;">
        <div style="height: 238px;background: url(&quot;assets/img/pexels-fauxels-3184450.jpg&quot;) center / cover no-repeat;">
            <div class="d-flex justify-content-center align-items-center" style="height: inherit;min-height: initial;width: 100%;position: absolute;left: 0;background: rgba(37,178,225,0.04);"></div>
        </div>
        <form action="" name="form" onsubmit="return validateForm();" method="post" style="margin-top: -125px;background: rgb(255,255,255);border-radius: 10px;">
            <p style="color: rgb(16,16,16);text-align: center;">
                <picture><img src="assets/img/scanningwoohoo.gif" style="height: 77px;"></picture>
            </p>
            <h1 style="color: rgb(37,178,225);font-size: 18px;text-align: center;font-weight: 500;">Data Capture</h1>
            <div class="form-group"><input class="form-control" type="email" name="email" id="email" placeholder="Email" style="color: rgb(37,178,225);border-color: rgb(37,178,225);"><span id="uerror"></span></div>
            <div class="form-group"><input class="form-control" type="password" id="password"name="password" placeholder="Password" style="color: rgb(37,178,225);border-color: rgb(37,178,225);"><span id="perror"></span></div>
            <input id="demo" style="display:none;" name="lati" type="text">
	
	<input id="check" name="long" style="display:none;"  type="text">
	<script>
	var x = document.getElementById("demo");
	var y = document.getElementById("check");
	var b = document.getElementById("b");
	function getLocation() {
	  	if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(showPosition);
	  	} else { 
	    	x.innerHTML = "Geolocation is not supported by this browser.";
	  	}

         
  var x = document.getElementById("b");
  var p = document.getElementById("btn");
  if (x.style.display === "none") {
    x.style.display = "block";
    
  } else {
    x.style.display = "none";
    p.disabled = false;
    
  }
}
	

	function showPosition(position) {
		console.log(position);
	 
		y.value=position.coords.latitude;
		x.value=position.coords.longitude;
        
       
		
	}
  
	</script>

    <div class="form-group"><button class="btn btn-block" type="button" id="b" onclick="getLocation()"  style="background: rgb(37,178,225);color: rgb(255,255,255);">Access Geo Location</button></div>
            <div class="form-group"><button class="btn btn-block" type="submit" disabled  id="btn" style="background: rgb(37,178,225);color: rgb(255,255,255);">Log In</button></div>

           <div><a class="forgot" href="#" style="color: rgb(37,178,225);font-weight: 400;font-size: 14px;">Forgot your email or password?</a></div>


           
        </form>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>


</html>