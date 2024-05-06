// uiAdmin.js
export const elH1 = document.querySelector("[data-id='PageH1']");
export const elTemplateNow = document.querySelector("[data-id='template-now']");
export const elOffcanvasMenu = document.querySelector('div#offcanvasMenu');
export const bsOffcanvasMenu = new bootstrap.Offcanvas(elOffcanvasMenu);
export const btnCloseMenu = document.querySelector('button#btnCloseMenu');

export const switcherMenuOnLoad = document.querySelector('input#switcherMenuOnLoad');
export const switcherMenuPosition = document.querySelector('input#switcherMenuPosition');


export const offcanvasElementList = document.querySelectorAll('.offcanvas')
export const offcanvasList = [...offcanvasElementList].map(offcanvasEl => new bootstrap.Offcanvas(offcanvasEl))

// alert(import.meta.url); // ссылка на html страницу для встроенного скрипта