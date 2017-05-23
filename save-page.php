<?php ob_start();

try {
    $title = 'Saving Page';

    $heading = null;
    $content = null;

    // storing heading and content into variables
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $ok = true;

    //validating
    if (empty($heading)) {
        echo 'Title is required<br />';
        $ok = false;
    }

    if (empty($content)) {
        echo 'Content is required<br />';
        $ok = false;
    }

    // save the variable if ok==true
    if ($ok == true) {
        require_once('dbinfo.php');


        // sql to insert values
        $sql = "INSERT INTO pages (heading, content) VALUES (:heading, :content)";

        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':heading', $heading, PDO::PARAM_STR, 25);
        $cmd->bindParam(':content', $content, PDO::PARAM_STR, 500);


        // execute the save
        $cmd->execute();

        // disconnect
        $conn = null;

        header('location:pages.php');
    }
}
catch (Exception $except) {
    // email on error
    mail('tarunvirk01@gmail.com', 'Administrators error', $except);

    header('location:error.php');
}
require('footer.php');
ob_flush(); ?>