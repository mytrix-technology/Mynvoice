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
              <b>Quotation #<?php echo $kdquo; ?></b><br/>
              <br/>
              <b>Order Date:</b> <?php echo $quodate; ?><br/>
              <b>Payment Due:</b> <?php echo $expdate; ?><br/>
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
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Expired Date : <strong><?php echo date('d F Y') ?></strong></p>
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
                    <th>PPN:</th>
                    <td>
                        Rp <?php 
                        //$pajak = ($tax/100)*$subtotal;
                        //echo $pajak;
                        echo $tax;?>,00
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
              <a href="<?php echo site_url('quotation') ?>" class="btn btn-default">Cancel</a>
              <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <a href="<?php echo site_url('quotation/convert_invoice/'.$kdquo) ?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Convert Invoice</a>
              <a href="<?php echo site_url('quotation/pdf') ?>" class="btn btn-primary pull-right"><i class="fa fa-credit-card"></i> Generate PDF</a>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>