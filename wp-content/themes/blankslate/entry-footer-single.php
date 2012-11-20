<hr />
<div class="entry-footer muted">
<?php 
printf( __( 'Posted in %1$s%2$s.', 'blankslate' ),
get_the_category_list(', '),
get_the_tag_list( __( ' and tagged ', 'blankslate' ), ', ', '' ));
/*if ( comments_open() && pings_open() ) :
printf( __( '<a class="comment-link" href="#respond" title="Post a Comment">Post a Comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'blankslate' ), get_trackback_url() );
elseif ( !comments_open() && pings_open() ) :
printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for post" rel="trackback">Trackback URL</a>.', 'blankslate' ), get_trackback_url() );
elseif ( comments_open() && !pings_open() ) :
_e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a Comment">Post a Comment</a>.', 'blankslate' );
elseif ( !comments_open() && !pings_open() ) :
_e( 'Both comments and trackbacks are closed.', 'blankslate' );
endif;*/
//edit_post_link( __( 'Edit', 'blankslate' ), "\n\t\t\t\t\t | <span class=\"edit-link btn btn-mini\">", "</span>" );
?>
</div> 