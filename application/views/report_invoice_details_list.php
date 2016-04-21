
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>INVOICE DETAILS 
		<?php echo anchor(site_url('invoice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Status</th>
                    <th>Inv Date</th>
        		    <th>Due Date</th>
                    <th>Inv Number#</th>
                    <th>P.O#</th>
                    <th>Cust Name</th>
                    <th>Inv Amount</th>
                    <th>Balance Due</th>
		        </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($report_invoice_details_data as $invoice_details)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $invoice_details->status ?></td>
            <td><?php echo $invoice_details->invdate ?></td>
            <td><?php echo $invoice_details->duedate ?></td>
            <td><?php echo $invoice_details->kdinv ?></td>
            <td><?php echo $invoice_details->ordernumber ?></td>
            <td><?php echo $invoice_details->custkd ?></td>
            <td><?php echo $invoice_details->grdtotal ?></td>
            <td><?php echo $invoice_details->grdtotal-$invoice_details->discount ?></td>

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