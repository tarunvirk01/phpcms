    <?php ob_start();

    $title = 'Sign Up';

    require_once('header.php'); ?>
    <h1>Become an admin</h1>
    <form method="post" action="save-signup.php" class="form-horizontal">
        <div class="form-group">
            <label for="email" class="col-sm-2" >E-mail:</label>
            <input type="email" name="email" autofocus inputmode="email" />
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2" >Password:</label>
            <input type="password" name="password" autofocus/>
        </div>
        <div class="form-group">
            <label for="confirm" class="col-sm-2" >Re-enter Password:</label>
            <input type="password" name="confirm" autofocus/>
        </div>
        <div>
            <input type="submit" value="Sign Up" class="btn btn-primary"/>
        </div>
    </form>
    <br />
    <p>Already an admin..! <a href="signin.php" >Sign In</a> </p>

<?php require_once('footer.php'); ?>