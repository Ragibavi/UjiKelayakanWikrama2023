document.addEventListener('DOMContentLoaded', function () {
    const dropdownLink = document.getElementById('data-master-link');
    const dropdownMenu = document.getElementById('data-master-dropdown');
  
    dropdownLink.addEventListener('mouseover', function () {
      dropdownMenu.style.display = 'block';
      setTimeout(function () {
        dropdownMenu.classList.add('show');
      }, 50);
    });
  
    dropdownLink.addEventListener('mouseout', checkHideDropdown);
    dropdownMenu.addEventListener('mouseout', checkHideDropdown);
  
    dropdownMenu.addEventListener('mouseover', function () {
      dropdownMenu.style.display = 'block';
    });
  
    function checkHideDropdown() {
      if (!isMouseOverElement(dropdownLink) && !isMouseOverElement(dropdownMenu)) {
        dropdownMenu.classList.remove('show');
        setTimeout(function () {
          if (!isMouseOverElement(dropdownMenu)) {
            dropdownMenu.style.display = 'none';
          }
        }, 500);
      }
    }
  
    function isMouseOverElement(element) {
      const { left, top, right, bottom } = element.getBoundingClientRect();
      const mouseX = event.clientX;
      const mouseY = event.clientY;
      return mouseX >= left && mouseX <= right && mouseY >= top && mouseY <= bottom;
    }
  });
  
  

