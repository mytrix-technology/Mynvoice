
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>INVOICE LIST <?php echo anchor('invoice/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('invoice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th>Kd Inv</th>
            <th>Order No</th>
		    <th>Inv Date</th>
            <th>Cust Name</th>
		    <th>Status</th>
		    <th>Due Date</th>
		    <th>Amount</th>
		    <th>Balance Due</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($invoice_data as $invoice)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $invoice->kdinv ?></td>
            <td><?php echo $invoice->ordernumber ?></td>
            <td><?php echo $invoice->invdate ?></td>
            <td><?php echo $invoice->custkd ?></td>
		    <td><?php echo "" ?></td>
		    <td><?php echo date('d-m-Y') ?></td>
            <td><?php echo $invoice->grdtotal ?></td>
            <td><?php echo $invoice->grdtotal-50000 ?></td>
		    
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('invoice/read/'.$invoice->kdinv),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('invoice/update/'.$invoice->kdinv),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-sm')); 
			echo '  '; 
			echo anchor(site_url('invoice/record_payment/'.$invoice->kdinv),'<i class="fa fa-credit-card"></i>',array('title'=>'record payment','class'=>'btn btn-warning btn-sm'));
            echo '  '; 
            echo anchor(site_url('invoice/delivery_notice/'.$invoice->kdinv),'<i class="fa fa-truck"></i>',array('title'=>'delivery notice','class'=>'btn btn-danger btn-sm')); 
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