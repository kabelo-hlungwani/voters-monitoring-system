<!DOCTYPE html>
<html lang="en">
    <?php
    include 'connect.php';
 
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     
      if(!isset($_SESSION)) 
      { 
          session_start(); 
          $email=$_SESSION['email'];
          $id=$_SESSION['staff_id'];
		  $latitude=$_SESSION['latitude'];
		  $longitude=$_SESSION['longitude'];
	
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
<?PHP               

              $query="SELECT * from staff where email='$email'and position='Photographer'";
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              if ($rows>0) {
                
                ?>
<body style="font-family: Arsenal, sans-serif;">
    <div style="height: 160px;background: url(&quot;assets/img/pexels-fauxels-3184450.jpg&quot;) center / cover no-repeat;">
        <div class="d-flex justify-content-center align-items-center" style="height: inherit;min-height: initial;width: 100%;position: absolute;left: 0;background: rgba(24,24,24,0.14);"></div>
    </div>
    <section class="team-boxed" style="background: transparent;">
        <div class="container">
            <div class="intro"></div>
            <div class="row text-center people" style="text-align: center;">
                <div class="col-md-6 col-lg-4 offset-lg-4 item">
                    <div class="shadow box" style="margin-top: -136px;border-radius: 10px;background: var(--white);">
                        <p style="padding-top: 7px;color: rgb(37,178,225);font-size: 15px;"><span style="text-decoration: underline;">Profile</span></p><i class="fa fa-user-circle-o" style="color: rgb(37,178,225);font-size: 77px;"></i>
                        <?php
                        while ($rows=mysqli_fetch_array($result)) {
                      ?>
                        <ul class="list-unstyled text-left" style="font-size: 13px;padding-top: 2px;">
                            <li><i class="fa fa-user" style="color: rgb(37,178,225);"></i>&nbsp;Name &amp; Surname&nbsp;(<?php echo $rows['last_name'].' '.$rows['first_name']?>)</li>
                            <li><i class="fa fa-id-badge" style="color: rgb(37,178,225);"></i>&nbsp;Id Number&nbsp;(<?php echo $rows['id_number']?>)</li>
                            <li><i class="fa fa-envelope" style="color: rgb(37,178,225);"></i>&nbsp;Email&nbsp;(<?php echo $rows['email']?>)</li>
                            <li><i class="fa fa-phone-square" style="color: rgb(37,178,225);"></i>&nbsp;Phone&nbsp;(<?php echo $rows['phone']?>)</li>
                        </ul>
                        <p><a class="btn btn-sm" role="button" style="background: rgb(37,178,225);color: rgb(255,255,255);border-radius: 5px;font-size: 13px;" href="edit.php?p=<?php echo $rows['staff_id']?>">Update Profile</a>&nbsp;&nbsp;<a class="btn btn-sm" href="capture-form.php?v=<?php echo $rows['staff_id']?>" role="button" style="background: rgb(37,178,225);color: rgb(255,255,255);border-radius: 5px;font-size: 13px;">Capture Data</a>&nbsp;&nbsp;<a class="btn btn-sm" href="logout.php" role="button" style="background: rgb(37,178,225);color: rgb(255,255,255);border-radius: 5px;font-size: 13px;">Logout</a></p>
                    </div>
                   
                
                    <div class="shadow box" style="border-radius: 10px;">
                        <p style="font-size: 14px;color: rgb(37,178,225);"><i class="icon ion-ios-location"></i><span style="text-decoration: underline;">Your Confirmed location</span></p><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDp1w0o_LHohLX56dVzDwavd-zhayAuWLI&amp;q=28.1188,-25.9752&amp;zoom=15&amp;maptype=satellite" width="100%" height="400" style="height: 188px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
         <?php
                  
                }
                ?>

<?php
              }
                ?>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>