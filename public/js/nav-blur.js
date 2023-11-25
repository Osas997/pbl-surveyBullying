window.addEventListener("scroll", () => {
    const nav = document.querySelector("nav");
    const navOff = nav.offsetTop;

    if (window.scrollY > navOff) {
        nav.classList.add("backdrop-blur", "shadow-md");
    } else {
        nav.classList.remove("backdrop-blur", "shadow-md");
    }
});
