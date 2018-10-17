/**
 * Created by Carlos on 5/10/2018.
 */
importScripts('https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.3/firebase-messaging.js');
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
messaging.setBackgroundMessageHandler(function (payload) {
    const title ='hello world';
    const options = {
        body: payload.data.status
    };
    return self.registration.showNotiification(title, options);
});