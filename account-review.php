<?php

include('connectors/db-connector.php');
include('php/functions.php');
session_start();
if(empty($_SESSION['user_id'])){
    header('location: http://localhost/99_40_web/home.php');
}
if (isset($_SESSION['user_id'])) {
    echo "<script>console.log('User ID is " . $_SESSION['user_id'] . "');</script>";

    $btmView = 'disable';
    $profileView = '#';
} else {
    $btmView = '#';
    $profileView = 'disable';
}
if(isset($_POST['edit'])){
    header('location:http://localhost/99_40_web/account-edit.php');
}
if(isset($_POST['delete'])){
    deleteAccount();
    unset($_SESSION['reviewId']);
}
if(isset($_POST['cancel'])){
    unset($_SESSION['reviewId']);
    header('location:http://localhost/99_40_web/sign-in.php');
}

$sql = "SELECT * FROM user_credentials WHERE userId ='" . $_SESSION['reviewId'] . "';";

$result = $con->query($sql);

if ($row = mysqli_fetch_row($result)) {

    $_SESSION['review-user_id'] = $row[1];
    $_SESSION['review-user_username'] = $row[2];
    $_SESSION['review-user_password'] = $row[3];
    $_SESSION['review-user_type'] = $row[4];



    $sql = "SELECT * FROM user WHERE userId ='" . $_SESSION['reviewId'] . "';";

    $result = $con->query($sql);

    if ($row = mysqli_fetch_row($result)) {

        $_SESSION['review-user_fname'] = $row[1];
        $_SESSION['review-user_lname'] = $row[2];
        $_SESSION['review-user_nic'] = $row[3];
        $_SESSION['review-user_birthday'] = $row[4];
        $_SESSION['review-user_address'] = $row[5];
        $_SESSION['review-user_phone'] = $row[6];
        $_SESSION['review-user_email'] = $row[7];
    }
    $con = null;
} else {
    echo "<script>
        alert('".$_SESSION['reviewId']."')</script>";
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
            <div class="panel review-panel" id="page3" action="" method="post" required>
                <p class="title">Account Details Review</p>
                <div class="one-part">
                    <p class="description">First Name</p>
                    <p><?php echo $_SESSION['review-user_fname']; ?></p>
                </div>
                <div class="one-part">
                    <p class="description">last Name</p>
                    <p><?php echo $_SESSION['review-user_lname']; ?></p>
                </div>
                <div class="one-part">
                    <p class="description">NIC</p>
                    <p><?php echo $_SESSION['review-user_nic']; ?></p>
                </div>
                <div class="one-part">
                    <p class="description">Birthday</p>
                    <p><?php echo $_SESSION['review-user_birthday']; ?></p>
                </div>
                <div class="one-part">
                    <p class="description">Address</p>
                    <p><?php echo $_SESSION['review-user_address']; ?></p>
                </div>
                <div class="one-part">
                    <p class="description">Phone</p>
                    <p><?php echo $_SESSION['review-user_phone']; ?></p>
                </div>
                <div class="one-part">
                    <p class="description">E-mail Address</p>
                    <p><?php echo $_SESSION['review-user_email']; ?></p>
                </div>
                <?php
                if ($_SESSION['reviewId'] == $_SESSION['user_id']) {
                    echo "<div class='one-part'>
                    <p class='description'>username</p>
                    <p>'" . $_SESSION['review-user_username'] . "'</p>
                    </div>
                    <div class='one-part'>
                    <p class='description'>Password</p>
                    <p>'" . $_SESSION['review-user_password'] . "'</p>
                    </div>";
                }
                ?>
                <div class="account-btns">
                    <input type="submit" class="primary-btn" id="edit" name="edit" value="Edit Account">
                    <input type="submit" class="primary-btn" id="delete" name="delete" value="Delete Account">
                    <input type="submit" class="third-btn" id="cancel" name="cancel" value="Cancel">
                
                </div>
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