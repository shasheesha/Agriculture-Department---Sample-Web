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

if (isset($_POST['cancel'])) {
    unset($_SESSION['reviewId']);
    header('location:http://localhost/99_40_web/sign-in.php');
}

if (isset($_POST['upload'])) {
    $newsTitle = $_POST['news-title'];
    $newsDiscription = $_POST['news-des'];

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./resource/news/" . $filename;

	// Get all the submitted data from the form
	$sql = "INSERT INTO newsimg (filename) VALUES ('$filename')";

	// Execute query
	mysqli_query($con, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}

    $sql = "SELECT * FROM newsimg WHERE filename = '$filename' ";

    $result = $con->query($sql);
    if ($row = mysqli_fetch_row($result)) {
        $imgId = $row[0];
    }
    $sql = "INSERT INTO news (newsTitle, newsDis, imgId) VALUES ('".$newsTitle."','".$newsDiscription."','".$imgId."')";

    if (mysqli_query($con,$sql)) {
        echo "<script>console.log ('upload successfully.')</script>";
        echo "<script>
        alert('News Published Successfully.')</script>";
        header('location:http://localhost/99_40_web/sign-in.php');
    } else {
        echo "Error upload: " . $con->error;
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
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/main1.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/reaction.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/signin.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/99_40_web/css/profile.css">

    <title>News Upload</title>
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
        <form name="news-upload" method="POST" action="" enctype="multipart/form-data">
            <div class="panel" id="page1">
                <p class="title">News Upload</p>
                <p class="description">What is your News...</p>

                <input type="text" class="input-field" name="news-title" id="news-title" placeholder="News Title">
                <textarea id="news-des" name="news-des" class="input-field text-msg" placeholder="Describe your News"></textarea>

                <div id="content">
                        <div class="form-group">
                            <input class="form-control " type="file" name="uploadfile" value="" />
                        </div>
                        <div class="form-group">
                            <button class="primary-btn" type="submit" name="upload">Upload</button>
                        </div>
                </div>
                <input type="submit" class="third-btn" id="cancel" name="cancel" value="Cancel">
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