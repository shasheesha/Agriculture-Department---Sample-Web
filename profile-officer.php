<?php
include('connectors/db-connector.php');
include('php/functions.php');
session_start();
if (empty($_SESSION['user_id'])) {
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




if (isset($_POST['create'])) {
    header('location:http://localhost/99_40_web/create-doa.php');
}
if (isset($_POST['edit'])) {
    $_SESSION['reviewId'] = $_POST['print'];
    // 
    header('location:http://localhost/99_40_web/account-edit.php');
}
if (isset($_POST['review'])) {
    $_SESSION['reviewId'] = $_POST['print'];
    header('location:http://localhost/99_40_web/account-review.php');
}

if (isset($_POST['editProfile'])) {
    $_SESSION['reviewId'] = $_SESSION['user_id'];
    header('location:http://localhost/99_40_web/account-edit.php');
}
if (isset($_POST['delete'])) {
    $_SESSION['reviewId'] = $_POST['print'];
    deleteAccount();
    unset($_SESSION['reviewId']);
}
if (isset($_POST['reply-sent'])) {
    $msg = $_POST['reply-text'];
    $probId = $_POST['selected-id'];

    $sql = "INSERT INTO problemsreply (problemId, reply)
                VALUES ('" . $probId . "', '" . $msg . "')";

    if (mysqli_query($con, $sql)) {
        echo "<script>
         alert('" . $msg . "' '" . $probId . "' done')</script>";
    } else {
        echo "<script>
         alert('" . $msg . "' '" . $probId . "' reject.')</script>";;
    }
}


if (isset($_POST['addbenifit'])) {
    $benifittext = $_POST['benifittext'];
    $validDate = $_POST['validDate'];

    $sql = "INSERT INTO promotions (promoNote ,validFor) 
    VALUES ('" . $benifittext . "', '" . $validDate . "');";

    if ($benifittext != null) {
        if (mysqli_query($con, $sql)) {
            echo "<script> console.log('Record updated successfully'); </script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
    $benifittextt = null;
    $validDate = null;
}

if (isset($_POST['replysent'])) {
    $replytext = $_POST['replytext'];
    $selectId = $_POST['selectedid'];

    $sql = "INSERT INTO problemsreply (problemId, reply) 
    VALUES ('" . $selectId . "', '" . $replytext . "');";

    if ($replytext != null) {
        if (mysqli_query($con, $sql)) {
            echo "<script> console.log('Record updated successfully'); </script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
    $replytext = null;
    $selectId = 0;
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
    <title>DOA</title>
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
                <p id="user-id">#<?php echo $_SESSION['user_id']; ?> - <span id="designation"><?php echo $_SESSION['user_type']; ?></span></p>
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
            <form action="#" method="POST" class="pro-btn">
                <input class="secondary-btn" type="submit" name="editProfile" value="Edit Profile">
                <input class="primary-btn" type="submit" name="logout" id="logout" value="Log out">
            </form>
        </div>
        <div class="ops-card">
            <nav class="option-nav">
                <ul>
                    <li id="prob-dis" class="# select">Problem Discuss</li>
                    <li id="complain-dis" class="#">Complains & Suggestions</li>
                    <li id="ben-offers-dis" class="#">Benefits & Offers</li>
                    <li id="accounts-dis" class="#">User Accounts</li>
                    <?php if ($_SESSION['user_type'] == 'doa') {
                    ?>
                        <li id="site-management-dis" class="#">Site Management</li>
                    <?php
                    }
                    ?>
                </ul>

            </nav>
            <span class="hori-line"></span>

            <form id="problem" class="#" method="post">

                <div class="chat-box">
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
                        echo "<div id='p-reply'>

                            <div class='reply-one-line'>
                                <p class='sender-name '>" . $firstName . " " . $lastName . "</p>
                                <div>
                                <p class='received-date'>" . $row['submitDate'] . "</p>
                                <input type='radio' name='selectedid' id='selected-id' value='" . $problemId . "'>Select to reply first.
                                </div>
                            </div>
                            " . $problem . "
                            <br><br> Contact Detail :- " . $contact . "
                            <div id='p-sent'>
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


                <div class='reply-one-line'>
                    <textarea class='input-field' name='replytext' id='chat-text' placeholder="Type reply"></textarea>
                    <input type='submit' class='primary-btn' name='replysent' id='reply-sent' value='send'>
                </div>
            </form>
            <form id="complain" class="# disable" method="post">
                <div class="chat-box">
                    <?php
                    $sql = "SELECT * FROM contactrequest;";
                    $result = $con->query($sql);
                    $complains = $result;
                    $id = 0;
                    while ($com = mysqli_fetch_array($complains)) {
                        $complainId = $com[0];
                        $complain = $com[2];
                        $submitDate = $com[7];

                        echo "<div id='p-reply'>

                        <div class='reply-one-line'>
                        <p class='sender-name '>#" . $complainId . "</p>
                        <p class='received-date'>" . $submitDate . "</p>
                    </div>
                    " . $complain . "
                    
                                
                        </div>";
                        $id++;
                    }
                    ?>
                </div>
            </form>
            <form id="accounts" class="# disable" method="post">
                <div class="option-bar">
                    <div class="color-tags">
                        <div class="doa-tag">DOA & Officer Accounts</div>
                        <div class="farmer-tag">Farmer Accounts</div>
                    </div>
                    <nav class="option-nav">
                        <ul>
                            <li id="all-Accounts-dis" class="# select">All Accounts</li>
                            <li id="farmer-Accounts-dis" class="#">Farmer Accounts</li>
                            <li id="doa-Accounts-dis" class="#">DOA Accounts</li>
                        </ul>
                    </nav>
                </div>
                <table id="all-user-table" class="#">
                    <tr class="title-bar">
                        <th>User ID</th>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>Contact Num.</th>
                        <th>Email Address</th>
                        <th>Pick</th>
                        <th>Reg Time</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM User order by userId;";

                    $result = mysqli_query($con, $sql);
                    $_SESSION['users'] = $result;
                    $id = 0;
                    while ($users = mysqli_fetch_array($_SESSION['users'])) {


                        $userId = $users['userId'];
                        $fname = $users['firstName'];
                        $lname = $users['lastName'];
                        $nic = $users['userNic'];
                        $birthday = $users['userBirthday'];
                        $address = $users['userAddress'];
                        $phone = $users['userPhone'];
                        $email = $users['userEmail'];
                        $regDate = $users['regDate'];


                        $sql = "SELECT userCategory FROM user_credentials WHERE userId ='" . $userId . "';";
                        $result = $con->query($sql);
                        if ($name = mysqli_fetch_row($result)) {
                            $userCategory = $name[0];
                        }


                        echo "<tr class='data " . $userCategory . "'>
                        <th>" . $userId . "</th>
                        <th>" . $fname . "<br>" . $lname . "</th>
                        <th>" . $nic . "</th>
                        <th>" . $phone . "</th>
                        <th>" . $email . "</th>";
                        if ($userCategory == 'farmer' && $_SESSION['user_type'] != 'doa') {
                            echo "<th><input type='radio' name='print' id='print' value='" . $userId . "'></th>";
                        } elseif ($userCategory != 'farmer' && $_SESSION['user_type'] != 'doa') {
                            echo "<th></th>";
                        } elseif ($_SESSION['user_type'] == 'doa') {
                            echo "<th><input type='radio' name='print' id='print' value='" . $userId . "'></th>";
                        }
                        echo "<th>" . $regDate . "</th>
                    </tr>";
                        $id++;
                    }
                    ?>

                </table>
                <table id="farmer-user-table" class="disable">
                    <tr class="title-bar">
                        <th>User ID</th>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>Contact Num.</th>
                        <th>Email Address</th>
                        <th>Pick</th>
                        <th>Reg Time</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM User order by userId;";

                    $result = mysqli_query($con, $sql);
                    $_SESSION['users'] = $result;
                    $id = 0;
                    while ($users = mysqli_fetch_array($_SESSION['users'])) {


                        $userId = $users['userId'];
                        $fname = $users['firstName'];
                        $lname = $users['lastName'];
                        $nic = $users['userNic'];
                        $birthday = $users['userBirthday'];
                        $address = $users['userAddress'];
                        $phone = $users['userPhone'];
                        $email = $users['userEmail'];
                        $regDate = $users['regDate'];


                        $sql = "SELECT userCategory FROM user_credentials WHERE userId ='" . $userId . "';";
                        $result = $con->query($sql);
                        if ($name = mysqli_fetch_row($result)) {
                            $userCategory = $name[0];
                        }
                        if ($userCategory == 'farmer') {
                            echo "<tr class='data " . $userCategory . "'>
                        <th>" . $userId . "</th>
                        <th>" . $fname . "<br>" . $lname . "</th>
                        <th>" . $nic . "</th>
                        <th>" . $phone . "</th>
                        <th>" . $email . "</th>";
                            if (!empty($_SESSION['user_type'])) {
                                echo "<th><input type='radio' name='print' id='print' value='" . $userId . "'></th>";
                            } else {
                                echo "<th></th>";
                            }
                            echo "<th>" . $regDate . "</th>
                    </tr>";
                        }

                        $id++;
                    }
                    ?>
                </table>
                <table id="doa-user-table" class="disable">
                    <tr class="title-bar">
                        <th class="uid">User ID</th>
                        <th class="uname">Name</th>
                        <th class="unic">NIC</th>
                        <th class="ucontact">Contact Num.</th>
                        <th class="uemail">Email Address</th>
                        <th class="ubtn">Pick</th>
                        <th class="ureg">Reg Time</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM User order by userId;";

                    $result = mysqli_query($con, $sql);
                    $_SESSION['users'] = $result;
                    $id = 0;
                    while ($users = mysqli_fetch_array($_SESSION['users'])) {


                        $userId = $users['userId'];
                        $fname = $users['firstName'];
                        $lname = $users['lastName'];
                        $nic = $users['userNic'];
                        $birthday = $users['userBirthday'];
                        $address = $users['userAddress'];
                        $phone = $users['userPhone'];
                        $email = $users['userEmail'];
                        $regDate = $users['regDate'];


                        $sql = "SELECT userCategory FROM user_credentials WHERE userId ='" . $userId . "';";
                        $result = $con->query($sql);
                        if ($name = mysqli_fetch_row($result)) {
                            $userCategory = $name[0];
                        }
                        if ($userCategory != 'farmer') {
                            echo "<tr class='data " . $userCategory . "'>
                        <th>" . $userId . "</th>
                        <th>" . $fname . "<br>" . $lname . "</th>
                        <th>" . $nic . "</th>
                        <th>" . $phone . "</th>
                        <th>" . $email . "</th>";
                            if ($_SESSION['user_type'] == 'doa') {
                                echo "<th><input type='radio' name='print' id='print' value='" . $userId . "'></th>";
                            } else {
                                echo "<th></th>";
                            }
                            echo "<th>" . $regDate . "</th>
                    </tr>";
                        }

                        $id++;
                    }
                    ?>
                </table>
                <div class="optional-btn">
                    <div class="left-side">
                        <?php
                        if ($_SESSION['user_type'] == 'doa') {
                            echo "<input type='submit' class='primary-btn' id='create' name='create' value='Create Account'>";
                        } else {
                            echo "<span>  </span>";
                        }
                        ?>

                    </div>
                    <div class="right-side">
                        <input type="submit" class="third-btn" id="review" name="review" value="review Account">
                        <input type="submit" class="third-btn" id="delete" name="delete" value="Delete Account">
                        <input type="submit" class="third-btn" id="edit" name="edit" value="Edit Account">

                    </div>
                </div>
            </form>
            <form id="benifit" class="# disable" method="post">
                <div class="chat-box">
                    <?php
                    $sql = "SELECT * FROM promotions;";
                    $result = $con->query($sql);
                    $benifits = $result;

                    while ($row = mysqli_fetch_assoc($benifits)) {
                        // $benId = $row['promoId'];
                        // $benNote = $row['promoNote'];
                        // $benDate = $row['addDate'];
                        // $benValid = $row['validFor'];
                        echo "<div class='benifit-card'>
                        <div class='text-side'>
                            <div class='status'>
                                <div class='in-date'>
                                    <i class='fa-solid fa-calendar-days'></i>
                                    <p class='received-date'> Valid For  " . $row['validFor'] . "</p>
                                </div>
                            </div>
                            " . $row['promoNote'] . "
                        </div>
                    </div>";
                    }

                    ?>
                </div>
                <div class="chat-type">
                    <div>
                        <p>Valid date</p>
                        <input type="date" class="input-field " name="validDate" id="validDate" placeholder="Valid Date" alt="Valid Date">
                    </div>
                    <div class="chat-area">
                        <p>What is the Promotion</p>
                        <textarea class="input-field " name="benifittext" id="chat-text" placeholder="Promotion Discription"></textarea>
                    </div>

                    <input type="submit" class="primary-btn" name="addbenifit" id="addbenifit" value="send">
                </div>
            </form>
            <?php
            if ($_SESSION['user_type'] == 'doa') {
            ?>
                <form id="site" class="# disable" method="post">
                    <div class="site-option">
                        <input type="button" class="secondary-btn" name="news" value="News" onclick='window.location.href="http://localhost/99_40_web/news-upload.php"'>
                        <input type="button" class="secondary-btn" name="gallery" value="Gallery" onclick='window.location.href="http://localhost/99_40_web/gallery-upload.php"'>
                    </div>
                </form>
            <?php
            }
            ?>


        </div>
    </section>

    <!-- <script src="http://localhost/99_40_web/js/problem-msg-system.js"></script> -->

    <script src="http://localhost/99_40_web/js/doa-profile-switching.js"></script>
    <!-- <script src="http://localhost/99_40_web/js/doa-profile-switching.js"></script> -->
    <!-- <script src="http://localhost/99_40_web/js/farmer-profile-switching.js"></script> -->
    <script src="http://localhost/99_40_web/js/page-switching.js"></script>
    <script src="https://kit.fontawesome.com/878c14d828.js" crossorigin="anonymous"></script>
</body>

</html>