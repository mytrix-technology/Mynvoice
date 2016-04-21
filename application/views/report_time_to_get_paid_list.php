
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>TIME TO GET PAID 
		<?php echo anchor(site_url('invoice/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('invoice/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th>Customer Name</th>
                    <th>0-15 Days</th>
        		    <th>16-30 Days</th>
                    <th>31-45 Days</th>
                    <th>Above 45 Days</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($report_time_to_get_paid_data as $time_to_get_paid)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $time_to_get_paid->custkd ?></td>
            <?php
                $dt1 = strtotime($time_to_get_paid->invdate);
                $dt2 = strtotime(date('Y-m-d'));
                $diff = abs($dt2-$dt1);
                $telat = $diff/86400;
                echo $telat;
            ?>
            <td><?php echo $retVal = ($telat<=15) ? $telat : '0' ; ?></td>
            <td><?php echo $retVal = ($telat>15 && $telat<=30) ? $telat : '0' ; ?></td>
            <td><?php echo $retVal = ($telat>30 && $telat<=45) ? $telat : '0' ; ?></td>
            <td><?php echo $retVal = ($telat>45) ? $telat : '0' ; ?></td>
            
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