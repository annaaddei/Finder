<?php
//echo '{"result":1,"message":"valid login"}';
$cmd = $_REQUEST['cmd'];
switch ($cmd) {
    case 1:
        login();        //if cmd=1 the call login
        break;
    case 2:
        signUp();        //if cmd=2 the call sign up
        break;

}

function login()
{
    include_once("functions.php");
    $obj = new functions();

    if (!isset($_GET['username'])) {
        exit();
    }
    $username = $_GET['username'];
    $password = $_GET['password'];

    $result = $obj->login($username, $password);
    $row = $result->fetch_assoc();
    if ($row) {
        echo '{"result":1,"message":"valid login"}';
       session_start();
       $_SESSION['username']=$row['username'];
        $_SESSION['phonenumber']=$row['phonenumber'];
    } else {
        echo '{"result":0,"message":"invalid login"}';
    }
}


function signUp()
{
    include_once("functions.php");
    $obj = new functions();

    if (!isset($_GET['name'])) {
        exit();
    }
    $name = $_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $phoneNumber = $_GET['phoneNumber'];

    $result = $obj->addUser($name, $email, $phoneNumber, $password);

    if($result == 1) {
        echo '{"result":1,"message":"sign up successful"}';
    } else {
        echo '{"result":0,"message":"sign up failed"}';
    }

}

