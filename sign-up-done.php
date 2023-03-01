<?php
include ('php/functions.php');
session_start();
if(isset($_SESSION['user_id'])){
    echo "<script>console.log('User ID is ".$_SESSION['user_id']."');</script>";

    $btmView = 'disable';
    $profileView = '#';
} else{
    $btmView = '#';
    $profileView = 'disable';
}

if (isset($_POST['go-to-signin'])) {
    signupDataClear();
    
    
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
        <form name="signUp" action="" method="POST" required>
            <div class="panel" id="page3" action="" method="post" required>
                <p class="title">Your Account is Successfully Created</p>
                <p class="description">Go to sign-in page and login to your profile using your user name and password.</p>
                <p><?php echo $_SESSION['first-name']; ?></p>
                <p><?php echo $_SESSION['last-name']; ?></p>
                <p><?php echo $_SESSION['nic']; ?></p>
                <p><?php echo $_SESSION['birthday']; ?></p>
                <p><?php echo $_SESSION['address']; ?></p>
                <p><?php echo $_SESSION['phone']; ?></p>
                <p><?php echo $_SESSION['email']; ?></p>
                <p><?php echo $_SESSION['username']; ?></p>
                <p><?php echo $_SESSION['password']; ?></p>
                <p><?php echo $_SESSION['confirm-password']; ?></p>
    
                <input type="submit" name="go-to-signin" id="go-to-signin" class="primary-btn" value="Sign in">

            </div>
        </form>
    </section>
    <script src="http://localhost/99_40_web/js/profile-btn.js"></script>
    <script src="http://localhost/99_40_web/js/signup-data-switching.js"></script>
    <script src="http://localhost/99_40_web/js/page-switching.js"></script>
    <script src="http://localhost/99_40_web/js/login-pages-swiching.js"></script>
    <script src="https://kit.fontawesome.com/878c14d828.js" crossorigin="anonymous"></script>
</body>
</html>
