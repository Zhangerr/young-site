
</div>
</div>
<div class="clear"></div>
</div>
</div>
<footer> 
<!--credits for one sided box shadow: http://stackoverflow.com/questions/4756316/css3-box-shadows-in-one-direction-only -->

<div class="container-fluid">
<div class="row-fluid">
<div class="span10 offset1" id="footer-lists">
<div class="row-fluid">
<div class="span3">
<h5><i class="icon-home icon-white"></i> Navigation</h5>
<ul>
<li><a href="/">Home</a></li>
<li><a href="http://sctritons.schoolloop.com">Grades</a></li>
<li>Contact</li>
<li>About</li>
<li><a href="wp-login.php">Login</a></li>
</ul>
</div>
<div class="span3">
<h5><i class="icon-list icon-white"></i> Subjects</h5>
<ul>
<li>Conceptual Physics</li>
<li>Chemistry</li>
<li>IB Chemistry</li>
<li>IB Physics</li>
<li>Honors Physics</li>
</ul>
</div>
<div class="span3"><h5><i class="icon-heart icon-white"></i> Leisure</h5>
<ul>
<li>Morph Mr. Young</li>
<li>Astronomy Corner</li>
</ul></div>
<div class="span3"><h5><i class="icon-user icon-white"></i> Contact</h5>
<strong class="contact-title">EMAIL</strong><hr class="contact-hr" /><i class="icon-envelope icon-white"></i> <a href='mailto:GYYOUNG@capousd.org'>gyyoung@capousd.org</a> <br /><br />
<strong class="contact-title">Work Phone</strong><hr class="contact-hr" /><i class="icon-phone icon-white"></i> (949)-492-4165  ext. 2504 <br /> <br />
<strong class="contact-title" >Best time to call</strong> <hr class="contact-hr" /><i class="icon-calendar icon-white"></i> M,T,W and F before 9 A.M.
</div>

</div>
<br />
&copy; <a href="http://code.google.com/p/schs-site">SCHS Web Design Club</a> 2012 | Built with <a href="http://twitter.github.com/bootstrap/">Bootstrap</a> and <a href="http://wordpress.org">Wordpress</a> | <a href="#">Top</a><br /><br /></div></div></div>

<div id="copyright">
<?php //echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date('Y'), esc_html(get_bloginfo('name')) ); echo sprintf( __( ' Theme By: %1$s', 'blankslate' ), '<a href="http://tidythemes.com/">TidyThemes</a>' ); ?>
</div>
</footer>

<?php wp_footer(); ?>
	<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
//move to external js later
String.prototype.format = function() {
  var args = arguments;
  return this.replace(/{(\d+)}/g, function(match, number) { 
    return typeof args[number] != 'undefined'
      ? args[number]
      : match
    ;
  });
};

		   $(document).ready(function() {  
		   
/*	var url = "http://apod.nasa.gov/apod/astropix.html"; http://edspencer.net/tag/apod read this
	var html = "";
	$.getJSON("http://query.yahooapis.com/v1/public/yql?"+
"q=select%20*%20from%20html%20where%20url%3D%22"+
encodeURIComponent(url)+
"%22&format=xml'&callback=?",function(data) {html = data.results[0];var parser = new DOMParser();
var doc = parser.parseFromString(html, "text/xml");
var link = "http://apod.nasa.gov/apod/" + doc.firstChild.firstElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.getAttribute("href");
$(".cosmos").html('<img class="img-polaroid" style="max-width:25%" src="' + link + '"/>');}); */


     var $win = $(window)
      , $nav = $('.navbar')
	  , navHeight = $('.navbar').first().height()
      , navTop = $('.navbar').length && $('.navbar').offset().top - navHeight
      , isFixed = 0

    processScroll()

    $win.on('scroll', processScroll)

    function processScroll() {
      var i, scrollTop = $win.scrollTop()
      if (scrollTop >= navTop && !isFixed) {
        isFixed = 1
        $nav.addClass('navbar-fixed-top')
      } else if (scrollTop <= navTop && isFixed) {
        isFixed = 0
        $nav.removeClass('navbar-fixed-top')
      }
    }
if($('.astronomy').length > 0) {
var counter = 0;
var isNarrow = $(window).width() < 979 && $(window).width() >= 768;
var max = isNarrow? 2 : 3;
$.getJSON('https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q=http://www.acme.com/jef/apod/rss.xml&num=6&callback=?', function(data) {
for(var i = 0; i < 6; i++) { //in the future perhaps make background draggable because there's already that ease function

var src = data.responseData.feed.entries[i].content.match(/img src=\"([a-zA-Z0-9\_\.\/\:]*)\"/)[1];
if(src !== "") {
	counter +=1;
	/*<div class="span4">
<div class="thumbnail astro1"><img src="http://placehold.it/300x200" alt="" /></div>
</div>
<div class="span4">
<div class="thumbnail astro2"><img src="http://placehold.it/300x200" alt="" /></div>
</div>
<div class="span4">
<div class="thumbnail astro3"><img src="http://placehold.it/300x200" alt="" /></div>
</div>*/
	//$('.astro'+counter).html("<img style='box-shadow:0px 0px 5px #000;' src=\"" + src+"\" /> <hr style='margin-bottom:0px' /><b style='font-size: 11px;'>" + data.responseData.feed.entries[i].title + "</b>");
	//http://src.sencha.io/" + $(".astro"+counter).width() + "/"
	if(!isNarrow) {
	$('.astronomy').append('<div class="span4 astro-wrapper"><div class="thumbnail astro" style="background-image:url(\'' +src + '\');height:250px;background-position:center;"><div style="padding:5px;background-color:black;color:whitesmoke;opacity:.8;"><h4 style="padding:0px;margin:0px;"><a class="caption-astro" href="' + data.responseData.feed.entries[i].link + '">' +  data.responseData.feed.entries[i].title + '</a></h4></div></div></div>');
	} else {
	$('.astronomy').append('<div class="span6 astro-wrapper"><div class="thumbnail astro" style="background-image:url(\'' +src + '\');height:250px;background-position:center;"><div style="padding:5px;background-color:black;color:whitesmoke;opacity:.8;"><h4 style="padding:0px;margin:0px;"><a class="caption-astro" href="' + data.responseData.feed.entries[i].link + '">' +  data.responseData.feed.entries[i].title + '</a></h4></div></div></div>');
	
	}
	//$('.astro'+counter).css({"background-image":"url('" +src + "')","height":"250px","background-position":"center"});
	
	//console.log(src + counter);
	if(counter == max) { 
	break;
	}
}
}
})
}
//maybe switch this to media queries
$(window).resize(function() {
var isNarrow = $(window).width() < 979 && $(window).width() >= 768;
if(isNarrow) {
$('.astro-wrapper').each(function(i, e){
switch(i) {
case 0:
case 1:
if($(this).hasClass('span4'))
	$(this).toggleClass('span4 span6');
break;
case 2:
if($(this).is(":visible"))
	$(this).hide();
break;
}
});

} else {
$('.astro-wrapper').each(function(i, e){
switch(i) {
case 0:
case 1:
if($(this).hasClass('span6'))
	$(this).toggleClass('span6 span4');
break;
case 2:
if(!$(this).is(":visible"))
	$(this).show();
break;
}
});
}
});
		});
</script>
</body>
</html>