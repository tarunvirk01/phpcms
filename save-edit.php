<?php ob_start();
try {
    $title = 'Signing up';

    require_once('check-auth.php');
    $email = null;
    $password = null;
    $confirm = null;
    $user_id = null;

    // storing email and password into variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $user_id = $_POST['user_id'];
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


        $sql = "UPDATE signUpInfo SET email = :email, password = :password WHERE user_id = :user_id";

        // password hashing using sha
        $hashed_password = hash('sha512', $password);

        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR);
        $cmd->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        if (!empty($user_id)) {
            $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        }

        // execute the save
        $cmd->execute();

        // disconnect
        $conn = null;

        header('location:admins.php');
    }
}
catch (Exception $except) {
    // email on error
    mail('tarunvirk01@gmail.com', 'Administrators error', $except);

    header('location:error.php');
}
require('footer.php');
ob_flush();
?>