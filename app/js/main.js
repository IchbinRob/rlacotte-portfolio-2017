$(function(){
  var svg = $('polygon'),
      front = $('#front'),
      main = $('#main'),
      header = $('#header'),
      mobile = $('.menu__mobile li'),
      activ = false,
      el = 0;
      coord = [];
  $('.close').hide();
  main.hide();
  svg.click(function(){
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
             front.attr("href", "#is-active");
           });

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
               front.attr("href", "#is-active");
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
  });

});
