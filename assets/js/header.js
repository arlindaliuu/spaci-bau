document.addEventListener('DOMContentLoaded', function() {
  // Add class to menu items that have sub-items
  var menuItems = document.querySelectorAll('li.menu-item-has-children');
  menuItems.forEach(function(item) {
    item.classList.add('has-children');
  });

  // Track mouse position
  var mouseX, mouseY;
  document.addEventListener('mousemove', function(event) {
    mouseX = event.clientX;
    mouseY = event.clientY;
  });

  // Show sub-menu when hovering over parent menu item or sub-menu
  function showSubMenu(subMenu, arrow) {
    subMenu.style.display = 'block';
    if (arrow) {
      arrow.style.transform = 'rotate(180deg)';
    }
  }

  function hideSubMenu(subMenu, arrow) {
    subMenu.style.display = 'none';
    if (arrow) {
      arrow.style.transform = 'rotate(0deg)';
    }
  }

  var parentItems = document.querySelectorAll('li.has-children');
  parentItems.forEach(function(parentItem) {
    var subMenu = parentItem.querySelector('.sub_item');
    var arrow = parentItem.querySelector('.dropdown__arrow');

    if (subMenu) {
      if (window.innerWidth > 1024) {
        // For larger screens, show sub-menu on hover
        parentItem.addEventListener('mouseover', function() {
          showSubMenu(subMenu, arrow);
        });

        parentItem.addEventListener('mouseout', function() {
          setTimeout(function() {
            if (!isMouseOver(parentItem) && !isMouseOver(subMenu) && !isMouseOverSubMenuItems(subMenu)) {
              hideSubMenu(subMenu, arrow);
            }
          }, 200);
        });
      } else {
        // For smaller screens, show sub-menu on click
        parentItem.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the link from navigating
          if (subMenu.style.display === 'block') {
            hideSubMenu(subMenu, arrow);
          } else {
            showSubMenu(subMenu, arrow);
          }
        });

        // Stop propagation on submenu click to prevent hiding
        subMenu.addEventListener('click', function(event) {
          event.stopPropagation();
        });
      }

      subMenu.addEventListener('mouseover', function() {
        showSubMenu(subMenu, arrow);
      });

      subMenu.addEventListener('mouseout', function() {
        setTimeout(function() {
          if (!isMouseOver(parentItem) && !isMouseOver(subMenu) && !isMouseOverSubMenuItems(subMenu)) {
            hideSubMenu(subMenu, arrow);
          }
        }, 200);
      });
    }
  });

  // Check if the mouse is over an element
  function isMouseOver(element) {
    var rect = element.getBoundingClientRect();
    return (
      mouseX >= rect.left &&
      mouseX <= rect.right &&
      mouseY >= rect.top &&
      mouseY <= rect.bottom
    );
  }

  // Check if the mouse is over any of the sub-menu items
  function isMouseOverSubMenuItems(subMenu) {
    var subMenuItems = subMenu.querySelectorAll('li');
    for (var i = 0; i < subMenuItems.length; i++) {
      if (isMouseOver(subMenuItems[i])) {
        return true;
      }
    }
    return false;
  }
});



document.addEventListener('DOMContentLoaded', function() {
  const nav = document.querySelector('.nav_header');
  const burger = document.querySelector('.burger');
  burger.addEventListener('click', function() {
    if (nav.classList.contains('hidden')) {
      burger.classList.add('open');
      nav.classList.remove('hidden');
    } else {
      burger.classList.remove('open');
      nav.classList.add('hidden');
    }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var loader = document.getElementById('loader');
  var content = document.getElementById('content');
  var batteryFill = document.getElementById('battery-fill');
  var batteryText = document.querySelector('.battery-text');
  var progress = 0;
  var intervalId = setInterval(function() {
    progress += 1;
    if(batteryFill){
    batteryFill.style.width = progress + '%';
      if (progress >= 100) {
        clearInterval(intervalId);
        loader.style.opacity = '0';
        setTimeout(function() {
          loader.style.display = 'none';
          content.style.display = 'block';
        }, 100); 
      }
    }
  }, 20);


//Sticky header
window.addEventListener('scroll', function() {
  if(this.window.innerWidth < 1024){
    var header = document.getElementById('main-header');
    var headerHeight = header.offsetHeight;
  
    if (window.pageYOffset > headerHeight) {
      header.classList.add('fixed', 'top-0', 'animate-fade-down');
      document.body.style.paddingTop = headerHeight + 'px';
    } else {
      header.classList.remove('fixed', 'top-0', 'animate-fade-down');
      document.body.style.paddingTop = 0;
    }
  }
});


// JavaScript function to add and remove a class in a loop
function addAndRemoveClassInLoop(elementId, className, duration) {
  const element = document.getElementById(elementId);
  
  function addClass() {
    if(element){
      element.classList.add(className);
      setTimeout(removeClass, duration);
    }
  }
  
  function removeClass() {
    element.classList.remove(className);
    setTimeout(addClass, duration);
  }

  addClass(); // Start the loop
}

// Usage: Call the function with the ID of your HTML element, the class you want to add/remove, and the duration in milliseconds (5000 ms = 5 seconds).
addAndRemoveClassInLoop('whatsapp-button', 'animate-shake', 5000);
});

document.addEventListener("DOMContentLoaded", function() {
  var submitButton = document.querySelector(".wpcf7-submit");
  var originalDisplay = ""; // To store the original display value

  if (submitButton) {
    submitButton.addEventListener("click", function() {
      var responseOutput = document.querySelector(".wpcf7-response-output");
      responseOutput.style.display = "block";

      setTimeout(function() {
        if (responseOutput) {
          if (originalDisplay === "") {
            originalDisplay = getComputedStyle(responseOutput).display;
          }
          
          if (originalDisplay !== "none") {
            responseOutput.style.display = "none";
          } else {
            responseOutput.style.display = originalDisplay;
            originalDisplay = ""; // Reset the original display value
          }
        }
      }, 5000); // 5000 milliseconds = 5 seconds
    });
  }
});