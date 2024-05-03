// import * as a from '../.././js/adminFunctions.js';
const btnSuccess = document.getElementById("btnSuccess");
const btnDanger = document.getElementById("btnDanger");

const ErrorToastEl = document.querySelector('#myError');
const SuccessToastEl = document.querySelector('#mySuccess');
const myInvalidEl = document.querySelector('#myInvalid');

const toastElList = document.querySelectorAll('.toast'); //  все html класса тост
const timeElements = document.querySelectorAll('.showTime');


const IS_ALLOW = true;
const IS_ALLOW_DANGER = true;

let htmlMessage = '';
const option = {};


// Create toast instance
const myError = new bootstrap.Toast(ErrorToastEl);
const mySuccess = new bootstrap.Toast(SuccessToastEl);
const myInvalidForm = new bootstrap.Toast(myInvalidEl);

const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, option)); // массив объекьов

const showError = function(mess) {
    htmlMessage = mess;
    if (IS_ALLOW_DANGER) myError.show();
}
const showSuccess = function(mess) {
    htmlMessage = mess;
    if (IS_ALLOW) mySuccess.show();
}
const showInvalid = function(mess) {
    htmlMessage = mess;
    if (IS_ALLOW) myInvalidForm.show();
}

// const IS_ALLOW = false;
document.addEventListener("DOMContentLoaded", function() {

    btnDanger.addEventListener("click", function() {
        // myError.show();
        showError("myError");
    });

    btnSuccess.addEventListener("click", function() {
        // mySuccess.show();
        showSuccess("mySuccess");
    });

    /* выводим СВОЁ время выполнения для всех toastElList*/
    [].forEach.call(toastElList, function(El) {
        El.addEventListener('show.bs.toast', () => {
            // console.info( htmlMessage );
            let thisTimeEl = El.querySelector('.showTime');
            let thisMessage = El.querySelector('.message-body');
            let today = new Date();
            thisTimeEl.innerHTML = formatTime(today);
            if (htmlMessage) thisMessage.innerHTML = htmlMessage;
        });
    });


});

export {
    showError,
    showSuccess,
    showInvalid,
    toastElList,
    toastList
}