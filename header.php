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
                        if (!empty($_SESSION['user_id'])) {
                            echo '<li role="presentation"><a href="admins.php">Administrators</a></li>
                            <li role="presentation"><a href="upload-logo.php">Upload Logo</a></li>
                            <li role="presentation"><a href="pages.php">Pages</a></li>
                            <li role="presentation"><a href="default.php?id=6">Public Website</a></li>
                            <li role="presentation"><a href="signout.php">Sign Out</a></li>';}

                        else {
                            echo '
                            <li role="presentation"><a href="default.php?id=6">Public Website</a></li>
                            <li role="presentation"><a href="signup.php">Sign Up</a></li>
                            <li role="presentation"><a href="signin.php">Sign In</a></li>';
                        }
                        ?>
                    </ul>
                </div>

        </nav>

        <main>
