String.prototype.format = function() {
  var args = arguments;
  return this.replace(/{(\d+)}/g, function(match, number) { 
    return typeof args[number] != 'undefined'
      ? args[number]
      : match
    ;
  });
};
$ = jQuery;
($(document).ready(
function() {  
$(".jscroll").on("click",function(e) {
e.preventDefault();
$(window).scrollTop($($(this).attr('href')).offset().top - 2 * $('.navbar').first().height()); //x2 because nav-bar shifts >_>
});

$("#tt").tooltip();
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
$('.astronomy').html(''); //freaking wordpress visual editor sometimes inserts a space between blank elements ;-: screws up layout
var counter = 0;
var isNarrow = $(window).width() < 979 && $(window).width() >= 768;
var max = isNarrow? 2 : 3;
// get 6 in case some aren't images for some reason (one time it was a video)
//in the future get more to make a slideshow
$.getJSON('https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q=http://www.acme.com/jef/apod/rss.xml&num=6&callback=?', function(data) {
for(var i = 0; i < 6; i++) { //in the future perhaps make background draggable because there's already that ease function

var src = data.responseData.feed.entries[i].content.match(/img src=\"([a-zA-Z0-9\_\.\/\:]*)\"/)[1];
if(src !== "") {
	counter +=1;
	$('.astronomy').append('<div class="' + (isNarrow? 'span6':'span4') + ' astro-wrapper"><div class="thumbnail astro" style="background-image:url(\'' +src + '\');"><div><h4><a class="caption-astro" href="' + data.responseData.feed.entries[i].link + '">' +  data.responseData.feed.entries[i].title + '</a></h4></div></div></div>');
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
		}));