$(document).ready(function () {
	var call_toastr = function (msg, type, time, position, parentElm) {
		if (!position) {
			position = "position-fixed bottom-0 end-0";
		}
		let classFind = position.replaceAll(" ", ".");
		if (!time) {
			time = 3000;
		}
		let html = "";
		let hasContainer = ($(".toast-container." + classFind).length > 0);
		let icon = "";
		let bg = "";
		let textColor = "";
		if (type == "success") {
			icon = '<i class="bi bi-check-circle" style="vertical-align: .125em"></i>';
			bg = "bg-success bg-gradient";
			textColor = "text-white";
		} else if (type == "info") {
			icon = '<i class="bi bi-info-circle" style="vertical-align: .125em"></i>';
			bg = "bg-info bg-gradient";
			textColor = "text-white";
		} else if (type == "warning") {
			icon = '<i class="bi bi-exclamation-triangle" style="vertical-align: .125em"></i>';
			bg = "bg-warning bg-gradient";
			textColor = "text-white";
		} else if (type == "error") {
			icon = '<i class="bi bi-x-circle" style="vertical-align: .125em"></i>';
			bg = "bg-danger bg-gradient";
			textColor = "text-white";
		}
		if (!hasContainer) {
			html += `<div class="toast-container ${position}">`;
		}
		html += `<div class="toast ${bg} ${textColor}" role="alert" aria-live="assertive" data-delay="${time}"
         aria-atomic="true">
		<div class="toast-body d-flex">
			 <div class="me-2 ml-auto">
				${icon}
			 </div>
			  ${msg}
			<button type="button" class="btn-close btn-close-white ms-2 mr-auto" data-dismiss="toast" aria-label="Close"></button>
		</div>
    </div>`;
		
		let elmContainer;
		if (!hasContainer) {
			html += `</div>`;
			if (parentElm) {
				parentElm.append(html);
			} else {
				$("body").append(html);
			}
			elmContainer = $(".toast-container." + classFind);
		} else {
			elmContainer = $(".toast-container." + classFind);
			elmContainer.append(html);
		}
		
		elmContainer.find(".toast:not(.fade)")[0].addEventListener('hidden.bs.toast', function (e) {
			e.target.remove();
			if (elmContainer.find(".toast").length == 0) {
				elmContainer.remove();
			}
		});
		
		elmContainer.find(".toast:not(.fade)").toast("show");
	};
	
	function callSearch(el) {
		if (el.closest('#mainSearch').hasClass('active')) {
			el.closest('#mainSearch').removeClass('active');
		} else {
			el.closest('#mainSearch').addClass('active');
		}
	}
	
	var toggleSidebar = function () {
		$('.template-administrator .toggleSidebar, .sidebar-overlay').click(function () {
			$('.template-administrator').toggleClass('active-sidebar');
		});
	}
	toggleSidebar();
	
	var checkAll = function () {
		$(document).on("click", "#checkall", function () {
			if ($(".mycheckbox").is(":checked")) {
				$('.mycheckbox').prop('checked', false);
			} else {
				$('.mycheckbox').prop('checked', true);
			}
		});
	}
	checkAll();
	
	
	let windowWidth = $(window).width();
	if (windowWidth < 992) {
		if ($('.template-administrator').hasClass('active-sidebar')) {
			$('.template-administrator').removeClass('active-sidebar')
		}
	}
	$('.template-administrator .sidebar-overlay').click(function (e) {
		$('.home-page').removeClass('active-sidebar');
	});
	
	$('#mainSearch button.search-icon, #mainSearch button.close').click(function (e) {
		if (!$(this).closest('#mainSearch').hasClass('active')) {
			e.preventDefault();
		}
		callSearch($(this));
	});
	
	if ($('[data-toggle=tooltip]').length) {
		$('[data-toggle="tooltip"]').tooltip();
	}
	
	$('.template-administrator24-switch input').click(function () {
		let title_on = $(this).data('title-on'),
			title_off = $(this).data('title-off');
		if ($(this).is(':checked')) {
			$(this).attr('data-original-title', title_on).tooltip('hide');
		} else {
			$(this).attr('data-original-title', title_off).tooltip('hide');
		}
	});
	
	if ($('.template-administrator24-switch input').length) {
		$('.template-administrator24-switch input').each(function (i, e) {
			if ($(e).data('toggle') == 'tooltip') {
				if ($(e).is(':checked')) {
					$(e).attr('data-original-title', $(e).data('title-on'));
				} else {
					$(e).attr('data-original-title', $(e).data('title-off'));
				}
			}
		})
	}
})