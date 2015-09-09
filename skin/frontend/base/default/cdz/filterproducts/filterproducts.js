function loadProductBlock($wrap,postData){
	wrapTop = $wrap.offset().top;
	scrollTop = jQuery(window).scrollTop();
	winHeight = jQuery(window).height();
	if( (scrollTop + winHeight) >= wrapTop ){
		if( !$wrap.hasClass('loaded') ){
			$wrap.addClass('loaded');
			$loader = $wrap.find('.cdz-loader-wrap');
			$loader.show();
			jQuery.ajax({		
				url: loadProductsUrl,
				type: 'POST',
				dataType:"json",
				data: postData,
				cache: false,
				success: function(res){
					$loader.hide(200,'linear',function(){
						$wrap.append(res.html);
					});
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
				}
			}).always(function(){ $loader.hide(); });
		}
	}
}