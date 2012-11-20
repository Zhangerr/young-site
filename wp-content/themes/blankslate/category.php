<?php get_header(); ?>
<div class="row-fluid">
<div class="span9" style="">
<div id="content">
<?php the_post(); ?>
<h1 class="page-title"><?php _e( 'Category', 'blankslate' ) ?> <span><?php single_cat_title() ?></span></h1>
<?php //$categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
<?php rewind_posts(); ?>
<?php get_template_part( 'nav', 'above' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</div>
</div>
<div class="span3">
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>