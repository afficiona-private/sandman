(function($) {
  // Handler for login form
  $('#loginForm').submit(function(e) {
    e.preventDefault();
  });

  $(document).ready(function() {

    // Wow js
    new WOW().init();

    // Set height for home page hero bg
    var $homePageHeroEle = $('#homePageHero');
    var $homePageHeroBgEle = $('#homePageHeroBg');
    if ($homePageHeroEle) {
      $homePageHeroEle.height($(document).width() * 0.606);
    }
    if ($homePageHeroBgEle) {
      $homePageHeroBgEle.height($(document).width() * 0.606);
    }

    // Check scroll pos of document and add class to header nav for visibility in home page
    var mainHeaderNavEle = document.getElementById("mainHeaderNav");
    if ($('body').hasClass('page-template-landing-page')) {
      if ($homePageHeroEle && mainHeaderNavEle) {
        $(mainHeaderNavEle).toggleClass('bg-dark', $(document).scrollTop() > $homePageHeroEle.height());
      };
      $(document).on('scroll', function (e) {
        if ($(this).scrollTop() > $homePageHeroEle.height() - 200) {
          $(mainHeaderNavEle).addClass('bg-dark');
        } else {
          $(mainHeaderNavEle).removeClass('bg-dark');
        }
      });
    }

    // Add padding to body if not home page to adjust sticky navbar
    if (mainHeaderNavEle && !$('body').hasClass('page-template-landing-page')) {
      $('body').css('padding-top', $(mainHeaderNavEle).outerHeight());
    }

    // Add btn class to demo link in header nav
    var $menuItemDemoLink = $('#menu-item-313');
    if ($menuItemDemoLink) {
      $menuItemDemoLink.find('.nav-link').addClass('btn btn-light btn-sm text-dark ml-sm-3');
    }

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
        $(this).find('.wpcf7-submit').prop('disabled', true).addClass('btn-loading');
      });
    }

    document.addEventListener('wpcf7submit', function (event) {
      // Enable form submit btn once submitted
      $(this).find('.wpcf7-submit').prop('disabled', false).removeClass('btn-loading');
      // Id for CTA Form is 63. This needs to be updated in case the actual form is changed in admin
      if (event.detail.status === 'mail_sent' && event.detail.contactFormId === '63') {
        $('#demoSuccessModal').modal()
      }
    }, false);


    // FIXME: Delete this
    // $('input[name="cta-fullname"]').val('Aman Pandey');
    // $('input[name="cta-organisation"]').val('Upstox');
    // $('input[name="cta-designation"]').val('Software Engineer');
    // $('input[name="cta-email"]').val('aman@sample.com');
    // $('input[name="cta-contact"]').val('9234234234324');
    // $('input[name="cta-country"]').val('India');
    // $('input[name="cta-state"]').val('MH');
    // $('input[name="cta-city"]').val('Mumbai');
    // $('input[name="cta-mpl"]').val('12,000');

  });
})(jQuery);