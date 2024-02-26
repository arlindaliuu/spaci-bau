document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll(".border-b");

    questions.forEach(function(question) {
        question.addEventListener("click", function() {
            const answer = this.nextElementSibling;
            const arrow = this.querySelector('.arrow');
            console.log(arrow)
            if (answer.classList.contains("hidden")) {
                answer.classList.remove("hidden");
                arrow.style.transform = "rotate(0deg)";
            } else {
                answer.classList.add("hidden");
                arrow.style.transform = "rotate(180deg)";
            }
        });
    });
});