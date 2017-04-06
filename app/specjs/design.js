$(function(){

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

var myPhoto = [[90, 0], [0, 25], [65, 100]];
     $('#moiPath').clipPath(myPhoto, {
       isPercentage: true,
       svgDefId: 'pp'
     });

$('#portfolio-design').click(function(){
  var sectionHeight = $('#portfolio-design').height();
  console.log(sectionHeight);
  $('[class^="portfolioDesign__"]').css('height', sectionHeight);
});

});
