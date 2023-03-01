<?php

use LDAP\Result;

function signinFunction(){
    include('connectors/db-connector.php');

    $sql = "SELECT * FROM user_credentials WHERE userUsername ='" . $_SESSION['signin-username'] . "' AND userPassword ='" . $_SESSION['signin-password'] . "';";

    $result = $con->query($sql);

    if ($row = mysqli_fetch_row($result)) {

        $_SESSION['user_id'] = $row[1];
        $_SESSION['user_name'] = $row[2];
        $_SESSION['user_password'] = $row[3];
        $_SESSION['user_type'] = $row[4];


       
            $sql = "SELECT * FROM user WHERE userId ='" . $_SESSION['user_id'] . "';";

            $result = $con->query($sql);

            if ($row = mysqli_fetch_row($result)) {

                $_SESSION['user_fname'] = $row[1];
                $_SESSION['user_lname'] = $row[2];
                $_SESSION['user_nic'] = $row[3];
                $_SESSION['user_birthday'] = $row[4];
                $_SESSION['user_address'] = $row[5];
                $_SESSION['user_phone'] = $row[6];
                $_SESSION['user_email'] = $row[7];
                
            }
            echo "<script>console.log ('".$_SESSION['user_id']."')</script>";
            // echo "<script>console.log ('".$_SESSION['user_name']."')";
            // echo "<script>console.log ('".$_SESSION['user_password']."')";
            // echo "<script>console.log ('".$_SESSION['user_type']."')";
            echo "<script>console.log ('".$_SESSION['user_fname']."')</script>";
            // echo "<script>console.log ('".$_SESSION['user_lname']."')";
            // echo "<script>console.log ('".$_SESSION['user_nic']."')";
            // echo "<script>console.log ('".$_SESSION['user_birthday']."')";
            // echo "<script>console.log ('".$_SESSION['user_address']."')";
            // echo "<script>console.log ('".$_SESSION['user_phone']."');
            // echo "<script>console.log ('".$_SESSION['user_email']."');</script>";
            header("location: home.php");
        
            $con = null;
        
    } else {
        echo "<script>
        alert('No Such User Found. Try Again.')</script>";
    }
}



function signOut(){
    session_destroy();
    header("location:home.php");
}


function setupUserdetails(){
    include('connectors/db-connector.php');

    $sql = "INSERT INTO user (firstName, lastName, userNic, userBirthday, userAddress, userPhone, userEmail)
            VALUES ('" . $_SESSION['first-name'] . "', '" . $_SESSION['last-name'] . "', '" . $_SESSION['nic'] . "', '" . $_SESSION['birthday'] . "', '" . $_SESSION['address'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['email'] . "')";

    if (mysqli_query($con, $sql)) {
        echo "<script> console.log('user details recorded successfully'); </script>";
        $sql = "SELECT * FROM user WHERE firstName ='" . $_SESSION['first-name'] . "' AND userNic ='" . $_SESSION['nic'] . "';";

        $result = $con->query($sql);

        if($row = mysqli_fetch_row($result)){

            $tempId = $row[0];
            echo $tempId;

        }

        if(isset($_SESSION['user-category'])){
            $cat = $_SESSION['user-category'];
        } elseif (!isset($_SESSION['user-category'])){
            $cat = 'farmer';
        }


        $sql = "INSERT INTO user_credentials (userId, userUsername, userPassword, userCategory)
                VALUES ('" . $tempId . "', '" . $_SESSION['username'] . "', '" . $_SESSION['password'] . "', '".$cat."')";
        echo $_SESSION['first-name'];
        echo $_SESSION['last-name'];
        echo $_SESSION['nic'];
        echo $_SESSION['birthday'];
        echo $_SESSION['address'];
        echo $_SESSION['phone'];
        echo $_SESSION['email'];
        echo $_SESSION['username'];
        echo $_SESSION['password'];
        echo $_SESSION['confirm-password'];
        
        if (mysqli_query($con, $sql)) {
            echo "<script> console.log('username and password recorded successfully'); </script>";
            $con = null;
            if(isset($_SESSION['user_id'])){
                signupDataClear();    
            } else{
                header('location: http://localhost/99_40_web/sign-up-done.php');
            }
        } else {
            echo "Error username password record: " . $con->error;
        }
    } else {
        echo "Error user details record: " . $con->error;
    }
    if(empty($con)){
        echo "<script>console.log ('Disconnect successfully.')</script>";
    }
}

function signupDataClear(){
    if(isset($_SESSION['user_id'])){
        unset($_SESSION['first-name']);
        unset($_SESSION['last-name']);
        unset($_SESSION['nic']);
        unset($_SESSION['birthday']);
        unset($_SESSION['address']);
        unset($_SESSION['phone']);
        unset($_SESSION['email']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['confirm-password']);
        header('location: http://localhost/99_40_web/sign-in.php');    
    } else{
        session_destroy();
        header('location: http://localhost/99_40_web/sign-in.php');
    }
   
}

function deleteAccount(){
    include('connectors/db-connector.php');

    $sql = "DELETE FROM user_credentials WHERE userId = '" . $_SESSION['reviewId'] . "';";
    //type function
    if (mysqli_query($con, $sql)) {
        echo "<script>
        alert('user credentials Account Deleted.')</script>";

        $sql = "DELETE FROM user WHERE userId = '" . $_SESSION['reviewId'] . "';";
        
        if (mysqli_query($con, $sql)) {
            echo "<script>
        alert('user Account Deleted.')</script>";
        } else {
            echo "<script>
        alert('Try Again.')</script>";
        }
    } else {
        echo "<script>
        alert('Try Again.')</script>";
    }

    header('location: http://localhost/99_40_web/sign-in.php');
}



