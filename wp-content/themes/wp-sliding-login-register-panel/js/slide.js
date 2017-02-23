jQuery(document).ready(function() {
	
	jQuery("#login").click(function () {
      jQuery("div#loginpanel").slideToggle("slow");
	  jQuery("div#registerpanel").hide();
    });
	
	jQuery("#register").click(function () {
      jQuery("div#registerpanel").slideToggle("slow");
	  jQuery("div#loginpanel").hide();
    });	
		
});
