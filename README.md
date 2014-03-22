MineWeb
=======

En vrac
-------
  * Faire un AdminBundle pour les vues admin et ajouter layout sur website bundle
  * Trouver un bon algo pour le rang des joueurs/factions
  * Tester onetoone player/user (2player 1 user par exemple)
  * Tester numPost++ sur user
  * Ajouter un système de news
  * Ajouter une recherche full text pour le forum ?
  * Bug parfois : invalid csrf token when false login
  * Géré toutes les url fausses (404 au lieu de 500)
  * Améliorer l'interface admin
  * Bouton pour permettre de montrer l'adresse email ou pas
  * Vérifier fosuserbundle (mot de passe oublié, etc)
  * Brancher swiftmailer
  * Ajouter des stats sur les armes (meilleur arme, etc)
  * Ajouter des filtres sur les stats
  * Vérifier si les removes cascades etc sont bien mis partout
  * Vérifier les traductions
  * mettre @author et licence gpl sur les classes
  * http://local.mineweb/app_dev.php/forum/administration/post/2/delete -> bug
  * Le last login sur la page de profil semble faux
  * HasLifeCycleCallbacks sur updated at de user

A penser
--------

  * Vérifier taille des pages au chargement
  * pac doctrine:schema:validate

ForumBundle
-----------

  * Cascade entities
  * Catch exception si titre deja créer -> http://symfony.com/doc/current/reference/constraints/UniqueEntity.html
  * Systeme anti-flood ?

MinecraftSkinBundle
-------------------

  * Mettre la taille par défaut en paramètre
  * Mettre le chemin des images en paramètre
  * Mettre le bundle sous packagist
  * Manager -> getters and setters
  * skin 3d?

Plugins
=======

Si rien a faire : Mettre en anglais pour les plugins -> puis faire un systeme de translation (demander la langue au départ, et une commande pour la changer)
