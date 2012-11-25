<?php
function wpbootstrap_scripts_with_jquery()
{
  // Register the script like this for a theme:
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(
    'jquery'
  ));
  wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array(
    'bootstrap',
    'jquery'
  ));
  // For either a plugin or a theme, you can then enqueue the script:
  wp_enqueue_script('custom');
  wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery');



add_action('after_setup_theme', 'blankslate_setup');
//load extra-editor-styles.css in tinymce
add_editor_style('css/bootstrap.min.css');
add_editor_style('css/font-awesome.css');
add_filter('tiny_mce_before_init', 'myCustomTinyMCE');
/* Custom CSS styles on TinyMCE Editor */
if (!function_exists('myCustomTinyMCE'))
{
  function myCustomTinyMCE($init)
  {
    $init['theme_advanced_styles'] = 'Button=btn btn-primary; table=table table-striped table-bordered; Alert=alert; Alert-info=alert-info;Alert-success=alert-success;Alert-error=alert-error;badge=badge;badge-success=badge badge-success;badge-important=badge badge-important';
    return $init;
  }
}
function tcb_add_tinymce_buttons($tinyrowthree)
{
  $tinyrowthree[] = 'hr';
  $tinyrowthree[] = 'sub';
  $tinyrowthree[] = 'sup';
  return $tinyrowthree;
}
add_filter('mce_buttons_3', 'tcb_add_tinymce_buttons');




function blankslate_setup()
{
  load_theme_textdomain('blankslate', get_template_directory() . '/languages');
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  global $content_width;
  if (!isset($content_width))
    $content_width = 640;
  register_nav_menus(array(
    'main-menu' => __('Main Menu', 'blankslate')
  ));
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
  if (get_option('thread_comments'))
  {
    wp_enqueue_script('comment-reply');
  }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
  if ($title == '')
  {
    return 'Untitled';
  }
  else
  {
    return $title;
  }
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
  return $title . esc_attr(get_bloginfo('name'));
}
add_filter('comment_form_defaults', 'blankslate_comment_form_defaults');
function blankslate_comment_form_defaults($args)
{
  $req                          = get_option('require_name_email');
  $required_text                = sprintf(' ' . __('Required fields are marked %s', 'blankslate'), '<span class="required">*</span>');
  $args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'blankslate') . ($req ? $required_text : '') . '</p>';
  $args['title_reply']          = __('Post a Comment', 'blankslate');
  $args['title_reply_to']       = __('Post a Reply to %s', 'blankslate');
  return $args;
}
add_action('init', 'blankslate_set_default_widgets');
function blankslate_set_default_widgets()
{
  if (is_admin() && isset($_GET['activated']))
  {
    update_option('sidebars_widgets', $preset_widgets);
  }
}
add_action('init', 'blankslate_add_shortcodes');
function blankslate_add_shortcodes()
{
  add_filter('widget_text', 'do_shortcode');
  add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
  add_shortcode('caption', 'fixed_img_caption_shortcode');
}
function fixed_img_caption_shortcode($attr, $content = null)
{
  $output = apply_filters('img_caption_shortcode', '', $attr, $content);
  if ($output != '')
    return $output;
  extract(shortcode_atts(array(
    'id' => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  ), $attr));
  if (1 > (int) $width || empty($caption))
    return $content;
  if ($id)
    $id = 'id="' . esc_attr($id) . '" ';
  return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '">' . do_shortcode($content) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
  register_sidebar(array(
    'name' => __('Sidebar Widget Area', 'blankslate'),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
}
$preset_widgets = array(
  'primary-aside' => array(
    'search',
    'pages',
    'categories',
    'archives'
  )
);
function blankslate_get_page_number()
{
  if (get_query_var('paged'))
  {
    print ' | ' . __('Page ', 'blankslate') . get_query_var('paged');
  }
}
function blankslate_catz($glue)
{
  $current_cat = single_cat_title('', false);
  $separator   = "\n";
  $cats        = explode($separator, get_the_category_list($separator));
  foreach ($cats as $i => $str)
  {
    if (strstr($str, ">$current_cat<"))
    {
      unset($cats[$i]);
      break;
    }
  }
  if (empty($cats))
    return false;
  return trim(join($glue, $cats));
}
function blankslate_tag_it($glue)
{
  $current_tag = single_tag_title('', '', false);
  $separator   = "\n";
  $tags        = explode($separator, get_the_tag_list("", "$separator", ""));
  foreach ($tags as $i => $str)
  {
    if (strstr($str, ">$current_tag<"))
    {
      unset($tags[$i]);
      break;
    }
  }
  if (empty($tags))
    return false;
  return trim(join($glue, $tags));
}
function blankslate_commenter_link()
{
  $commenter = get_comment_author_link();
  if (ereg('<a[^>]* class=[^>]+>', $commenter))
  {
    $commenter = preg_replace('/(<a[^>]* class=[\'"]?)/', '\\1url ', $commenter);
  }
  else
  {
    $commenter = preg_replace('/(<a )/', '\\1class="url "', $commenter);
  }
  $avatar_email = get_comment_author_email();
  $avatar       = str_replace("class='avatar", "class='photo avatar", get_avatar($avatar_email, 80));
  echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function my_nav_list($content)
{
 	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => false, 'link_before' => '', 'link_after' => '');
	$args = $defaults;
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;
	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['depth']=1;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );
	if ( $menu )
		$menu = '<ul class="nav nav-pills">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['menu_class']) . '">' . $menu . "</div>\n";
	
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;


  
}
add_filter('wp_page_menu', 'my_nav_list');
function my_edit_link($content)
{
  $content = str_replace('post-edit-link', 'post-edit-link btn btn-mini', $content);
  return str_replace("Edit Post\">", "Edit Post\"><i class=\"icon-edit\"></i> ", $content);
}
add_filter('edit_post_link', 'my_edit_link');
/**
 * Adds Foo_Widget widget.
 */
class Categories_Widget extends WP_Widget
{
  /**
   * Register widget with WordPress.
   */
  public function __construct()
  {
    parent::__construct('categories_widget', // Base ID
      'Categories v2', // Name
      array(
      'description' => __('A custom categories widget that utilizes bootstrap', 'text_domain')
    ) // Args
      );
  }
  
  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  function widget($args, $instance)
  {
    extract($args);
    
    $title = apply_filters('widget_title', empty($instance['title']) ? __('Categories') : $instance['title'], $instance, $this->id_base);
    $c     = !empty($instance['count']) ? '1' : '0';
    $h     = !empty($instance['hierarchical']) ? '1' : '0';
    $d     = !empty($instance['dropdown']) ? '1' : '0';
    
    //echo $before_widget;
    //if ( $title )
    //		echo $before_title . $title . $after_title;
    
    $cat_args = array(
      'orderby' => 'name',
      'show_count' => $c,
      'hierarchical' => $h
    );
    
    if ($d)
    {
      $cat_args['show_option_none'] = __('Select Category');
      wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
?>

<script type='text/javascript'>
/* <![CDATA[ */
	var dropdown = document.getElementById("cat");
	function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php
      echo home_url();
?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
	}
	dropdown.onchange = onCatChange;
/* ]]> */
</script>

<?php
    }
    else
    {
?>
		<ul class="nav nav-list well" style="margin-top:20px;">
		<li class="nav-header">Categories</li>
		<li class="divider"></li>
<?php
      $cat_args['title_li'] = '';
      wp_list_categories(apply_filters('widget_categories_args', $cat_args));
?>
		</ul>
<?php
    }
    
    echo $after_widget;
  }
  
  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  function update($new_instance, $old_instance)
  {
    $instance                 = $old_instance;
    $instance['title']        = strip_tags($new_instance['title']);
    $instance['count']        = !empty($new_instance['count']) ? 1 : 0;
    $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
    $instance['dropdown']     = !empty($new_instance['dropdown']) ? 1 : 0;
    
    return $instance;
  }
  
  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  function form($instance)
  {
    //Defaults
    $instance     = wp_parse_args((array) $instance, array(
      'title' => ''
    ));
    $title        = esc_attr($instance['title']);
    $count        = isset($instance['count']) ? (bool) $instance['count'] : false;
    $hierarchical = isset($instance['hierarchical']) ? (bool) $instance['hierarchical'] : false;
    $dropdown     = isset($instance['dropdown']) ? (bool) $instance['dropdown'] : false;
?>
		<p><label for="<?php
    echo $this->get_field_id('title');
?>"><?php
    _e('Title:');
?></label>
		<input class="widefat" id="<?php
    echo $this->get_field_id('title');
?>" name="<?php
    echo $this->get_field_name('title');
?>" type="text" value="<?php
    echo $title;
?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php
    echo $this->get_field_id('dropdown');
?>" name="<?php
    echo $this->get_field_name('dropdown');
?>"<?php
    checked($dropdown);
?> />
		<label for="<?php
    echo $this->get_field_id('dropdown');
?>"><?php
    _e('Display as dropdown');
?></label><br />

		<input type="checkbox" class="checkbox" id="<?php
    echo $this->get_field_id('count');
?>" name="<?php
    echo $this->get_field_name('count');
?>"<?php
    checked($count);
?> />
		<label for="<?php
    echo $this->get_field_id('count');
?>"><?php
    _e('Show post counts');
?></label><br />

		<input type="checkbox" class="checkbox" id="<?php
    echo $this->get_field_id('hierarchical');
?>" name="<?php
    echo $this->get_field_name('hierarchical');
?>"<?php
    checked($hierarchical);
?> />
		<label for="<?php
    echo $this->get_field_id('hierarchical');
?>"><?php
    _e('Show hierarchy');
?></label></p>
<?php
  }
  
} // class Foo_Widget
// register Foo_Widget widget
add_action('widgets_init', create_function('', 'register_widget( "categories_widget" );'));
function blankslate_custom_comments($comment, $args, $depth)
{
  $GLOBALS['comment']       = $comment;
  $GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php
  comment_ID();
?>" <?php
  comment_class();
?>>
<div class="comment-author vcard"><?php
  blankslate_commenter_link();
?></div>
<div class="comment-meta"><?php
  printf(__('Posted %1$s at %2$s', 'blankslate'), get_comment_date(), get_comment_time());
?><span class="meta-sep"> | </span> <a href="#comment-<?php
  echo get_comment_ID();
?>" title="<?php
  _e('Permalink to this comment', 'blankslate');
?>"><?php
  _e('Permalink', 'blankslate');
?></a>
<?php
  edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>');
?></div>
<?php
  if ($comment->comment_approved == '0')
  {
    echo '\t\t\t\t\t<span class="unapproved">';
    _e('Your comment is awaiting moderation.', 'blankslate');
    echo '</span>\n';
  }
?>
<div class="comment-content">
<?php
  comment_text();
?>
</div>
<?php
  if ($args['type'] == 'all' || get_comment_type() == 'comment'):
    comment_reply_link(array_merge($args, array(
      'reply_text' => __('Reply', 'blankslate'),
      'login_text' => __('Login to reply.', 'blankslate'),
      'depth' => $depth,
      'before' => '<div class="comment-reply-link">',
      'after' => '</div>'
    )));
  endif;
?>
<?php
}
function blankslate_custom_pings($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php
  comment_ID();
?>" <?php
  comment_class();
?>>
<div class="comment-author"><?php
  printf(__('By %1$s on %2$s at %3$s', 'blankslate'), get_comment_author_link(), get_comment_date(), get_comment_time());
  edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>');
?></div>
<?php
  if ($comment->comment_approved == '0')
  {
    echo '\t\t\t\t\t<span class="unapproved">';
    _e('Your trackback is awaiting moderation.', 'blankslate');
    echo '</span>\n';
  }
?>
<div class="comment-content">
<?php
  comment_text();
?>
</div>
<?php
}