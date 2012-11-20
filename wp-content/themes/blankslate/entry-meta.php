<?php global $authordata; ?>
<div class="entry-meta muted" style="border-bottom-style:solid;border-bottom-width:2px;border-bottom-color:rgb(90,150,200); padding-bottom:10px;">
<span class="meta-prep meta-prep-author"><i class="icon-pencil"></i> <?php _e('By', 'blankslate'); ?> </span>
<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'blankslate' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
<span class="meta-sep"> | </span>
<span class="meta-prep meta-prep-entry-date"><i class="icon-calendar"></i> <?php _e('Published', 'blankslate'); ?> </span>
<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
</div>
 <br /> 