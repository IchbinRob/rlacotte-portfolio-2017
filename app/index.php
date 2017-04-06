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
          <a xlink:href="#about">
              <polygon points="0 0 943.1 0 488.3 392.1 0 392" data-origin="0 0 943.1 0 488.3 392.1 0 392" data-section="about"/>
          </a>
          <a xlink:href="#hobby">
              <polygon points="0 419 457 419 225 618 0 811" data-origin="0 419 457 419 225 618 0 811" data-section="hobby"/>
          </a>
          <a xlink:href="#">
              <polygon points="498.8 417.7 657.5 649.4 793.6 848.3 0 848.3" data-origin="498.8 417.7 657.5 649.4 793.6 848.3 0 848.3" data-section="portfolio-dev"/>
          </a>
          <a xlink:href="#skills">
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
        <li data-section="access"><a href="#access" class="typo-serif-bold typo-main-mobile"><?php echo _("Accessibilité"); ?></a></li>
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
              <h2 class="typo-serif-regular typo-title typo-justify"><?php echo _("Développeur web et designer") ?></h2>
              <p class="typo-sans-regular typo-justify"><?php echo _("Je suis en deuxième année d’un DUT Métiers du Multimédia et de l’Internet à Angoulême. Je suis titulaire d’un baccalauréat scientifique option sciences de l’ingénieur.") ?></p>
              <p class="typo-sans-regular typo-justify"><?php echo _("Je m’intéresse de près aux nouvelles technologies, autant au hardware qu'au software.") ?></p>
              <p class="typo-sans-regular typo-justify"><?php echo _("Je suis curieux. J’ai encore beaucoup de choses à apprendre, et lorsque j’ai un projet à rendre, je ne me limite pas à ce que je connais. Particulièrement dans le web, qui est en perpétuelle évolution et qui voit naitre de nouvelles technologies tous les jours."); ?></p>
              <p class="typo-sans-regular typo-justify"><?php echo _("L’Open Source, la vie privée et la sécurité sur la toile sont des thèmes qui me tiennent à cœur."); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="main__skills" id="skills">
        <h1 class="typo-serif-bold typo-main"><?php echo _("Compétences"); ?>*</h1>
        <ul class="skills__list">
          <li>
            <h1 class="typo-serif-bold typo-main"><?php echo _("Développement Web"); ?></h1>
            <p>POrtfolio</p>
            <progress value="95" max="100"></progress>
            <p>Fatigue</p>
            <progress value="100" max="100"></progress>
            <p>Temps restant</p>
            <progress value="5" max="100"></progress>
          </li>
          <li>
            <h1 class="typo-serif-bold typo-main"><?php echo _("Infographie"); ?></h1>
            <p>Photoshop</p>
            <progress value="85" max="100"></progress>
            <p>Illustrator</p>
            <progress value="75" max="100"></progress>
            <p>InDesign</p>
            <progress value="60" max="100"></progress>
            <p>3DSMax</p>
            <progress value="50" max="100"></progress>
          </li>
        </ul>
        <ul class="skills__list">
          <li>
            <h1 class="typo-serif-bold typo-main"><?php echo _("Communication"); ?></h1>
            <p>POrtfolio</p>
            <progress value="95" max="100"></progress>
            <p>Fatigue</p>
            <progress value="100" max="100"></progress>
            <p>Temps restant</p>
            <progress value="5" max="100"></progress>
          </li>
          <li>
            <h1 class="typo-serif-bold typo-main"><?php echo _("Gestion de projets"); ?></h1>
            <p>POrtfolio</p>
            <progress value="95" max="100"></progress>
            <p>Fatigue</p>
            <progress value="100" max="100"></progress>
            <p>Temps restant</p>
            <progress value="5" max="100"></progress>
          </li>
        </ul>
        <ul class="skills__list">
          <li>
            <h1 class="typo-serif-bold typo-main"><?php echo _("Autre"); ?></h1>
            <p>Ne pas avoir le Cles 1 </p>
            <progress value="100" max="100"></progress>
            <p>Fatigue</p>
            <progress value="100" max="100"></progress>
            <p>Temps restant</p>
            <progress value="5" max="100"></progress>
        </li>
        </ul>
        <p>* La logique des barres de progressions est la suivante : vous voyer un transfert sous windows ? Là c'est pareil, plus on s'approche de la fin, plus c'est long.</p>
      </div>
      <div class="main__exp" id="exp">
        <h1 class="typo-serif-bold typo-main"><?php echo _("Expériences professionnelles & personnelles"); ?></h1>
        <section class="typo-sans-regular">
          <article class="Level 1">
            <figure>
              <img data-src="img/l1-project.jpg" alt="Level 1 Thumbnail">
              <figcaption>
                <h2 class=" typo-sans-bold typo-main">Le projet <a href="https://level-1.fr" target="_blank" class="typo-underline">Level 1</a></h2>
                <p class="typo-justify">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.
Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.
Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>
              </figcaption>
            </figure>
          </article>
          <article class="toundra">
            <figure>
              <img data-src=<?php echo _('img/toundra-fr.jpg') ?> alt="Toundra Thumbnail">
              <figcaption>
                <h2 class=" typo-sans-bold typo-main"><a href=<?php echo _("http://rlacotte.mmi-angouleme.fr/toundra/home/indexFR") ?> target="_blank">La Toundra</a> - <a href="http://rlacotte.mmi-angouleme.fr/toundra/application/" target="_blank" class="typo-underline">L'application</a></h2>
                <p class="typo-justify">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.
Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.
Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>
              </figcaption>
            </figure>
          </article>
          <article class="webtv">
            <figure>
              <img data-src="img/webtv.jpg" alt=" Thumbnail">
              <figcaption>
                <h2 class=" typo-sans-bold typo-main">MMITV Angoulême</h2>
                <p class="typo-justify">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.
Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.
Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>
              </figcaption>
            </figure>
          </article>
          <article class="chocolaterie">
            <figure>
              <img data-src="img/choco-antan-soon.jpg" alt="Chocolaterie Antan Thumbnail">
              <figcaption>
                <h2 class=" typo-sans-bold typo-main">Chocolaterie d'Antan -<span class="typo-sans-bold"><?php echo _('BIENTÔT') ?></span>-
                </h2>
                <p class="typo-justify">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.
Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.
Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>
              </figcaption>
            </figure>
          </article>
        </section>
      </div>
      <div class="main__portfolioDev" id="portfolio-dev">
        <h1 class="typo-serif-bold typo-main"><?php echo _("Programmation"); ?></h1>
        <section class="typo-sans-regular">
          <article class="requeteur">
            <figure>
              <img data-src="img/requeteur.jpg" alt="Requeteur Thumbnail">
              <figcaption>
                <h2 class=" typo-sans-bold typo-main">Requêteur</h2>
                <p class="typo-justify">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.
Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.
Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>
              </figcaption>
            </figure>
          </article>
          <article class="mmi-crea">
            <figure>
              <img data-src="img/mmi-crea.jpg" alt="MMI créa Thumbnail">
              <figcaption>
                <h2 class=" typo-sans-bold typo-main"><a href="http://rlacotte.mmi-angouleme.fr/creation/" target="_blank" class="typo-underline">MMI Création</a></h2>
                <p class="typo-justify">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.
                  Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.
                  Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>
                </figcaption>
              </figure>
            </article>
        </section>
      </div>

      <div class="main__portfolioDesign" id="portfolio-design">
        <h1 class="typo-serif-bold typo-main"><?php echo _("Photographies &amp; Illustrations"); ?></h1>
        <div class="design__content">
          <a class="photo" href="#photoSection">
            <p class="typo-sans-regular"><?php echo _("Photographies"); ?></p>
            <img id="photoPath" data-src="img/de.jpg" alt="de" class="clip-photo"/>
          </a>
        <a class="illustration" href="#illuSection">
          <p class="typo-sans-regular"><?php echo _("Illustrations"); ?></p>
            <img id="illuPath" data-src="img/ROB.jpg" alt="Rob" class="clip-illu">
        </a>
        <a class="vrac" href="#vracSection">
          <p class="typo-sans-regular"><?php echo _("Créations diverses"); ?></p>
            <img id="vracPath" data-src="img/K20_8137.jpg" alt="Cosplay Lightning Return Retouch" class="clip-vrac">
        </a>
        </div>
        <div class="portfolioDesign__photo" id="photoSection">
          <h1 class="typo-serif-bold typo-main"><?php echo _("Photographies"); ?></h1>
          <section>
            <article class="photo__jylle">
              <figure>
                <figcaption class="typo-sans-regular">Photo de <a href="https://www.facebook.com/JylleCosplay/" target="_blank" class="typo-underline">Jylle Cosplay</a></figcaption>
                <img data-src="img/jill.jpg" alt="Cosplay Jill Bilal">
                <img data-src="img/K20_8137.jpg" alt="Cosplay Vanille Return Retouch">
                <img data-src="img/Light2After.jpg" alt="Cosplay Lightning Return Retouch">
                <img data-src="img/mantis.jpg" alt="Cosplay PsychoMantis">
              </figure>
            </article>
            <article class="photo__vinyle">
              <figure>
                <figcaption class="typo-sans-regular">Vinyle El Huervo</figcaption>
                <img data-src="img/vinyle.jpg" alt="vinyle El Huervo">
                <img data-src="img/vinyle-var.jpg" alt="vinyle El Huervo">
              </figure>
            </article>
            <article class="photo__vrac">
              <figure>
                <figcaption class="typo-sans-regular">Je suis un dé posé sur une table</figcaption>
                <img data-src="img/de.jpg" alt="de">
                <img data-src="img/miaou.jpg" alt="je mords">
                <img data-src="img/graf1.jpg" alt="graph urbex">
              </figure>
            </article>
          </section>
          <a href="#"><i class="close-footer icon-cancel"></i></a>
        </div>
        <div class="portfolioDesign__illu" id="illuSection">
          <h1 class="typo-serif-bold typo-main"><?php echo _("Illustrations"); ?></h1>
          <section>
            <article class="illu_pp">
              <figure>
                <figcaption class="typo-sans-regular">Logo & illustrations de profil</figcaption>
                <img data-src="img/ROB.jpg" alt="log rob">
                <img data-src="img/Light2After.jpg" alt="Cosplay Lightning Return Retouch">
                <img data-src="" alt="">
              </figure>
            </article>
            <article class="photo__jylle">
              <figure>
                <figcaption class="typo-sans-regular">Photographies de Jylle Cosplay</figcaption>
                <img data-src="img/K20_8137.jpg" alt="Cosplay Vanille Return Retouch">
                <img data-src="img/Light2After.jpg" alt="Cosplay Lightning Return Retouch">
                <img data-src="" alt="">
              </figure>
            </article>
          </section>
          <a href="#"><i class="close-footer icon-cancel"></i></a>
        </div>
        <div class="portfolioDesign__vrac" id="vracSection">
          <h1 class="typo-serif-bold typo-main"><?php echo _("Créations diverses"); ?></h1>
          <section>
            <article class="photo__jylle">
              <figure>
                <figcaption class="typo-sans-regular">Photographies de Jylle Cosplay</figcaption>
                <img data-src="img/K20_8137.jpg" alt="Cosplay Vanille Return Retouch">
                <img data-src="img/Light2After.jpg" alt="Cosplay Lightning Return Retouch">
                <img data-src="" alt="">
              </figure>
            </article>
            <article class="photo__jylle">
              <figure>
                <figcaption class="typo-sans-regular">Photographies de Jylle Cosplay</figcaption>
                <img data-src="img/K20_8137.jpg" alt="Cosplay Vanille Return Retouch">
                <img data-src="img/Light2After.jpg" alt="Cosplay Lightning Return Retouch">
                <img data-src="" alt="">
              </figure>
            </article>
          </section>
          <a href="#"><i class="close-footer icon-cancel"></i></a>
        </div>
      </div>

      <div class="main__hobby" id="hobby">
        <h1 class="typo-serif-bold typo-main"><?php echo _("Centres d'intérêt"); ?></h1>
        <section>
          <article class="hobby__music">
            <figure>
              <figcaption class="typo-sans-regular">Musique</figcaption>
              <p class="typo-justify typo-sans-regular">Ça, c'est que j'écoutais quand j'ai fait cette section</p>
              <iframe class="bc-iframe" style="border: 0; height: 120px;" data-src="https://bandcamp.com/EmbeddedPlayer/album=308802090/size=large/bgcol=333333/linkcol=9a64ff/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://spacerecordings.bandcamp.com/album/ghost-drives">GHOST DRIVES by Jasper Byrne</a></iframe>
              <p class="typo-justify typo-sans-regular">Ça, c'est que j'écoutais quand j'ai fait cette section, et ça aussi</p>
              <iframe class="bc-iframe" style="border: 0; height: 120px;" data-src="https://bandcamp.com/EmbeddedPlayer/album=99843590/size=large/bgcol=333333/linkcol=9a64ff/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://perturbator.bandcamp.com/album/the-uncanny-valley">The Uncanny Valley by PERTURBATOR</a></iframe>
              <p class="typo-justify typo-sans-regular">Ça, c'est que j'écoutais quand j'ai fait cette section, ça c'était encore plus tard</p>
              <iframe class="bc-iframe" style="border: 0; height: 120px;" data-src="https://bandcamp.com/EmbeddedPlayer/album=24419060/size=large/bgcol=333333/linkcol=9a64ff/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://elhuervo.bandcamp.com/album/vandereer">Vandereer by El Huervo</a></iframe>
              <p class="typo-justify typo-sans-regular">Ça, c'est que j'écoutais quand j'ai fait cette section, un peu de douceur dans ce monde de brut</p>
              <iframe class="bc-iframe" style="border: 0; height: 120px;" data-src="https://bandcamp.com/EmbeddedPlayer/album=2382383956/size=large/bgcol=333333/linkcol=9a64ff/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://supergiantgames.bandcamp.com/album/transistor-original-soundtrack">Transistor: Original Soundtrack by Darren Korb</a></iframe>
              <p class="typo-justify typo-sans-regular">Ça, c'est que j'écoutais quand j'ai fait cette section, là fallait que je me garde éveillé</p>
              <iframe class="bc-iframe" style="border: 0;  height: 120px;" data-src="https://bandcamp.com/EmbeddedPlayer/album=441884888/size=large/bgcol=333333/linkcol=9a64ff/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://dbsoundworks.bandcamp.com/album/crypt-of-the-necrodancer-ost">Crypt of the Necrodancer OST by Danny Baranowsky</a></iframe>
            </figure>
          </article>
          <article class="hobby__game">
            <figure>
              <figcaption class="typo-sans-regular">Jeux vidéo</figcaption>
              <p  class="typo-sans-regular">Parce que si vous êtes déjà passé par la section "Projets", vous savez que je m'intéresse au jeux vidéo</p>
            </figure>
          </article>
          <article class="hobby__bd">
            <figure>
              <figcaption class="typo-sans-regular">La bande dessinée</figcaption>
              <p  class="typo-sans-regular">Les dessins c'est chouette</p>
            </figure>
          </article>
          <article class="hobby__muchMoreThings">
            <figure>
              <figcaption class="typo-sans-regular">Le REST</figcaption>
              <p  class="typo-sans-regular">Parce qu'il y a toujours une section "vrac" où on met tout le reste</p>
            </figure>
          </article>
        </section>
        <a href="#"><i class="close-footer icon-cancel"></i></a>
      </div>

      <a href="#"><i class="close icon-cancel"></i></a>
    </section>
    <section class="footer">
      <div class="footer__main">
        <h3 class="footer__legal">© 1997-2042 Robinson Lacotte.<span class="pipe">|</span></h3>
        <h3 class="footer__mentions"><a href="#legale"><?php echo _("Mentions légales"); ?></a><span class="pipe">|</span></h3>
        <h3 class="footer__contact"><a href="#contact"><?php echo _("Contact"); ?></a><span class="pipe">|</span></h3>
        <h3 class="footer__issues"><a href=<?php echo _("http://fr.wikihow.com/mettre-%C3%A0-jour-votre-navigateur") ?> target="_blank"><?php echo _("Problèmes d'affichage ?"); ?></a></h3>
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
      <div class="footer__contactDisplay" id="access">
        <div>
          <h2 class="typo-serif-regular"><?php echo _("Langue") ?></h2>
          <a href="#access" id='langMob'><?php if ($lang == 'EN') {
            echo "FR";
          } else {
            echo "EN";
          } ?></a>
        </div>
        <div>
          <h2 class="typo-serif-regular"><a href="#access" id='dysMob'>Dyslexie</a></h2>
        </div>
        <a href="#"><i class="close-footer icon-cancel"></i></a>
      </div>
      <div class="footer__legalDisplay typo-sans-regular typo-justify" id="legale">
        <div>
          <h2 class="typo-serif-bold"><?php echo _("Mentions légales") ?></h2>
          <p><span class="typo-sans-bold">Hébergement</span> : ce site est hébergé par <a href="https://www.ovh.com/fr/" target="_blank" class="typo-underline">OVH</a></p>
        </div>
        <div>
          <h2 class="typo-serif-bold">A propos</h2>
          <p>Ce portfolio est un site non-lucratif, dont la vocation est de présenter mon parcours, mes compétences et mes travaux. Il n’a aucunement vocation commerciale.</p>
        </div>
        <div>
          <h2 class="typo-serif-bold">Utilisation</h2>
          <p>En vous connectant à ce site, vous accédez à un contenu protégé par la loi, notamment par les dispositions du Code de la propriété intellectuelle.</p>
          <p>Les visuels, vidéos et musiques utilisés pour illustrer la section "Centres d'intérêt" sont la propriété des éditeurs. Leur utilisation hors de leur contexte original doit être soumis à leur approbation.</p>
          <p>Je n’autorise qu’un usage strictement personnel des données, informations ou contenus auxquels vous accédez, limité à un enregistrement temporaire sur votre ordinateur aux fins d’affichage sur un seul écran ainsi que la reproduction, en un unique exemplaire, pour copie de sauvegarde ou impression sur papier.</p>
          <p>Toute utilisation commerciale, ou autre utilisation est soumise à notre autorisation expresse préalable.</p>
          <p>Droits de reproduction et de diffusion des créations réservés © Robinson Lacotte.</p>
          <p>Je me réserve le droit de modifier le contenu de ce site web de toutes les façons que ce soit et à tout moment, et ce, sans notification préalable particulière.</p>
          <p>Je ne pourrais être tenu pour responsable, de quelque manière que ce soit, des conséquences de telles modifications.</p>
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
