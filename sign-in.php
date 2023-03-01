<?php
include('connectors/db-connector.php');
include('php/functions.php');
session_start();
if(isset($_SESSION['user_id'])){
    echo "<script>console.log('User ID is ".$_SESSION['user_id']."');</script>";

    $btmView = 'disable';
    $profileView = '#';
} else{
    $btmView = '#';
    $profileView = 'disable';
}

if(isset($_SESSION['user_type'])){
    echo "<script>console.log('User type is ".$_SESSION['user_type']."');</script>";
    
    if($_SESSION['user_type'] == 'farmer'){
        header('location: http://localhost/99_40_web/profile-farmer.php');

    } elseif ($_SESSION['user_type'] == 'officer'){
        header('location: http://localhost/99_40_web/profile-officer.php');

    }  elseif ($_SESSION['user_type'] == 'doa'){
        header('location: http://localhost/99_40_web/profile-officer.php');

    }
}


if (isset($_POST['signin'])) {
    $_SESSION['signin-username'] = $_POST['signin-username'];
    $_SESSION['signin-password'] = $_POST['signin-password'];

    signinFunction();
    
}

if(empty($con)){
    echo "<script>console.log ('Disconnect successfully.')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/standard.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/main1.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/reaction.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/signin.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/profile.css">
        
    <title>DOA</title>
</head>
<body>
    <nav id="main-nav" class="navbar fixed-top">
        <div id="nav-logo" class="logo"></div>
        <div class="page_items disable">
            <ul>
                <li id="home" class="select">Home</li>
                <li id="prob">Problem & Solutions</li>
                <li id="news">News</li>
                <li id="gallery">Gallery</li>
                <li id="contact">Contact</li>
                <li id="about">About Us</li>
            </ul>
        </div>
        <div class="login-btns">
                <input type="button" class="secondary-btn <?php echo $btmView; ?>" id="sign-up" value="Sign up">
                <input type="button" class="primary-btn <?php echo $btmView; ?>" id="sign-in" value="Sign in">
                <div class="profile-btn <?php echo $profileView; ?>">
                    <div class="user-name">
                        <p>Hello...</p>
                        <p id="user-fname"><?php echo $_SESSION['user_fname']; ?></p>
                    </div>
                    <div class="profile-pic">
                        <img id="user-pic" src="http://localhost/99_40_web/resource/profile/pic-1.jpg" alt="">
                    </div>
                </div>

            </div>
    </nav>
    <section class="login-sec secs">
        <form name="signin-form" action="" method="post" required>
            <div class="panel">
                <p class="title">Sign In</p>
                <p class="description">Sign in with your username<br>and password.</p>
                <input type="text" class="input-field" name="signin-username" id="signin-username" placeholder="Username">
                <input type="password" class="input-field" name="signin-password" id="signin-password" placeholder="Password">
                <input type="submit" id="signin" name="signin" class="primary-btn" value="Sign in">
                <a class="clickable-link" href="http://localhost/99_40_web/error.php">Forget username or password</a>
            </div>
        </form>
    </section>
    <script src="http://localhost/99_40_web/js/profile-btn.js"></script>
    <!-- <script src="http://localhost/99_40_web//js/validation-functions.js"></script> -->
    <script src="http://localhost/99_40_web/js/page-switching.js"></script>
    <script src="http://localhost/99_40_web/js/login-pages-swiching.js"></script>
    <script src="https://kit.fontawesome.com/878c14d828.js" crossorigin="anonymous"></script>
</body>
</html>