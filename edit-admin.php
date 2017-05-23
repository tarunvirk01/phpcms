<?php ob_start();

// check authorization
require('check-auth.php');

try {
    $email = null;
    $password = null;
    $confirm = null;
    $user_id = null;

    // check for id
    if (is_numeric($_GET['user_id'])) {
        // store id in variable
        $user_id = $_GET['user_id'];

        // connect
        require('dbinfo.php');

        $sql = "SELECT * FROM signUpInfo WHERE user_id = :user_id";
        $cmd = $conn -> prepare($sql);
        $cmd -> bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $cmd -> execute();
        $signUpInfo = $cmd -> fetchAll();

        // disconnect
        $conn = null;

        //store each value from the database into a variable
        foreach ($signUpInfo as $signUp) {
            $email = $signUp['email'];
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
<h1>Change Administrator's Login</h1>
<form method="post" action="save-edit.php" class="form-horizontal">
    <div class="form-group">
        <label for="email" class="col-sm-2" >E-mail:</label>
        <input id="email" type="email" name="email" autofocus inputmode="email" value="<?php echo $email; ?>" />
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2" >Password:</label>
        <input id="password" type="password" name="password" autofocus/>
    </div>
    <div class="form-group">
        <label for="confirm" class="col-sm-2" >Re-enter Password:</label>
        <input id="confirm" type="password" name="confirm" autofocus/>
    </div>
    <div>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
        <input type="submit" value="Save Changes" class="btn btn-primary"/>
    </div>
</form>
<br />


<?php require_once('footer.php');
ob_flush(); ?>