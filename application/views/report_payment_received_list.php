
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PAYMENT RECEIVED 
		<?php echo anchor(site_url('invoice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Payment#</th>
                    <th>Date</th>
        		    <th>Reference#</th>
                    <th>Customer Name</th>
                    <th>Payment Method</th>
                    <th>Notes</th>
                    <th>Invoices#</th>
                    <th>Amount</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($report_payment_received_data as $payment_received)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo count($payment_received->kdpayrec) ?></td>
            <td><?php echo $payment_received->paydate ?></td>
            <td><?php echo $payment_received->reference ?></td>
            <td><?php echo $payment_received->custkd ?></td>
            <td><?php echo $payment_received->paymode ?></td>
            <td><?php echo $payment_received->remark ?></td>
            <td><?php echo $payment_received->kdinv ?></td>
            <td><?php echo $payment_received->amount ?></td>
            
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