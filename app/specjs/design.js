  $(function(){

function animateOver(pathOver, pathOut, clip){
  dynamics.animate(clip, {
    d: pathOver,
  }, {
    type: dynamics.spring,
    complete: animateOut(pathOut, clip)
  });
}

function animateOut(pathOut, clip){
  dynamics.animate(clip, {
    d: pathOut ,
  }, {
    type: dynamics.easeInOut,
    friction: 50,
  });
}

// var clip = $('#photoPath > path');


  // $('.clip-illu').mouseenter(function(){
  //   $('#illuPath path').trigger("click");
  // });
  //
  // $('.clip-photo').mouseenter(function(){
  //   $('#photoPath path').trigger("click");
  // });
  //
  // $('.clip-vrac').mouseenter(function(){
  //   $('#vracPath path').trigger("click");
  // });
  //
  // $('#illuPath path').click(function(){
  //   var pathOver = $(this).data('over-path');
  //   var pathOut = $(this).attr('d');
  //   var clip = this;
  //     animateOver(pathOver, pathOut, clip);
  // });
  var photoPts = [[59, 0], [0, 69], [100, 100]];
         $('#photoPath').clipPath(photoPts, {
           isPercentage: true,
           svgDefId: 'photo'
         });

var illuPts = [[9, 0], [26, 100], [100, 0]];
      $('#illuPath').clipPath(illuPts, {
        isPercentage: true,
        svgDefId: 'illu'
      });

var vracPts = [[36, 0], [0, 100], [100, 80]];
       $('#vracPath').clipPath(vracPts, {
         isPercentage: true,
         svgDefId: 'vrac'
       });

});
