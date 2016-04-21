
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Payment_received Read</h3>
        <table class="table table-bordered">
	    <tr><td>Ctpay</td><td><?php echo $ctpay; ?></td></tr>
	    <tr><td>Custkd</td><td><?php echo $custkd; ?></td></tr>
	    <tr><td>Bankcharge</td><td><?php echo $bankcharge; ?></td></tr>
	    <tr><td>Paydate</td><td><?php echo $paydate; ?></td></tr>
	    <tr><td>Paymode</td><td><?php echo $paymode; ?></td></tr>
	    <tr><td>Reference</td><td><?php echo $reference; ?></td></tr>
	    <tr><td>Kdinv</td><td><?php echo $kdinv; ?></td></tr>
	    <tr><td>Invdate</td><td><?php echo $invdate; ?></td></tr>
	    <tr><td>Invamount</td><td><?php echo $invamount; ?></td></tr>
	    <tr><td>Dueamount</td><td><?php echo $dueamount; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Remark</td><td><?php echo $remark; ?></td></tr>
	    <tr><td>Upload</td><td><?php echo $upload; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('payment_received') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->