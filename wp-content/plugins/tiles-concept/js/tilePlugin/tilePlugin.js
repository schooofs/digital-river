/*
 * Tile Plugin, jQuery
 * by Grandville Ricks. (c) 2013, Olson
 * Purpose: This custom plugin is used for displaying content beneath images.
 *			
 * Options: empty_msg : String. Message that gets displayed in the event we don't have any content for the image.
 *			tiles : Object. Contains the messages that will be displayed per image. Note: You can use HTML in the tile as well.
 *			openOnDefault: String. Used for specifying the default tile to open. We can open any tile on default.
 *			openAll: Boolean. Used for opening all of the tiles! Wee!
 *			layer_color: String. Used for the color of the layer
 *			highlight_borders: Boolean. Highlights the border on click.
 */ 
 
jQuery(function ($) {
	var methods = {
		init:function (options) {
			// Create some defaults, extending them with any options that were provided
			var settings = $.extend({
				'empty_msg':'Sorry, no content has been defined...',
				'tiles':{},
				'openOnDefault':'',
				'openAll':false,
				'layer_color':'#0099ff',
				'highlight_borders': false
			}, options);

			/*
			 * Relocate tiles if needed.
			 */
			$(window).resize(function () {
				/*
				 * Rebuild the HTML template if there was a resize.
				 */
				$('.tilePlugin-tile').prependTo($('.tilePlugin-row').parent());
				$('.tilePlugin-row').remove();

				if ($(window).width() > 760) {
					var tiles$ = $('.tilePlugin-tile');
					for (var i1 = 0; i1 < tiles$.length; i1++) {
						tiles$.eq(i1 * 3 + 0).add(tiles$.eq(i1 * 3 + 1)).add(tiles$.eq(i1 * 3 + 2)).wrapAll('<div class="tilePlugin-row"></div>');
					}

					// Ensures that when migrates from <640 to > 640 only one item is selected.
					$('.tilePlugin-row').each(function (index, element) {
						$(element).find('.tilePlugin-tile-selected').not($(element).find('.tilePlugin-tile-selected').eq(0)).removeClass('tilePlugin-tile-selected');
					});

					$('.tilePlugin-info').width(528);
				}
				else if ($(window).width() < 760 && $(window).width() > 640) {
					var tiles$ = $('.tilePlugin-tile');
					for (var i1 = 0; i1 < tiles$.length; i1++) {
						tiles$.eq(i1 * 2 + 0).add(tiles$.eq(i1 * 2 + 1)).wrapAll('<div class="tilePlugin-row"></div>');
					}

					// Ensures that when migrates from < 640 to > 640 only one item is selected.
					$('.tilePlugin-row').each(function (index, element) {
						$(element).find('.tilePlugin-tile-selected').not($(element).find('.tilePlugin-tile-selected').eq(0)).removeClass('tilePlugin-tile-selected');
					});

					$('.tilePlugin-info').width(325);
				}
				else {
					$('.tilePlugin-tile').wrap('<div class="tilePlugin-row"></div>');
					$('.tilePlugin-info').width(122);
				}

				$('.tilePlugin-tile-selected').trigger('click.tilePlugin');

				$('.tilePlugin-row .tilePlugin-tile').css({
					marginRight:'32px'
				});

				$('.tilePlugin-row').each(function(index,element){
					$(element).find('.tilePlugin-tile:last').css({
						marginRight:0
					});
				});
			});


			/*
			 * Add style classes to the tiles.
			 */
			this.parent().append('<br style="clear:both;" />');
			for (var i = 0; i < this.length; i++) {
				this.eq(i).addClass('tilePlugin-tile-image').wrap('<div class="tilePlugin-tile"></div>');
			}

			var this$ = this;

			/*
			 * Organize tiles in rows to easy the interaction and position.
			 * Only do this if is first_load, not on resize to not clutter the DOM.
			 */
			if ($(window).width() > 760) {
				for (var i1 = 0; i1 < this$.length; i1++) {
					this$.eq(i1 * 3 + 0).parent().add(this$.eq(i1 * 3 + 1).parent()).add(this$.eq(i1 * 3 + 2).parent()).wrapAll('<div class="tilePlugin-row"></div>');
				}
			}
			else if ($(window).width() < 760 && $(window).width() > 640) {
				for (var i1 = 0; i1 < this$.length; i1++) {
					this$.eq(i1 * 2 + 0).parent().add(this$.eq(i1 * 2 + 1).parent()).wrapAll('<div class="tilePlugin-row"></div>');
				}
			}
			else {
				for (var i2 = 0; i2 < this$.length; i2++) {
					this$.eq(i2).parent().wrap('<div class="tilePlugin-row tilePlugin-small"></div>');
				}
			}

			function widgetize(this$) {
				/*
				 * Return this to maintain jQuery chainability.
				 */
				return this$.parent().each(function () {
					if (settings.highlight_borders) {
						$(this).css({
							border: '3px solid gray'
						});
					}

					/*
					 * Bind required events.
					 */
					// Show info container when click on tile.
					$(this).bind('click.tilePlugin', function () {
						/*
						 * Tile specific behaviors.
						 */
						if (settings.openAll) {
							// Experimenting w/ opening all the tiles.
							$(this).parent().find('.tilePlugin-tile').removeClass('tilePlugin-tile-selected');

							if (settings.highlight_borders) {
								$(this).parent().find('.tilePlugin-tile').not($(this)).css({
									borderColor: 'gray'
								});

								$(this).css({
									borderColor: settings.layer_color
								});

								$(this).parent().find('.tilePlugin-tile').find('img').css({
									opacity:1
								});
							}
							else {
								$(this).parent().find('.tilePlugin-tile').not(this).find('img').css({
									opacity:1
								});
							}

							$(this).parent().find('.tilePlugin-info').remove();
						}
						else {
							$('.tilePlugin-tile').not(this).removeClass('tilePlugin-tile-selected');

							if (settings.highlight_borders) {
								$('.tilePlugin-tile').not($(this)).css({
									borderColor: 'gray'
								});

								$(this).css({
									borderColor: settings.layer_color
								});

								$('.tilePlugin-tile img').css({
									opacity:1
								});
							}
							else {
								$('.tilePlugin-tile img').not($(this).find('img')).css({
									opacity:1
								});
							}

							$('.tilePlugin-info').remove();
						}

						$(this).addClass('tilePlugin-tile-selected').css({
							backgroundColor:settings.layer_color
						});

						var info_box_width = '';
						if ($(window).width() > 760) {
							if(settings.highlight_borders) {
								info_box_width = 544;
							}
							else {
								info_box_width = 528;
							}
						}
						else if ($(window).width() < 760 && $(window).width() > 640) {
							if(settings.highlight_borders) {
								info_box_width = 335;
							}
							else {
								info_box_width = 325;
							}
						}
						else {
							if(settings.highlight_borders) {
								info_box_width = 129;
							}
							else {
								info_box_width = 122;
							}
						}
						$(this).parent().append('<div class="tilePlugin-info" style="display:none;width:' + info_box_width + 'px">' + ((settings.tiles[$(this).find('img').attr('id')]) ? settings.tiles[$(this).find('img').attr('id')] : settings.empty_msg) + '<a href="" onclick="return false;" class="tilePlugin-close">X</a></div>');
						$(this).parent().find('.tilePlugin-info').show();
					});

					// Handler for info container closing.
					$(this).parent().parent().on('click.tilePlugin', '.tilePlugin-close', function () {
						$(this).closest('.tilePlugin-row').find('.tilePlugin-tile').find('img').css({
							opacity:1
						});

						$(this).parent().hide();
						$('.tilePlugin-tile').removeClass('tilePlugin-tile-selected');
					});

					// Handler for tile hovering effects.
					$(this).parent().parent().on('mouseenter.tilePlugin', '.tilePlugin-tile', function () {
						$(this).css({
							backgroundColor:settings.layer_color
						});
						$(this).find('img').css({
							opacity:0.5
						});

						if(settings.highlight_borders){
							$(this).css({
								borderColor: settings.layer_color
							});
						}
					});

					$(this).parent().parent().on('mouseleave.tilePlugin', '.tilePlugin-tile', function () {
						if (!$(this).hasClass('tilePlugin-tile-selected')) {
							$(this).find('img').css({
								opacity:1
							});

							if(settings.highlight_borders){
								$(this).css({
									borderColor: 'gray'
								});
							}
						}
					});

					/*
					 * Initial showing of info box.
					 */
					if (settings.openOnDefault == $(this).find('img').attr('id')) {
						$(this).trigger('click.tilePlugin');
					}

					$('.tilePlugin-row .tilePlugin-tile').css({
						marginRight:'32px'
					});
					$('.tilePlugin-row').each(function(index,element){
						$(element).find('.tilePlugin-tile:last').css({
							marginRight:0
						});
					});
				});
			}

			// Run main function and ensures jQuery chainability.
			return widgetize(this);
		}
	};

	/*
	 * jQuery plugin factory declaration.
	 */
	$.fn.tilePlugin = function (method) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else {
			return methods.init.apply(this, arguments);
		}
	};
});