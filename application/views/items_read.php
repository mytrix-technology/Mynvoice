
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Items Read</h3>
        <table class="table table-bordered">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Unit</td><td><?php echo $unit; ?></td></tr>
	    <tr><td>Purchase Price</td><td><?php echo $purchase_price; ?></td></tr>
	    <tr><td>Sell Price</td><td><?php echo $sell_price; ?></td></tr>
	    <tr><td>Tax</td><td><?php echo $tax; ?></td></tr>
	    <tr><td>Remark</td><td><?php echo $remark; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('items') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->