
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DELIVERY NOTICES 
		<?php echo anchor(site_url('invoice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Del. Notice Number#</th>
                    <th>Inv Number#</th>
        		    <th>Shipping Date</th>
                    <th>Receipt Date</th>
                    <th>Cust Name</th>
                    <th>Notes</th>
                    <th>Status</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($report_delivery_notice_data as $delivery_notice)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $delivery_notice->kddelnot ?></td>
            <td><?php echo $delivery_notice->kdinv ?></td>
            <td><?php echo $delivery_notice->delnotdate ?></td>
            <td><?php echo $delivery_notice->dateofreceipt ?></td>
            <td><?php echo $delivery_notice->custkd ?></td>
            <td><?php echo $delivery_notice->custnotes ?></td>
            <td><?php echo $delivery_notice->status ?></td>
            
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