<!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-money"></i> Payment Receipt
                <small class="pull-right">Date: <?php echo date('d/m/Y') ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>PT. Infranetindo Mitra Solusi</strong><br>
                Lindeteves Trade Center (LTC Glodok)<br>
                Jl. Hayam Wuruk no. 127<br>
                Jakarta Barat, 11180 - Indonesia<br/>
                T: 021-26071151 ; F: 021-26071151
              </address>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-sm-8">
              <table class="table table-striped">
                <tr>
                  <td>Payment Date</td>
                  <td><?php echo $paydate; ?></td>
                </tr>
                <tr>
                  <td>Reference Number</td>
                  <td><?php echo $reference; ?></td>
                </tr>
                <tr>
                  <td>Payment Mode</td>
                  <td>
                    <?php 
                      if ($paymode == 1) {
                          $payment_mode = "Cash";
                      } else if ($paymode == 2) {
                          $payment_mode = "Bank Remittance";
                      } else if ($paymode == 3) {
                          $payment_mode = "Bank Transfer";
                      } else if ($paymode == 4) {
                          $payment_mode = "Check";
                      } else {
                          $payment_mode = "Credit Card";
                      }
                      
                      echo $payment_mode;
                    ?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-4">
              <h3>Amount Received</h3>
              <h2>Rp <?php echo $amount; ?></h2>
            </div>
          </div>

          <!-- info row -->
          <div class="row invoice-info">
            
            <div class="col-sm-4 invoice-col">
              Bill To :
              <address>
                <strong><?php echo $custkd; ?></strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br/>
                Email: john.doe@example.com
              </address>
            </div><!-- /.col -->
            
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              Payment For
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Invoice Amount</th>
                    <th>Payment Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $kdinv; ?></td>
                    <td><?php echo "[Inv Date]"; ?></td>
                    <td><?php echo "[Inv Amount]"; ?></td>
                    <td><?php echo "Rp ".$amount; ?></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">More Information:</p>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <?php echo $remark; ?>
              </p>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('payment_received') ?>" class="btn btn-default">Cancel</a>
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>