<?php
include('connectors/db-connector.php');
session_start();
if (isset($_SESSION['user_id'])) {
    echo "<script>console.log('User ID is " . $_SESSION['user_id'] . "');</script>";

    $btmView = 'disable';
    $profileView = '#';
    $form = 'disable';
} else {
    $btmView = '#';
    $profileView = 'disable';
    $form = '#';
}


if (isset($_POST['submit'])) {
    $contactType = $_POST['contactType'];
    $contactValue = $_POST['contactValue'];
    $msg = $_POST['textMsg'];
    if (empty($_SESSION['user_id'])) {
        $_SESSION['user_id'] = '0';
    }
    if(!empty($msg)){
        $sql = "INSERT INTO problems (userId, problem, contactType, contactDetail) 
        VALUES ( " . $_SESSION['user_id'] . ", '" . $msg . "', '" . $contactType . "', '" . $contactValue . "');";
    
        if (mysqli_query($con, $sql)) {
            echo "<script> console.log('Record updated successfully'); </script>";
            header('location:problems.php');
        } else {
            echo "Error updating record: " . $con->error;
        }
    
    }
    unset($_SESSION['user_id']);
    unset($contactValue);
    unset($msg);
    unset($contactType);
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
    <title>Home</title>
</head>

<body>
    <nav id="main-nav" class="navbar fixed-top">
        <div id="nav-logo" class="logo"></div>
        <div class="page_items">
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
    <section class="hero-banner">
        <div class="left-side">
            <p class="banner-title">Investing to make an impact.</p>
        </div>
        <div class="right-side">
            <form class="con-form" action="" method="POST" required>
                <div class="topic">
                    <p class="sub-title">Tell Us<br>Your Problems</p>
                </div>
                <div class="single-line-fields <?php echo $form; ?>">
                    <select class="input-field cont-type" id="contactType" name="contactType">
                        <option value="phone">Phone</option>
                        <option value="email">E-mail</option>
                    </select>
                    <input type="text" id="contactValue" name="contactValue" class="input-field cont-value" placeholder="example@gmail.com">
                </div>
                <textarea id="textMsg" name="textMsg" class="input-field text-msg" placeholder="My Concern is..."></textarea>

                <input type="submit" id="submit" name="submit" class="primary-btn" value="Submit">
            </form>
        </div>
    </section>
    <section class="sec-1 secs">
        <div class="left-side">
            <p class="title">We are Department of <span class="green-text">Agriculture</span></p>
            <div class="description">
                <p>The Department of Agriculture (DOA) functions under the Ministry of Agriculture and is one of the largest government departments with a high profile community of agricultural scientists and a network of institutions covering different agro ecological regions island wide.</p>
            </div>
            <button class="third-btn" id="about-us">About Us <i class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="right-side">
            <div class="image"></div>
        </div>
    </section>
    <section class="sec-2 secs">
        <!-- <video autoplay muted loop id="video">
            <source src="/resource/wall.mp4" type="video/mp4">
        </video> -->
        <div class="one-panel">
            <div class="left-line">
                <p>Do u have any <span class="green-text">problems</span> related to agriculture ?</p>
            </div>
            <span class="line"></span>
            <div class="right-line">
                <p>Tell Us your farming problems.
                    we can give you <span class="green-text">solutions</span>.</p>
            </div>
        </div>
        <div class="middle-btn">
            <input type="button" id="tell-us" class="secondary-btn" value="Tell us Now" onclick='window.location.href="http://localhost/99_40_web/problems.php"'>
        </div>
    </section>
    <section class="sec-3 secs">
        <div class="title-top">
            <p class="title">Latest <span class="green-text">News</span></p>
            <button class="third-btn" id="see-more" onclick='window.location.href="http://localhost/99_40_web/news.php"'>See more<i class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="news-board">


            <div class="main-news">
                <?php
                $sql = "SELECT * FROM news ORDER BY uploadDate;";

                $result = $con->query($sql);

                while ($new = mysqli_fetch_array($result)) {
                    $newsId = $new[0];
                    $newsTitle = $new[1];
                    $newsDis = $new[2];
                    $imgId = $new[3];
                    $uploadDate = $new[4];

                    $sql = "SELECT filename FROM newsimg WHERE id = '" . $imgId . "' ";

                    $result = $con->query($sql);
                    if ($row = mysqli_fetch_row($result)) {
                        $filename = $row[0];
                    }
                ?>
                    <img src="./resource/news/<?php echo $filename; ?>" alt="">
                    <div id="status" class="status">
                        <div>
                            <i class="fa-solid fa-calendar-days"></i>
                            <p id="upload_date"><?php echo $uploadDate; ?></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <p id="views">24</p>
                        </div>
                    </div>
                    <div id="news-title" class="sub-title news-title"><?php echo $newsTitle; ?></div>
                    <div id="news-description" class="description description"><?php echo $newsDis; ?></div>
                    <button class="third-btn" id="see-news" onclick='window.location.href="http://localhost/99_40_web/news.php"'>See more<i class="fa-solid fa-chevron-right"></i></button>
                <?php

                }
                ?>



            </div>
            <div class="news-selector">
                <?php
                $sql = "SELECT * FROM news ";

                $result = $con->query($sql);
                $temp = $result;

                while ($new = mysqli_fetch_array($temp)) {
                    $newsId = $new[0];
                    $newsTitle = $new[1];
                    $newsDis = $new[2];
                    $imgId = $new[3];
                    $uploadDate = $new[4];

                    $sql = "SELECT filename FROM newsimg WHERE id = '" . $imgId . "' ";

                    $result = $con->query($sql);
                    if ($row = mysqli_fetch_row($result)) {
                        $filename = $row[0];
                    }

                    echo "
                    <div class='news' onclick='window.location.href='http://localhost/99_40_web/news.php''>
                    <img src='./resource/news/" . $filename . "' alt=''>
                    <p class='mini-news-title'>" . $newsTitle . "</p>
                </div>";
                }
                ?>
            </div>
        </div>
    </section>
    <section class="sec-4 secs">
        <div class="title-top">
            <p class="title">Our <span class="green-text">Gallery</span></p>
            <button class="third-btn" id="see-more" onclick='window.location.href="http://localhost/99_40_web/gallery.php"'>See more<i class="fa-solid fa-chevron-right"></i></button>
        </div>

        <?php
        $query = " select * from gallery ";
        $result = mysqli_query($con, $query);
        $rows = 0 ; 
        while ($rows < 4 && $data = mysqli_fetch_assoc($result)) {


        ?>
            <div class="img-row-1 img-row">
                <img src="resource/news/<?php echo $data['filename']; ?>" class="gal-img" alt="">
                <img src="resource/news/<?php echo $data['filename']; ?>" class="gal-img" alt="">
                <img src="resource/news/<?php echo $data['filename']; ?>" class="gal-img" alt="">
                <img src="resource/news/<?php echo $data['filename']; ?>" class="gal-img" alt="">
                <!-- <img src="resource/news/1i.jpg" class="gal-img" alt=""> -->
            </div>
        <?php
        $rows++;
        }
        ?>

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