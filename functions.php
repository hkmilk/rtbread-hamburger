<?php

/**
 * Theme setup functions for rtbread theme.
 *
 * @package rtbread
 */

/**
　　* Setup theme defaults and registers support for various WordPress features.
　　*
　　* @return void
 */
function rtbread_theme_setup()
{
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
        )
    );

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('editor-styles');
    add_theme_support('automatic-feed-links');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('align-wide');
    add_theme_support('custom-header');
    add_editor_style();
    register_nav_menus(
        array(
            'footer_nav'   => esc_html__('footer navigation', 'rtbread'),
            'category_nav' => esc_html__('category navigation', 'rtbread'),
            'sidebar_menu' => esc_html__('サイドバーのメニュー', 'rtbread'),
        )
    );
}

    add_action('after_setup_theme', 'rtbread_theme_setup');

function rtbread_script()
{
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=M+PLUS+1p&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap',
        array(),
        '1.0.0'
    );
    wp_enqueue_style(
        'ress',
        get_template_directory_uri()
        . '/css/ress.css',
        array(),
        filemtime(
            get_template_directory() . '/css/ress.css'
        )
    );
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array(),
        filemtime(
            get_template_directory() . '/style.css'
        )
    );
    wp_enqueue_style(
        'rtbread-style',
        get_template_directory_uri() . '/css/rtbread.css',
        array(),
        filemtime(
            get_template_directory() . '/css/rtbread.css'
        )
    );
    wp_enqueue_script(
        'jquery-local',
        get_template_directory_uri() . '/js/jquery-3.7.1.min.js',
        array(),
        '1.0.0',
        false
    );
    wp_enqueue_script(
        'menu-js',
        get_template_directory_uri() . '/js/menu.js',
        array(),
        '1.0.0',
        true
    );
    if (!is_admin() && is_front_page()) {
            wp_enqueue_style(
                'leaflet-css',
                'https://unpkg.com/leaflet@1.9.2/dist/leaflet.css',
                array(),
                '1.0.0'
            );
            wp_enqueue_script(
                'leaflet-js',
                'https://unpkg.com/leaflet@1.9.2/dist/leaflet.js',
                array(
                    'jquery',
                ),
                '1.0.0',
                true
            );
            wp_enqueue_script(
                'custom-script',
                get_template_directory_uri() . '/js/script.js',
                array( 'jquery' ),
                '1.0.0',
                true
            );
    }
}

add_action(
    'wp_enqueue_scripts',
    'rtbread_script'
);

function use_search_template_for_card($template)
{
    if (
        is_post_type_archive(
            'card'
        )
    ) {
                $new_template = locate_template(array( 'search.php' ));
        if ($new_template) {
                        return $new_template;
        }
    }
        return $template;
}
add_filter('archive_template', 'use_search_template_for_card');


remove_filter('the_content', 'wpautop');

function my_remove_search_body_class($classes)
{
    if (is_search()) {
                $classes = array_diff($classes, array( 'search', 'search-results' ));
    }
        return $classes;
}
add_filter('body_class', 'my_remove_search_body_class');

function exclude_specific_page_from_search($query)
{
    if ($query->is_search() && $query->is_main_query()) {
        $query->set('post__not_in', array( 31 ));
    }
}
add_action('pre_get_posts', 'exclude_specific_page_from_search');

function my_disable_redirect_canonical($redirect_url)
{
    if (is_single('カスタム投稿名')) {
        $redirect_url = false;
        return $redirect_url;
    }
}
add_filter('redirect_canonical', 'my_disable_redirect_canonical');

function rtbread_register_block_styles()
{
        register_block_style(
            'core/paragraph',
            array(
                    'name'         => 'highlight-yellow',
                    'label'        => '黄色マーカー',
                    'inline_style' => 'background-color: yellow;',
            )
        );
}
add_action('init', 'rtbread_register_block_styles');

function rtbread_register_block_pattern()
{
    register_block_pattern(
        'rtbread/simple-pattern',
        array(
            'title'       => 'シンプルな段落',
            'description' => '段落だけのカスタムパターン。',
            'content'     => '<!-- wp:paragraph --><p>カスタムパターンの段落テキスト</p><!-- /wp:paragraph -->',
        )
    );
}
add_action('init', 'rtbread_register_block_pattern');

function rtbread_enqueue_scripts()
{
    if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rtbread_enqueue_scripts');

function rtbread_widgets_init()
{
            register_sidebar(
                array(
                        'name'          => __('メインサイドバー', 'rtbread'),
                        'id'            => 'sidebar-1',
                        'description'   => __('サイトのサイドバーウィジェットエリアです。', 'rtbread'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
                        'after_title'   => "</h2>\n",
                )
            );
}
add_action('widgets_init', 'rtbread_widgets_init');
