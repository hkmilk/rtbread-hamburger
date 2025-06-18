<?php
 $footer_class = 'l-footer';

if (is_archive() || is_search() || is_page()) {
    $footer_class .= ' l-footer--archive';
}
if (is_single() || is_page()) {
    $footer_class .= ' l-footer--single';
}
?>


<footer class="<?php echo esc_attr($footer_class); ?>">
    <div class="l-footer__menu">
        <ul>
            <li><a href="<?php echo get_permalink(get_page_by_path('shop')); ?>">ショップ情報</a></li>
            <li class="l-footer__border"></li>
            <li><a href="<?php echo get_permalink(get_page_by_path('history')); ?>">ヒストリー</a></li>
            <p class="l-copyright">Copyright: RaiseTech</p>
        </ul>
    </div>
    <div class="l-footer__image"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/pc_footer.png'); ?>"  alt="footer"></div>
</footer>

</div>

<?php wp_footer(); ?>