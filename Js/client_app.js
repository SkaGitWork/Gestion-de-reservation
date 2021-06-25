function show(Id) {
  var x = document.getElementById(Id);
  if (x.style.display === "none") {
    x.style.display = "flex";
  }
}

function highlight(x) {
  x.style.filter = "grayscale(0%)";
  x.addEventListener("mousedown", function () {
    last_butt = x;
  });
}

function fade(x) {
  if (x != last_butt) {
    x.style.filter = "grayscale(100%)";
  }
}

function control(btnId) {
  // Set all button grey color
  for (let i = 1; i <= 4; i++) {
    x = document.getElementById("command-menu-" + i);
    x.style.display = "none";
    x = document.getElementById("button-" + i);
    x.style.filter = "grayscale(100%)";
  }

  // Set color button to blue
  x = document.getElementById(btnId);
  x.style.filter = "grayscale(0%)";

  // Select the correct menu
  switch (btnId.charAt(btnId.length - 1)) {
    case "1":
      show("command-menu-1");
      break;
    case "2":
      show("command-menu-2");
      break;
    case "3":
      show("command-menu-3");
      break;
    case "4":
      show("command-menu-4");
      break;
    default:
      break;
  }
}

x = document.getElementById("button-1");
x.style.filter = "grayscale(0%)";
var last_butt = x;

/* ---------------------------- Show Destination ---------------------------- */

// Update drop-down to available destination
function update() {
  var dep_val = $("#list-from :selected").text();
  var x = document.getElementById("list-from-destination");
  $.post(
    "../Php/client_functions.php",
    {
      val: dep_val,
    },
    function (output) {
      x.innerHTML = output;
    }
  );
}

/* ------------------------------ Sticky Header ----------------------------- */
window.onscroll = function () {
  sticky_header();
};

var header = document.getElementById("my_header");
var banner = document.getElementsByClassName("slideshow-container");
var sticky = header.offsetTop;
function sticky_header() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    banner[0].style.marginTop = "72px";
  } else {
    header.classList.remove("sticky");
    banner[0].style.marginTop = "0px";
  }
}

/* ------------------------------- Slide Show ------------------------------- */

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

var slideIndex = 0;
showSlidesAuto();

function showSlidesAuto() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  setTimeout(showSlidesAuto, 5000); // Change image every X seconds
}
