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
      $homePageHeroBgEle.height($(document).width() * 0.59);
    }

    // Set height for About us page hero bg
    var $aboutPageHeroEle = $('#aboutPageHero');
    if ($aboutPageHeroEle) {
      $aboutPageHeroEle.css('min-height', $(document).width() * .4);
    }

    // Set height for About us page section-5 bg
    var $aboutPageSection5Ele = $('#aboutPageSection5');
    var $aboutPageSection5PosterEle = $('#aboutPageSection5Poster');
    if ($aboutPageSection5Ele && $aboutPageSection5PosterEle) {
      $aboutPageSection5Ele.css('min-height', $(document).width() * .3);
    }

    // Set height for Product page hero bg
    var $productPageHeroEle = $('#productPageHero');
    var $productPageHeroBgEle = $('#productPageHeroBg');
    if ($productPageHeroEle && $productPageHeroBgEle) {
      $productPageHeroEle.css('min-height', $(document).width() * .42);
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
      $('body').css('padding-top', $(mainHeaderNavEle).outerHeight() - 1);
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
      $contactPageHeroBgEle.height($contactPageHeroEle.height() + 280);
    }

    // Product features carousel. Set to carousel if table/mobile viewport
    if ($(window).width() <= 768) {
      $('#product-features-carousel').attr('data-ride', 'carousel');
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
      // The ids here need to be updated in case the actual form is changed in admin
      if (event.detail.status === 'mail_sent' && ['63', '468', '258'].indexOf(event.detail.contactFormId) > -1) {
        $('#formSuccessModal').modal()
      }
    }, false);

    $('.youtube-item').on('click', function() {
      var youtubeUrl = $(this).data('youtube');
      $('#youtubeModal').modal();
      $('#youtubeModal').find('iframe').attr('src', youtubeUrl);
    });

    $('#youtubeModal').on('hidden.bs.modal', function () {
      $(this).find('iframe').attr('src', '');
    });

  });
})(jQuery);