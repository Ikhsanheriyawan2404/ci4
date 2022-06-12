<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Aplikasi CI4' ?></title>
    <meta name="description" content="description">
    <meta name="author" content="DevOOPS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url() ?>/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link href="<?= base_url() ?>/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/xcharts/xcharts.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/select2/select2.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/justified-gallery/justifiedGallery.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/style_v2.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/chartist/chartist.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
				<script src="<?= base_url() ?>/assets/http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="<?= base_url() ?>/assets/http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
<?= $this->renderSection('custom-styles') ?>
</head>

<body>
    <!--Start Header-->
    <div id="screensaver">
        <canvas id="canvas"></canvas>
        <i class="fa fa-lock" id="screen_unlock"></i>
    </div>
    <div id="modalbox">
        <div class="devoops-modal">
            <div class="devoops-modal-header">
                <div class="modal-header-name">
                    <span>Basic table</span>
                </div>
                <div class="box-icons">
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="devoops-modal-inner">
            </div>
            <div class="devoops-modal-bottom">
            </div>
        </div>
    </div>
    
    <?= $this->include('components/navbar') ?>

    <!--End Header-->
    <!--Start Container-->
    <div id="main" class="container-fluid">
        <div class="row">
            <div id="sidebar-left" class="col-xs-2 col-sm-2">
                <ul class="nav main-menu">
                    <?= $this->include('components/sidebar') ?>
                </ul>
            </div>
            <!--Start Content-->
            <div id="content" class="col-xs-12 col-sm-10">
                <div id="about">
                    <div class="about-inner">
                        <h4 class="page-header">Aplikasi Manajemen SPBU</h4>
                        <p>spbuPro team</p>
                        <p>Homepage - <a href="https://spbupromedia.com" target="_blank">https://spbupromedia.com</a></p>
                        <p>Email - <a href="mailto:spbupromedia@gmail.com">spbupromedia@gmail.com</a></p>
                        <p>Instagram - <a href="https://instagram.com/spbupro" target="_blank">https://instagram.com/spbupro</a></p>
                        <p>Versi - 2.0.0</p>
                    </div>
                </div>
                <!-- <div class="preloader">
                    <img src="<?= base_url() ?>/assets/img/devoops_getdata.gif" class="devoops-getdata" alt="preloader" />
                </div> -->
                <?= $this->renderSection('content') ?>
            </div>
            <!--End Content-->
        </div>
    </div>
    <!--End Container-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="http://code.jquery.com/jquery.js"></script> -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/tinymce/jquery.tinymce.min.js"></script>
    <!-- All functions for this theme + document.ready processing -->
    <script src="<?= base_url() ?>/assets/js/devoops.js"></script>
    <script type="text/javascript">
        // Run Select2 plugin on elements
        function getSelect2() {
            $('.multiselect2').select2({
                placeholder: "Select OS"
            });
            $('.select2').select2();
        }
        // Run timepicker
        function getTimePicker() {
            $('.input_time').timepicker({
                setDate: new Date()
            });
        }
        $(document).ready(function() {
            // Create Wysiwig editor for textare
            TinyMCEStart('#wysiwig_simple', null);
            TinyMCEStart('#wysiwig_full', 'extreme');
            // Add slider for change test input length
            FormLayoutExampleInputLength($(".slider-style"));
            // Initialize datepicker
            $('.input_datepicker').datepicker({
                setDate: new Date()
            });
            // Load Timepicker plugin
            LoadTimePickerScript(getTimePicker);
            // Add tooltip to form-controls
            $('.form-control').tooltip();
            LoadSelect2Script(getSelect2);
            // Load example of form validation
            LoadBootstrapValidatorScript(DemoFormValidator);
            // Add drag-n-drop feature to boxes
            WinMove();
        });
    </script>

<?= $this->renderSection('custom-scripts') ?>
</body>

</html>