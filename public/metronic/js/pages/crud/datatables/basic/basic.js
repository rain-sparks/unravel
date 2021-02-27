"use strict";
var KTDatatablesBasicBasic = function () {
	var currentUrl = window.location;
	$(document).ready(function () {
		$.ajaxSetup({
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
			}
		});
	});
	
	var initTable1 = function () {
		const ss_dtables = [
			"#users",
			"#orders",
			"#customers",
			"products",
		]
		let table = $(`.table:not(${ss_dtables.join(',')})`);

		// begin first table
		table.DataTable({
			pageLength: 10,
			responsive: true,
			order: [[1, "desc"]]
		});

		const ss_dtables_v2 = [
			"#subscription_tbl"
		]
		table = $(`.table${ss_dtables_v2.join(',')}`);

		// begin first table
		table.DataTable({
			pageLength: 10,
			responsive: true,
			order: []
		});

	};
	
	
	
	
	
	
	return {
		//main function to initiate the module
		init: function () {
			initTable1();
			initTable2();
		},
		
	};
	
}();

const deleteHandler = (href, warn) => {
	warn = warn || false
	if (warn) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, confirm!'
		}).then((result) => {
			if (result.value) {
				deleteHandler(href)
			}
		})
		return
	}
	window.location.href = href
}

jQuery(document).ready(function () {
	KTDatatablesBasicBasic.init();
});

const deleteUserHandler = (href, warn) => {
	warn = warn || false
	if (warn) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete!'
		}).then((result) => {
			if (result.value) {
				deleteUserHandler(href)
			}
		})
		return
	}
	window.location.href = href
}
