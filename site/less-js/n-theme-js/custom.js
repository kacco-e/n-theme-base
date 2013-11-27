/* ------------------------------------------------------------------------
 * link
 * ------------------------------------------------------------------------- */

$(function(){
	$('a[href^=#]').click(function(){
		var speed = 500;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$("html, body").animate({scrollTop:position}, speed, "swing");
		return false;
	});
});


/* ------------------------------------------------------------------------
 * hover
 * ------------------------------------------------------------------------- */

$(document).ready(
  function(){
    $("a img").hover(function(){
       $(this).fadeTo("normal", 0.6); // マウスオーバー時にmormal速度で、透明度を60%にする
    },function(){
       $(this).fadeTo("normal", 1.0); // マウスアウト時にmormal速度で、透明度を100%に戻す
    });
  });
