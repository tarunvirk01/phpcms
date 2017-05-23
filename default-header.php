<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--title-->
        <title><?php echo $title; ?></title>
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <!--custom style sheet-->
        <link rel="stylesheet" href="styles/styles.css" />
    </head>

    <body>

    <!--navigation-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a href="admins.php" class="navbar-brand navbar-link"><img src="logo/logo.png" height="30px"></a>
            <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggle collapsed">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <?php

                    require ('dbinfo.php');

                    // the query
                    $sql = "SELECT * FROM pages ORDER BY heading";

                    $cmd = $conn->prepare($sql);
                    // run the query
                    $cmd -> execute();
                    $pages = $cmd -> fetchAll();

                    // displaying the data
                    foreach($pages as $page) {
                        echo '<li role="presentation"><a href="default.php?id=' . $page['id'] . '">' . $page['heading'] . '</a></li>';
                    }
                ?>

            </ul>
        </div>

    </nav>

    <main>
