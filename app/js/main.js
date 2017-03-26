  $(function(){
  var svg = $('polygon'),
      front = $('#front'),
      main = $('#main'),
      header = $('#header'),
      mobile = $('.menu__mobile li'),
      activ = false,
      contrastActiv = 0,
      el = 0;
      coord = [];
  $('.close').hide();
  main.hide();
  svg.click(function(){
    if ($(this).data('section') !== 'access') {
      var headerHeight = header.height();
      $(this).id = "is-active";
      //coord = $(this).attr("points"); //variable globale
      el = this; //variable globale en js pure
        dynamics.animate(this, {
          points : "0 0 1732.3 0 1732.3 848.3 0 848.3",
        }, {
          friction: 100
        });

      sectionActiv = $(this).data('section');
      $('.menu__desktopTitle li').children('div, a').fadeOut("200");
      origin = $(this).data('origin');
      selecSectionActiv = $("#"+sectionActiv);
      selecSectionActiv.css("height" , headerHeight);
      main.show();
      header.delay(1000).fadeOut(1);
      selecSectionActiv
          .delay(1000)
          .fadeIn(1, function(){
             selecSectionActiv.addClass('is-active').css({
               "position":"inherit"
             });
             $('.close').fadeIn(150);
             main.addClass('is-active');
             front.attr("xlink:href", "#is-active");
           });
    }
    });

    $( ".menu__desktopTitle li" ).click(function(){
      if ($(this).data('section') !== 'access') {
      var el = $(this).data('section');
      // $('.menu__desktopTitle li').not($(this)).children('a').fadeOut("200");
      $('polygon[data-section="'+el+'"]').trigger("click");
    }
    });

    mobile.click(function(){
        var headerHeight = header.height();
        $(this).id = "is-active";
        sectionActiv = $(this).data('section');
        selecSectionActiv = $("#"+sectionActiv);
        selecSectionActiv.css("height" , headerHeight);
        main.show();
        header.fadeOut(150);
        selecSectionActiv
            .fadeIn(150, function(){
               selecSectionActiv.addClass('is-active').css({
                 "position":"inherit"
               });
               $('.close').fadeIn(150);
               main.addClass('is-active');
             });

      });
  $('.close').click(function(){
    header.fadeIn(1);
    main.removeClass("is-active");
    selecSectionActiv.css("position","absolute");
    front.removeAttr("href", "#is-active");
    if (el !== 0) {
      dynamics.animate(el, {
        points : origin,
      }, {
        friction: 100
      });
    }
      main.fadeOut();
      $('.close').fadeOut();
      selecSectionActiv.removeClass("is-active")
                       .fadeOut();
      $( ".menu__desktopTitle li a, .menu__desktopTitle li div").delay(900).fadeIn(100);
  });


  $('#contrast').click(function(){
    console.log('coucou');
    if (contrastActiv === 0) {
      $('polygon, .menu__mobile li, [class^="main__"], .typo-link, .footer').addClass('contrast-block');
      $('h1, h2, h3, a, p').addClass('contrast-inline');
      $('.divider > path').addClass('contrast-menu');
      contrastActiv = 1;
    } else {
      $('polygon, .menu__mobile li, [class^="main__"], .typo-link, .footer, h1, h2, h3, a, p').removeClass('contrast-block');
      $('h1, h2, h3, a, p').removeClass('contrast-inline');
      $('.divider > path').removeClass('contrast-menu');
      contrastActiv = 0;
    }

  });
});
