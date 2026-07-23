<?php

$currentPage = isset($currentPage) ? $currentPage : 'home';
$loadHomeData = isset($loadHomeData) ? (bool) $loadHomeData : false;
$handleContactForm = isset($handleContactForm) ? (bool) $handleContactForm : false;
$contactRedirect = isset($contactRedirect) ? $contactRedirect : 'contact.php';

include_once __DIR__ . '/../layout/init.php';

$requiresDatabase = $loadHomeData || $handleContactForm;

if ($requiresDatabase) {
    include_once __DIR__ . '/../../connect.php';

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

if ($handleContactForm && isset($_POST['post']) && isset($conn)) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $message = mysqli_real_escape_string($conn, trim($_POST['message']));

    $command = "INSERT INTO comment(email,message) VALUES ('$email','$message')";
    $saved = mysqli_query($conn, $command);

    if ($saved) {
        echo '<script>alert("Thanks for sending your message. We will get back to you soon.");window.location="' . htmlspecialchars($contactRedirect, ENT_QUOTES, 'UTF-8') . '";</script>';
        exit;
    }
}

if ($loadHomeData && isset($conn)) {
    include __DIR__ . '/../home/bootstrap.php';
}
