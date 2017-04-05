$(function(){
  var divider = $(".dividers > svg:last-child > path:first-child"),
      fr = $("#accessMenu a:nth-child(3)"),
      dys = $("#accessMenu a:nth-child(4)"),
      stopplus = 0,
      stopmoins = 0;
      lang = fr.html(),
      ys = dys.html(),
      ftsActiv = 0,
      dysActiv = 0;

  $('#fontsize').click(function(){
    if (ftsActiv === 0) {
      divider.attr('d','');
      fr.html('+');
      fr.addClass('fts-plus');
      dys.html('-');
      dys.addClass('fts-moins');
      $(this).css('opacity', '.6');
      ftsActiv = 1;
    } else {
      divider.attr('d','M0 100 L50 50');
      fr.html('FR');
      fr.removeClass('fts-plus');
      dys.html('Dys');
      dys.removeClass('fts-moins');
      $(this).css('opacity', '');
      ftsActiv = 0;
    }

  });


  fr.click(function(){
    if (fr.hasClass('fts-plus')) {
      var init = $('html').css('font-size');
      if (stopplus === 0) {
        dys.css('color', '');
        stopmoins = 0;
        init = init.substr(0,2);
        init = parseInt(init) + 1;
        if (init == 20) {
          fr.css('color','red');
          stopplus = 1;
        }
        $('html').css('font-size', init);
      }
    }

  });

  dys.click(function(){
    if (dys.hasClass('fts-moins')) {
      var init = $('html').css('font-size');
      if (stopmoins === 0) {
        fr.css('color', '');
        stopplus = 0;
        init = init.substr(0,2);
        init = parseInt(init) - 1;
        if (init == 12) {
          stopmoins = 1;
          dys.css('color','red');
        }
        $('html').css('font-size', init);
      }
    }
  });

  $('#dys').click(function(){
    if (!dys.hasClass('fts-moins')){
      $('#linkDys').attr('href', $('#linkDys').data('href'));
      if (dysActiv === 0) {
        $('.wrapper *').css('font-family','OpenDyslexic');
        dysActiv = 1;
      } else {
        $('.wrapper *').css('font-family','');
        dysActiv = 0;
      }
    }
  });

  $('#lang').click(function(e){
    e.preventDefault();
    if (!fr.hasClass('fts-plus')){
     var newLang = $(this).html();
     var oldLang = newLang;
     console.log(newLang);
     switch (newLang) {
       case 'FR':
         newLang = 'fr_FR';
         langView = 'EN';
         break;
       case 'EN':
          newLang = 'en_US';
          langView = 'FR';
        break;
       default: newLang = "fr_FR";
                langView = 'FR';
     }
    $(this).html(langView);
     $('#theNewLang').attr('value', newLang);
     $('#changeLang').submit();
    }
  });
});
