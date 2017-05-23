<?php ob_start();

// title
$title = 'kjd';

require('default-header.php');
?>

<?php
try {
    $heading = null;
    $content = null;
    $id = null;

    // check for id
    if (is_numeric($_GET['id'])) {
        // store id in variable
        $id = $_GET['id'];

        // connect
        require('dbinfo.php');

        $sql = "SELECT * FROM pages WHERE id = :id";
        $cmd = $conn -> prepare($sql);
        $cmd -> bindParam(':id', $id, PDO::PARAM_INT);
        $cmd -> execute();
        $pages = $cmd -> fetchAll();

        // disconnect
        $conn = null;

        //store each value from the database into a variable
        foreach ($pages as $page) {
            $heading = $page['heading'];
            $content = $page['content'];
        }
    }

}

catch (Exception $except) {
    // mail
    mail('tarunvirk01@gmail.com', 'default page error', $except);

    header('location:error.php');

}

$title = '$heading';
?>

<article class="jumbotron">
    <h1><?php echo $heading ?></h1>
    <p><?php echo $content ?></p>
</article>

<?php
// footer
require('footer.php');
ob_flush();
?>
