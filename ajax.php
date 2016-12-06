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
    case 3:
        addPlace();        //if cmd=2 the call add place
        break;

}

function login()
{
    include_once("functions.php");
    $obj = new functions();

    if (!isset($_GET['email'])) {
        exit();
    }
    $email = $_GET['email'];
    $password = $_GET['password'];

    $result = $obj->login($email, $password);
    $row = $result->fetch_assoc();
    if ($row) {
        echo '{"result":1,"message":"valid login"}';
       session_start();
       $_SESSION['name']=$row['name'];
        $_SESSION['phoneNumber']=$row['phoneNumber'];
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

function addPlace()
{
    include_once("functions.php");
    $obj = new functions();

    if (!isset($_GET['name'])) {
        exit();
    }
    $name = $_GET['name'];
    $address = $_GET['address'];
    $longitude = $_GET['longitude'];
    $latitude = $_GET['latitude'];
    $type = $_GET['type'];

    $result = $obj->addPlace($name, $longitude, $latitude, $type, $address);

    if($result == 1) {
        echo '{"result":1,"message":"add place successful"}';
    } else {
        echo '{"result":0,"message":"add place failed"}';
    }

}

