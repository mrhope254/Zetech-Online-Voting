const days = document.querySelector("#days");
const hours = document.querySelector("#hours");
const minutes = document.querySelector("#minutes");
const seconds = document.querySelector("#seconds");


const currentYear = new Date().getFullYear();
const newYearTime = new Date(`March 01 ${currentYear + 1} 00:00:00`);

// Update countDownTime

function UpdateCountDown() {

    const currentTime = new Date();
    const diff = newYearTime - currentTime;

    const d = Math.floor(diff / 1000 / 60 / 60 / 24);
    const h = Math.floor(diff / 1000 / 60 / 60) % 24;
    const m = Math.floor(diff / 1000 / 60) % 60;
    const s = Math.floor(diff / 1000) % 60;

    days.innerHTML = d;
    hours.innerHTML = h < 10 ? '0' + h : h;
    minutes.innerHTML = m < 10 ? '0' + m : m;
    seconds.innerHTML = s < 10 ? '0' + s : s;

};

setInterval(UpdateCountDown, 1000);


		// Copyright year auto-update
   document.getElementById("copy-y").textContent =new Date().getFullYear();
    