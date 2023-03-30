<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  ob_start();
  $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "Home";
  date_default_timezone_set('Asia/Manila');
  ?>
  <title><?php echo $title ?> | Blood Bank Management</title>
  <?php ob_end_flush() ?>


  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css"> -->
  <!-- <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <!-- Toastr -->
  <!-- <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css"> -->
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="assets/dist/css/adminlte.min.css"> -->
  <!-- <script src="https://kit.fontawesome.com/2d84fa80d6.js" crossorigin="anonymous"></script> -->
  <!-- jQuery -->
  <!-- <script src="assets/plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <!-- <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- Select2 -->
  <!-- <script src="assets/plugins/select2/js/select2.full.min.js"></script> -->
  <!-- Bootstrap4 Duallistbox -->
  <!-- <script src="assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> -->
  <!-- InputMask -->
  <!-- <script src="assets/plugins/moment/moment.min.js"></script> -->
  <!-- <script src="assets/plugins/inputmask/jquery.inputmask.min.js"></script> -->
  <!-- date-range-picker -->
  <!-- <script src="assets/plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- bootstrap color picker -->
  <!-- <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <!-- Bootstrap Switch -->
  <!-- <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> -->
  <!-- BS-Stepper -->
  <!-- <script src="assets/plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
  <!-- dropzonejs -->
  <!-- <script src="assets/plugins/dropzone/min/dropzone.min.js"></script> -->
  <!-- AdminLTE App -->
  <!-- <script src="assets/dist/js/adminlte.min.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="assets/dist/js/demo.js"></script> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Bootstrap Color Picker -->
  <!-- <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css"> -->
  <!-- <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
  <!-- Bootstrap4 Duallistbox -->
  <!-- <link rel="stylesheet" href="assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css"> -->
  <!-- BS Stepper -->
  <!-- <link rel="stylesheet" href="assets/plugins/bs-stepper/css/bs-stepper.min.css"> -->
  <!-- dropzonejs -->
  <!-- <link rel="stylesheet" href="assets/plugins/dropzone/min/dropzone.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="assets/dist/css/adminlte.min.css"> -->

 
  <link rel="stylesheet" href="assets/dist/css/styles.css">
  <link rel="stylesheet" href="./css/custom.css">

  <link rel="icon" href="./favicon.ico" type="image/ico" sizes="32x32">





  <!---------------------------- CDN -------------------------------------------->
  <!-- ADMINLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- DATATABLES -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <!-- DROPZONES -->
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <!-- ANIMDATE.CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- <script src="assets/plugins/jquery/jquery.min.js"></script> -->
  <!-- FONTS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- FONTAWESOME -->
  <script src="https://kit.fontawesome.com/2d84fa80d6.js" crossorigin="anonymous"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <script src="https://kit.fontawesome.com/110d21e6c4.js" crossorigin="anonymous"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- BOOTSTRAP 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- overlayscrollbars -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/css/OverlayScrollbars.min.css" integrity="sha512-Xd88BFhCPQY5aAt2W3F5FmTVKkubVsAZDJBo7aXPRc5mwIPTEJvNeqbvBWfNKd4IEu3v9ots+nTdsTzVynlaOw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  <script type="application/javascript">
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>
</head>