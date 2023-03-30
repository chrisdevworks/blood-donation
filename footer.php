<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(document).ready(function() {
		// $('.datetimepicker').datetimepicker({
		//     format:'Y/m/d H:i',
		//     startDate: '+3d'
		// })
		$('#list').DataTable({
			dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
				"<'row'<'col-sm-12'rt>>" +
				"<'row'<'col-sm-6'i><'col-sm-6'p>>",
		});

		$('.select2').select2({
			placeholder: "Please select here",
			width: "100%"
		});

		$("#customSwitch1").click(function() {
			$("body").toggleClass("dark-mode");
			// $("aside").toggleClass("border-right");
			$(".sidebar").toggleClass("sidebar-dark-primary");
			$(".nav-item p").toggleClass("text-white");
			$(".brand-link").toggleClass("navbar-dark");
			$(".brand-link span").toggleClass("text-white");
			$(".brand-link i").toggleClass("text-red");
			$("thead").toggleClass("thead-dark");
		});
	})
	window.start_load = function() {
		$('body').prepend('<div id="preloader2"></div>')
	}
	window.end_load = function() {
		$('#preloader2').fadeOut('fast', function() {
			$(this).remove();
		})
	}
	window.viewer_modal = function($src = '') {
		start_load()
		var t = $src.split('.')
		t = t[1]
		if (t == 'mp4') {
			var view = $("<video src='" + $src + "' controls autoplay></video>")
		} else {
			var view = $("<img src='" + $src + "' />")
		}
		$('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
		$('#viewer_modal .modal-content').append(view)
		$('#viewer_modal').modal({
			show: true,
			backdrop: 'static',
			keyboard: false,
			focus: true
		})
		end_load()

	}
	window.uni_modal = function($title = '', $url = '', $size = "") {
		start_load()
		$.ajax({
			url: $url,
			error: err => {
				console.log()
				alert("An error occured")
			},
			success: function(resp) {
				if (resp) {
					$('#uni_modal .modal-title').html($title)
					$('#uni_modal .modal-body').html(resp)
					if ($size != '') {
						$('#uni_modal .modal-dialog').addClass($size)
					} else {
						$('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
					}
					$('#uni_modal').modal({
						show: true,
						backdrop: 'static',
						keyboard: false,
						focus: true
					})
					end_load()
				}
			}
		})
	}
	window._conf = function($msg = '', $func = '', $params = []) {
		$('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
		$('#confirm_modal .modal-body').html($msg)
		$('#confirm_modal').modal('show')
	}
	window._confreceive = function($msg = '', callback) {
		Swal.fire({
			title: $msg,
			icon: "warning",
			showCancelButton: true,
			// confirmButtonText: 'Confirm',
		}).then((confirmed) => {
			callback(confirmed && confirmed.value == true);
		});
	}
	window._confrelease = function($msg = '', $params, callback) {
		Swal.fire({
			title: $msg,
			icon: "warning",
			showCancelButton: true,
			// confirmButtonText: 'Confirm',
		}).then((confirmed) => {
			callback(confirmed && confirmed.value == true);
		});
	}
	window._warning = function($msg = '') {
		Swal.fire({
			title: $msg,
			icon: "warning",
			showCancelButton: true,
			// confirmButtonText: 'Confirm',
		});
	}
	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 5000
	});

	// var ToastSelect = 

	window.alert_toast = function($msg = 'TEST', $bg = 'success') {
		//   $('#alert_toast').removeClass('bg-success')
		//   $('#alert_toast').removeClass('bg-danger')
		//   $('#alert_toast').removeClass('bg-info')
		//   $('#alert_toast').removeClass('bg-warning')

		// if($bg == 'success')
		//   $('#alert_toast').addClass('bg-success')
		// if($bg == 'danger')
		//   $('#alert_toast').addClass('bg-danger')
		// if($bg == 'info')
		//   $('#alert_toast').addClass('bg-info')
		// if($bg == 'warning')
		//   $('#alert_toast').addClass('bg-warning')
		// $('#alert_toast .toast-body').html($msg)
		// $('#alert_toast').toast({delay:3000}).toast('show');
		console.log('TEST')
		Toast.fire({
			icon: $bg,
			title: $msg
		})
	}

	window.message_toast = function($msg = 'TEST', $bg = 'success') {
		console.log('TEST')
		Swal.fire({
			icon: $bg,
			title: $msg,
			timer: 1600,
			showConfirmButton: false,
			showClass: {
				popup: 'animate__animated animate__fadeInDown'
			},
			hideClass: {
				popup: 'animate__animated animate__fadeOutUp'
			}
		})
	}


	window.error_toast = function($msg = 'TEST', $bg = 'error') {
		console.log('TEST')
		Toast.fire({
			icon: $bg,
			title: $msg
		})
	}

	window.confirm_toast = function($msg, $bg) {
		//   $('#alert_toast').removeClass('bg-success')
		//   $('#alert_toast').removeClass('bg-danger')
		//   $('#alert_toast').removeClass('bg-info')
		//   $('#alert_toast').removeClass('bg-warning')

		// if($bg == 'success')
		//   $('#alert_toast').addClass('bg-success')
		// if($bg == 'danger')
		//   $('#alert_toast').addClass('bg-danger')
		// if($bg == 'info')
		//   $('#alert_toast').addClass('bg-info')
		// if($bg == 'warning')
		//   $('#alert_toast').addClass('bg-warning')
		// $('#alert_toast .toast-body').html($msg)
		// $('#alert_toast').toast({delay:3000}).toast('show');
		console.log('TEST')
		// ToastSelect.fire({
		// 	icon: $bg,
		// 	title: $msg
		// })
		Swal.fire({
			title: 'Do you want to back up the database?',
			// showDenyButton: true,
			showCancelButton: true,
			confirmButtonText: 'Save',
			denyButtonText: `Don't save`,
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire($msg, '', $bg)
			}
		});
	}



	$(function() {
		$('.summernote').summernote({
			height: 300,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
				['fontname', ['fontname']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph', 'height']],
				['table', ['table']],
				['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
			]
		})

	})
</script>
<script type="application/javascript">
	$('input[type="file"]').change(function(e) {
		var fileName = e.target.files[0].name;
		$('.custom-file-label').html(fileName);
	});
</script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>

<!-- PAGE assets/plugins -->
<!-- jQuery Mapael -->
<script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>