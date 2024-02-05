document.addEventListener("DOMContentLoaded", function() {
  const carouselWrapper = document.querySelector(".carousel-wrapper");
  let cards = document.querySelectorAll(".card");
  let currentPosition = 0;
  let cardWidth;
  let visibleCards;
  let cardCount;
  function moveLeft(){
    currentPosition -= cardWidth;
    cards[2].classList.add('shadow-2xl', 'animate-fade-left')
    cards[2].classList.remove('hidden')
    cards[2-1].classList.remove('shadow-2xl', 'animate-fade-left', 'animate-fade-right')
    cards[2-1].classList.add('hidden')


    // Clone the first card
    const firstCard = cards[0].cloneNode(true);
  
    // Remove the first card from its current position
    carouselWrapper.removeChild(cards[0]);
  
    // Append the cloned card to the last position
    carouselWrapper.appendChild(firstCard);
  
    // Convert the NodeList to an array and update the order
    const cardsArray = Array.from(cards);
    cardsArray.push(cardsArray.shift());
  
    // Update the cards NodeList with the new order
    cards = carouselWrapper.querySelectorAll(".card");
  
    // Reset the current position and transform the carousel
    currentPosition += cardWidth;
    carouselWrapper.style.transform = `translateX(${currentPosition}px)`;
  }
  function moveRight(){
    currentPosition += cardWidth;
    cards[0].classList.add( 'shadow-2xl', 'animate-fade-right')
    cards[0].classList.remove('hidden')
    cards[1].classList.remove('shadow-2xl', 'animate-fade-right', 'animate-fade-left')
    cards[1].classList.add('hidden')

    // Move the last card to the front
    const lastCard = cards[cards.length - 1].cloneNode(true);
    carouselWrapper.removeChild(cards[cards.length - 1]);
    carouselWrapper.insertBefore(lastCard, cards[0]);
  
    // Update the cards NodeList to reflect the new order
    cards = carouselWrapper.querySelectorAll(".card");
  
    // Reset the current position and transform the carousel
    currentPosition -= cardWidth;
    carouselWrapper.style.transform = `translateX(${currentPosition}px)`;
  }
  if (cards.length > 0) {
    cardWidth = cards[0].offsetWidth;
    cardCount = cards.length;
    visibleCards = 3;
    const totalWidth = cardCount * cardWidth;
    let timeoutId;
    cards[1].classList.add('shadow-2xl')
    cards[1].classList.remove('hidden')
    const nextArrow = document.getElementsByClassName("carousel-arrow-next");
    const prevArrow = document.getElementsByClassName("carousel-arrow-prev");
    for(var i = 0; i < nextArrow.length; i++){
      nextArrow[i].addEventListener("click", function() {
        moveLeft();
      });
  }
  for(var i = 0; i < prevArrow.length; i++){
      prevArrow[i].addEventListener("click", function() {
        moveRight();
      });
    }
    let startX;

    carouselWrapper.addEventListener("mousedown", handleSwipeStart);
    carouselWrapper.addEventListener("touchstart", handleSwipeStart);
  
    function handleSwipeStart(event) {
      startX = event.clientX || event.touches[0].clientX;
      carouselWrapper.addEventListener("mousemove", handleSwipeMove);
      carouselWrapper.addEventListener("touchmove", handleSwipeMove);
      document.addEventListener("mouseup", handleSwipeEnd);
      document.addEventListener("touchend", handleSwipeEnd);
    }
  
    function handleSwipeMove(event) {
      const x = event.clientX || event.touches[0].clientX;
      const deltaX = x - startX;
  
      if (Math.abs(deltaX) > 150) {
        const swipeDirection = deltaX > 0;
        if(swipeDirection){
          moveRight();
        }else{
          moveLeft();
        }
        handleSwipeEnd();
      }
    }
  
    function handleSwipeEnd() {
      carouselWrapper.removeEventListener("mousemove", handleSwipeMove);
      carouselWrapper.removeEventListener("touchmove", handleSwipeMove);
      document.removeEventListener("mouseup", handleSwipeEnd);
      document.removeEventListener("touchend", handleSwipeEnd);
    }
  }
});



document.addEventListener("DOMContentLoaded", function() {
    const targetDivs = document.getElementsByClassName('targetDiv');
  
    // Array of animation classes
    const animationClasses = ['animate-fade-right', 'animate-fade-down', 'animate-fade-left', 'animate-fade-up'];
  
    // Function to check if the top of an element is within the viewport
    function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return rect.top <= window.innerHeight;
    }
  
    // Function to handle the scroll event
    function handleScroll() {
      for (var i = 0; i < targetDivs.length; i++) {
        const targetDiv = targetDivs[i];
        const hasAnimationClass = targetDiv.classList.contains('has-animation-class');
  
        if (isInViewport(targetDiv) && !hasAnimationClass) {
          // Add a random animation class
          const randomClass = animationClasses[Math.floor(Math.random() * animationClasses.length)];
          targetDiv.classList.add(randomClass, 'has-animation-class');
        } else if (!isInViewport(targetDiv) && hasAnimationClass) {
          // Remove the animation class
          targetDiv.classList.remove(...animationClasses);
          targetDiv.classList.remove('has-animation-class');
        }
      }
    }
  
    // Listen for the scroll event
    window.addEventListener('scroll', handleScroll);
  });
  