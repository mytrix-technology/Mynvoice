
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>QUOTATION LIST <?php echo anchor('quotation/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('quotation/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('quotation/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('quotation/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th>Kd Quot</th>
            <th>Reference</th>
            <th>Quot Date</th>
            <th>Exp Date</th>
            <th>Cust Name</th>
		    <th>Status</th>
		    <th>Amount</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($quotation_data as $quotation)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $quotation->kdquo ?></td>
            <td><?php echo $quotation->reference ?></td>
		    <td><?php echo $quotation->quodate ?></td>
		    <td><?php echo $quotation->expdate ?></td>
		    <td><?php echo $quotation->custkd ?></td>
            <td><?php echo ($quotation->status == 0 ? "Estimated" : "Invoiced"); ?>
            </td>
		    <td><?php echo $quotation->grdtotal ?></td>
            <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('quotation/read/'.$quotation->kdquo),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('quotation/update/'.$quotation->kdquo),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			//echo '  '; 
			//echo anchor(site_url('quotation/delete/'.$quotation->kdquo),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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