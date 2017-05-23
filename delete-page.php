<?php ob_start();

// check authorization
require('check-auth.php');

try {
    //identify the record user wants to delete
    $id = null;
    $id = $_GET['id'];

    if (is_numeric($id)) {
        // connect
        require('dbinfo.php');
        // prepare and execute sql
        $sql = "DELETE FROM pages WHERE id = :id";

        $cmd = $conn -> prepare($sql);
        $cmd -> bindParam(':id', $id, PDO::PARAM_INT);
        $cmd -> execute();

        // diconnect
        $conn = null;

        // back to admins
        header('location:pages.php');
    }
}
catch (Exception $except) {
    // email
    mail('tarunvirk01@gmail.com', 'Pages Delete error', $except);

    // to error
    header('location:error.php');

}

ob_flush() ?>