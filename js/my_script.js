/**
 * Created by Sheila on 12/4/2016.
 */
function sendRequest(u) {
    var obj = $.ajax({url: u, async: false});
    return $.parseJSON(obj.responseText);
}

// $(function () {
//     $('#inviteButton').click(function () {
//         function onSuccess(contacts) {
//             alert('Found ' + contacts.length + ' contacts.');
//         };
//
//         function onError(contactError) {
//             alert('onError!');
//         };
//
//         var options      = new ContactFindOptions();
//         options.filter   = "John";
//         options.multiple = true;
//         options.desiredFields = [navigator.contacts.fieldType.id];
//         options.hasPhoneNumber = true;
//         var fields       = [navigator.contacts.fieldType.displayName, navigator.contacts.fieldType.name];
//         navigator.contacts.find(fields, onSuccess, onError, options);
//
//     });
// });

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

// $('#directory').on('click', 'button', function(e) {
//     $('#restaurant').innerHTML = '<h4>'+name+'</h4>';
// });

$(function () {
    $('#reservationButton').click(function () {
        var date = document.getElementById('date').value;
        var time = document.getElementById('time').value;
        var people = document.getElementById('people').value;

        var theUrl ="ajax.php?cmd=4&date=" +date+ "&time=" + time +
            "&people="+people;
        var obj = sendRequest(theUrl);

        if (obj.result == 1) {
            alert("Reservation message sent");

        } else {
            alert("Failed to send reservation message");
        }
    });
});

function makeReservation(name){
    window.location.assign("reservation.html?restaurant="+name);
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
            window.open("restaurants_admin.html");

        } else {
            alert("failed to add place");
            window.open("add_place.html");
        }

    });
});
