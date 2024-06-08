let headerHeight = document.querySelector("header").offsetHeight;
document.querySelector("main").style.marginTop = headerHeight + "px";
document.querySelector("menu").style.marginTop = headerHeight + "px";

let menuDisplay = document.querySelector("menu");
menuDisplay.style.display = "none";
document.getElementById("nav2").addEventListener("click", menuu);
function menuu(e) {
    e.preventDefault();
    state = window.getComputedStyle(menuDisplay).display;
    if (state == "none") {
        menuDisplay.style.display = "block";
    } else {
        menuDisplay.style.display = "none";
    }
}
