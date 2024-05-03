// import * as a from './adminFunctions.js';
import * as ui from './ui/uiAdmin.js';
import * as bsToast from "../apps/Toasts/appToasts.js";


console.log(ui)
let today = new Date();
ui.elTemplateNow.innerHTML = formatTime(today);