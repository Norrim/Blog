<h1>Projet Blog</h1>

<h2>Objectif</h2>
Créer un projet symfony et faire un blog simple sans design.

<h2>Commandes</h2>
Installer Composer:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php

php -r "unlink('composer-setup.php');"

php composer.phar install

(nom de la bdd: widop)


Base de donnée:
php app/console doctrine:database:create
php app/console doctrine:schema:create

FOSUser:
créer un admin:
php app/console fos:user:create admin admin@local.fr admin

promote un admin:
php app/console fos:user:promote admin ROLE_SUPER_ADMIN


<h2>Message:</h2>
Je me suis rendu compte trop tard que j'ai oublier de metre .idea/* dans le gitgnore, dsl pour les commits pollués

