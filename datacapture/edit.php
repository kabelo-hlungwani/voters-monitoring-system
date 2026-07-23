<!DOCTYPE html>
<html lang="en">

    <?php
    include 'connect.php';
      
      // Check connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
       session_start();
       $email=$_SESSION['email'];
  
  $id=$_GET['p'];
  
  
  $qry=mysqli_query($conn,"select * from staff WHERE staff_id='$id'");
  $data=mysqli_fetch_array($qry);
  
  
  if(isset($_POST['save']))
  {
  
      
      
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $idno=$_POST['idno'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  
    
  $command="UPDATE  staff
   SET 
   first_name='$fname',last_name='$lname',id_number='$idno',email='$email',phone='$phone'
   WHERE staff_id='$id'and position='Photographer'";
  
  
  
  $edit=mysqli_query($conn,$command);
    
  
  if($edit){
  mysqli_close($conn);
  
       
  echo '<script>alert("Profile updated.");window.location = "profile.php";</script>';
  
  exit;
  
  }
  else
  {
      echo mysqli_error();
  
  }
  }
  
  
  ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>mobile</title>
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

<body style="font-family: Arsenal, sans-serif;">
    <section class="login-dark" style="background: transparent;height: 749px;">
        <div style="height: 238px;background: url(&quot;assets/img/pexels-fauxels-3184450.jpg&quot;) center / cover no-repeat;">
            <div class="d-flex justify-content-center align-items-center" style="height: inherit;min-height: initial;width: 100%;position: absolute;left: 0;background: rgba(37,178,225,0.04);"></div>
        </div>
        <form method="post" style="margin-top: -92px;background: rgb(255,255,255);border-radius: 10px;">
            <h1 style="color: rgb(37,178,225);font-size: 18px;text-align: center;font-weight: 500;"><i class="fa fa-user"></i>&nbsp;<span style="text-decoration: underline;">Update Profile</span></h1>
            <div class="form-group"><input class="form-control" type="text" name="fname" value="<?php echo $data['first_name']?>" placeholder="Firstname" style="color: rgb(37,178,225);border-color: rgb(37,178,225);" required></div>
            <div class="form-group"><input class="form-control" type="text" name="lname" value="<?php echo $data['last_name']?>" placeholder="Lastname" style="color: rgb(37,178,225);border-color: rgb(37,178,225);" required></div>
            <div class="form-group"><input class="form-control" type="text" name="idno" value="<?php echo $data['id_number']?>" placeholder="Id number" style="color: rgb(37,178,225);border-color: rgb(37,178,225);"  readonly=""></div>
            <div class="form-group"><input class="form-control" type="email" name="email" id="email" value="<?php echo $data['email']?>" placeholder="Email" style="color: rgb(37,178,225);border-color: rgb(37,178,225);" readonly=""></div>
            <div class="form-group"><input class="form-control" type="text"value="<?php echo $data['phone']?>" name="phone" placeholder="Phone number" style="color: rgb(37,178,225);border-color: rgb(37,178,225);" required></div>
            <div class="form-group"><button class="btn btn-block" type="submit" name="save" style="background: rgb(37,178,225);color: rgb(255,255,255);">Save</button></div>
            <div><a class="forgot" href="profile.php" style="color: rgb(37,178,225);font-weight: 400;font-size: 14px;">Back Profile</a></div>
        </form>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>