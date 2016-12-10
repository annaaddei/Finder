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

        var theUrl = "http://52.89.116.249/~anna.addei/Finder/ajax.php?cmd=2&name=" +name+ "&password=" + password +
            "&email="+email+ "&phoneNumber=" + phoneNumber;
        var obj = sendRequest(theUrl);

        if (obj.result == 1) {
            alert("Sign up successful");
            window.location.assign("index.html");

        } else {
            alert("failed to sign up");
            window.location.assign("sign_up.html");
        }

    });
});


$(function () {
    $('#reservationButton').click(function () {
        var name = document.getElementById('name').value;
        var date = document.getElementById('date').value;
        var time = document.getElementById('time').value;
        var people = document.getElementById('people').value;

        var message = "Hello%20there.%20I'm%20"+name+"%20and%20I'd%20like%20to%20make%20a%20reservation%20for%20" +people+ '%20person(s)%20on%20'+ date+ '%20at%20' +time ;
        var url = "http://52.89.116.249:13013/cgi-bin/sendsms?username=mobileapp&password=foobar&to=233274446115&from=Lookup&smsc=esstigo&text="+message;
        window.open(url);
        window.open("restaurants.html");

    });
});



function makeReservation(name){
    window.location.assign("reservation.html?restaurant="+name);
}

function directions(location){
    location = location.replace(/\s/g, "");
    location = location.substring(1);
    location = location.substring(0, location.length-1);
    window.location.assign("directions.html?here="+location);
}

$(function () {
    $('#loginButton').click(function () {
        var email = document.getElementById('loginEmail').value;
        var password = document.getElementById('loginPassword').value;

        var theUrl = "http://52.89.116.249/~anna.addei/Finder/ajax.php?cmd=1&email="+email+"&password="+password;
        var obj = sendRequest(theUrl);

        if (obj.result === 1) {
            alert("Login successful");
            if(email == "admin@gmail.com"){
                window.location.assign("admin_index.html");
            }else {
                window.location.assign("dashboard.html");
            }

        } else {
            alert("failed to login");
            window.location.assign("index.html");
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

        var theUrl = "http://52.89.116.249/~anna.addei/Finder/ajax.php?cmd=3&name=" +name+ "&longitude=" + longitude +
            "&latitude="+latitude+ "&address=" + address+ "&type=" + type;
        var obj = sendRequest(theUrl);

        if (obj.result == 1) {
            alert("Add place successful");
            window.location.assign("restaurants_admin.html");

        } else {
            alert("failed to add place");
            window.location.assign("add_place.html");
        }

    });
});
