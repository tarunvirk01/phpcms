<?php

$title = 'Upload Logo';
// check authorization
require('check-auth.php');

// inserting the header
require_once('header.php');

$name = $_FILES['logo']['name'];
echo "Name: $name<br />";

$size = $_FILES['logo']['size'];
echo "Size: $size<br />";

$type = $_FILES['logo']['type'];
echo "Type: $type<br/ >";

if ($type != 'image/png'){
    echo "<h2>Logo needs to be a Png file...!</h2>";
}
else {

    $tmp_name = $_FILES['logo']['tmp_name'];
    echo "Tmp Name: $tmp_name<br />";

    $final_name = "logo.png";

// moving from temporary logo to the logo folder
    move_uploaded_file($tmp_name, "logo/$final_name");
}
// inserting the footer
require_once('footer.php');
?>