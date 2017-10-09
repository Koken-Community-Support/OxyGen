(function(window, document, $, undefined){
	window.OxyGenCovers = {};

	OxyGenCovers.init = function() {
		OxyGenCovers.cacheSelectors();
		OxyGenCovers.setCoverHeight();
		OxyGenCovers.sizeCoverTitle();
	}

	OxyGenCovers.cacheSelectors = function() {
		OxyGenCovers.window		= $(window);
		OxyGenCovers.expanded	= $("header.expanded");
		OxyGenCovers.cover		= $("header.cover");
		OxyGenCovers.h1title	= $(".cover_inside h1");
	}

	OxyGenCovers.setCoverHeight = function() {
		var windowHeight = OxyGenCovers.window.outerHeight() - OxyGenCovers.expanded.outerHeight();
		OxyGenCovers.cover.css("height",windowHeight);
	}

	OxyGenCovers.sizeCoverTitle = function() {
		OxyGenCovers.h1title.fitText(1.2,{
			minFontSize:"{{ settings.cover_title_min}}px",
			maxFontSize:"{{ settings.cover_title_max}}px"
		})
	}
	$(document).on("ready",OxyGenCovers.init),
	$(window).on("resize",OxyGenCovers.init);
})(window, document, jQuery);
