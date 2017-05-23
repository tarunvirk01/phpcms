<?php ob_start();

$title = 'Pages';
require('check-auth.php');

require_once('header.php'); ?>
<h1>Add a new Page</h1>
<form method="post" action="save-page.php" class="form-horizontal">
    <div class="form-group">
        <label for="heading" class="col-sm-2" >Title:</label>
        <input type="heading" name="heading" autofocus/>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2" >Content:</label>
        <textarea name="content" class="form-control col-xs-12" rows="7" autofocus>Enter Content here. (500 characters)</textarea>
    </div>
    <div>
        <input type="submit" value="Create Page" class="btn btn-primary"/>
    </div>
</form>
<br />
<p><a href="pages.php" >View all the pages.</a> </p>

<?php require_once('footer.php');