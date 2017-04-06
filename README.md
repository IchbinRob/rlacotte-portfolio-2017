# Portfolio de Robinson Lacotte

## Notes de déboguage
* Mon responsive n'est pas entièrement dynamique. La taille de certains éléments est calculé grâce à du JavaScript.
--*
## Erreurs W3C
1. Pour le HTML :
  * Pour des raisons d'optimisation lors du chargement de la page, des balises `<link>`, `<script>` et `<img>` ont des erreurs d'attribut. J'utilise des `data-` pour paralyser la balise. Le W3C me le signale comme des erreurs, mais c'est volontaire.
  Les erreurs sont les suivantes :
    *  Element `link` is missing required attribute `href`,
    *  Element `img` is missing required attribute `src`,
    *  Element `script` must not have attribute `charset` unless attribute `src` is also specified.
  * J'ai aussi une erreur lié à l'utilisation des Googles fonts API, qui utilise des caractères non autorisé :
    * Bad value https://fonts.googleapis.com/css?family=Eczar:400,700|Work+Sans:300,400,500,800 for attribute `href` on element `link`: Illegal character in query: | is not allowed
  * J'utilise un iframe pour Bandcamp qui génère beaucoup d'erreur.
  * Ces erreurs, sont des faux positifs, car nécessaires au bon fonctionnementt de l'API et l'iframe.
  --*

2. Pour le CSS :
  * Le W3C ne gère pas les propriétés CSS pour styler les SVG : `fill`, `stroke`...

  * J'ai de nombreux warning lié aux extensions propriétaires, et aussi une erreur. Mais j'assume ces erreurs car elles permettent une meilleure compatibilité avec des navigateurs plus anciens.
--*

## Notes de conception

Tout le code source est disponible à cette adresse : https://github.com/IchbinRob/rlacotte-portfolio-2017

### Le *Workflow*
* J'ai utilisé le préprocesseur SCSS.
* La compilation du css, le préfixage, et la minification du CSS est automatisé grâce à Gulp.
* Le JavaScript est lui aussi, concaténé et minifié automatiquement.

### Le *backoffice*
Il **n**'y a **pas** de *backoffice* présent. Pourquoi ?
  * Car son utilisation est loin d'être indispensable sur un Portfolio,
  * Et aussi par manque de temps. Mon Portfolio a été assez complexe à mettre en place, et je n'ai donc pas pu prendre de temps supplémentaire pour mettre en place un backoffice.
  --*

### La traduction
Je me suis basé sur une traduction avec la méthode gettext. Le fichier .po est disponible dans le code source.
*le site n'est pas encore traduit dans sa totalité*

### Objectif 0 chargement
* J'ai pensé mon portfolio pour qu'il n'y ait aucun chargement. C'est donc un *One page*, tout en proposant une conception et une expérience radicalement différente.
* Le seul chargement présent est lors du changement de la langue.
* J'ai donc appliqué des méthodes de *LazyLoad*, je ne charge les images ou les scripts que quand j'en ai besoin. (C'est ce qui explique les balises paralysées avec des `data-`)
