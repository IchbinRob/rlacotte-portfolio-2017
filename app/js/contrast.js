  $(function(){
  var contrastActiv = 0;
  $('#contrast').click(function(){
    if (contrastActiv === 0) {
      $('polygon, .menu__mobile li, [class^="main__"], [class^="portfolioDesign__"], .footer, #contact, #legale').addClass('contrast-block');
      $('.typo-link').addClass('contrast-link');
      $('h1, h2, h3, a, p, figcaption').addClass('contrast-inline');
      $('.divider > path').addClass('contrast-menu');
      contrastActiv = 1;
    } else {
      $('polygon, .menu__mobile li, [class^="main__"], [class^="portfolioDesign__"], .footer, #contact, #legale').removeClass('contrast-block');
      $('.typo-link').removeClass('contrast-link');
      $('h1, h2, h3, a, p, figcaption').removeClass('contrast-inline');
      $('.divider > path').removeClass('contrast-menu');
      contrastActiv = 0;
    }

  });
});
