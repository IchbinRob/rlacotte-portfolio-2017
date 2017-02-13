var svg = document.getElementsByTagName('polygon'),
    about = document.getElementById('about'),
    main = document.getElementById('main'),
    img = document.getElementById('img1'),
    front = document.getElementById('front'),
    activ = false,
    coord = [],
    about = document.getElementById('about');

for(var i= 0; i < svg.length; i++)
{
  svg[i].addEventListener('click', function(){

    // if (activ === false) {

      this.id = "is-active";
      coord = this.getAttribute("points");

      dynamics.animate(this, {
        points : "0 0 1732.3 0 1732.3 848.3 0 848.3",
      }, {
        friction: 150
      });

      about.className += " is-active";
      main.className += " is-active";
      front.setAttribute("href", "#is-active");
    //   activ = true;
    //
    // } else {
    //   dynamics.animate(this, {
    //     points : coord,
    //   }, {
    //     friction: 150
    //   });
    //
    //   about.classList.remove("is-active");
    //   main.classList.remove("is-active");
    //   this.classList.remove("is-active");
    //   front.removeAttribute("href", "#is-active");
    //   activ = false;
    // }
  });

}
