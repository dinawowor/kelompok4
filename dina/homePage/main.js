function infoBuku_1()
{
    window.location.href = '../info-buku/index.php';
}

var header = document.querySelector(".header");
var navbar = document.querySelector(".nav");
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