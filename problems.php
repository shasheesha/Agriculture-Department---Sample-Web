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

    <title>Problems & Solutions</title>
</head>

<body>
    <nav id="main-nav" class="navbar fixed-top">
        <div id="nav-logo" class="logo"></div>
        <div class="page_items">
            <ul>
                <li id="home" class="#">Home</li>
                <li id="prob" class="select">Problem & Solutions</li>
                <li id="news" class="#">News</li>
                <li id="gallery" class="#">Gallery</li>
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
    <section class="top-banner">
        <div class="left-side">
            <p class="banner-title">Problems & Solutions</p>
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
    <section class="com-area secs">
        <?php
        $sql = "SELECT * FROM problems order by submitDate;";

        $result = mysqli_query($con, $sql);
        $_SESSION['problems-peo'] = $result;
        $id = 0;
        while ($row = mysqli_fetch_array($_SESSION['problems-peo'])) {


            if (empty($row['userId'])) {
                $firstName = "Guest";
                $lastName = "";
            } elseif (!empty($row['userId'])) {
                $sql = "SELECT firstName,lastName FROM user WHERE userId ='" . $row['userId'] . "';";
                $result = $con->query($sql);
                if ($name = mysqli_fetch_row($result)) {
                    $firstName = $name[0];
                    $lastName = $name[1];
                }
            }
            $problem = $row['problem'];
            $contact = $row['contactDetail'];
            $problemId = $row['problemId'];
            $submitDate = $row['submitDate'];


            $sql = "SELECT firstName,lastName FROM user WHERE userId ='" . $row['userId'] . "';";
            $result = $con->query($sql);
            if ($name = mysqli_fetch_row($result)) {
                $firstName = $name[0];
                $lastName = $name[1];
            }
            $sql = "SELECT * FROM problemsreply WHERE problemId ='" . $problemId . "';";
            $result = $con->query($sql);
            if ($reply = mysqli_fetch_row($result)) {
                $_SESSION['replyId']  = $reply[0];
                $_SESSION['replyMsg'] = $reply[2];
                $_SESSION['replyDate'] = $reply[3];
            } else {
                $_SESSION['replyId']  = null;
                $_SESSION['replyMsg'] = null;
                $_SESSION['replyDate'] = null;
            }

            echo "<div class='com-card card'>
                            <div class='card-top'>
                                <p class='pre-name'>" . $firstName . " " . $lastName . "</p>
                                <div class='status'>
                                <p>#00" . $problemId . "</p>
                                    <div class='in-date'>
                                        <i class='fa-solid fa-calendar-days'></i>
                                        <p id='upload_date'>" . $submitDate . "</p>
                                    </div>
                                </div>
                            </div>
                            <p class='question'>" . $problem . "</p>
                            <p class='answer'>" . $_SESSION['replyMsg'] . "</p>
                        </div>";
            $id++;
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