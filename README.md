# Informations préalables

Les identifiants sont `root`/`root` pour le panel admin wordpress

Le lien du repo github est : https://github.com/barnabehvrd/TP-bedrock-iut


# Explication des étapes realisées :

## 1. Installation et Configuration

- Téléchargement de Bedrock avec Composer puis configuration de la DB
- Installation du thème Hello Elementor avec la commande `composer require wpackagist-theme/hello-elementor`
- Création d'un dossier "hello-elementor-child" avec un fichier `style.css` et `functions.php`

## 2. Création du CPT

- Création d'un Custom Post Type (CPT) "Porfolio"
- Ajout de la fonctionnalité de support pour les images mises en avant, les titres et l'éditeur
- Ajout des catégories personnalisées pour le CPT
- Ajout des extraits personnalisés avec `'rewrite' => array( 'slug' => 'portfolio' )`

## 3. Création des champs personnalisés

- Installation d'ACF avec Composer :
  - Ajout du repository `https://composer.advancedcustomfields.com` à composer.json
  - Installation avec `composer require wpackagist-plugin/advanced-custom-fields`
- Création, depuis WordPress, d'un groupe de champs ACF pour le CPT "Portfolio"
  - Le champ "Galerie d'images" est payant (reservé à la version PRO), et n'a donc pas pu etre ajouté
- Configuration d'ACF pour que les champs ne soient affichés que sur le CPT "Portfolio"

## 4. Affichage des réalisations
- Création d'un fichier `single-portfolio.php` pour afficher les réalisations, avec un peu d'HTML et de PHP
- Utilisation de la fonction `get_field()` pour récupérer les champs personnalisés
- Utilisation de la fonction `get_the_post_thumbnail()` pour afficher l'image mise en avant
- Création de `archive-portfolio.php` pour afficher la liste des réalisations
- Un peu de CSS pour personnaliser l'affichage en grilles

## 5. Ajout de la page d'accueil
- Création d'un fichier `front-page.php` pour afficher la page d'accueil
- Ajout d'une partie très succinte sur le portfolio faisant la liste des compétences
- Ajout des 3 derniers meilleurs projets réalisés (choisis a l'aide d'ACF avec un champ "on/off")
- Un peu de CSS très basique pour avoir un thème sombre dans un fichier à part (sinon ça ne marchait pas)

## 6. Livraison du projet
- Rédaction de ce README.md
- Exportation de la DB à l'aide de `wp db export`
- Création d'une archive ZIP contenant le projet ET la DB

# Difficultés rencontrées

- L'installation d'ACF a été un peu longue (car je n'avais pas immédiatement compris qu'il fallait ajouter le repository à composer.json)
- La création du CPT a été longue parce que mon function.php était mal configuré (donc grosse perte de temps, je ne m'en suis pas rendu compte tout de suite)
- Le CSS ne marchait pas dans le fichier de base, obligé de créer un second fichier CSS
- wp-cli sur Windows, c'est une horreur (heureusement que j'avais WSL). Ca a du me prendre 1 vraie heure pour le faire fonctionner.

# Installation du projet
- Cloner le projet
- Installer les dépendances avec `composer install`
- Créer la DB avec `wp db create`
- Importer la DB avec `wp db import wordpressExport.sql`
- Lancer le serveur avec `composer start`