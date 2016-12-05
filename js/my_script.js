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
            window.open("index.html");

        } else {
            alert("failed to sign up");
            window.open("sign_up.html");

        }
    });
});
