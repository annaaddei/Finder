/**
 * Created by Sheila on 12/4/2016.
 */
function sendRequest(u) {
    var obj = $.ajax({url: u, async: false});
    return $.parseJSON(obj.responseText);
}

$(function () {
    $('#signUpButton').click(function () {
        var name = document.getElementById('signUpName').value;
        var email = document.getElementById('signUpEmail').value;
        var phoneNumber = document.getElementById('signUpPhoneNumber').value;
        var password = document.getElementById('signUpPassword').value;

        var theUrl = "ajax.php?cmd=2&name=" +name+ "&password=" + password +
            "&email="+email+ "&phoneNumber=" + phoneNumber;
        var obj = sendRequest(theUrl);

        if (obj.result == 1) {
            alert("Sign up successful");
            window.open("login.html");

        } else {
            alert("failed to sign up");
            window.open("sign_up.html");

        }
    });
});

$(function () {
    $('#loginButton').click(function () {
        var email = document.getElementById('loginEmail').value;
        var password = document.getElementById('loginPassword').value;

        var theUrl = "ajax.php?cmd=1&email="+email+"&password="+password;
        var obj = sendRequest(theUrl);

        if (obj.result === 1) {
            alert("Login successful");
            if(email == "admin@gmail.com"){
                window.open("admin_index.html");
            }else {
                window.open("index.html");
            }

        } else {
            alert("failed to login");
            window.open("login.html");

        }
    });
});

$(function () {
    $('#addPlaceButton').click(function () {
        var name = document.getElementById('name').value;
        var longitude = document.getElementById('longitude').value;
        var latitude = document.getElementById('latitude').value;
        var address = document.getElementById('address').value;
        var type = document.getElementById('place_type').value;

        var theUrl = "ajax.php?cmd=3&name=" +name+ "&longitude=" + longitude +
            "&latitude="+latitude+ "&address=" + address+ "&type=" + type;
        var obj = sendRequest(theUrl);

        if (obj.result == 1) {
            alert("Add place successful");
            window.open("restaurants_admin.html");

        } else {
            alert("failed to add place");
            window.open("add_place.html");

        }
    });
});
