
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>CUSTOMER LIST <?php echo anchor('customer/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('customer/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('customer/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('customer/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped table-hover dt-responsive" id="example1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="20px">No</th>
            <th>Kode</th>
		    <th>Display Name</th>
		    <th>Company Name</th>
            <th>Contact Name</th>
            <th>Email</th>
		    <th>Phone</th>
		    <th>Receivables</th>
		    <th>Unused Credits</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $customer->kdcust ?></td>
		    <td><?php echo $customer->display_name ?></td>
		    <td><?php echo $customer->company_name ?></td>
            <td><?php echo $customer->salutation.' '.$customer->first_name.' '.$customer->last_name ?></td>
            <td><?php echo $customer->email ?></td>
		    <td><?php echo $customer->phone ?></td>
		    <td>Rp xxx,xx</td>
		    <td>Rp xxx,xx</td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('customer/read/'.$customer->kdcust),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('customer/update/'.$customer->kdcust),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			//echo '  '; 
			//echo anchor(site_url('customer/delete/'.$customer->kdcust),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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