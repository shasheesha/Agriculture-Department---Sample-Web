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

if (isset($_POST['logout'])) {
    signOut();
}
if (isset($_POST['editProfile'])) {
    $_SESSION['reviewId'] = $_SESSION['user_id'];
    header('location:http://localhost/99_40_web/account-edit.php');
}

if (isset($_POST['chatsend'])) {
    $replytext = $_POST['chattext'];
    $selectId = $_SESSION['user_id'];

    $sql = "INSERT INTO problems (userId, problem, contactType, contactDetail) 
    VALUES ('" .$selectId. "', '" .$replytext. "', 'profile', '".$_SESSION['user_phone']."');";

    if($replytext != null){
        if (mysqli_query($con, $sql)) {
            echo "<script> console.log('Record updated successfully'); </script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
        $replytext = null;
    }
    
}
if (isset($_POST['complainsend'])) {
    $replytext = $_POST['complaintext'];
    $selectId = $_SESSION['user_id'];
    $fname = $_SESSION['user_fname'];
    $lname = $_SESSION['user_lname'];
    $nic = $_SESSION['user_nic'];
    $phone = $_SESSION['user_phone'];

    $sql = "INSERT INTO contactrequest (userId, concern, firstname, lastname, nic, phone) 
    VALUES ('" .$selectId. "', '" .$replytext. "', '" .$fname. "', '" .$lname. "','" .$nic. "','" .$phone. "');";

    if($replytext != null){
        if (mysqli_query($con, $sql)) {
            echo "<script> console.log('Record updated successfully'); </script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
        $replytext = null;
    }
    
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
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/main1.css"> -->
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/reaction.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/profile.css">
    <title>Profile</title>
</head>

<body>
    <nav id="main-nav" class="navbar fixed-top ">
        <div id="nav-logo" class="logo"></div>
        <div class="page_items">
            <ul>
                <li id="home" class="#">Home</li>
                <li id="prob" class="#">Problem & Solutions</li>
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
    <section class="full-display secs">
        <div class="profile-detail-card">
            <img id="user-pic2" src="http://localhost/99_40_web/resource/profile/pic-1.jpg" alt="">
            <div class="user-card">
                <div class="top-user-name">
                    <p id="fname"><?php echo $_SESSION['user_fname']; ?></p>
                    <p id="lname"><?php echo $_SESSION['user_lname']; ?></p>
                </div>
                <p id="user-id">#<?php echo $_SESSION['user_id']; ?></p>
            </div>
            <div class="details">
                <div class="data-card">
                    <p class="data-title">First Name</p>
                    <p class="data" id="fname"><?php echo $_SESSION['user_fname']; ?></p>
                </div>
                <div class="data-card">
                    <p class="data-title">Last Name</p>
                    <p class="data" id="lname"><?php echo $_SESSION['user_lname']; ?></p>
                </div>
                <div class="data-card">
                    <p class="data-title">NIC</p>
                    <p class="data" id="nic"><?php echo $_SESSION['user_nic']; ?></p>
                </div>
                <div class="data-card">
                    <p class="data-title">Phone Number</p>
                    <p class="data" id="phone"><?php echo $_SESSION['user_phone']; ?></p>
                </div>
                <div class="data-card">
                    <p class="data-title">Email Address</p>
                    <p class="data" id="email"><?php echo $_SESSION['user_email']; ?></p>
                </div>
            </div>
            <form action="" method="POST" class="pro-btn">
                <input class="secondary-btn" type="submit" name="editProfile" value="Edit Profile">
                <input class="primary-btn" type="submit" name="logout" id="logout" value="Log out">
            </form>
        </div>
        <div class="ops-card">
            <div class="option-nav">
                <ul>
                    <li id="prob-dis" class="# select">Problem Discuss</li>
                    <li id="complain-dis" class="#">Complains & Suggestion</li>
                    <li id="ben-offers-dis" class="#">Benefits & Offers</li>
                </ul>

            </div>
            <span class="hori-line"></span>
            <form id="problem" action="#" class="# " method="POST" required>
                <div class="chat-box">
                    <?php
                    $sql = "SELECT * FROM problems WHERE userId = '" . $_SESSION['user_id'] . "' ;";
                    $result = $con->query($sql);
                    $problems = $result;
                    $id = 0;
                    while ($prob = mysqli_fetch_array($problems)) {
                        $problemId = $prob[0];
                        $problem = $prob[2];
                        $submitDate = $prob[5];

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
                        echo "<div id='p-sent'>

                            <p class='received-date'>" . $submitDate . "</p>
                            " . $problem . "
                            <div id='p-reply'>
                                <div class='reply-one-line'>
                                    <div>" . $_SESSION['replyId'] . "
                                    </div>
                                    <div>
                                        " . $_SESSION['replyDate'] . "
                                    </div>
                                </div>
                                " . $_SESSION['replyMsg'] . "
                            </div>
                                
                        </div>";
                        $id++;
                    }
                    ?>

                </div>
                <div class="chat-type">
                    <input type="text" class="input-field " name="chattext" id="chat-text">
                    <input type="submit" class="primary-btn" name="chatsend" id="chatsend"  value="send">
                </div>
            </form>
            <form id="complain" action="#" class="# disable" method="POST" required>
                <div class="chat-box">
                    <?php
                    $sql = "SELECT * FROM contactrequest WHERE userId = '" . $_SESSION['user_id'] . "' ;";
                    $result = $con->query($sql);
                    $complains = $result;
                    $id = 0;
                    while ($com = mysqli_fetch_array($complains)) {
                        $complainId = $com[0];
                        $complain = $com[2];
                        $submitDate = $com[7];

                        echo "<div id='c-sent'>

                            <p class='received-date'>" . $submitDate . "</p>
                            " . $complain . "
                                
                        </div>";
                        $id++;
                    }
                    ?>

                </div>
                <div class="chat-type">
                    <input type="text" class="input-field " name="complaintext" id="chat-text">
                    <input type="submit" class="primary-btn" name="complainsend" id="chatsend" value="send">
                </div>
            </form>
            <form id="benifit" class="# disable" method="post">
                <div class="chat-box">
                    <?php
                    $sql = "SELECT * FROM promotions;";
                    $result = $con->query($sql);
                    $benifits = $result;

                    while ($row = mysqli_fetch_array($benifits)) {
                        $benId = $row[0];
                        $benNote = $row[1];
                        $benDate = $row[2];
                        $benValid = $row[3];
                        echo "<div class='benifit-card'>
                        <div class='text-side'>
                            <div class='status'>
                                <div class='in-date'>
                                    <i class='fa-solid fa-calendar-days'></i>
                                    <p class='received-date'> Valid For" .$benValid. "</p>
                                </div>
                            </div>
                            " . $benNote . "
                        </div>
                    </div>";
                    }

                    ?>

                    <!-- <div class='benifit-card'>
                        <div class='img-side'>
                            <img src='".$benImg."' alt='#'>
                        </div>
                        <div class='text-side'>
                            <div class='status'>
                                <div class='in-date'>
                                    <i class='fa-solid fa-calendar-days'></i>
                                    <p class='received-date'> Valid For" .$benValid. "</p>
                                </div>
                            </div>
                            " . $problem . "
                        </div>
                    </div> -->







                </div>

            </form>
        </div>
    </section>
    <script src="http://localhost/99_40_web/js/profile-btn.js"></script>
    <script src="http://localhost/99_40_web/js/farmer-profile-switching.js"></script>
    <script src="http://localhost/99_40_web/js/page-switching.js"></script>
    <script src="https://kit.fontawesome.com/878c14d828.js" crossorigin="anonymous"></script>
</body>

</html>