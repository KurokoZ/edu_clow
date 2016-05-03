(function($)
{
	$(document).ready(function() {
		$('.styleswitch').click(function()
		{	
			switchStylestyle(this.getAttribute("rel"));
			var background = "/myadmin/Public/images/"+this.getAttribute("rel")+".jpg"; 
			$(".md-content").css("background","url("+background+") no-repeat");
			$(".md-content").css("background-size","100% 100%");
			return false;
		});
		var c = readCookie('style');
		var background = "/myadmin/Public/images/"+c+".jpg"; 
		$(".md-content").css("background","url("+background+") no-repeat");
		$(".md-content").css("background-size","100% 100%");
		if (c) switchStylestyle(c);
	});

	function switchStylestyle(styleName)
	{
		$('link[rel*=style][title]').each(function(i) 
		{
			this.disabled = true;
			if (this.getAttribute('title') == styleName) this.disabled = false;
		});
		createCookie('style', styleName, 365);
	}
})(jQuery);

// Cookie functions
function createCookie(name,value,days)
{
	if (days)
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name)
{
	createCookie(name,"",-1);
}

// Switcher
	jQuery('.demo_changer .demo-icon').click(function(){

		if(jQuery('.demo_changer').hasClass("active")){
			jQuery('.demo_changer').animate({"right":"-145px"},function(){
				jQuery('.demo_changer').toggleClass("active");
			});						
		}else{
			jQuery('.demo_changer').animate({"right":"0px"},function(){
				jQuery('.demo_changer').toggleClass("active");
			});			
		} 
	});