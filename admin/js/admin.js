// admin.js
// глобальные функции, объекты и константы
function zeroPad(num, numZeros) {
    if (num == 0) return "0"
    let an = Math.abs(num);
    let digitCount = 1 + Math.floor(Math.log(an) / Math.LN10);
    if (digitCount >= numZeros) {
        return num.toString();
    }
    let zeroString = Math.pow(10, numZeros - digitCount).toString().substr(1);
    return num < 0 ? '-' + zeroString + an : zeroString + an;
}

function nowLocale() {
    // создаем новый объект `Date`
    let today = new Date();
    // получаем дату и время
    let nowLocale = today.toLocaleString();
    return nowLocale;
}

function formatDateTime(date, $sep = ' ') {
    let hh = date.getHours();
    if (hh < 10) hh = '0' + hh;
    let ii = date.getMinutes();
    if (ii < 10) ii = '0' + ii;
    let ss = date.getSeconds();
    if (ss < 10) ss = '0' + ss;
    let dd = date.getDate();
    if (dd < 10) dd = '0' + dd;
    let mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;
    // let yy = date.getFullYear() % 100;
    // if (yy < 10) yy = '0' + yy;
    let yy = date.getFullYear();
    let result = yy + '-' + mm + '-' + dd + ' ' + $sep + ' ' + hh + ':' + ii + ':' + ss;
    return result;
}

function formatDate(date, $sep = ' ') {
    let dd = date.getDate();
    if (dd < 10) dd = '0' + dd;
    let mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;
    // let yy = date.getFullYear() % 100;
    // if (yy < 10) yy = '0' + yy;
    let yy = date.getFullYear();
    let result = yy + '-' + mm + '-' + dd;
    return result;
}

function formatTime(date, $sep = ' ') {
    let hh = date.getHours();
    if (hh < 10) hh = '0' + hh;
    let ii = date.getMinutes();
    if (ii < 10) ii = '0' + ii;
    let ss = date.getSeconds();
    if (ss < 10) ss = '0' + ss;
    let result = hh + ':' + ii + ':' + ss;
    return result;
}