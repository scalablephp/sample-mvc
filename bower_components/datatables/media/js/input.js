/**
 * Sometimes for quick navigation, it can be useful to allow an end user to
 * enter which page they wish to jump to manually. This paging control uses a
 * text input box to accept new paging numbers (arrow keys are also allowed
 * for), and four standard navigation buttons are also presented to the end
 * user.
 *
 *  @name Navigation with text input
 *  @summary Shows an input element into which the user can type a page number
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @author [Gordey Doronin](http://github.com/GDoronin)
 *
 *  @example
 *    $(document).ready(function() {
 *        $('#example').dataTable( {
 *            "pagingType": "input"
 *        } );
 *    } );
 */

(function ($) {
	function calcDisableClasses(oSettings) {
		var start = oSettings._iDisplayStart;
		var length = oSettings._iDisplayLength;
		var visibleRecords = oSettings.fnRecordsDisplay();
		var all = length === -1;

		// Gordey Doronin: Re-used this code from main jQuery.dataTables source code. To be consistent.
		var page = all ? 0 : Math.ceil(start / length);
		var pages = all ? 1 : Math.ceil(visibleRecords / length);

		var disableFirstPrevClass = (page > 0 ? '' : "uk-disabled");
		var disableNextLastClass = (page < pages - 1 ? '' : "uk-disabled");

		return {
			'first': disableFirstPrevClass,
			'previous': disableFirstPrevClass,
			'next': disableNextLastClass,
			'last': disableNextLastClass
		};
	}

	function calcCurrentPage(oSettings) {
		return Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
	}

	function calcPages(oSettings) {
		return Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength);
	}

	var previousClassName = 'previous';
	var nextClassName = 'next';

	var paginateClassName = 'paginate';
	var paginateOfClassName = 'paginate_of';
	var paginatePageClassName = 'paginate_page';
	var paginateInputClassName = 'input';

	$.fn.dataTableExt.oPagination.input = {
		'fnInit': function (oSettings, nPaging, fnCallbackDraw) {
			var language = oSettings.oLanguage.oPaginate;
			var classes = oSettings.oClasses;

			var npaginate = document.createElement('ul');
			var nPrevious = document.createElement('li');
			var nNext = document.createElement('li');
			var nParentInput = document.createElement('div');
			var nInput = document.createElement('input');
			var nPage = document.createElement('li');
			var nOf = document.createElement('li');

			nPage.innerHTML = Lang.get('strings.page');
			nPrevious.innerHTML = '<a href="javascript:void(0);" aria-controls="'+ oSettings.sTableId +'" tabindex="'+ oSettings.iTabIndex +'">'+ language.sPrevious +'</a>';
			nNext.innerHTML = '<a href="javascript:void(0);" aria-controls="'+ oSettings.sTableId +'" tabindex="'+ oSettings.iTabIndex +'">'+ language.sNext +'</a>';
			nPrevious.className = previousClassName + ' ' + classes.sPageButton;
			nNext.className = nextClassName + ' ' + classes.sPageButton;
			nPage.className = paginatePageClassName;
			nOf.className = paginateOfClassName;
			nInput.type = 'text';
			nInput.className = paginateInputClassName;
			if (oSettings.sTableId !== '') {
				nPaging.setAttribute('id', oSettings.sTableId + '_' + paginateClassName);
				nPaging.classList.remove('input');
				nPaging.classList.add('simple_numbers');
				npaginate.classList.add('uk-pagination');
				nPrevious.setAttribute('id', oSettings.sTableId + '_' + previousClassName);
				nNext.setAttribute('id', oSettings.sTableId + '_' + nextClassName);
			}
			nParentInput.appendChild(nInput);
			nParentInput.className = classes.sPageButton;
			nPaging.appendChild(npaginate);
			npaginate.appendChild(nPrevious);
			npaginate.appendChild(nPage);
			npaginate.appendChild(nParentInput);
			npaginate.appendChild(nOf);
			npaginate.appendChild(nNext);

			$(nPrevious).click(function() {
				var iCurrentPage = calcCurrentPage(oSettings);
				if (iCurrentPage !== 1) {
					oSettings.oApi._fnPageChange(oSettings, 'previous');
					fnCallbackDraw(oSettings);
				}
			});

			$(nNext).click(function() {
				var iCurrentPage = calcCurrentPage(oSettings);
				if (iCurrentPage !== calcPages(oSettings)) {
					oSettings.oApi._fnPageChange(oSettings, 'next');
					fnCallbackDraw(oSettings);
				}
			});

			$(nInput).keyup(function (e) {
				// 38 = up arrow, 39 = right arrow
				if (e.which === 38 || e.which === 39) {
					this.value++;
				}
				// 37 = left arrow, 40 = down arrow
				else if ((e.which === 37 || e.which === 40) && this.value > 1) {
					this.value--;
				}

				if (this.value === '' || this.value.match(/[^0-9]/)) {
					/* Nothing entered or non-numeric character */
					this.value = this.value.replace(/[^\d]/g, ''); // don't even allow anything but digits
					return;
				}

				var iNewStart = oSettings._iDisplayLength * (this.value - 1);
				if (iNewStart < 0) {
					iNewStart = 0;
				}
				if (iNewStart >= oSettings.fnRecordsDisplay()) {
					iNewStart = (Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength) - 1) * oSettings._iDisplayLength;
				}

				oSettings._iDisplayStart = iNewStart;
				fnCallbackDraw(oSettings);
			});

			// Take the brutal approach to cancelling text selection.
			$('li', npaginate).bind('mousedown', function () { return false; });
			$('li', npaginate).bind('selectstart', function() { return false; });

			// If we can't page anyway, might as well not show it.
			var iPages = calcPages(oSettings);
			if (iPages <= 1) {
				$(nPaging).hide();
			}
		},

		'fnUpdate': function (oSettings) {
			if (!oSettings.aanFeatures.p) {
				return;
			}

			var iPages = calcPages(oSettings);
			var iCurrentPage = calcCurrentPage(oSettings);

			var an = oSettings.aanFeatures.p;
			if (iPages <= 1) // hide paging when we can't page
			{
				$(an).hide();
				return;
			}

			var disableClasses = calcDisableClasses(oSettings);

			$(an).show();
			var cl = $(an).attr('class');
			//$('.' + cl + ' .' + pr)
			// Enable/Disable `prev` button.
			$('.' + cl + ' .' + previousClassName)
				.removeClass("uk-disabled")
				.addClass(disableClasses[previousClassName]);

			// Enable/Disable `next` button.
			$('.' + cl + ' .' + nextClassName)
				.removeClass("uk-disabled")
				.addClass(disableClasses[nextClassName]);

			// Paginate of N pages text
			$('.' + cl + ' .' + paginateOfClassName).html(Lang.get('strings.of') + iPages);

			// Current page numer input value
			$('.' + cl + ' .' + paginateInputClassName).val(iCurrentPage);
		}
	};
})(jQuery);
