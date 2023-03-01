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

if (isset($_POST['next-btn2'])) {
    
    $_SESSION['first-name'] = $_POST['first-name'];
    $_SESSION['last-name'] = $_POST['last-name'];
    $_SESSION['nic'] = $_POST['nic'];
    $_SESSION['birthday'] = $_POST['birthday'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['email'] = $_POST['email'];

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm-password'] = $_POST['confirm-password'];
    setupUserdetails();
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
    <nav id="main-nav" class="navbar fixed-top ">
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
            <div class="panel" id="page1">
                <p class="title">Sign up</p>
                <p class="description">Sign up with your details</p>
                
                <input type="text" class="input-field" id="first-name" name="first-name" placeholder="First Name">
                <input type="text" class="input-field" name="last-name" id="last-name" placeholder="Last Name">
                <input type="text" class="input-field" name="nic" id="nic" placeholder="National ID Number">
                <input type="date" class="input-field" name="birthday" id="birthday" placeholder="Birthday">
                
                <input type="text" class="input-field" name="address" id="address" placeholder="Home Address">
                <input type="tel" class="input-field" name="phone" id="phone" placeholder="Phone Number">
                <input type="text" class="input-field" id="email" name="email"  placeholder="E-mail">
    
                <input type="button" name="next-btn" id="page1btn" class="primary-btn" value="Continue">
                
            </div>
            <div class="panel disable" id="page2" action="" method="post" required>
                <p class="title">User ID</p>
                <p class="description">Create your username and password</p>
                <input type="text" class="input-field" name="username" id="username" placeholder="Username">
                <input type="password" class="input-field" name="password" id="password" placeholder="Password">
                <input type="password" class="input-field" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
    
    
                <input type="submit" name="next-btn2" id="page2btn" class="primary-btn" value="Create">

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
