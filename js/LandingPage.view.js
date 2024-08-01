function toggleMenu() {
    const navToggle = document.getElementById("navToggle");

    if (navToggle.checked == true) {
        document.getElementsByClassName("sidebar")[0].classList.toggle("sideactive");
    } else {
        document.getElementsByClassName("sidebar")[0].classList.toggle("sideactive");
    }
}

