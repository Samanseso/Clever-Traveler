var overlay = document.getElementById("overlay");
var my_sidenav = document.getElementById("mySidenav");

function openNav() {
    my_sidenav.style.left= "30vw";
    overlay.style.display = "block";
    overlay.addEventListener('click', closeNav);
    document.body.style.overflowY = 'hidden';
}
function closeNav() {
    my_sidenav.style.left = "100%";
    overlay.style.display = "none";
    document.body.style.overflowY = 'auto';
}

overlay.addEventListener('click', closeNav);


var aboutText = document.querySelector('.about-text .text');
var backdrop = document.querySelector('.about-text .about-backdrop');
var readButton = document.querySelector('.about button')

function aboutSLideDown () {
    if (aboutText.style.maxHeight == '8vh') {
        aboutText.style.maxHeight = '500px';
        backdrop.style.display = 'none';
        readButton.innerHTML = 'Read Less';
    }
    else {
        aboutText.style.maxHeight = '8vh';
        readButton.innerHTML = 'Read More';
        backdrop.style.display = 'block';
    }
}

var map = document.getElementById("routing-map");
var directions = document.getElementById("instructions-header");
var details = document.querySelector('.details');

function showDirections() {
    map.style.display = 'none';
    directions.style.display = 'block';
    details.style.display = 'none';
}

function showMap() {
    map.style.display = 'block';
    directions.style.display = 'none';
    details.style.display = 'block';
}
