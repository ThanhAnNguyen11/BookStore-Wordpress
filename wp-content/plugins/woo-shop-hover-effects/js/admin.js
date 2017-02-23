jQuery(document).ready(function($) {
	$('#wcp-loader').hide();
	$('#wcp-saved').hide();
	$('#wcp-animatedwoo').submit(function(event) {
		event.preventDefault();
		$('#wcp-loader').show();
		$('#wcp-saved').hide();
		data = $(this).serialize();
		data = data + '&action=wcp_woo_save_settings';
		$.post(ajaxurl, data, function(resp) {
			$('#wcp-loader').hide();
			$('#wcp-saved').show();
		});
	});
});