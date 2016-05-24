<?php
// load wordpress into template
$path = $_SERVER['DOCUMENT_ROOT']."/mdbofny";
define('WP_USE_THEMES', false);
require($path .'/wp-load.php');

$author = intval($_GET['q']);
    global $author;
    $author_query = array('posts_per_page' => '-1','author' => $author);
    $author_posts = new WP_Query($author_query);
    while($author_posts->have_posts()) : $author_posts->the_post();
?>
	<div class="users_post">
    <div class="featured_thumb"><?php  the_post_thumbnail(array(80,80))  ?></div>
	<div class="users_post_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></br> </div>      
	</div>
    <?php           
    endwhile;
?>
