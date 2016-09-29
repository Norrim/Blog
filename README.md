<h1>Projet Blog</h1>

<h2>Objectif</h2>
Créer un projet symfony et faire un blog simple sans design.

<h2>Commandes</h2>
Base de donnée:
- php app/console doctrine:database:create
- php app/console doctrine:schema:create

FOSUser:
créer un admin:
- php app/console fos:user:create admin admin@local.fr admin

promote un admin:
- php app/console fos:user:promote admin ROLE_SUPER_ADMIN