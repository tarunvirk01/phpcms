<?php ob_start();
include('header.php');
//title
$title = 'Validation';

$email = $_POST['email'];
$password = hash('sha512', $_POST['password']);

// connecting to the db
require('dbinfo.php');
// sql statement

$sql = "SELECT user_id FROM signUpInfo WHERE email = :email AND password = :password";

$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
$cmd->bindParam(':password', $password, PDO::PARAM_STR, 128);
$cmd->execute();
$users = $cmd->fetchAll();

$count = $cmd->rowCount();
//disconnect
$conn = null;
if ($count == 0) {
    echo 'Invalid Login';
    exit();
}
else {
    session_start();

    foreach ($users as $user) {
        $_SESSION['user_id'] = $user['user_id'];
        header('location:admins.php');
    }
}

include('footer.php');
ob_flush(); ?>