<?php
include('connectors/db-connector.php');
session_start();
if (isset($_SESSION['user_id'])) {
    echo "<script>console.log('User ID is " . $_SESSION['user_id'] . "');</script>";

    $btmView = 'disable';
    $profileView = '#';
} else {
    $btmView = '#';
    $profileView = 'disable';
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
                <li id="gallery" class="select">Gallery</li>
                <li id="contact" class="#">Contact</li>
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
        <p class="banner-title">Gallary</p>
    </section>
    <section class="album-area secs">
        <div class="album">
            <p class="sub-title"></p>
            <div class="photos">
                <!-- //saads -->
                <div class="col">
                    <?php
                    $query = " select * from gallery ";
                    $result = mysqli_query($con, $query);

                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        
                            <img src="./resource/gallery/<?php echo $data['filename']; ?>">
                        
                    <?php
                    }
                    ?>
                </div>
                <!-- <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div> -->
            </div>
        </div>
        <!-- <div class="album">
            <p class="sub-title">Album Name</p>
            <div class="photos">
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="album">
            <p class="sub-title">Album Name</p>
            <div class="photos">
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
                <div class="col">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                    <img src="/resource/news/2i.jpg" alt="">
                </div>
            </div>
        </div> -->
    </section>
    <footer>
        <div class="left">
            <div class="logo"></div>
            <p class="sub-title">Contact Us</p>
            <div class="address description">
                <i class="fa-regular fa-building"></i>
                <p>Department of Agriculture,<br>P.O.Box. 1, Peradeniya,<br>Sri Lanka</p>
            </div>
            <div class="mail description">
                <i class="fa-regular fa-envelope"></i>
                <p>info@doa.gov.lk</p>
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