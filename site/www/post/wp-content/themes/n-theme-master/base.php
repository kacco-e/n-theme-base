<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
<?php _e('お使いのブラウザーは古いようです。<a href="http://browsehappy.com/">こちら</a>をご確認していただき適切にアップデートしてください。', 'ntheme'); ?>
</div>
<![endif]-->

<?php
  do_action('get_header');
  // Use Bootstrap's navbar if enabled in config.php
  if (current_theme_supports('bootstrap-top-navbar')) {
    get_template_part('templates/header-top-navbar');
  } else {
    get_template_part('templates/header');
  }
?>

<div class="wrap container" role="document">
<div class="content row">
<main class="main <?php echo ntheme_main_class(); ?>" role="main">
<?php include ntheme_template_path(); ?>
</main><!-- /.main -->
<?php if (ntheme_display_sidebar()) : ?>
<aside class="sidebar <?php echo ntheme_sidebar_class(); ?>" role="complementary">
<?php include ntheme_sidebar_path(); ?>
</aside><!-- /.sidebar -->
<?php endif; ?>
</div><!-- /.content -->
</div><!-- /.wrap -->

<?php get_template_part('templates/footer'); ?>

</body>
</html>