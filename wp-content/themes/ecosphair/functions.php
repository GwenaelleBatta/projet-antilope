<?php
require_once(__DIR__ . '/acf.php');
require_once(__DIR__ . '/Menus/PrimaryMenuWalker.php');
require_once(__DIR__ . '/Menus/PrimaryMenuItem.php');
require_once(__DIR__ . '/Forms/BaseFormController.php');
require_once(__DIR__ . '/Forms/ContactFormController.php');
require_once(__DIR__ . '/Forms/Sanitizers/BaseSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/EmailSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/TextSanitizer.php');
require_once(__DIR__ . '/Forms/Validators/BaseValidator.php');
require_once(__DIR__ . '/Forms/Validators/AcceptedValidator.php');
require_once(__DIR__ . '/Forms/Validators/EmailValidator.php');
require_once(__DIR__ . '/Forms/Validators/RequiredValidator.php');

// Lancer la sessions PHP pour pouvoir passer des variables de page en page
add_action('init', 'ecosphair_boot_theme', 1);

function ecosphair_boot_theme()
{
    load_theme_textdomain( 'ecosphair', __DIR__ . '/locales');
    if (!session_id()) {
        session_start();
    }
}
//Désactiver l'éditeur Gutenberg de Wordpress
add_filter('use_block_editor_for_post', '__return_false');
//Activer les images sur les articles
add_theme_support('post-thumbnails');
//Enregistrer un seul custom post-type pour nos voyages
register_post_type('module',[
    'label'=>'Modules',
    'labels'=>[
        'name'=>'Modules',
        'singular_name'=>'Module'
    ],
    'description'=>'Présentation des différents modules d\'ecosphair',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-layout',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'module',
    ],

]);
register_post_type('article',[
    'label'=>'Articles',
    'labels'=>[
        'name'=>'Articles',
        'singular_name'=>'Article'
    ],
    'description'=>'Listing des différents articles et leur lien vers les différentes plateformes',
    'menu_position'=>10,
    'menu_icon'=>'dashicons-text-page',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'article',
    ],

]);
register_post_type('video',[
    'label'=>'Vidéos',
    'labels'=>[
        'name'=>'Vidéos',
        'singular_name'=>'Vidéo'
    ],
    'description'=>'Listing des différentes vidéos et leur lien vers les différentes plateformes',
    'menu_position'=>10,
    'menu_icon'=>'dashicons-video-alt3',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'video',
    ],
]);
register_post_type('history',[
    'label'=>'Historiques',
    'labels'=>[
        'name'=>'Historiques',
        'singular_name'=>'Historique'
    ],
    'description'=>'Listing des étapes de réalisation des modules d\'ecosphair',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-hourglass',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'history',
    ],

]);
register_post_type('partner',[
    'label'=>'Partenaires',
    'labels'=>[
        'name'=>'Partenaires',
        'singular_name'=>'Partenaire'
    ],
    'description'=>'Présentation de partenaires du projet ecosphair',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-businessperson',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'partner',
    ],

]);
register_post_type('network',[
    'label'=>'Réseaux sociaux',
    'labels'=>[
        'name'=>'Réseaux sociaux',
        'singular_name'=>'Réseaux social'
    ],
    'description'=>'Présentation de partenaires du projet ecosphair',
    'menu_position'=>15,
    'menu_icon'=>'dashicons-share',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'network',
    ],

]);
register_post_type('message', [
    'label' => 'Messages de contact',
    'labels' => [
        'name' => 'Messages de contact',
        'singular_name' => 'Message de contact',
    ],
    'description' => 'Les messages envoyés par le formulaire de contact.',
    'public' => false,
    'show_ui' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-buddicons-pm',
    'capabilities' => [
        'create_posts' => false,
        'read_post' => true,
        'read_private_posts' => true,
        'edit_posts' => true,
    ],
    'map_meta_cap' => true,
]);
function ecosphair_get_modules($count = 20){
    //1. on instancie l'objet WP_Query
    $modules = new WP_Query([
        //arguments
        'post_type' => 'module',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $modules;
}
function ecosphair_get_partners(){
    //1. on instancie l'objet WP_Query
    $partners = new WP_Query([
        //arguments
        'post_type' => 'partner',
        'order'=>'ASC',
    ]);
    //2. on retourne l'objet WP_Query
    return $partners;
}
function ecosphair_get_articles($count = 20){
    //1. on instancie l'objet WP_Query
    $articles = new WP_Query([
        //arguments
        'post_type' => 'article',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $articles;
}
function ecosphair_get_videos($count = 20){
    //1. on instancie l'objet WP_Query
    $videos = new WP_Query([
        //arguments
        'post_type' => 'video',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $videos;
}
function ecosphair_get_history(){
    //1. on instancie l'objet WP_Query
    $history = new WP_Query([
        //arguments
        'post_type' => 'history',
        'orderby' =>'date',
        'order'=>'ASC',
    ]);
    //2. on retourne l'objet WP_Query
    return $history;
}
function ecosphair_get_network(){
    //1. on instancie l'objet WP_Query
    $network = new WP_Query([
        //arguments
        'post_type' => 'network',
        'orderby' =>'date',
        'order'=>'ASC',

    ]);
    //2. on retourne l'objet WP_Query
    return $network;
}
register_nav_menu('primary', 'Navigation principale (haut de page)');
register_nav_menu('footer', 'Navigation de pied de page');
function ecosphair_get_menu_items($location)
{
    $items = [];

    // Récupérer le menu Wordpress pour $location
    $locations = get_nav_menu_locations();

    if (!($locations[$location] ?? false)) {
        return $items;
    }

    $menu = $locations[$location];

    // Récupérer tous les éléments du menu récupéré
    $posts = wp_get_nav_menu_items($menu);

    // Formater chaque élément dans une instance de classe personnalisée
    // Boucler sur chaque $post
    foreach ($posts as $post) {
        // Transformer le WP_Post en une instance de notre classe personnalisée
        $item = new PrimaryMenuItem($post);

        // Ajouter au tableau d'éléments de niveau 0.
        if (!$item->isSubItem()) {
            $items[] = $item;
            continue;
        }

        // Ajouter $item comme "enfant" de l'item parent.
        foreach ($items as $parent) {
            if (!$parent->isParentFor($item)) continue;

            $parent->addSubItem($item);
        }
    }

    // Retourner un tableau d'éléments du menu formatés
    return $items;
}
function ecosphair_get_template_page(string $template){
    $query = new WP_Query([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => $template . '.php',
            ],
        ]
    ]);
    return $query->posts[0] ?? null;
}
// Gérer l'envoi de formulaire personnalisé
add_action('admin_post_submit_contact_form', 'ecosphair_handle_submit_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'ecosphair_handle_submit_contact_form');

function ecosphair_handle_submit_contact_form() {
    // Instancier le controlleur du formulaire
    $form = new ContactFormController($_POST);
}

function ecosphair_get_contact_field_value($field) {
    if ( ! isset($_SESSION['contact_form_feedback'])) {
        return '';
    }

    return $_SESSION['contact_form_feedback']['data'][$field] ?? '';
}

function ecosphair_get_contact_field_error($field) {
    if ( ! isset($_SESSION['contact_form_feedback'])) {
        return '';
    }

    if ( ! ($_SESSION['contact_form_feedback']['errors'][$field] ?? null)) {
        return '';
    }

    return '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors'][$field] . '</p>';
}
function ecosphair_mix($path)
{
    //$path = 'js/script.js'
    $path = '/' . ltrim($path, "/");
    if (!realpath(__DIR__ . '/public' . $path)) {
        return '';
    }

    if (!($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
        return get_stylesheet_directory_uri() . '/public' . $path;

    }
    //Ouvrir le fichier mix-manifest.json
    $manifest = json_decode(file_get_contents($manifest), true);

    //Regarder si on a une clé qui correspond au fichier chargé dans $path
    if (!array_key_exists($path, $manifest)) {
        return get_stylesheet_directory_uri() . '/public' . $path;

    }
    //Recupérer le hash
    //Retourner la chemin versionné
    return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}