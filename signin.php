<?php

$title = 'Sign In';

// inserting the header
require_once('header.php'); ?>

<form method="post" action="validate.php" class="form-horizontal">
        <div class="form-group">
            <label for="email" class="col-sm-2" >E-mail:</label>
            <input type="email" name="email" autofocus inputmode="email"" />
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2" >Password:</label>
            <input type="password" name="password" autofocus/>
        </div>
        <div>
            <input type="submit" value="Sign In" class="btn btn-primary"/>
        </div>

    </form>
    <br />
    <p>Not an admininistrator..! <a href="signup.php" >Sign Up</a> </p>



<?php
    // inserting the footer
    require_once('footer.php');
?>