
// Navbar Scrollblack 
	$(window).on('scroll',function()
	{
		if ($(window).scrollTop())
		{
	  			$('nav').addClass('black');
	  			$('nav a').addClass('white');
	  	}
	  	else
	  	{
	  			$('nav').removeClass('black');
	  			$('nav a').removeClass('white');
	  	}
	})
	  
// Navbar Scrollblack//
