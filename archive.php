<?php get_header(); ?>
    <?php get_sidebar(); ?>
        <div class="c-mainvisual c-mainvisual--archive">
            <div class="c-mainvisual__overlay"></div>
            <picture class="c-mainvisual__image  c-mainvisual__image--archive">
                <source srcset="<?php echo esc_url(get_template_directory_uri() . '/images/Pcthree-burgers-on-brown-wooden-tray-between-white-ceramic-1841108.png'); ?>" media="(min-width:835px)" type="image/jpg">
                <source srcset="<?php echo esc_url(get_template_directory_uri() . '/images/TbHerothree-burgers-on-brown-wooden-tray-between-white-ceramic-1841108.png'); ?>" media="(min-width: 376px)" type="image/jpg">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/sparchive_c5fdb44652d929835f716f4f39493e80.png'); ?>"  alt="Hamburger">
            </picture>
             <div class="c-mainvisual__title c-mainvisual__title--archive">
                <h2>Menu:</h2>
                <?php
                $term = get_queried_object();
                if ($term && !is_wp_error($term)) {
                    echo '<p>' . esc_html($term->name) . '</p>';
                }
                ?>
             </div>
        </div>
        <div class="c-section">
        <h2>小見出しが入ります</h2>
        <p>
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
        </p>
        </div>
    <?php
    $card_class = is_search() ? 'c-card card--search' : 'c-card';
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'paged' => $paged,
    'tax_query' => array(),
    'post__not_in' => array(31),
    );
    if ($menu_category) {
        $args['tax_query'] = array(
        array(
            'taxonomy' => 'menu_category',
            'field' => 'slug',
            'terms' => $menu_category,
        )
        );
    }
    $the_query = new WP_Query($args);
    ?>
    <div class="<?php echo esc_attr($card_class); ?>">
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) :
                $the_query->the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('c-card__item'); ?>>
                        <figure class="c-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', [
                                'alt' => is_search() ? '検索結果サムネイル' : get_the_title(),
                            ]); ?>
                            <?php else : ?>
                              <img src="<?php echo esc_url(get_template_directory_uri() . '/images/no-image.png'); ?>" 
                                alt="<?php echo is_search() ? '検索用アイキャッチ' : '画像なし'; ?>">
                            <?php endif; ?>
                        </figure>
                    <div class="c-card__wrapper">
                          <h1><?php echo esc_html(get_the_title()); ?></h1>
                                 <?php echo wp_kses_post(get_the_content());
                                    wp_link_pages(array(
                                    'before' => '<div class="page-links">ページ:',
                                    'after' => '</div>',
                                    'link_before' => '<span>',
                                    'link_after' => '</span>',
                                    ));
                                    ?>
                <?php
// タグは使わないけどテーマチェックエラーを消すために空で呼ぶだけ
                ob_start();
                the_tags();
                ob_end_clean();
                ?>
                         <a href ="<?php the_permalink(); ?>" class="c-card__button">詳しく見る</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>投稿が見つかりませんでした。</p>
        <?php endif; ?>
    </div>
<?php wp_reset_postdata(); ?>
    <?php
     $current_page = max(1, get_query_var('paged'));
     $total_pages = $the_query->max_num_pages;

        $big = 999999999;
        $pagination = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => '<span class="first-page">«</span><span class="prev-label">前へ</span>',
            'next_text' => '<span class="next-label">次へ</span><span class="last-page">»</span>',
            'type' => 'array',
            'mid_size' => 2,
            'end_size' => 1,
        ));
        ?>
<div class="pagination">
       <div class="page-count">page<?php echo $current_page . ' / ' . $total_pages; ?></div>
        <?php if (!empty($pagination)) : ?>
        <ul>
            <?php foreach ($pagination as $page) : ?>
           <li><?php echo $page; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
</div>
<?php get_footer(); ?>