<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
<?php _e('お探しのページは見つかりません。.', 'ntheme'); ?>
</div>

<p><?php _e('下記の原因が考えられます:', 'ntheme'); ?></p>
<ul>
<li><?php _e('アドレスの入力ミスかもしれません。', 'ntheme'); ?></li>
<li><?php _e('リンク先の記事が期限切れになっているかもしれません。', 'ntheme'); ?></li>
</ul>

<?php get_search_form(); ?>
