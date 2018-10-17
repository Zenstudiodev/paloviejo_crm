/**
 * Created by Carlos on 5/10/2018.
 */

// Initialize Firebase
var config = {
    apiKey: "AIzaSyCtva0AhkJYpVT8qU1ClbBH9tLeKT10zD0",
    authDomain: "crm-paloviejosa.firebaseapp.com",
    databaseURL: "https://crm-paloviejosa.firebaseio.com",
    projectId: "crm-paloviejosa",
    storageBucket: "",
    messagingSenderId: "973854945728"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.requestPermission()
    .then(function () {
        console.log('have permission');
        return messaging.getToken();
    })
    .then(function (token) {
        console.log(token);
        $("#token").html(token);
    })
    .catch(function (err) {
        console.log('ocurrio un error.' + err);
    });


messaging.onMessage(function (payload) {
    console.log('onMessage: ',payload);
});



