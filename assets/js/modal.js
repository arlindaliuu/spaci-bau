document.addEventListener("DOMContentLoaded", function() {
    const openModal = document.getElementById("openModalBtn");
    const modal = document.getElementById("modalOverlay");
    const closeModal = document.getElementById("closeModalBtn");
    if(openModal){
        openModal.addEventListener("click", function() {
            document.getElementById("modalOverlay").style.display = "flex";
          });
        
          closeModal.addEventListener("click", function() {
            modal.style.display = "none";
          });
          
          modal.addEventListener("click", function() {
            modal.style.display = "none";
          });
    }
  });
  