(function ($) {
  'use strict'; // Start of use strict

  //preloader
  //1. delete span inside content
  //2. remove class
  //3. remove spinner itself
  $(window).on('load', function () {
    $('#spinner').empty();
    $('#spinner').removeAttr('class');
    $('#spinner').removeAttr('id');
  });
})(jQuery); // End of use strict
