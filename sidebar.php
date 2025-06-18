<?php
    $aside_class = 'l-aside';

if (is_archive() || is_search()) {
    $aside_class .= ' l-aside--archive';
}

if (is_single() || is_page()) {
    $aside_class .= ' l-aside--archive l-aside--single';
}
?>
    <nav class="<?php echo esc_attr($aside_class); ?>">
        <button class="l-button__menu l-drawer-menu js-drawer-menu">Menu</button>
        <ul class="l-aside__container">
             <li>
                <div class="l-aside-list"><a href="<?php echo get_term_link('burger', 'menu_category'); ?>">バーガー</a></div>
                    <ul class="l-aside-list__item">
                       <li><a href="<?php echo get_term_link('hamburger', 'menu_category'); ?>">ハンバーガー</a></li>
                       <li><a href ="<?php echo get_term_link('cheeseburger', 'menu_category'); ?>">チーズバーガー</a></li>
                       <li><a href ="<?php echo get_term_link('teriyaki-flavored-hamburger', 'menu_category'); ?>">テリヤキバーガー</a></li>
                       <li><a href ="<?php echo get_term_link('avocado-burger', 'menu_category'); ?>">アボカドバーガー</a></li>
                       <li><a href ="<?php echo get_term_link('fish-burger', 'menu_category'); ?>">フィッシュバーガー</a></li>
                       <li><a href ="<?php echo get_term_link('bacon-burger', 'menu_category'); ?>">ベーコンバーガー</a></li>
                       <li><a href ="<?php echo get_term_link('chicken-burger', 'menu_category'); ?>">チキンバーガー</a></li>
                    </ul>
            </li>
            <li>
                <div class="l-aside-list"><a href ="<?php echo get_term_link('side-menu', 'menu_category'); ?>">サイド</a></div>
                     <ul class="l-aside-list__item">
                        <li><a href ="<?php echo get_term_link('potato', 'menu_category'); ?>">ポテト</a></li>
                        <li><a href ="<?php echo get_term_link('salad', 'menu_category'); ?>">サラダ</a></li>
                        <li><a href ="<?php echo get_term_link('nugget', 'menu_category'); ?>">ナゲット</a></li>
                        <li><a href ="<?php echo get_term_link('corn', 'menu_category'); ?>">コーン</a></li>
                     </ul>
            </li>
            <li>
                <div class="l-aside-list"><a href ="<?php echo get_term_link('drink', 'menu_category'); ?>">ドリンク</a></div>
                    <ul class="l-aside-list__item">
                        <li><a href ="<?php echo get_term_link('cola', 'menu_category'); ?>">コーラ</a></li>
                        <li><a href ="<?php echo get_term_link('fanta', 'menu_category'); ?>">ファンタ</a></li>
                        <li><a href ="<?php echo get_term_link('orange', 'menu_category'); ?>">オレンジ</a></li>
                        <li><a href ="<?php echo get_term_link('apple', 'menu_category'); ?>">アップル</a></li>
                        <li><a href ="<?php echo get_term_link('tea', 'menu_category'); ?>">紅茶（Ice/Hot）</a></li>
                        <li><a href ="<?php echo get_term_link('coffee', 'menu_category'); ?>">コーヒー（Ice/Hot）</a></li>
                    </ul>
            </li>        
        </ul>
    </nav>
    <?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
    <?php else : ?>
    <aside id="secondary" class="widget-area">
        <!-- ウィジェットは使わない想定なので、固定のHTMLなど置いておく -->
    </aside>
    <?php endif; ?>

 <div class="overlay"></div>