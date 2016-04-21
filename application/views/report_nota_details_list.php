
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>NOTA DETAILS 
		<?php echo anchor(site_url('invoice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Date</th>
                    <th>Nota Number#</th>
        		    <th>Cust Name</th>
                    <th>Payment Mode</th>
                    <th>Amount</th>
                    <th>Notes</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($report_nota_details_data as $nota_details)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $nota_details->notadate ?></td>
            <td><?php echo $nota_details->kdnota ?></td>
            <td><?php echo $nota_details->custkd ?></td>
            <td><?php echo $nota_details->payopt ?></td>
            <td><?php echo $nota_details->grdtotal ?></td>
            <td><?php echo $nota_details->custnotes ?></td>
            
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