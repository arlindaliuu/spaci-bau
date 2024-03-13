document.addEventListener("DOMContentLoaded", function() {
    const sliderWrapper = document.getElementById('slider-wrapper');
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    let startX, endX; // Variables to store touch start and end positions
    let isMouseDown = false;
    let slideIndex = 0; // Start at 0 to handle loop-around

    function changeSlider(index) {
        let sliderImages = document.getElementsByClassName('slider_data');
        if (sliderImages.length > 0) {
            if (index >= sliderImages.length) {
                slideIndex = 0; // Wrap around to the first slide
            } else if (index < 0) {
                slideIndex = sliderImages.length - 1; // Wrap around to the last slide
            } else {
                slideIndex = index;
            }
    
            // Hide all slider images except the current one
            for (let i = 0; i < sliderImages.length; i++) {
                if (i !== slideIndex) {
                    sliderImages[i].style.opacity = '0';
                }
            }
    
            // Show the current slider image
            sliderImages[slideIndex].style.opacity = '1';
    
            // Calculate the translateX value based on slideIndex
            let translateX = -slideIndex * 100;
            sliderWrapper.style.transform = `translateX(${translateX}%)`;
        }
    }
    
    
    

    function handleSlideChange(delta) {
        changeSlider(slideIndex + delta);
    }

    if (prevButton) {
        prevButton.addEventListener("click", function() {
            handleSlideChange(-1);
        });
    }

    if (nextButton) {
        nextButton.addEventListener("click", function() {
            handleSlideChange(1);
        });
    }

    // Touch event listeners for swiping
    if (sliderWrapper) {
        sliderWrapper.addEventListener("touchstart", function(event) {
            startX = event.touches[0].clientX;
        });

        sliderWrapper.addEventListener("touchend", function(event) {
            endX = event.changedTouches[0].clientX;
            let deltaX = startX - endX;
            if (deltaX > 50) {
                // Swiped left
                handleSlideChange(1);
            } else if (deltaX < -50) {
                // Swiped right
                handleSlideChange(-1);
            }
        });

        // Desktop swipe event listeners
        sliderWrapper.addEventListener("mousedown", function(event) {
            startX = event.clientX;
            isMouseDown = true;
        });

        sliderWrapper.addEventListener("mousemove", function(event) {
            if (isMouseDown) {
                endX = event.clientX;
                let deltaX = startX - endX;
                if (deltaX > 50) {
                    // Swiped left
                    handleSlideChange(1);
                    isMouseDown = false;
                } else if (deltaX < -50) {
                    // Swiped right
                    handleSlideChange(-1);
                    isMouseDown = false;
                }
            }
        });

        sliderWrapper.addEventListener("mouseup", function(event) {
            isMouseDown = false;
        });
    }

    changeSlider(slideIndex);
});
