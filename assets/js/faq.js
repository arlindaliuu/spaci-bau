document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll(".faq-container");

    questions.forEach(function(question) {
        question.addEventListener("click", function() {
            const answer = this.nextElementSibling;
            const arrowPlus = this.querySelector('.plus-sign');
            const arrowMinus = this.querySelector('.minus-sign');

            if (answer.classList.contains("hidden")) {
                answer.classList.remove("hidden");
                answer.style.maxHeight = answer.scrollHeight + "px"; // Set max-height to the actual height of the answer
                arrowPlus.classList.add('hidden');
                arrowMinus.classList.remove('hidden');
            } else {
                // Set max-height to 0 to trigger closing animation
                answer.style.maxHeight = "0";
                arrowMinus.classList.add('hidden');
                arrowPlus.classList.remove('hidden');

                // Wait for the transition to complete before hiding the answer
                answer.addEventListener("transitionend", function() {
                    answer.classList.add("hidden"); // Hide the answer after the transition ends
                }, { once: true });
            }
        });
    });
});
