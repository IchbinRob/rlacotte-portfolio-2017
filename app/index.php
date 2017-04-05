<?php
session_start();
function autoSelectLanguage($aLanguages, $sDefault = 'fr_FR') {
  if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	 $aBrowserLanguages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
	 foreach($aBrowserLanguages as $sBrowserLanguage) {
		$sLang = strtolower(substr($sBrowserLanguage,0,2));

		if(in_array($sLang, $aLanguages)) {
		  switch ($sLang) {
		  	case 'fr':
		  		$sLang = 'fr_FR';
		  		break;
		  	case 'en':
		  		$sLang = 'en_US';
		  		break;
		  	default:
		  		$sLang = 'fr_FR';
		  		break;
		  }
		  return $sLang;
		}
	 }
 } else {
     return $sDefault;
 }

}

// executer qu'une seule fois le changement de la langue
if( empty($_SESSION['lang']) ){
    $_SESSION['lang'] = autoSelectLanguage(array('fr','en'), 'fr');
}

if (!empty($_POST)) {
  $_SESSION['lang'] = $_POST['lang'];
}

$lang = strtoupper(substr($_SESSION['lang'],0,2));

// Set language
putenv('LC_ALL=' . $_SESSION['lang'] );
setlocale(LC_ALL, $_SESSION['lang'].".utf8");
// Specify the location of the translation tables
bindtextdomain('main', 'locale');
bind_textdomain_codeset('main', 'UTF-8');
// Choose domain
textdomain('main');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Robinson Lacotte | Portfolio</title>
    <link href="https://fonts.googleapis.com/css?family=Eczar:400,700|Work+Sans:300,400,500,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link id="linkDys" rel="stylesheet" type="text/css" data-href="css/dys.css">

    <!-- SEO -->
    <meta name="description" content="Portfolio de Robinson Lacotte - Web développeur - Photographe - Etudiant MMI"/>
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="http://rlacotte.mmi-angouleme.fr/" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="Portfolio de Robinson Lacotte - Web développeur - Photographe" />
    <meta property="og:url" content="https://rlacotte.mmi-angouleme.fr/" />
    <meta property="og:site_name" content="Portfolio de Robinson Lacotte" />
    <!-- /SEO -->
</head>
<body>
  <div class="wrapper">
    <section class="header" id="header">
      <div class="header__logo">
        <svg class="menu__desktop" version="1.1"  xml:space="preserve" preserveaspectratio="none" viewbox="0 0 1732.3 848.3" enable-background="new 0 0 1732.3 848.3">
          <a xlink:href="#">
              <polygon points="0 0 943.1 0 488.3 392.1 0 392" data-origin="0 0 943.1 0 488.3 392.1 0 392" data-section="about"/>
          </a>
          <a xlink:href="#">
              <polygon points="0 419 457 419 225 618 0 811" data-origin="0 419 457 419 225 618 0 811" data-section="hobby"/>
          </a>
          <a xlink:href="#">
              <polygon points="498.8 417.7 657.5 649.4 793.6 848.3 0 848.3" data-origin="498.8 417.7 657.5 649.4 793.6 848.3 0 848.3" data-section="portfolio-dev"/>
          </a>
          <a xlink:href="#">
              <polygon points="982.1 0 1268.8 0 1516.2 391.9 528.5 392.1" data-origin="982.1 0 1268.8 0 1516.2 391.9 528.5 392.1" data-section="skills"/>
          </a>
              <polygon points="1301.5 0 1732.3 0 1732.3 687 1503.4 321.2 " data-origin="1301.5 0 1732.3 0 1732.3 687 1503.4 321.2 " data-section="access"/>
          <a xlink:href="#">
              <polygon points="1531.6 417.5 1732.3 736.3 1732.3 848.3 867.3 848.3 " data-origin="1531.6 417.5 1732.3 736.3 1732.3 848.3 867.3 848.3 " data-section="portfolio-design"/>
          </a>
          <a xlink:href="#">
              <polygon points="531.4 418.2 1481.8 418.1 1162.6 624.8 823 848.3" data-origin="531.4 418.2 1481.8 418.1 1162.6 624.8 823 848.3" data-section="exp"/>
          </a>
          <use id="front" xlink:href="#"></use>
        </svg>
      </div>

      <div class="menu__desktopTitle">
        <ul>
          <li data-section="about">
            <a href="#">
              <p class="typo-serif-regular typo-title">Robinson Lacotte</p>
              <p class="typo-serif-bold typo-main"><?php echo _("Développeur &amp; Illustrateur"); ?></p>
              <p class="typo-sans-light typo-link"><?php echo _("Qui suis-je ?"); ?></p>
            </a>
          </li>
          <li data-section="skills"><a href="#"><?php echo _("Compétences"); ?></a></li>
          <li data-section="access">
            <div id="accessMenu">
              <a href="#" id="fontsize"><i class="icon-fontsize"></i></a>
              <a href="#adjust" id="contrast"><i class="icon-adjust"></i></a>
              <a href="#" id="lang"><?php if ($lang == 'EN') {
                echo "FR";
              } else {
                echo "EN";
              } ?></a>
              <a href="#" id="dys">Dys</a>
              <div class="dividers">
                <svg class="divider">
                  <path d="M0 0 L50 50"></path>
                  <path d="M50 50 L100 100"></path>
                </svg>
                <svg class="divider">
                  <path d="M0 100 L50 50" ></path>
                  <path d="M100 0 L50 50"></path>
                </svg>
              </div>
            </div>
          </li>
        </ul>
        <ul>
          <li data-section="hobby"><a href="#" class="typo-main typo-serif-bold"><p><?php echo _("Centres</p><p>d’intérêt") ?></p></a></li>
          <li data-section="portfolio-dev"><a href="#"><?php echo _("Programmation"); ?></a></li>
          <li data-section="exp"><a href="#"><?php echo _("Projets"); ?></a></li>
          <li data-section="portfolio-design"><a href="#" class="typo-main typo-serif-bold"><p><?php echo _("Photographie"); ?></p><p>&amp;</p><p><?php echo _("Illustration"); ?></p></a></li>
        </ul>
      </div>
      <ul class="menu__mobile">
        <li data-section="about"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("À propos"); ?></a></li>
        <li data-section="skills"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("Compétences"); ?></a></li>
        <li data-section="exp"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("Projets"); ?></a></li>
        <li data-section="portfolio-dev"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("Programmation"); ?></a></li>
        <li data-section="portfolio-design"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("Photographie &amp; Illustration"); ?></a></li>
        <li data-section="hobby"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("Centres d’intérêt"); ?></a></li>
        <li data-section="contact"><a href="#contact" class="typo-serif-bold typo-main-mobile"><?php echo _("Contact"); ?></a></li>
        <li data-section="access"><a href="#" class="typo-serif-bold typo-main-mobile"><?php echo _("Accessibilité"); ?></a></li>
      </ul>
    </section>
    <section class="main" id="main">
      <div class="main__about" id="about">
        <div class="about__contentWrapper">
          <div class="about__contentDesc">
            <div class="pp__img">
              <img id="moiPath" data-src="img/moi.jpg" alt="la tête de Robinson">
            </div>
            <div class="about__desc">
              <h1 class="typo-serif-bold typo-main">Robinson Lacotte</h1>
              <h2 class="typo-sans-regular"><?php echo _("Développeur web et designer") ?></h2>
              <p class="typo-sans-regular"><?php echo _("Je suis en deuxième année d’un DUT Métiers du Multimédia et de l’Internet à Angoulême. Je suis titulaire d’un baccalauréat scientifique option sciences de l’ingénieur.") ?></p>
              <p class="typo-sans-regular"><?php echo _("Je m’intéresse de près aux nouvelles technologies, autant au hardware qu'au software.") ?></p>
              <p class="typo-sans-regular"><?php echo _("Je suis curieux. J’ai encore beaucoup de choses à apprendre, et lorsque j’ai un projet à rendre, je ne me limite pas à ce que je connais. Particulièrement dans le web, qui est en perpétuelle évolution et qui voit naitre de nouvelles technologies tous les jours."); ?></p>
              <p class="typo-sans-regular"><?php echo _("L’Open Source, la vie privée et la sécurité sur la toile sont des thèmes qui me tiennent à cœur."); ?></p>
            </div>
          </div>
          <div class="about__next">
            <a href="#"><?php echo _("Pour en savoir plus sur mes compétences"); ?></a>
            <a href="#"><?php echo _("Ou pour en savoir un peu plus sur moi"); ?></a>
            <a href="#"><?php echo _("Mes projets professionnels"); ?></a>
            <a href="#"><?php echo _("Mes créations"); ?></a>
          </div>
        </div>
      </div>
      <div class="main__skills" id="skills">
        <p>Skills</p>
        <p>Etudiant</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <div class="main__exp" id="exp">
        <p>Exp</p>
        <p>Etudiant</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <div class="main__portfolioDev" id="portfolio-dev">
        <p>Programmation</p>
        <p>Etudiant</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <div class="main__portfolioDesign" id="portfolio-design">
        <h1 class="typo-serif-bold typo-main"><?php echo _("Photographie &amp; Illustration"); ?></h1>
        <div class="design__content">
          <a class="photo" href="#">
            <p class="typo-sans-regular" style="translation: rotate(90)"><?php echo _("Photographies"); ?></p>
            <img id="photoPath" data-src="img/de.jpg" alt="de" class="clip-photo"/>
          </a>
        <a class="illustration" href="#">
          <p class="typo-sans-regular"><?php echo _("Illustrations"); ?></p>
            <img id="illuPath" data-src="img/ROB.jpg" alt="Cosplay Vanille Retouch" class="clip-illu">
        </a>
        <a class="vrac" href="#">
          <p class="typo-sans-regular"><?php echo _("Créations diverses"); ?></p>
            <img id="vracPath" data-src="img/K20_8137.jpg" alt="Cosplay Lightning Return Retouch" class="clip-vrac">
        </a>
        </div>
      </div>

      <div class="main__hobby" id="hobby">
        <p>Hobby</p>
        <p>Etudiant</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <a href="#"><i class="close icon-cancel"></i></a>
    </section>
    <section class="footer">
      <div class="footer__main">
        <h3 class="footer__legal">© 1997-2042 Robinson Lacotte. <?php echo _("Tous droits réservés"); ?>.<span>|</span></h3>
        <h3 class="footer__mentions"><a href="#mentions"><?php echo _("Mentions légales"); ?></a><span>|</span></h3>
        <h3 class="footer__contact"><a href="#contact"><?php echo _("Contact"); ?></a><span>|</span></h3>
        <h3 class="footer__issues"><a href="http://www.wikihow.com/Update-Your-Browser" target="_blank"><?php echo _("Problèmes d'affichage ?"); ?></a></h3>
      </div>
      <div class="footer__contactDisplay" id="contact">
        <div>
          <h2 class="typo-serif-regular"><?php echo _("Me contacter") ?></h2>
          <a href="mailto:robinson.lacotte@protonmail.com">robinson.lacotte@protonmail.com</a>
        </div>
        <div>
          <h2 class="typo-serif-regular">Ailleurs sur le web :</h2>
          <ul>
            <li><a href="https://www.vice.com/fr/article/linkedin-est-toujours-une-fenetre-ouverte-sur-lenfer" target="_blank">LinkedIn</a></li>
            <li><a href="https://fb.me/ichbinR0B" target="_blank">Facebook</a></li>
          </ul>
        </div>
        <a href="#"><i class="close-footer icon-cancel"></i></a>
      </div>
      <div class="randDivAuJambon">
        <a href="#"></a>
      </div>
    </section>
  </div>
  <form class="hidden__form" id="changeLang" method="post">
      <input id="theNewLang" type="hidden" name="lang" value="">
  </form>
  <script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous"></script>
  <script src="js/all.js" charset="utf-8" async></script>
  <script id="scriptdesign" data-src="js/design.js" charset="utf-8"></script>
</body>
</html>
<?php session_destroy(); ?>
