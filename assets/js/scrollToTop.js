document.addEventListener("DOMContentLoaded", function() {
    // Get the scroll-to-top button element
    const scrollToTopBtn = document.getElementById("scroll-to-top");
    // Add event listener to detect scrolling
    window.addEventListener("scroll", () => {
    // If user has scrolled down, show the scroll-to-top button
    if (window.scrollY > 100) {
        scrollToTopBtn.classList.remove("hidden");
    } else {
        scrollToTopBtn.classList.add("hidden");
    }
    });

    // Add event listener to scroll to top when button is clicked
    scrollToTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});