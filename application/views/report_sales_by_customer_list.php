
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SALES BY CUSTOMER 
		<?php echo anchor(site_url('customer/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('customer/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('customer/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Customer Name</th>
                    <th>Invoice Count</th>
        		    <th>Sales</th>
                    <th>Sales With Tax</th>
		        </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($report_sales_by_customer_data as $customer)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $customer->custkd ?></td>
            <td><?php echo count($customer->kdinv) ?></td>
            <td><?php echo $customer->grdtotal ?></td>
            <td><?php echo $customer->grdtotal+($customer->grdtotal*($customer->tax/100)) ?></td>
            
		    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->