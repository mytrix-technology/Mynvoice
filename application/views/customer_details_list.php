
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>CUSTOMER_DETAILS LIST <?php echo anchor('customer_details/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('customer_details/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('customer_details/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('customer_details/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Customer Id</th>
		    <th>Bill Addr Street</th>
		    <th>Bill Addr City</th>
		    <th>Bill Addr State</th>
		    <th>Bill Addr Zip Code</th>
		    <th>Bill Addr Country</th>
		    <th>Bill Addr Phone</th>
		    <th>Bill Addr Fax</th>
		    <th>Ship Addr Street</th>
		    <th>Ship Addr City</th>
		    <th>Ship Addr State</th>
		    <th>Ship Addr Zip Code</th>
		    <th>Ship Addr Country</th>
		    <th>Ship Addr Phone</th>
		    <th>Ship Addr Fax</th>
		    <th>Notes</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($customer_details_data as $customer_details)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $customer_details->customer_id ?></td>
		    <td><?php echo $customer_details->bill_addr_street ?></td>
		    <td><?php echo $customer_details->bill_addr_city ?></td>
		    <td><?php echo $customer_details->bill_addr_state ?></td>
		    <td><?php echo $customer_details->bill_addr_zip_code ?></td>
		    <td><?php echo $customer_details->bill_addr_country ?></td>
		    <td><?php echo $customer_details->bill_addr_phone ?></td>
		    <td><?php echo $customer_details->bill_addr_fax ?></td>
		    <td><?php echo $customer_details->ship_addr_street ?></td>
		    <td><?php echo $customer_details->ship_addr_city ?></td>
		    <td><?php echo $customer_details->ship_addr_state ?></td>
		    <td><?php echo $customer_details->ship_addr_zip_code ?></td>
		    <td><?php echo $customer_details->ship_addr_country ?></td>
		    <td><?php echo $customer_details->ship_addr_phone ?></td>
		    <td><?php echo $customer_details->ship_addr_fax ?></td>
		    <td><?php echo $customer_details->notes ?></td>
		    <td style="text-align:center" width="140px">
			<?php
			echo anchor(site_url('customer_details/read/'.$customer_details->kdcust),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm'));
			echo '  ';
			echo anchor(site_url('customer_details/update/'.$customer_details->kdcust),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm'));
			echo '  ';
			echo anchor(site_url('customer_details/delete/'.$customer_details->kdcust),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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