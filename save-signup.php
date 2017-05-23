<?php ob_start();

try {
    $title = 'Signing up';

    $email = null;
    $password = null;
    $confirm = null;

    // storing email and password into variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $ok = true;

    //validating
    if (empty($email)) {
        echo 'Email is required<br />';
        $ok = false;
    }

    if (empty($password)) {
        echo 'Password is required<br />';
        $ok = false;
    }

    if ($password != $confirm) {
        echo 'Password must match<br />';
        $ok = false;
    }

    // save the variable if ok==true
    if ($ok == true) {
        require_once('dbinfo.php');


        // sql to insert values
        $sql = "INSERT INTO signUpInfo (email, password) VALUES (:email, :password)";

        // password hashing using sha
        $hashed_password = hash('sha512', $password);

        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
        $cmd->bindParam(':password', $hashed_password, PDO::PARAM_STR, 128);


        // execute the save
        $cmd->execute();

        // disconnect
        $conn = null;

        header('location:signin.php');
    }
}
catch (Exception $except) {
    // email on error
    mail('tarunvirk01@gmail.com', 'Administrators error', $except);

    header('location:error.php');
}
require('footer.php');
ob_flush(); ?>