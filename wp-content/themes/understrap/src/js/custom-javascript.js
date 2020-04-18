(function($) {
  // Handler for login form
  $('#loginForm').submit(function(e) {
    e.preventDefault();
  });

  $(document).ready(function() {

    // Set height for contact page hero bg
    var $contactPageHeroEle = $('#contactPageHero');
    var $contactPageHeroBgEle = $('#contactPageHeroBg');
    if ($contactPageHeroEle && $contactPageHeroBgEle) {
      $contactPageHeroBgEle.height($contactPageHeroEle.height() + 130);
    }

    // Disabling submit btn on form submission
    var $wpForm = $('.wpcf7-form');
    if ($wpForm) {
      $wpForm.on('submit', function() {
        $(this).find('input[type="submit"]').prop('disabled', true);
      });
    }

    document.addEventListener('wpcf7submit', function (event) {
      // Enable form submit btn once submitted
      $(this).find('input[type="submit"]').prop('disabled', false);
      // Id for CTA Form is 63. This needs to be updated in case the actual form is changed in admin
      if (event.detail.status === 'mail_sent' && event.detail.contactFormId === '63') {
        $('#demoSuccessModal').modal()
      }
    }, false);

    // Custom loader for contact form 7
    $('.ajax-loader').addClass('fa fa-spinner fa-spin');
  });
})(jQuery);