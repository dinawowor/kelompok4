var header = document.querySelector(".header");
var navbar = document.querySelector(".navbar");
var sticky = navbar.offsetTop;

window.onscroll = function() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
    navbar.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
    navbar.classList.remove("sticky");
  }
};