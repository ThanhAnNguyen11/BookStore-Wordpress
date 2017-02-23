jQuery(document).ready(function($) {
    $("ul.products li").each(function (i) {
        $(this).attr("style", "-webkit-animation-delay:" + i * options.delay + "ms;"
                + "-moz-animation-delay:" + i * options.delay + "ms;"
                + "-o-animation-delay:" + i * options.delay + "ms;"
                + "animation-delay:" + i * options.delay + "ms;");
        if (i == $("ul.products li").size() -1) {
            $("ul.products").addClass("play")
        }
    });

	$('ul.products li').hover(function() {
		$(this).find('h3').addClass(options.title+' animated');
		$(this).find('span.price').addClass(options.price+' animated');
		$(this).find('img').addClass(options.thumb+' animated');
		$(this).find('span.onsale').addClass(options.sale+' animated');
		$(this).find('a.add_to_cart_button').addClass(options.cart+' animated');
	}, function() {
		$(this).find('span.price').removeClass(options.price+' animated');
		$(this).find('h3').removeClass(options.title+' animated');
		$(this).find('img').removeClass(options.thumb+' animated');
		$(this).find('span.onsale').removeClass(options.sale+' animated');
		$(this).find('a.add_to_cart_button').removeClass(options.cart+' animated');
	});   
});