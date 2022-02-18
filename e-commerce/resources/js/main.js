const hamburger = document.querySelector(".hamburger");
const navbarLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {

    hamburger.classList.toggle("active");
    navbarLinks.classList.toggle("active");
})