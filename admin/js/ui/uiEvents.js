import * as ui from './uiAdmin.js';


// События
ui.switcherMenuOnLoad.addEventListener('change', function(e) {
    // console.log(e);
    if (e.target.checked) {
        localStorage.setItem('showMenuOnLoad', "1");
    } else {
        localStorage.setItem('showMenuOnLoad', "0");
    }
});



// alert(import.meta.url); // ссылка на html страницу для встроенного скрипта

document.addEventListener("DOMContentLoaded", function() {

    let showMenuOnLoad = localStorage.getItem('showMenuOnLoad');
    if (showMenuOnLoad === "1") {
        ui.bsOffcanvasMenu.show();
        ui.switcherMenuOnLoad.checked = true;
    } else {
        ui.bsOffcanvasMenu.hide();
        ui.switcherMenuOnLoad.checked = undefined;
    }
});