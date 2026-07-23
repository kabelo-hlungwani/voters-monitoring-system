<?php

session_start();
unset($_SESSION['email']);
unset($_SESSION['latitude']);
unset($_SESSION['longitude']);
 
 session_destroy();
 header('Location: index.php');