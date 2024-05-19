import * as ui from './uiAdmin.js';


// События
ui.switcherMenuOnLoad.addEventListener('change', function(e) {
    // console.log(e);
    if (e.target.checked) {
        localStorage.setItem('switcherMenuOnLoad', "1");
    } else {
        localStorage.setItem('switcherMenuOnLoad', "0");
    }
});

ui.switcherMenuPosition.addEventListener('change', function(e) {
    // console.log(e);
    if (e.target.checked) {
        localStorage.setItem('switcherMenuPosition', "1");
    } else {
        localStorage.setItem('switcherMenuPosition', "0");
    }
});

ui.btnCloseMenu.addEventListener('click', () => {
    ui.bsOffcanvasMenu.hide();
});

// alert(import.meta.url); // ссылка на html страницу для встроенного скрипта

document.addEventListener("DOMContentLoaded", function() {
    // console.log(ui)
    let switcherMenuOnLoad = localStorage.getItem('switcherMenuOnLoad');
    if (switcherMenuOnLoad === "1") {
        ui.bsOffcanvasMenu.show();
        ui.switcherMenuOnLoad.checked = true;
    } else {
        ui.bsOffcanvasMenu.hide();
        ui.switcherMenuOnLoad.checked = undefined;
    }

    let switcherMenuPosition = localStorage.getItem('switcherMenuPosition');
    if (switcherMenuPosition === "1") {
        ui.elOffcanvasMenu.classList.remove('offcanvas-start');
        ui.elOffcanvasMenu.classList.add('offcanvas-end');
        ui.switcherMenuPosition.checked = true;
    } else {
        ui.elOffcanvasMenu.classList.add('offcanvas-start');
        ui.elOffcanvasMenu.classList.remove('offcanvas-end');
        ui.switcherMenuPosition.checked = undefined;
    }

});

document.addEventListener('keydown', function(event) {
    if (event.code == 'KeyM' && (event.ctrlKey || event.metaKey)) {
        ui.bsOffcanvasMenu.toggle();
    }
    if (event.code == 'ArrowUp' && (event.ctrlKey || event.metaKey) && event.shiftKey) {
        scrolToMyTop();
    }
    if (event.code == 'ArrowDown' && (event.ctrlKey || event.metaKey) && event.shiftKey) {
        scrolToMyBottom();
    }
});




window.addEventListener('scroll', function() {
    arrowTop.hidden = (pageYOffset < 200);
    arrowDown.hidden = (pageYOffset > (document.body.scrollHeight - 100));
});

arrowDown.onclick = scrolToMyBottom;
arrowTop.onclick = scrolToMyTop;