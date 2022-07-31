<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/dist/img/lbmu.png')  ?>" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>" />
    <!-- Bootstrap Data Table -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-data-table/bootstrap-table.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-data-table/extensions/fixed-columns/bootstrap-table-fixed-columns.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-data-table/extensions/resizable/jquery.resizableColumns.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <!-- lobibox -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/lobibox/lobibox.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- file uploader -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <!-- date range picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>" />
    <style>
        .checkbox {
            padding-left: 22px;
            margin-bottom: 16px;
        }

        .caret {
            display: none;
        }

        .pull-left {
            float: left;
        }

        .pull-right {
            float: right;
        }

        .bootstrap-table .fixed-table-pagination>.pagination ul.pagination a {
            padding: 12px 10px;
        }

        .page-item.active .page-link {
            background-color: #1abc9c;
            border: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <input type="hidden" id="url" value="<?= isset($url) ? site_url("$url") : '' ?>" />
                                <input type="hidden" class="csrf-token" value="<?= csrf_token() ?>" />
                                <input type="hidden" class="csrf-hash" value="<?= csrf_hash() ?>" />
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <?= $this->include('template_adminlte/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('page-content') ?>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block"><b>Version</b> 1.0.0</div>
            <strong>Copyright &copy; <?= date('Y') ?></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <div id="spinner" style="position:fixed; top: 50%; left: 50%; margin-left: -50px; margin-top: -50px;z-index: 999999;display: none;">
        <span>Loading...</span> <br>
        <img src="<?= base_url('assets/dist/img/ring.gif') ?>" />
    </div>
    <div id="modal_content" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="modal-size">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="isi-modal"></div>
            </div>
        </div>
    </div>
    <!-- modeal foto Profile -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <img class="profile-user-img img-fluid img-circle" src="<?= session('foto'); ?>" alt="User profile picture">
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- jquery resizableColumns -->
    <script src="<?= base_url('assets/plugins/bootstrap-data-table/extensions/resizable/jquery.resizableColumns.min.js') ?>"></script>
    <!-- Bootstrap Data Table -->
    <script src="<?= base_url('assets/plugins/bootstrap-data-table/bootstrap-table.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap-data-table/extensions/editable/bootstrap-table-editable.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap-data-table/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap-data-table/extensions/resizable/bootstrap-table-resizable.min.js') ?>"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
    <!-- select2 -->
    <script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <!-- Lobibox -->
    <script src="<?= base_url('assets/plugins/lobibox/lobibox.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <!-- date range picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- Summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
    <!-- chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/validator.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/main.js') ?>"></script>
    <!-- file uploader -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script>
    <script src="<?= base_url('assets/dist/js/script.js') ?>"></script>
    <?php if (isset($statistikJS)) : ?>
        <script src="<?= base_url('assets/dist/js/statistik.js') ?>"></script>
    <?php endif ?>
    <script>
        function previewImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".img-preview")
                        .attr("src", e.target.result)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
                $(".img-preview").show();
            } else {
                $("img-preview").hide();
            }
        }
        $(".tag-with-input").select2({
            theme: 'bootstrap4',
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>



    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>