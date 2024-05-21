import * as ui from './uiAdmin.js';


document.addEventListener('keydown', function(event) {
    // console.log(event);
    if (event && event.altKey && (event.ctrlKey || event.metaKey)) {

        if (event.code == 'KeyM') {
            ui.bsOffcanvasMenu.toggle();
        }
        if (event.code == 'ArrowUp') {
            scrolToMyTop();
        }
        if (event.code == 'ArrowDown') {
            scrolToMyBottom();
        }
    }
});
