<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Customer Read</h3>
          <table class="table table-bordered">
            <tr><td>Kode</td><td><?php echo $kdcust; ?></td></tr>
      	    <tr><td>Salutation</td><td><?php echo $salutation; ?></td></tr>
      	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
      	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
      	    <tr><td>Display Name</td><td><?php echo $display_name; ?></td></tr>
      	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
      	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
      	    <tr><td>Website</td><td><?php echo $website; ?></td></tr>
      	    <tr><td>Company Name</td><td><?php echo $company_name; ?></td></tr>
      	    <tr><td>Currency</td><td><?php echo $currency; ?></td></tr>
            <tr><td>Payment Terms</td><td><?php echo $payment_terms; ?></td></tr>
      	    <tr><td>Notes</td><td><?php echo $notes; ?></td></tr>
      	    <tr><td></td><td><a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a></td></tr>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class='box-title'>Billing Address</h3>
          <table class="table table-bordered">
            <tr><td>Street</td><td><?php echo $bill_addr_street; ?></td></tr>
            <tr><td>City</td><td><?php echo $bill_addr_city; ?></td></tr>
            <tr><td>State</td><td><?php echo $bill_addr_state; ?></td></tr>
            <tr><td>Zip Code</td><td><?php echo $bill_addr_zip_code; ?></td></tr>
            <tr><td>Country</td><td><?php echo $bill_addr_country; ?></td></tr>
            <tr><td>Phone</td><td><?php echo $bill_addr_phone; ?></td></tr>
            <tr><td>Fax</td><td><?php echo $bill_addr_fax; ?></td></tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class='box-title'>Shipping Address</h3>
          <table class="table table-bordered">
            <tr><td>Street</td><td><?php echo $ship_addr_street; ?></td></tr>
            <tr><td>City</td><td><?php echo $ship_addr_city; ?></td></tr>
            <tr><td>State</td><td><?php echo $ship_addr_state; ?></td></tr>
            <tr><td>Zip Code</td><td><?php echo $ship_addr_zip_code; ?></td></tr>
            <tr><td>Country</td><td><?php echo $ship_addr_country; ?></td></tr>
            <tr><td>Phone</td><td><?php echo $ship_addr_phone; ?></td></tr>
            <tr><td>Fax</td><td><?php echo $ship_addr_fax; ?></td></tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->