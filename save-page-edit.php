<?php ob_start();
try {
    $title = 'Saving page edit';

    require_once('check-auth.php');
    $heading = null;
    $content = null;
    $id = null;

    // storing email and password into variables
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $id = $_POST['id'];
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


        $sql = "UPDATE pages SET heading = :heading, content = :content WHERE id = :id";

        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':heading', $heading, PDO::PARAM_STR);
        $cmd->bindParam(':content', $content, PDO::PARAM_STR);
        if (!empty($id)) {
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        }

        // execute the save
        $cmd->execute();

        // disconnect
        $conn = null;

        header('location:pages.php');
    }
}
catch (Exception $except) {
    // email on error
    mail('tarunvirk01@gmail.com', 'Pages edit error', $except);

    header('location:error.php');
}
require('footer.php');
ob_flush();
?>