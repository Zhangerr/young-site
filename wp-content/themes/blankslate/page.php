
<?php get_header(); ?>

<article id="content">
<?php the_post(); ?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="entry-title"><?php if(get_the_title() != "Home"){the_title();echo "<br />";} ?></h1>
<?php if($post->post_parent != 0) {
$permalink = get_permalink($post->post_parent); 
$title = get_the_title($post->post_parent);
?>
<a class="muted" href="<?php echo $permalink; ?>">&laquo; Back to <?php echo $title?> </a> <br /><br />
<?php } ?>
<div class="entry-content" >
<?php 
if ( has_post_thumbnail() ) {
the_post_thumbnail();
} 
?>
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
<?php //edit_post_link( __( 'Edit', 'blankslate' ), '<div class="btn edit-link">', '</div>' ) ?>
</div>
</div>
<?php comments_template( '', true ); ?>
</article>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>