  $(function(){
  var svg = $('polygon'),
      front = $('#front'),
      main = $('#main'),
      header = $('#header'),
      mobile = $('.menu__mobile li:not([data-section="access"],[data-section="contact"])'),
      el = 0;
      coord = [];
      selecSectionActiv = '';

  $('.close').hide();
  main.hide();

  svg.click(function(){
    if ($(this).data('section') !== 'access' && $(this).data('section') !== "") {
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
               "position":"inherit",
               "display" : "flex",
             });
             $('.close').fadeIn(150);
             main.addClass('is-active');
             front.attr("xlink:href", "#is-active");
           });
      LazyLoad.load('simple', '#'+sectionActiv);
      if (sectionActiv == "portfolio-design" || sectionActiv == 'about') {
        var src = $('#scriptdesign').data('src');
        $('#scriptdesign').attr('src', src);
      }
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
                 "position":"inherit",
                 "display" : "flex",
               });
               $('.close').fadeIn(150);
               main.addClass('is-active');
             });
        LazyLoad.load('simple', '#'+sectionActiv);
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

  var KEYCODE_ESC = 27;

  $(document).keyup(function(e) {
    if (e.keyCode == KEYCODE_ESC) $('.close').trigger('click');
  });

  // $('#toHobbies').click(function(){
  //   var item = $('polygon[data-section="hobby"]');
  //   var close = $('.close').trigger('click');
  //   item.delay(1500).trigger('click');
  //   console.log(close);
  // });
});
