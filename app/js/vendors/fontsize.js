$(function(){
  var divider = $(".dividers > svg:last-child > path:first-child"),
      fr = $("#accessMenu a:nth-child(3)"),
      dys = $("#accessMenu a:nth-child(4)"),
      stopplus = 0,
      stopmoins = 0;
  var lang = fr.html();
  var ys = dys.html();

  $('#fontsize').mouseenter(function(){
    divider.attr('d','');
    fr.html('+');
    dys.html('-');
    var frColor = fr.css('color');
    fr.click(function(){
      if (stopplus === 0) {
        stopmoins = 0;
        dys.css('color', frColor);
        var init = $('html').css('font-size');
        init = init.substr(0,2);
        init = parseInt(init) + 1;
        if (init == 25) {
          fr.css('color','red');
          stopplus = 1;
        }
        $('html').css('font-size', init);
        console.log($('body').css('font-size'));
      }

    });

    dys.click(function(){
      if (stopmoins === 0) {
        stopplus = 0;
        fr.css('color', frColor);
        var init = $('html').css('font-size');
        init = init.substr(0,2);
        init = parseInt(init) - 1;
        if (init == 10) {
          stopmoins = 1
          dys.css('color','red');
        }
        $('html').css('font-size', init);
        console.log($('body').css('font-size'));
      }
    });

  });

  // $('.divider').mouseleave(function(){
  //   fr.html(lang);
  //   dys.html(ys);
  //   divider.attr('d','M0 100 L50 50');
  // });

});
