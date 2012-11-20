<?php get_header(); ?>
<div class="row-fluid" style="padding-top:20px;padding-bottom:20px;">
<div class="span9" style="">
<article id="content">
<?php // get_template_part( 'nav', 'above-single' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template('', true); ?>
<?php endwhile; endif; ?>
<br />
<?php get_template_part( 'nav', 'below-single' ); ?>
</article>
</div>

<div class="span3">
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
