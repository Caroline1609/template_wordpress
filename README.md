# template_wordpress

# Prérequis 

- [docker-compose.yml](https://github.com/Caroline1609/template_wordpress/blob/main/docker-compose.yml)

N'oubliez pas de modifier le fichier `docker-compose.yml` pour adapter les ports et le nom des contenainers à votre projet. 

## Installation

### Création du Conteneur Docker

*Ouvrez le terminal intégré de VS Code et exécutez :*

```bash
# Lancer les conteneurs en arrière-plan
docker compose up -d
```

### Accès à l'interface d'administration de WordPress

Dans le navigateur Web :
`Localhost:[numéro du port]/wp-admin` ou tout simplement aller sur Docker pour l'ouvrir via `le conteneur`.


### Première connexion
- Choisir la langue
- Choisir un nom de site (Possibilité de le modifier plus tard)
- Choisir un nom d'utilisateur
- Choisir un mot de passe (possibilité de choisir un mot de passe faible si on coche la case "Confirmer l’utilisation du mot de passe faible")
- Saisir une adresse e-mail
- Cliquer sur "Installer WordPress"

Il faut ce connecter avec le nom d'utilisateur et le mot de passe choisi précédement pour accéder à l'interface d'administration de WordPress.

### Création d'un thème WordPress

1. Allez dans le dossier `wp-content/themes` et créez un nouveau dossier pour votre thème. Par exemple, `mon-theme`.

➡️ Dans ce dossier, créez un fichier `style.css` avec le contenu suivant :

```css/*
Theme Name: Mon Thème (très important)
Author: Votre Nom
Description: Un thème WordPress personnalisé (Facultatif)
```


2. Ensuite, créez un fichier `index.php`.

```php
<?php
get_header();

if (have_posts()): // si l'url appelé correspond à du contenu  (article, page, auteur, catégorie...)
    while (have_posts()): // pour chaque élément trouvé... 
        the_post(); // on charge les données du contenu
        ?>
        
        <article class="montheme-article">
            <?php the_excerpt(); // extrait du post ?>
        </article>
        <?php the_post_thumbnail('thumbnail'); ?>
        <article>
            <?php the_content(); // contenu du post ?>
        </article>
        <?php
    endwhile;
else:
    echo 'Aucun contenu';
endif;

get_footer();
?>
```
Il est possible de le personnalisé comme on veut.

3. Activez votre thème dans l'interface d'administration de WordPress : Apparence > Thèmes > Activer "Mon Thème".

Attention, pour que le thème soit reconnu, il faut que le nom du dossier et le nom du thème dans le fichier `style.css` soient identiques.


4. Créez un fichier `header.php` avec le contenu suivant :
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    
<main>
    <!-- FIN HEADER -->
```


4. Créez un fichier `footer.php` avec le contenu suivant :
```php
</main>

    <?php wp_footer(); ?>
</body>
</html>
```



6. functions.php (NE PAS OUBLIEZ LE "S"): Ce fichier est utilisé pour ajouter des fonctionnalités personnalisées à votre thème.

- Exemple de contenu pour `functions.php` :
```php
<?php

function cb_add_thumbnails() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'cb_add_thumbnails'); // Permet d'ajouter la prise en charge des images à la une (thumbnails) dans votre thème.


function cb_menu_setup() {
    register_nav_menus([
        'menuPrincipal' => 'Mon menu'
    ]);
}

add_action('init', 'cb_menu_setup'); // Permet d'enregistrer un emplacement de menu personnalisé dans votre thème.

```











## Extensions utiles

- **Faker-Press** : Permet de générer du contenu factice pour tester votre thème.
- **Classic Editor** : Permet d'utiliser l'éditeur classique de WordPress au lieu de Gutenberg.


