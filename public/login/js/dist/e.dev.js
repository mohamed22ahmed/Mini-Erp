"use strict";

function success() {
  var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: false,
    timer: 3500
  });
  Toast.fire({
    type: 'success',
    title: 'Edit Done Succefully'
  });
}

function accept() {
  var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: false,
    timer: 3500
  });
  Toast.fire({
    type: 'success',
    title: 'Request Accepted successfully'
  });
}

function Canceled() {
  var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: false,
    timer: 3500
  });
  Toast.fire({
    type: 'success',
    title: 'Request Refused successfully'
  });
}

function complain() {
  var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: false,
    timer: 3500
  });
  Toast.fire({
    type: 'success',
    title: 'Compain Sent successfully'
  });
}

function success2() {
  var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: false,
    timer: 5500
  });
  Toast.fire({
    type: 'success',
    title: '4SOFT has received your request successfully and we will answer soon'
  });
}

function success3() {
  var Toast = Swal.mixin({
    toast: false,
    position: 'center',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    type: 'success',
    title: 'Updated successfully'
  });
}

$(window).on("scroll", function () {
  if ($(window).scrollTop() >= 300) {
    $('#goUPButton').slideDown(700);
  } else {
    $('#goUPButton').slideUp(700);
  }
});

function goUP() {
  window.scrollTo(0, 0);
}

;
$(document).ready(function () {
  // Add smooth scrolling to all links
  $("a").on('click', function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault(); // Store hash

      var hash = this.hash; // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1200, function () {
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if

  });
});