
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>LIST PAYMENT RECEIVED <?php echo anchor('payment_received/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('payment_received/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('payment_received/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('payment_received/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th>Kd Payment Received</th>
            <th>Payment Count</th>
            <th>Payment Date</th>
            <th>Reference</th>
            <th>Cust Name</th>
		    <th>Kd Inv</th>
            <th>Payment Mode</th>
            <th>Bank Charge</th>
            <th>Amount</th>
            <th>Unused Amount</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($payment_received_data as $payment_received)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $payment_received->kdpayrec ?></td>
            <td><?php echo $payment_received->paydate ?></td>
            <td><?php echo $payment_received->reference ?></td>
            <td><?php echo $payment_received->custkd ?></td>
            <td><?php echo $payment_received->kdinv ?></td>
            <td>
                <?php 
                    $payment_mode = $payment_received->paymode;
                    if ($payment_mode == 1) {
                        $paymode = "Cash";
                    } else if ($payment_mode == 2) {
                        $paymode = "Bank Remittance";
                    } else if ($payment_mode == 3) {
                        $paymode = "Bank Transfer";
                    } else if ($payment_mode == 4) {
                        $paymode = "Check";
                    } else {
                        $paymode = "Credit Card";
                    }
                    
                    echo $paymode;
                ?>
            </td>
            <td><?php echo $payment_received->bankcharge ?></td>
            <td><?php echo "Rp ".$payment_received->amount ?></td>
            <td><?php echo "Rp xxx,xx" ?></td>
            
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('payment_received/read/'.$payment_received->kdpayrec),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('payment_received/update/'.$payment_received->kdpayrec),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			//echo '  '; 
			//echo anchor(site_url('payment_received/delete/'.$payment_received->kdpayrec),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
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