<?php ob_start();

// check authorization
require('check-auth.php');

// title
$title = 'Pages';

require('header.php'); ?>

<h1>Pages</h1>

<p><a href="add-page.php">Add a new Page</a></p>
<?php

try {
    //connect
    require('dbinfo.php');

    // the query
    $sql = "SELECT * FROM pages ORDER BY heading";

    $cmd = $conn -> prepare($sql);
    // run the query
    $cmd -> execute();
    $pages = $cmd -> fetchAll();

    //disconnect
    $conn = null;

    // table
    echo '<table class="table table-striped sortable">
    <thead>
    <th><a href="#">Pages</a></th>
    <th>Edit</th>
    <th>Delete</th>
    </thead>
    <tbody>';

    // displaying the data by looping through the data
    foreach($pages as $page) {
        echo '<tr><td>' . $page['heading'] . '</td>
            <td><a href="edit-page.php?id=' . $page['id'] . '" title="Edit">Edit</a></td>
            <td><a href="delete-page.php?id=' . $page['id'] . '"
                title="Delete" class="delete">Delete</a></td>
            </tr>';
    }

    //close the table
    echo '</tbody></table>';
}

catch (Exception $except) {
    // email on error
    mail('tarunvirk01@gmail.com', 'Administrators error', $except);

    header('location:error.php');
}
// footer
require('footer.php');
ob_flush();
?>
