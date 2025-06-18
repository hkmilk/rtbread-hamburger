<?php
if (post_password_required()) {
    return;
}
?>
<?php if (have_comments()) : ?>
        <h2 id="comments" class="p-comment__ttl">Comment</h2>
        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
        <?php
        wp_list_comments(array(
            'style'      => 'ol',
            'avatar_size' => 48,
        ));
        ?>
    </ol>
        <?php the_comments_navigation(); ?>
<?php endif; ?>

<?php
if (! comments_open() && get_comments_number()) :
    ?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'rtbread'); ?></p>
<?php endif; ?>

<?php
if (comments_open()) {
    comment_form();
}
?>