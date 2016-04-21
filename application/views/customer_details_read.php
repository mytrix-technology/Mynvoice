
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Customer_details Read</h3>
        <table class="table table-bordered">
	    <tr><td>Customer Id</td><td><?php echo $customer_id; ?></td></tr>
	    <tr><td>Bill Addr Street</td><td><?php echo $bill_addr_street; ?></td></tr>
	    <tr><td>Bill Addr City</td><td><?php echo $bill_addr_city; ?></td></tr>
	    <tr><td>Bill Addr State</td><td><?php echo $bill_addr_state; ?></td></tr>
	    <tr><td>Bill Addr Zip Code</td><td><?php echo $bill_addr_zip_code; ?></td></tr>
	    <tr><td>Bill Addr Country</td><td><?php echo $bill_addr_country; ?></td></tr>
	    <tr><td>Bill Addr Phone</td><td><?php echo $bill_addr_phone; ?></td></tr>
	    <tr><td>Bill Addr Fax</td><td><?php echo $bill_addr_fax; ?></td></tr>
	    <tr><td>Ship Addr Street</td><td><?php echo $ship_addr_street; ?></td></tr>
	    <tr><td>Ship Addr City</td><td><?php echo $ship_addr_city; ?></td></tr>
	    <tr><td>Ship Addr State</td><td><?php echo $ship_addr_state; ?></td></tr>
	    <tr><td>Ship Addr Zip Code</td><td><?php echo $ship_addr_zip_code; ?></td></tr>
	    <tr><td>Ship Addr Country</td><td><?php echo $ship_addr_country; ?></td></tr>
	    <tr><td>Ship Addr Phone</td><td><?php echo $ship_addr_phone; ?></td></tr>
	    <tr><td>Ship Addr Fax</td><td><?php echo $ship_addr_fax; ?></td></tr>
	    <tr><td>Notes</td><td><?php echo $notes; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customer_details') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->