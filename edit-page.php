<?php ob_start();

// check authorization
require('check-auth.php');

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
    mail('tarunvirk01@gmail.com', 'CMS error', $except);

    header('location:error.php');

}

$title = 'Sign Up';

require_once('header.php'); ?>
    <h1>Edit the Page.</h1>
    <form method="post" action="save-page-edit.php" class="form-horizontal">
        <div class="form-group">
            <label for="heading" class="col-sm-2" >Title:</label>
            <input type="heading" name="heading" autofocus value="<?php echo $heading; ?>"/>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-2" >Content:</label>
            <textarea name="content" class="form-control col-xs-12" rows="7" autofocus
            ><?php echo $content ?></textarea>
        </div>
        <div>
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
            <input type="submit" value="Save Edit" class="btn btn-primary"/>
        </div>
    </form>
    <br />


<?php require_once('footer.php');
ob_flush(); ?>