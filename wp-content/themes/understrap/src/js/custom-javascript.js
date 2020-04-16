(function($) {
  // Handler for login form
  $('#loginForm').submit(function(e) {
    e.preventDefault();
  });

  $(document).ready(function() {
    document.addEventListener('wpcf7mailsent', function (event) {
      // Id for Contact Form is 63. This needs to be updated in case the actual form is changed in admin
      if (event.detail.contactFormId === '63') {
        $('#demoSuccessModal').modal()
      }
    }, false);
  });
})(jQuery);