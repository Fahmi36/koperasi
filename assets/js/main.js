	function terimapinjaman(id) {
		$.ajax({
			url: BASE_URL + 'PinjamController/TerimaPinjaman',
			type: 'post',
			data: {id: id},
			success:function(response) {
				location.reload();
			}
		})
	}
	function tolakpinjaman(id) {
		$.ajax({
			url: BASE_URL + 'PinjamController/TolakPinjaman',
			type: 'POST',
			data: {id: id},
			success:function() {
				location.reload();
			}
		})
		
	}
	function lanjutPinjam(id) {
		$.ajax({
			url: BASE_URL + 'PinjamController/LanjutkanPinjam',
			type: 'post',
			data: {id: id},
			success:function(response) {
				location.reload();
			}
		})
	}
	function batalPinjam(id) {
		$.ajax({
			url: BASE_URL + 'PinjamController/BatalPinjam',
			type: 'POST',
			data: {id: id},
			success:function() {
				location.reload();
			}
		})
		
	}
	function infopinjaman(id) {
		$.ajax({
			url: BASE_URL + 'Action/InfoPinjaman',
			type: 'POST',
			dataType: 'html',
			data: {id: id},
			success: function (respon) {
				$("#modalpinjam").html(respon);
				$("#showmodalpinjam").modal({backdrop:'static',keyboard: false});
			}
		});
	}
	function infosimpan(id) {
		$.ajax({
			url: BASE_URL + 'Action/InfoSimpan',
			type: 'POST',
			dataType: 'html',
			data: {id: id},
			success: function (respon) {
				$("#modalsimpan").html(respon);
				$("#showmodalsimpan").modal({backdrop:'static',keyboard: false});
			}
		});
	}
	function tolaksimpan(id) {
		Swal.fire({
			title: 'Apakah Anda Yakin Ingin Menolak Data Ini ?',
			text: "Klik Ya",
			type: 'success',
			buttonsStyling: false,
			showCancelButton: true,
			confirmButtonClass: 'btn btn-info',
			cancelButtonClass: 'btn btn-danger',
			confirmButtonText: 'Ya',
			preConfirm: () => { 
				$.ajax({
					url: BASE_URL + 'SimpanController/AccSimpananAnggota',
					type: "POST",
					dataType:'json',
					data: {id:id,status:'2'},
					beforeSend:function(argument) {
						$(".loader-overlay").removeAttr('style');
					},
					success: function (response) {
						if (response.success == false) {
							Swal.fire(
								''+response.msg+'',
								);
						}else{
							console.log(response);	
						}

					}
				})
			}
		})
	}
	function terimasimpan(id) {
		Swal.fire({
			title: 'Apakah anda Menyetujui data ini ?',
			text: "Klik Ya",
			type: 'success',
			buttonsStyling: false,
			showCancelButton: true,
			confirmButtonClass: 'btn btn-info',
			cancelButtonClass: 'btn btn-danger',
			confirmButtonText: 'Ya',
			preConfirm: () => { 
				$.ajax({
					url: BASE_URL + 'SimpanController/AccSimpananAnggota',
					type: "POST",
					dataType:'json',
					data: {id:id,status:'1'},
					beforeSend:function(argument) {
						$(".loader-overlay").removeAttr('style');
					},
					success: function (response) {
						if (response.success == false) {
							Swal.fire(
								''+response.msg+'',
								);
						}else{
							console.log(response);					
						}
					}
				})
			}
		})
	}
	(function ($) {
$("#formbayarpinjam").submit(function (event) {
			var data = new FormData($(this)[0]);
			Swal.fire({
				title: 'Apakah Data Sudah benar ?',
				text: "Klik Ya",
				type: 'success',
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonClass: 'btn btn-info',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'Ya',
				preConfirm: () => { 
					$.ajax({
						url: BASE_URL + 'PinjamController/BuktiBayarPinjaman',
						type: "POST",
						dataType:'json',
						data: data,
						contentType: false,
						cache: false,
						processData: false,
						beforeSend:function(argument) {
							$(".loader-overlay").removeAttr('style');
						},
						success: function (response) {
							if (response.success == false) {
								Swal.fire(
									''+response.msg+'',
									);
							}else{
								Swal.fire(
									'Silakan Menunggu Konfirmasi dari petugas',
									);
							}

						},
						error: function () {
							Swal.fire(
								'"'+response.msg+'"',
								'Hubungi Tim Terkait',
								);
						}
					});
				}
			});
		});
		$("#formpinjam").submit(function (event) {
			var data = new FormData($(this)[0]);
			Swal.fire({
				title: 'Data Sudah benar ?',
				text: "Klik Ya",
				type: 'success',
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonClass: 'btn btn-info',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'Ya',
				preConfirm: () => { 
					$.ajax({
						url: BASE_URL + 'PinjamController/pinjamUang',
						type: "POST",
						dataType:'json',
						data: data,
						contentType: false,
						cache: false,
						processData: false,
						beforeSend:function(argument) {
							$(".loader-overlay").removeAttr('style');
						},
						success: function (response) {
							if (response.success == false) {
								Swal.fire(
									''+response.msg+'',
									);
							}else{
								$.ajax({
									url: BASE_URL + 'Action/ModalPinjam',
									type: 'POST',
									dataType: 'html',
									data: {id: response.msg},
									success: function (respon) {
										$("#wadahmodal").html(respon);
										$("#modalreview").modal({backdrop:'static',keyboard: false});
									}
								});
							}

						},
						error: function () {
							Swal.fire(
								'"'+response.msg+'"',
								'Hubungi Tim Terkait',
								);
						}
					});
				}
			});
		});
		$("#fromlogin").submit(function (event) {
			var data = new FormData($(this)[0]);
			$.ajax({
				url: BASE_URL + 'Action/actLogin',
				type: "POST",
				dataType:'json',
				data: data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend:function(argument) {
					$(".loader-overlay").removeAttr('style');
				},
				success: function (response) {
					if (response.success == false) {
						Swal.fire(
							''+response.msg+'',
							);
					}else{
						window.location.href= BASE_URL;
					}

				},
				error: function () {
					Swal.fire(
						'"'+response.msg+'"',
						'Hubungi Tim Terkait',
						);
				}
			});
		});
		$("#formsimpan").submit(function (event) {
			var data = new FormData($(this)[0]);
			Swal.fire({
				title: 'Data Sudah benar ?',
				text: "Klik Ya",
				type: 'success',
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonClass: 'btn btn-info',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'Ya',
				preConfirm: () => { 
					$.ajax({
						url: BASE_URL + 'SimpanController/Simpanan',
						type: "POST",
						data: data,
						dataType:'json',
						contentType: false,
						cache: false,
						processData: false,
						beforeSend:function(argument) {
							$(".loader-overlay").removeAttr('style');
						},
						success: function (response) {
							Swal.fire(
								''+response.msg+'',
								);
							$("#formsimpan")[0].reset();
							location.reload();
						},
						error: function () {
							Swal.fire(
								'"'+response.msg+'"',
								'Hubungi Tim Terkait',
								);
						}
					});
					return false;
				}
			});
		});
		$("#ubahrekening").submit(function (event) {
			var data = new FormData($(this)[0]);
			Swal.fire({
				title: 'Data Sudah benar ?',
				text: "Klik Ya",
				type: 'success',
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonClass: 'btn btn-info',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'Ya',
				preConfirm: () => { 
					$.ajax({
						url: BASE_URL + 'action/tambahRek',
						type: "POST",
						data: data,
						dataType:'json',
						contentType: false,
						cache: false,
						processData: false,
						beforeSend:function(argument) {
							$(".loader-overlay").removeAttr('style');
						},
						success: function (response) {
							Swal.fire(
								''+response.msg+'',
								);
							$("#ubahrekening")[0].reset();
							location.reload();
						},
						error: function () {
							Swal.fire(
								'"'+response.msg+'"',
								'Hubungi Tim Terkait',
								);
						}
					});
					return false;
				}
			});
		});
		"use strict";
		$(".chosen")[0] && $(".chosen").chosen({
			width: "100%",
			allow_single_deselect: !0
		});
		/*--------------------------
		 auto-size Active Class
		 ---------------------------- */	
		 $(".auto-size")[0] && autosize($(".auto-size"));
		/*--------------------------
		 Collapse Accordion Active Class
		 ---------------------------- */	
		 $(".collapse")[0] && ($(".collapse").on("show.bs.collapse", function(e) {
		 	$(this).closest(".panel").find(".panel-heading").addClass("active")
		 }), $(".collapse").on("hide.bs.collapse", function(e) {
		 	$(this).closest(".panel").find(".panel-heading").removeClass("active")
		 }), $(".collapse.in").each(function() {
		 	$(this).closest(".panel").find(".panel-heading").addClass("active")
		 }));
		/*----------------------------
		 jQuery tooltip
		 ------------------------------ */
		 $('[data-toggle="tooltip"]').tooltip();
		/*--------------------------
		 popover
		 ---------------------------- */	
		 $('[data-toggle="popover"]')[0] && $('[data-toggle="popover"]').popover();
		/*--------------------------
		 File Download
		 ---------------------------- */	
		 $('.btn.dw-al-ft').on('click', function(e) {
		 	e.preventDefault();
		 });
		/*--------------------------
		 Sidebar Left
		 ---------------------------- */	
		 $('#sidebarCollapse').on('click', function () {
		 	$('#sidebar').toggleClass('active');

		 });
		 $('#sidebarCollapse').on('click', function () {
		 	$("body").toggleClass("mini-navbar");
		 	SmoothlyMenu();
		 });
		 $('.menu-switcher-pro').on('click', function () {
		 	var button = $(this).find('i.nk-indicator');
		 	button.toggleClass('notika-menu-befores').toggleClass('notika-menu-after');

		 });
		 $('.menu-switcher-pro.fullscreenbtn').on('click', function () {
		 	var button = $(this).find('i.nk-indicator');
		 	button.toggleClass('notika-back').toggleClass('notika-next-pro');
		 });
		/*--------------------------
		 Button BTN Left
		 ---------------------------- */	

		 $(".nk-int-st")[0] && ($("body").on("focus", ".nk-int-st .form-control", function() {
		 	$(this).closest(".nk-int-st").addClass("nk-toggled")
		 }), $("body").on("blur", ".form-control", function() {
		 	var p = $(this).closest(".form-group, .input-group"),
		 	i = p.find(".form-control").val();
		 	p.hasClass("fg-float") ? 0 == i.length && $(this).closest(".nk-int-st").removeClass("nk-toggled") : $(this).closest(".nk-int-st").removeClass("nk-toggled")
		 })), $(".fg-float")[0] && $(".fg-float .form-control").each(function() {
		 	var i = $(this).val();
		 	0 == !i.length && $(this).closest(".nk-int-st").addClass("nk-toggled")
		 });
		/*--------------------------
		 mCustomScrollbar
		 ---------------------------- */	
		 $(window).on("load",function(){
		 	$(".widgets-chat-scrollbar").mCustomScrollbar({
		 		setHeight:460,
		 		autoHideScrollbar: true,
		 		scrollbarPosition: "outside",
		 		theme:"light-1"
		 	});
		 	$(".notika-todo-scrollbar").mCustomScrollbar({
		 		setHeight:445,
		 		autoHideScrollbar: true,
		 		scrollbarPosition: "outside",
		 		theme:"light-1"
		 	});
		 	$(".comment-scrollbar").mCustomScrollbar({
		 		autoHideScrollbar: true,
		 		scrollbarPosition: "outside",
		 		theme:"light-1"
		 	});
		 });
	/*----------------------------
	 jQuery MeanMenu
	 ------------------------------ */
	 jQuery('nav#dropdown').meanmenu();

	/*----------------------------
	 wow js active
	 ------------------------------ */
	 new WOW().init();
	 
	/*----------------------------
	 owl active
	 ------------------------------ */  
	 $("#owl-demo").owlCarousel({
	 	autoPlay: false, 
	 	slideSpeed:2000,
	 	pagination:false,
	 	navigation:true,	  
	 	items : 4,
	 	/* transitionStyle : "fade", */    /* [This code for animation ] */
	 	navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	 	itemsDesktop : [1199,4],
	 	itemsDesktopSmall : [980,3],
	 	itemsTablet: [768,2],
	 	itemsMobile : [479,1],
	 });

	/*----------------------------
	 price-slider active
	 ------------------------------ */  
	 $( "#slider-range" ).slider({
	 	range: true,
	 	min: 40,
	 	max: 600,
	 	values: [ 60, 570 ],
	 	slide: function( event, ui ) {
	 		$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
	 	}
	 });
	 $( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
	 	" - £" + $( "#slider-range" ).slider( "values", 1 ) );  

	/*--------------------------
	 scrollUp
	 ---------------------------- */	
	 $.scrollUp({
	 	scrollText: '<i class="fa fa-angle-up"></i>',
	 	easingType: 'linear',
	 	scrollSpeed: 900,
	 	animation: 'fade'
	 }); 	   



	})(jQuery); 