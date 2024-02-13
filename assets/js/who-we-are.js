document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.number-counter'); // Select all elements with class 'number-counter'
    const duration = 3000; // Duration of the animation in milliseconds (3 seconds)

    counters.forEach(counter => {
        const target = +counter.innerText; // Get the target number from the element's text content
        const increment = Math.ceil(target / (duration / 10)); // Calculate the increment value based on duration

        const updateCount = () => {
            let count = 0; // Start the count from 0

            const interval = setInterval(() => {
                count += increment; // Increment the count
                if (count > target) {
                    count = target; // Ensure count doesn't exceed target
                }
                counter.innerText = count; // Update the element's text content
                if (count === target) {
                    clearInterval(interval); // Stop the interval when target is reached
                }
            }, 10); // Update every 10 milliseconds
        };

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount(); // Start the count animation
                    observer.unobserve(counter); // Stop observing once the animation is triggered
                }
            });
        });

        observer.observe(counter); // Start observing each counter element
    });
});

