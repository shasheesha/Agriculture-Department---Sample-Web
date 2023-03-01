<?php
include('connectors/db-connector.php');
session_start();
if(isset($_SESSION['user_id'])){
    echo "<script>console.log('User ID is ".$_SESSION['user_id']."');</script>";

    $btmView = 'disable';
    $profileView = '#';
} else{
    $btmView = '#';
    $profileView = 'disable';
}

if (isset($_POST['submit'])) {
    $complainFname = $_POST['complain-fname'];
    $complainLname = $_POST['complain-lname'];
    $complainNic = $_POST['complain-nic'];
    $complainPhone = $_POST['complain-phone'];
    $complainMsg = $_POST['complain-msg'];

    if (empty($_SESSION['user_id'])) {
        $_SESSION['user_id'] = '0';
    }

    if(!empty($complainMsg)){
        $sql = "INSERT INTO contactrequest (userId ,concern, firstName, lastName, nic, phone) 
    VALUES ( " . $_SESSION['user_id'] . ",'" .$complainMsg. "', '" .$complainFname. "', '" .$complainLname. "', '" .$complainNic. "', '" .$complainPhone. "');";

    if (mysqli_query($con, $sql)) {
        echo "<script> console.log('Record updated successfully'); </script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
    }

    unset($_SESSION['user_id']);
    unset($complainFname);
    unset($complainLname);
    unset($complainNic);
    unset($complainPhone);
    unset($complainMsg);
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
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/profile.css">
        
    <title>DOA</title>
</head>
<body>
    <nav id="main-nav" class="navbar fixed-top">
        <div id="nav-logo" class="logo"></div>
        <div class="page_items">
            <ul>
                <li id="home" class="#">Home</li>
                <li id="prob" class="#">Problem & Solutions</li>
                <li id="news" class="#">News</li>
                <li id="gallery" class="#">Gallery</li>
                <li id="contact" class="select">Contact</li>
                <li id="about" class="#">About Us</li>
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
    <section class="top-banner item-center">
        <p class="banner-title">Contact</p>
    </section>
    <section class="con-area secs">
        <div class="left-side">
            <div class="description">
                <i class="fa-regular fa-clock"></i><p>Mon to Fri - 8.30am to 4.15pm 
                    <br>(Closed on weekends and public holidays)</p>
            </div>
            <div class="description">
                <i class="fa-regular fa-building"></i><p>Department of Agriculture,
                    <br>P.O.Box. 1,
                    <br>Peradeniya,
                    <br>Sri Lanka</p>
            </div>
            <div class="description">
                <i class="fa-regular fa-envelope"></i><p>info@doa.gov.lk</p>
            </div>
            <div class="description">
                <i class="fa-solid fa-phone-volume"></i><p>Agri field problems : 1920</p>
            </div>
            <div class="description">
                <i class="fa-solid fa-phone"></i><p>+94 812 388331
                    <br>+94 812 388332
                    <br>+94 812 388334
                </p>
            </div>
            <div class="description">
                <i class="fa-solid fa-fax"></i></i><p>+94 812 388333</p>
            </div>
        </div>
        <div class="right-side">
            <form class="con-form" action="" method="POST" required>
                <div class="topic">
                <p class="sub-title">Let us know<br>Suggestions & Complains</p>
                </div>
                <div class="single-line-fields">
                    <input type="text" id="complain-fname" name="complain-fname" class="input-field cont-value" placeholder="First Name">
                    <input type="text" id="complain-lname" name="complain-lname" class="input-field cont-value" placeholder="Last Name">
                </div>
                <div class="single-line-fields">
                    <input type="text" id="complain-nic" name="complain-nic" class="input-field cont-value" placeholder="NIC">
                    <input type="text" id="complain-phone" name="complain-phone" class="input-field cont-value" placeholder="Phone Number">
                </div>
                <textarea id="complain-msg" name="complain-msg" class="input-field text-msg" placeholder="Suggestions or Complains..."></textarea>
                
                <input type="submit" name="submit" id="submit" class="primary-btn" value="Submit">
            </form>
        </div>
    </section>
    <footer>
        <div class="left">
            <div class="logo"></div>
            <p class="sub-title">Contact Us</p>
            <div class="address description">
                <i class="fa-regular fa-building"></i><p>Department of Agriculture,<br>P.O.Box. 1, Peradeniya,<br>Sri Lanka</p>
            </div>
            <div class="mail description">
                <i class="fa-regular fa-envelope"></i><p>info@doa.gov.lk</p>
            </div>
            <div class="phone description">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <p>+94 812 388331</p>
                    <p>+94 812 388332</p>
                    <p>+94 812 388334</p>
                </div>
            </div>
        </div>
        <div class="mid-left">
            <p class="sub-title">Pages</p>
            <ul>
                <li class="description home">Home</li>
                <li class="description prob">Problems & Solutions</li>
                <li class="description news">News</li>
                <li class="description gallery">Gallery</li>
                <li class="description contact">Contact us</li>
                <li class="description about">About us</li>
            </ul>
        </div>
        <div class="mid-right">
            <p class="sub-title">About Us</p>
            <ul>
                <li class="description about">Vision</li>
                <li class="description about">Misson</li>
                <li class="description about">Objectives</li>
                <li class="description about">Organogram</li>
            </ul>
        </div>
        <div class="right">
            <p class="sub-title">News Latter Subscription</p>
            <div class="news-latter">
                <input type="text" class="email-field" name="" id="" placeholder="Email Address">
                <button class="third-btn" id="see-more"><i class="fa-regular fa-paper-plane"></i></button>
            </div>
            
        </div>
    </footer>
    <script src="http://localhost/99_40_web/js/profile-btn.js"></script>
    <script src="http://localhost/99_40_web/js/page-switching.js"></script>
    <script src="http://localhost/99_40_web/js/footer-pages-swiching.js"></script>
    <script src="http://localhost/99_40_web/js/login-pages-swiching.js"></script>
    <script src="https://kit.fontawesome.com/878c14d828.js" crossorigin="anonymous"></script>
</body>
</html>