/**
 * Created by Sheila on 12/9/2016.
 */
(function () {
    document.addEventListener('deviceready', onDeviceReady.bind(this), false);
    function onDeviceReady(){
        document.getElementById("inviteButton").onclick = function() {
            navigator.contacts.pickContact(function(contact){
                console.log('The following contact has been selected:' + JSON.stringify(contact));
            },function(err){
                console.log('Error: ' + err);
            });
        }


    };

})();