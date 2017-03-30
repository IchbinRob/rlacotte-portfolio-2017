  $(function(){
  var contrastActiv = 0;
  $('#contrast').click(function(){
    if (contrastActiv === 0) {
      $('polygon, .menu__mobile li, [class^="main__"], .footer').addClass('contrast-block');
      $('.typo-link').addClass('contrast-link');
      $('h1, h2, h3, a, p').addClass('contrast-inline');
      $('.divider > path').addClass('contrast-menu');
      contrastActiv = 1;
    } else {
      $('polygon, .menu__mobile li, [class^="main__"], .footer, h1, h2, h3, a, p').removeClass('contrast-block');
      $('.typo-link').removeClass('contrast-link');
      $('h1, h2, h3, a, p').removeClass('contrast-inline');
      $('.divider > path').removeClass('contrast-menu');
      contrastActiv = 0;
    }

  });
});
