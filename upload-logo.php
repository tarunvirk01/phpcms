<?php

$title = 'Upload Logo';
// check authorization
require('check-auth.php');

// inserting the header
require_once('header.php'); ?>

    <form action="save-logo.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <input type="file" name="logo" autofocus/>
            <button>Upload</button>
        </div>
    </form>


<?php
// inserting the footer
require_once('footer.php');
?>