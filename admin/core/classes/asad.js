let divProgress = document.querySelector("[data-progress]");
let timerEl = document.querySelector('[name="toastTimer"]');
const iterationCount = 10;
let startPercent = 0;
let toastSeconds = timerEl.value; // 100 sec
let increment = 0; // счетчик
let timeValue = Math.ceil(+toastSeconds / +iterationCount); //10 sec

function doProgress() {
    if (increment < iterationCount) {
        let Percent = startPercent + (timeValue * increment); //  10s*0 //+10s*1 //10*2 // 10*3
        divProgress.style.width = Percent + "%";
        console.log(divProgress.style.width);
    }
    increment = increment + 1;
}
setInterval(doProgress, 1000);
doProgress();