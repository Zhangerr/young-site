<?php get_header(); ?>

<div class="row-fluid">
<div class="span9" style="">
<div id="content">

<?php get_template_part( 'nav', 'above' ); ?>
<?php while ( have_posts() ) : the_post() ?>

<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</div>
</div>
<div class="span3">
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
