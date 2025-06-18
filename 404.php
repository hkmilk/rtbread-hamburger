<?php

/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
    <?php get_sidebar(); ?>
      <div class="c-mainvisual c-mainvisual--archive">
            <div class="c-mainvisual__overlay"></div>
            <picture class="c-mainvisual__image  c-mainvisual__image--archive">
                <source srcset="<?php echo esc_url(get_template_directory_uri() . '/images/Pcthree-burgers-on-brown-wooden-tray-between-white-ceramic-1841108.png'); ?>" media="(min-width:835px)" type="image/jpg">
                <source srcset="<?php echo esc_url(get_template_directory_uri() . '/images/TbHerothree-burgers-on-brown-wooden-tray-between-white-ceramic-1841108.png'); ?>" media="(min-width: 376px)" type="image/jpg">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/sparchive_c5fdb44652d929835f716f4f39493e80.png'); ?>"  alt="Hamburger">
            </picture>
             <div class="c-mainvisual__title c-mainvisual__title--archive">
                <h2>ERROR:</h2>
                <?php
                $term = get_queried_object();
                if ($term && !is_wp_error($term)) {
                    echo '<p>' . esc_html($term->name) . '</p>';
                }
                ?>
             </div>
        </div>
            <div class="page-wrapper">
                <div class="page-content">
                    <h2><?php _e('404 NOT FOUND', 'rtbread'); ?></h2>
                    <p><?php _e('お探しのページは見つかりませんでした', 'rtbread'); ?></p>

                       <?php get_search_form(); ?>
 
                    <p class="not-search"><a href="<?php echo esc_url(home_url('/')); ?>">トップページへ戻る</a></p>
                </div>
            </div>
<?php get_footer(); ?>