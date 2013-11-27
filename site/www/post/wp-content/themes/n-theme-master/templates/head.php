<!DOCTYPE html>
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> xmlns:og="http://ogp.me/ns#"xmlns:fb="http://www.facebook.com/2008/fbml">
<head profile="http://gmpg.org/xfn/11">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php if (have_posts()):while(have_posts()):the_post();endwhile;endif;?>
<!-- Facebook Opengraph -->
<?php if (is_home()) { ?>
    <meta property="og:url" content="<?php echo home_url(); ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:type" content="article" />
<?php } else { ?>
    <meta property="og:url" content="<?php the_permalink() ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:title" content="<?php single_post_title(''); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <meta property="og:type" content="article" />
<?php } ?>
<?php if(has_post_thumbnail()) { ?>
    <meta property="og:image" content="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id, ”, true); echo $image_url[0]; ?>" />
<?php } else { ?>
    <meta property="og:image" content="<?php echo home_url(); ?>/ogp.png" />
<?php } ?>

<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
