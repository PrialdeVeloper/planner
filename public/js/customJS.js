!function(p){"use strict";p("body").vide({mp4:"files/background/video/bg.mp4",poster:"files/background/video/img/bg-mobile-fallback.jpg"},{posterType:"jpg"})}(jQuery);

$(function(){
	$("#indexButton").click(function(){
		$(location).attr('href', '/planner/public/home/register');
	});
});

