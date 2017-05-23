<?php ob_start();

    // check authorization
    require('check-auth.php');

    // title
    $title = 'Administrators';

    require('header.php'); ?>

<h1>Administrators</h1>

<!--search form-->
<div class="col-sm-12 text-right">
    <form method="get" action="admins.php" class="form-inline">
        <label for="search-admins">Search Admins:</label>
        <input name="search-admins" id="search-admins" />
        <button class="btn">Search</button>
    </form>
</div>

<?php

try {
    //connect
    require('dbinfo.php');



    // the query
    $sql = "SELECT * FROM signUpInfo";

    // checking if user searched
    if (!empty($_GET['search-admins'])) {

        $search_admins = $_GET['search-admins'];

        $search_admins = explode(" ", $search_admins);

        // where clause
        $sql .= " WHERE";
        $counter = 0;

        foreach($search_admins as $search) {

            if ($counter > 0) {
                $sql .= " OR";
            }

            $sql .= " email LIKE '%" . $search . "%'";
            $counter++;
        }
    }

    // order by clause
    $sql .= " ORDER BY email";

    $cmd = $conn -> prepare($sql);
    // run the query
    $cmd -> execute();
    $signUpInfo = $cmd -> fetchAll();

    //disconnect
    $conn = null;

    // table
    echo '<table class="table table-striped sortable">
    <thead>
    <th><a href="#">Email</a></th>
    <th>Edit</th>
    <th>Delete</th>
    </thead>
    <tbody>';

    // displaying the data by looping through the data
    foreach($signUpInfo as $signUp) {
        echo '<tr><td>' . $signUp['email'] . '</td>
            <td><a href="edit-admin.php?user_id=' . $signUp['user_id'] . '" title="Edit">Edit</a></td>
            <td><a href="delete-admin.php?user_id=' . $signUp['user_id'] . '"
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
