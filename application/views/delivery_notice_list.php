
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DELIVERY_NOTICE LIST <?php echo anchor('delivery_notice/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('delivery_notice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('delivery_notice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('delivery_notice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th>Kd Deliv. Notice</th>
		    <th>Kd Invoice</th>
		    <th>Cust Name</th>
		    <th>Deliv. Notice Date</th>
		    <th>Date of Receipt</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($delivery_notice_data as $delivery_notice)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $delivery_notice->kddelnot ?></td>
		    <td><?php echo $delivery_notice->kdinv ?></td>
		    <td><?php echo $delivery_notice->custkd ?></td>
		    <td><?php echo $delivery_notice->delnotdate ?></td>
		    <td><?php echo $delivery_notice->dateofreceipt ?></td>
		    <td><?php echo $delivery_notice->status ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('delivery_notice/read/'.$delivery_notice->kddelnot),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-success btn-sm')); 
			echo '  '; 
			echo anchor(site_url('delivery_notice/update/'.$delivery_notice->kddelnot),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('delivery_notice/receipt/'.$delivery_notice->kddelnot),'<i class="fa fa-truck"></i>','title="date of receipt" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are the items have been receipt ?\')"'); 
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