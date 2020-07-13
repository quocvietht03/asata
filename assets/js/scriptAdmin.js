!(function($){
	"use strict";
	$(window).on('load', function() {
		var format = $('select[id^="post-format-selector"] option:selected, input:radio[name="post_format"]:checked').attr('value');
		console.log(format);
		$('#fw-option-post_options .fw-options-tabs-wrapper > .fw-options-tabs-list ul li').each(function(){
			$(this).css('display', 'none');
			var tab_val = $(this).attr('aria-controls').split('_').pop();
			if(tab_val == 'general'){
				$(this).css('display', 'block');
			}
			if(format == tab_val){
				$(this).css('display', 'block');
				$(this).find('a').trigger('click');
			}
		});
		$('select[id^="post-format-selector"], input:radio[name="post_format"]').change(function() {
			var format = $('select[id^="post-format-selector"] option:selected, input:radio[name="post_format"]:checked').attr('value');
			$('#fw-option-post_options .fw-options-tabs-wrapper > .fw-options-tabs-list ul li').each(function(){
				$(this).css('display', 'none');
				var tab_val = $(this).attr('aria-controls').split('_').pop();
				if(tab_val == 'general'){
					$(this).css('display', 'block');
				}
				if(format == tab_val){
					$(this).css('display', 'block');
					$(this).find('a').trigger('click');
				}
			});
		});
	});
})(jQuery);