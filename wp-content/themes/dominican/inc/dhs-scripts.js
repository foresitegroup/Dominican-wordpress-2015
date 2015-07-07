jQuery(document).ready(function($) {
  // External links and PDFs open in new tab
  $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
  
  // Mobile menu dropdowns
  $("#menu-sticky li:has(ul)").doubleTapToGo();
  
  if (oldie == false) {
    // Sticky main menu
    function sticky_relocate() {
      var window_top = $(window).scrollTop();
      var div_top = $('#menu-sticky-anchor').offset().top;
      if (window_top > div_top) {
        $('#menu-sticky').addClass('stick');
      } else {
        $('#menu-sticky').removeClass('stick');
      }
    }
    $(function () {
      $(window).scroll(sticky_relocate);
      sticky_relocate();
    });

    window.sr = new scrollReveal();
  }
});