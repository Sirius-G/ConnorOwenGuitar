function showActive(id){
    //highlight current menu item
    var listItems = document.querySelectorAll('li');
    listItems.forEach(function(item, index) {
        // Check if the current list item's index matches the 'id'
        if (index == id-1) {
            // Add the 'active' class to the current list item
            item.classList.add('active');
        } else {
            // Remove the 'active' class from other list items
            item.classList.remove('active');
        }
    });
}

/* ===========================================
                CONTACT FORM FUNCTION
============================================ */
function mailForm(name, email, msg){
    //Set recipient email address
    recipient = 'contact@sycamoresound.co.uk';

    window.location.href='mailto:'+recipient+'?subject=Contact Form Message&body='+msg+'%0A%0ABest regards,%0A%0A'+name+'%0A('+email+')';
}

/* ===========================================
                ONE CLICK BOOKING
============================================ */
function oneClickBooking(){
    //Set recipient email address and message
    recipient = 'contact@sycamoresound.co.uk';
    msg = 'Hey Connor, %0A%0AI\'m interested in learning guitar. %0A%0AMy name is [Add name here] and my contact telephone number is [Add telephone number here]. %0A%0AI am at a [beginner, intermediate, semi-professional] competency level. %0A%0AI look forward to hearing from you.';


    window.location.href='mailto:'+recipient+'?subject=Quick Booking Enquiry&body='+msg+'%0A%0ABest regards,%0A%0A[Add you name here]%0A';
   
}


/* ===========================================
        KEYBOARD ACCESS FOR ENTER KEY
============================================ */
document.addEventListener('keydown', function(event) {
    //Make all .item elements focusable
    var items = Array.from(document.querySelectorAll('.item'));
    items.forEach(item => item.setAttribute('tabindex', '0'));

    if (event.key === 'Enter') { // Check if the pressed key is Enter
        var focusedElement = document.activeElement;
        if (focusedElement && focusedElement.classList.contains('item')) {
            focusedElement.click(); // Trigger click event
        }
    } else if (event.key === 'Tab') { // Check if the pressed key is Tab
      var focusedElement = document.activeElement;
      var items = document.querySelectorAll('.item');
      var firstItem = items[0];
      var lastItem = items[items.length - 1];
      
      if (focusedElement === lastItem && !event.shiftKey) { // If last item and Tab key is pressed
          event.preventDefault(); // Prevent default tab behavior
          firstItem.focus(); // Set focus to the first item
      } else if (focusedElement === firstItem && event.shiftKey) { // If first item and Shift+Tab key is pressed
          event.preventDefault(); // Prevent default tab behavior
          lastItem.focus(); // Set focus to the last item
      }
    } 
  });

