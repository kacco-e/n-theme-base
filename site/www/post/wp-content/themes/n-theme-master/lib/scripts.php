<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function ntheme_scripts() {
  wp_enqueue_style('ntheme_main', get_home_url() . '/css/main.min.css', false, '9dbd7d094ab56a14e3b2a984b20ea357');
  wp_enqueue_style('ntheme_custom', get_home_url() . '/css/custom.css', false, '9dbd7d094ab56a14e3b2a984b20ea357');

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'ntheme_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_home_url() . '/js/vendor/modernizr-2.7.0.min.js', false, null, false);
  wp_register_script('ntheme_scripts', get_home_url() . '/js/scripts.min.js', false, 'be373268f9b8ecda7c3a45154676e637', true);
  wp_register_script('ntheme_scripts_custom', get_home_url() . '/js/custom.min.js', false, 'be373268f9b8ecda7c3a45154676e637', true);
  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('ntheme_scripts');
  wp_enqueue_script('ntheme_scripts_custom');
}
add_action('wp_enqueue_scripts', 'ntheme_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function ntheme_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_home_url() . '/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'ntheme_jquery_local_fallback');

function ntheme_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'ntheme_google_analytics', 20);
}
