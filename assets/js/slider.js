window.addEventListener("load", function(){
    const sliderWrapper = document.getElementById('slider-wrapper');
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    let startX, endX; // Variables to store touch start and end positions
    let isMouseDown = false;
    let slideIndex = 1;

    function changeSlider(index, direction){
        console.log(direction)
        let sliderImages = document.getElementsByClassName('slider_data');
        if(sliderImages.length > 0){
            if( index > sliderImages.length ){
                slideIndex = 1;
            }
            if( index < 1 ) {
                slideIndex = sliderImages.length;
            }
            for(let i = 0; i < sliderImages.length; i++){
                sliderImages[i].classList.add('hidden');
                sliderImages[i].classList.remove('animate-fade-left', 'animate-fade-right');
            }
            if(sliderImages[slideIndex - 1].classList.contains("first:block")){
                sliderImages[slideIndex - 1].classList.remove('first:block');
            }
            if(direction == 'right'){
                sliderImages[slideIndex - 1].classList.add('animate-fade-left');
            }else if(direction == 'left'){
                sliderImages[slideIndex - 1].classList.add('animate-fade-right');
            }else{
                //Do nothing
            }
            sliderImages[slideIndex - 1].classList.remove('hidden');
            sliderImages[slideIndex - 1].classList.add('block');
            
        }
    }
 
    function handleSlideChange(delta, direction){
        changeSlider(slideIndex += delta, direction);
    }

    if(prevButton){
        prevButton.addEventListener("click", function(){
            handleSlideChange(-1, 'left');
        });
    }

    if(nextButton){
        nextButton.addEventListener("click", function(){
            handleSlideChange(1, 'right');
        });
    }

    // Touch event listeners for swiping
    if(sliderWrapper){
        sliderWrapper.addEventListener("touchstart", function(event) {
            startX = event.touches[0].clientX;
        });

        sliderWrapper.addEventListener("touchend", function(event) {
            endX = event.changedTouches[0].clientX;
            let deltaX = startX - endX;
            if (deltaX > 50) {
                // Swiped left
                handleSlideChange(-1, 'right');
            } else if (deltaX < -50) {
                // Swiped right
                handleSlideChange(1, 'left');
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
                    handleSlideChange(-1, 'right');
                    isMouseDown = false;
                } else if (deltaX < -50) {
                    // Swiped right
                    handleSlideChange(1, 'left');
                    isMouseDown = false;
                }
            }
        });

        sliderWrapper.addEventListener("mouseup", function(event) {
            isMouseDown = false;
        });
    }

    changeSlider(slideIndex, 'none');
});