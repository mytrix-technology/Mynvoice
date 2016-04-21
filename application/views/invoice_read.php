        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Sentralnet.com
                <small class="pull-right">Date: <?php echo date('d/m/Y') ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>PT. Infranetindo Mitra Solusi</strong><br>
                Lindeteves Trade Center (LTC Glodok)<br>
                Jl. Hayam Wuruk no. 127<br>
                Jakarta Barat, 11180 - Indonesia<br/>
                T: 021-26071151 ; F: 021-26071151
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $custkd; ?></strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br/>
                Email: john.doe@example.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #<?php echo $kdinv; ?></b><br/>
              <b>Quotation:</b> <?php echo $kdquo; ?><br/>
              <b>PO / Ref:</b> PO3728/11/2015<br/>
              <b>Order Date:</b> <?php echo $invdate; ?><br/>
              <b>TOP:</b> CASH<br/>
              <b>Jobs:</b> Trading
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Product & Type</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $start = 0;
                    foreach ($detail_data as $detail) 
                    {
                  ?>  
                    <tr>
                      <td><?php echo ++$start ?></td>
                      <td><?php echo $detail->itemkd ?></td>
                      <td><?php echo $detail->itemname ?></td>
                      <td><?php echo $detail->qty ?></td>
                      <td><?php echo $detail->priceperitem ?></td>
                      <td><?php echo $detail->totalprice ?></td>
                    </tr>

                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="<?php echo base_url()?>template/dist/img/credit/visa.png" alt="Visa"/>
              <img src="<?php echo base_url()?>template/dist/img/credit/mastercard.png" alt="Mastercard"/>
              <img src="<?php echo base_url()?>template/dist/img/credit/american-express.png" alt="American Express"/>
              <img src="<?php echo base_url()?>template/dist/img/credit/paypal2.png" alt="Paypal"/>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <?php echo $custnotes; ?>
                <br>
                <?php echo $remark; ?>
              </p>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Term Of Payment:<br>
                1. T/T Advanced<br>
                2. FOB Jakarta<br>
                3. Include PPN 10%<br>
                4. Price change without prior notice<br>
              </p>
              <table>
                  <tr>
                    <td>NPWP</td>
                    <td> : </td>
                    <td>70.527.174.0-044.000</td>
                  </tr>
                  <tr>
                    <td>Bank Account</td>
                    <td> : </td>
                    <td>BCA (KCP Tebet Timur)</td>
                  </tr>
                  <tr>
                    <td>Account Number (IDR)</td>
                    <td> : </td>
                    <td>664-0211782 a/n Rosgani Ardianto</td>
                  </tr>
                  <tr>
                    <td>Account Number (USD)</td>
                    <td> : </td>
                    <td>664-0211782 a/n Rosgani Ardianto</td>
                  </tr>
              </table>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Amount Due : <strong><?php echo date('d F Y') ?></strong></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>Rp <?php echo $subtotal; ?>,00</td>
                  </tr>
                  <tr>
                    <th>Discount:</th>
                    <td>Rp <?php echo $discount; ?>,00</td>
                  </tr>
                  <tr>
                    <th>Tax (<?php echo $tax; ?>%)</th>
                    <td>
                        Rp <?php 
                        $pajak = ($tax/100)*$subtotal;
                        echo $pajak; ?>,00
                    </td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>Rp <?php 
                    $gratot = $subtotal - $discount + $tax;
                    echo $gratot; ?>,00</td>
                  </tr>
                </table>
              </div>
              <br>
              <center>
                <p>
                  Jakarta, <?php echo date('d F Y'); ?>
                </p>
                <br><br><br><br>
                <p>
                  <strong>(Rosgani Ardianto)</strong>
                </p>
              </center>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Cancel</a>
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <a href="<?php echo site_url('invoice/record_payment/'.$kdinv) ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Record Payment</a>
              <a href="<?php echo site_url('invoice/pdf') ?>" class="btn btn-primary pull-right"><i class="fa fa-credit-card"></i> Generate PDF</a>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>