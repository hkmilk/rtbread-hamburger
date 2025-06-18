<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $meta_description = 'ハンバーガーショップ';
    if (is_archive() && is_search()) {
        $meta_description = 'アーカイブサーチ';
    } elseif (is_archive()) {
        $meta_description = 'アーカイブ';
    } elseif (is_single()) {
        $meta_description = 'シングル';
    } elseif (is_page()) {
        $meta_description = 'ページ';
    }
    ?>
    <meta name="description" content="<?php echo esc_attr($meta_description); ?>">
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
<?php
$grid_class = 'l-grid-container';
if (is_archive() || is_search()) {
    $grid_class .= ' p-grid-container';
}
if (is_single() || is_page()) {
    $grid_class .= ' article-grid-container';
}

$form_name_attr = '';
$form_value_attr = '';
$form_input_class  = 'search';
$form_button_type  = 'button';

if (is_archive() || is_single() || is_page()) {
    $form_name_attr = 'name="q"';
    $form_input_class = 'search searchInput';
    $form_button_type = 'submit';
}
if (is_search() && is_archive()) {
    $form_value_attr  = 'value="' . esc_attr(get_search_query()) . '"';
}
?>
<div class="<?php echo esc_attr($grid_class); ?>">
        <header class="l-header">
             <h1 class="l-header__logo">
               <a href="<?php echo esc_url(home_url('/')); ?>">Hamburger</a>
             </h1>
             <div class="c-form">
  <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <span>
      <input
        type="text"
        name="s"
        class="search"
        placeholder=""
      >
    </span>
    <span>
      <input
        type="submit"
        class="button"
        value="検索"
      >
    </span>
  </form>
</div>

          
             <button class="l-button__tb js-drawer-menu">Menu</button>
        </header>








