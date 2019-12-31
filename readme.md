# TV Inside

Projet dans lequel nous devions créer un site web de gestion de séries, qui permet aux utilisateurs de voir des résumés de séries, mettre des commentaires, et lire les avis de la rédaction.

Projet scolaire réalisé en groupe de huit personnes lors du marathon du web en Décembre 2019.

Le marathon du Web est un projet de l'IUT de Lens qui mixe les départements informatique et mmi (multimédia et internet) dans des équipes qui doivent produire un site web en 34h.

# Lancer le site

TV Inside est un projet basé sur le framework Laravel. 
Prérequis pour lancer le projet : **PHP, Wamp ainsi que Composer**.

Pour lancer le site web en local, vous devez réer un fichier **.env** à la racine du projet en vous basant sur le **.env.example** et remplir la partie DB (connection, host, port, database, username et password).

Maintenant suivez ces instructions : 

**Sur votre PC :**

- Démarrez Wamp (cet outil permettra de connecter le site à votre base de donnée).

**Dans le terminal :**

- "composer install" (à entrer une seule fois).
- "php artisan migrate" (à entrer une seule fois).
- "php artisan serve" (à entrer à chaque fois que vous voulez lancer le site).

**Dans votre barre de recherche internet:**

- "localhost:8000" (à entrer à chaque fois que vous voulez accéder à votre site).



Et voilà le tour est joué ! :D

