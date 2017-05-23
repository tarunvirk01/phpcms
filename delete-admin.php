<?php ob_start();

// check authorization
require('check-auth.php');

try {
    //identify the record user wants to delete
    $user_id = null;
    $user_id = $_GET['user_id'];

    if (is_numeric($user_id)) {
        // connect
        require('dbinfo.php');
        // prepare and execute sql
        $sql = "DELETE FROM signUpInfo WHERE user_id = :user_id";

        $cmd = $conn -> prepare($sql);
        $cmd -> bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $cmd -> execute();

        // diconnect
        $conn = null;

        // back to admins
        header('location:admins.php');
    }
}
catch (Exception $except) {
    // email
    mail('tarunvirk01@gmail.com', 'Delete Admin Error', $except);

    // to error
    header('location:error.php');

}

ob_flush() ?>