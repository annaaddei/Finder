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
    case 4:
        makeReservation();        //if cmd=4 the call make reservation
        break;
    case 5:
        invitePeople();
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
        $message = "Hi there " .$name. "! You have successfully signed up to Lookup. We look forward to helping explore new things and places." ;
        $ch = curl_init();
        $url = "http://52.89.116.249:13013/cgi-bin/sendsms?username=mobileapp&password=foobar&to=".$phoneNumber."&from=Lookup&smsc=esstigo&text=".$message;
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

        // grab URL and pass it to the browser
        curl_exec($ch);
    } else {
        echo '{"result":0,"message":"sign up failed"}';
    }

}

function makeReservation()
{

    if (!isset($_GET['date'])) {
        exit();
    }
    $date = $_GET['date'];
    $time = $_GET['time'];
    $people = $_GET['people'];

    session_start();
    $name = $_SESSION['name'];

    $message = "Hello there I am ".$name. ". I'd like to make a reservation for " .$people. ' person(s) on '. $date. ' at ' .$time ;
    $ch = curl_init();
    $url = "http://52.89.116.249:13013/cgi-bin/sendsms?username=mobileapp&password=foobar&to=233274446115&from=Lookup&smsc=esstigo&text=".$message;
    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

    // grab URL and pass it to the browser
    curl_exec($ch);

    echo '{"result":1,"message":"message sent"}';

}

function invitePeople()
{

    if (!isset($_GET['date'])) {
        exit();
    }
    $date = $_GET['date'];
    $time = $_GET['time'];
    $restaurant = $_GET['restaurant'];

    $message = "Hello there! I'd like to invite you for a meal at".$restaurant. 'on '. $date. ' at ' .$time ;
    $ch = curl_init();
    $url = "http://52.89.116.249:13013/cgi-bin/sendsms?username=mobileapp&password=foobar&to=233274446115&from=Lookup&smsc=esstigo&text=".$message;
    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

    // grab URL and pass it to the browser
    curl_exec($ch);

    echo '{"result":1,"message":"message sent"}';

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

