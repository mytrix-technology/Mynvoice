<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sentralnet | Invoice Apps</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/bootstrap.min.css">
        <!-- Jquery UI -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/jQueryUI/jquery-ui.css">
        <!-- Autocomplete -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/autocomplete/jquery.autocomplete.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/ionicons-2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.css">
        <!-- jvectormap -->
        <link href="<?php echo base_url() ?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Datepicker -->
        <link href="<?php echo base_url() ?>template/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url() ?>template/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap - wysihtml5 -->
        <link href="<?php echo base_url() ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Select2 -->
        <link href="<?php echo base_url() ?>template/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/skins/_all-skins.min.css">

        <style type="text/css">
            input.add {
                -moz-border-radius: 4px;
                border-radius: 4px;
                background-color:#6FFF5C;
                -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .75);
                box-shadow: 0 0 4px rgba(0, 0, 0, .75);
            }
            input.add:hover {
                background-color:#1EFF00;
                -moz-border-radius: 4px;
                border-radius: 4px;
            }
            input.removeRow {
                -moz-border-radius: 4px;
                border-radius: 4px;
                background-color:#FFBBBB;
                -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .75);
                box-shadow: 0 0 4px rgba(0, 0, 0, .75);
            }
            input.removeRow:hover {
                background-color:#FF0000;
                -moz-border-radius: 4px;
                border-radius: 4px;
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Invoice System</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Yudhistiro Tri A</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            Yudhistiro Tri A - Web Master
                                            <small>Administrator</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <?php
                                            echo anchor('auth/logout','Sign out',array('class'=>'btn btn-default btn-flat'));
                                            ?>

                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Yudhistiro Tri A</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!--<form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url().'/index.php/main' ?>">
                                <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                                <small class="label pull-right bg-red"></small>
                            </a>
                        </li>
                        <li class="header">MAIN NAVIGATION</li>
                        <?php
                        $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
                        foreach ($menu->result() as $m) {
                            // chek ada sub menu
                            $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
                            if($submenu->num_rows()>0){
                                // tampilkan submenu
                                echo "<li class='treeview'>
                                    ".anchor('#',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
                                foreach ($submenu->result() as $s){
                                     echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
                                }
                                   echo"</ul>
                                    </li>";
                            }else{
                                echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
                            }

                        }
                        ?>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php
                echo $contents;
                ?>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://mytrixtechnology.com">Mytrix Technology</a>.</strong> All rights reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo base_url() ?>template/plugins/jQueryUI/jquery-ui.js"></script>
        <!-- Autocomplete -->
        <script src="<?php echo base_url() ?>template/plugins/autocomplete/jquery.autocomplete.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url() ?>template/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url() ?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url() ?>template/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url() ?>template/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap wysihtml5 -->
        <script src="<?php echo base_url() ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- select2 -->
        <script src="<?php echo base_url() ?>template/plugins/select2/select2.full.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>template/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>template/plugins/fastclick/fastclick.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url() ?>template/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>template/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>template/dist/js/demo.js"></script>
        <script src="<?php echo base_url() ?>template/dist/js/pages/dashboard2.js" type="text/javascript"></script>
        <!-- page script -->
        <script>
            //Data table
            $(document).ready(function() {
                $('#example').dataTable({
                    "responsive": true,
                    "fnDrawCallback": function ( oSettings ) {
                        if ( oSettings.aoData!=null && oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "columnDefs": [{
                        //"className": 'control'
                        "visible": false,
                        "searchable": true,
                        "orderable": true,
                        "bPaginate": true,
                        "bSort": true,
                        "bInfo": true,
                        "targets": 0
                    }]
                    //"order": [[ 1, 'asc' ]]
                });
            });

            $(function () {
                $("#example1").DataTable({
                    "responsive": true
                });
                $('#example2').DataTable({
                    "responsive": true,
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });

            //Dynamic HTML Table
            $(document).ready(function () {

                $(document).on('click', '#purchaseItems .add', function () {

                    var row = $(this).closest('tr');
                    var clone = row.clone();

                    // clear the values
                    var tr = clone.closest('tr');
                    tr.find('input[type=text]').val('');
                    tr.find('textarea').val('');
                    //tr.find('select').val('');

                    $(this).closest('tr').after(clone);

                });

                $(document).on('keypress', '#purchaseItems .next', function (e) {
                    if (e.which == 13) {
                        var v = $(this).index('input:text');
                        var v = $(this).index('textarea');
                        //var v = $(this).index('select');
                        var n = v + 1;
                        $('input:text').eq(n).focus();
                        $('textarea').eq(n).focus();
                        //$('select').eq(n).focus();
                        //$(this).next().focus();
                    }
                });

                $(document).on('keypress', '#purchaseItems .nextRow', function (e) {
                    if (e.which == 13) {
                        $(this).closest('tr').find('.add').trigger('click');
                        $(this).closest('tr').next().find('input:first').focus();
                    }
                });

                $(document).on('click', '#purchaseItems .removeRow', function () {
                    if ($('#purchaseItems .add').length > 1) {
                        $(this).closest('tr').remove();
                    }
                });

                var site = "<?php echo site_url();?>";
                $("input:text[id^='kodeitem']").on("focus.autocomplete", null, function () {
                    $('.autocomplete').autocomplete({
                        serviceUrl: site+'/nota/get_all_item',
                        minLength: 0,
                        delay: 0,

                        onSelect: function (suggestion) {
                            //$('#kodeitem').val(''+suggestion.kodeitem);
                            $('#v_description').val(''+suggestion.desc); // membuat id 'v_nim' untuk ditampilkan
                            $('#v_price').val(''+suggestion.price); // membuat id 'v_jurusan' untuk ditampilkan
                        }
                    });

                    $('.autocomplete').autocomplete("search");
                });
            });

            //datepicker
            $('#datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('#datepicker1').datepicker({
                format: 'dd-mm-yyyy'
            });

            //select2
            $(document).ready(function() {
              $(".js-example-basic-single").select2();
            });

            $(document).ready(function() {
              $(".js-example-basic-multiple").select2();
            });

            //bootstrap wysihtml5
            $(function () {
                //Add text editor
                $("#compose-textarea").wysihtml5();
            });

            //select list item
            $(document).on('click', ".item-select", function(e) {

                e.preventDefault;

                var product = $(this);

                $('#insert').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {

                    var itemText = $('#insert').find("option:selected").text();
                    var itemValue = $('#insert').find("option:selected").val();

                    $(product).closest('tr').find('.invoice_product').val(itemText);
                    $(product).closest('tr').find('.invoice_product_price').val(itemValue);

                    updateTotals('.calculate');
                    calculateTotal();

                });

                return false;

            });

            /*
             * List Detail Item
             */
            // remove product row
            $('#invoice_table').on('click', ".delete-row", function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                calculateTotal();
            });

            // add new product row on invoice
            var cloned = $('#invoice_table tr:last').clone();
            $(".add-row").click(function(e) {
                e.preventDefault();
                cloned.clone().appendTo('#invoice_table'); 
            });
            
            calculateTotal();
            
            $('#invoice_table').on('input', '.calculate', function () {
                updateTotals(this);
                calculateTotal();
            });

            $('#invoice_totals').on('input', '.calculate', function () {
                calculateTotal();
            });

            $('#invoice_product').on('input', '.calculate', function () {
                calculateTotal();
            });

            $('.remove_vat').on('change', function() {
                calculateTotal();
            });

            //update total
            function updateTotals(elem) {

                var tr = $(elem).closest('tr'),
                    quantity = $('[name="invoice_product_qty[]"]', tr).val(),
                    price = $('[name="invoice_product_price[]"]', tr).val(),
                    isPercent = $('[name="invoice_product_discount[]"]', tr).val().indexOf('%') > -1,
                    percent = $.trim($('[name="invoice_product_discount[]"]', tr).val().replace('%', '')),
                    subtotal = parseInt(quantity) * parseFloat(price);

                if(percent && $.isNumeric(percent) && percent !== 0) {
                    if(isPercent){
                        subtotal = subtotal - ((parseFloat(percent) / 100) * subtotal);
                    } else {
                        subtotal = subtotal - parseFloat(percent);
                    }
                } else {
                    $('[name="invoice_product_discount[]"]', tr).val('');
                }

                $('.calculate-sub', tr).val(subtotal.toFixed(2));
            }

            //kalkulasi total
            function calculateTotal() {
        
                var grandTotal = 0,
                    disc = 0,
                    c_ship = parseInt($('.calculate.shipping').val()) || 0;

                $('#invoice_table tbody tr').each(function() {
                    var c_sbt = $('.calculate-sub', this).val(),
                        quantity = $('[name="invoice_product_qty[]"]', this).val(),
                        price = $('[name="invoice_product_price[]"]', this).val() || 0,
                        subtotal = parseInt(quantity) * parseFloat(price);
                    
                    grandTotal += parseFloat(c_sbt);
                    disc += subtotal - parseFloat(c_sbt);
                });

                // VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
                var subT = parseFloat(grandTotal),
                    finalTotal = parseFloat(grandTotal + c_ship),
                    vat = parseInt($('.invoice-vat').attr('data-vat-rate'));

                $('.invoice-sub-total').text(subT.toFixed(2));
                $('#invoice_subtotal').val(subT.toFixed(2));
                $('.invoice-discount').text(disc.toFixed(2));
                $('#invoice_discount').val(disc.toFixed(2));

                if($('.invoice-vat').attr('data-enable-vat') === '1') {

                    if($('.invoice-vat').attr('data-vat-method') === '1') {
                        $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
                        $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
                        $('.invoice-total').text((finalTotal).toFixed(2));
                        $('#invoice_total').val((finalTotal).toFixed(2));
                    } else {
                        $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
                        $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
                        $('.invoice-total').text((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
                        $('#invoice_total').val((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
                    }
                } else {
                    $('.invoice-total').text((finalTotal).toFixed(2));
                    $('#invoice_total').val((finalTotal).toFixed(2));
                }

                // remove vat
                if($('input.remove_vat').is(':checked')) {
                    $('.invoice-vat').text("0.00");
                    $('#invoice_vat').val("0.00");
                    $('.invoice-total').text((finalTotal).toFixed(2));
                    $('#invoice_total').val((finalTotal).toFixed(2));
                }

            }
        </script>
    </body>
</html>
