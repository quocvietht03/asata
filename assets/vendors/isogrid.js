jQuery(document).ready(function($) {
	'use strict';
	
	$('.bt-iso-grid').each(function(){
		var filter = $(this).find( '.bt-filters' ),
			grid = $(this).find( '.bt-isotope' ),
			container = grid.isotope( $(this).data( 'iso' ) ),
			loadmore = $(this).find( '.bt-load-more-wrap .bt-load-more' ),
			obj_loadMore = $(this).data( 'loadmore' ),
			showLoadMore = typeof obj_loadMore !== 'undefined' ? obj_loadMore.show_loadmore : 0, //number of items loaded on init
			initShow = typeof obj_loadMore !== 'undefined' ? parseInt(obj_loadMore.initShow): 6, //number of items loaded on init
			initLoad = typeof obj_loadMore !== 'undefined' ? parseInt(obj_loadMore.initLoad) : 3, //number of items onclick load more button
			counter = initShow, //counter for load more button
			iso = container.data('isotope'); // get Isotope instance
			
		// bind filter button click
		filter.on('click', '.bt-btn-filter', function(e) {
			e.preventDefault();
			var filterValue = $(this).attr('data-filter');
			container.isotope({
				filter: filterValue
			});
			
			updateFilterCounts();
		});
		
		// change is-checked class on buttons
		filter.each(function(i, buttonGroup) {
			var buttonGroup = $(buttonGroup);
			buttonGroup.on('click', '.bt-btn-filter', function() {
				buttonGroup.find('.is-checked').removeClass('is-checked');
				$(this).addClass('is-checked');
			});
		});
		
		updateFilterCounts();
		
		// flatten object by concatting values
		function concatValues( obj ) {
			var value = '';
			for ( var prop in obj ) {
				value += obj[ prop ];
			}
			return value;
		}

		function updateFilterCounts() {
			// get filtered item elements
			var itemElems = grid.isotope('getFilteredItemElements');
			var contElems = $( itemElems );
			
			filter.find('.bt-btn-filter').each( function( i, button ) {
				var button = $(this),
				filterValue = $(this).attr('data-filter');
				
				if ( !filterValue ) {
					// do not update 'any' buttons
					return;
				}
				
				var count = contElems.filter( filterValue ).length;
				button.find('.bt-count').text( count );
			});
			
		}
		
		
		loadMore(initShow); //execute function onload
		
		function loadMore(toShow) {
			
			if ( showLoadMore == 0 ) {
				// do not show load more button
				return;
			}
			
			container.find('.iso-hidden').removeClass('iso-hidden');

			var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
				return item.element;
			});
			$(hiddenElems).addClass('iso-hidden');
			container.isotope('layout');
			
			var count = hiddenElems.length;
			loadmore.find('.bt-count').text( count );
			
			//when no more to load, hide show more button
			if (hiddenElems.length == 0) {
				loadmore.parent().hide();
			} else {
				loadmore.parent().show();
			};
		}
		
		//when load more button clicked
		loadmore.click(function(e) {
			e.preventDefault();
			if (filter.data('clicked')) {
				//when filter button clicked, set initial value for counter
				counter = initShow;
				filter.data('clicked', false);
			} else {
				counter = counter;
			};
			counter = counter + initLoad;
			
			loadMore(counter);
		});

		//when filter button clicked
		filter.click(function() {
			$(this).data('clicked', true);
			loadMore(initShow);
		});
	});
});
