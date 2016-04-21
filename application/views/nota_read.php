        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Sentralnet.com
                <strong class="pull-right">FAKTUR</strong>  
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-9 invoice-col">
              <address>
                <strong>Network / IT Electrical, Tools</strong><br>
                Lindeteves Trade Center (LTC Glodok) - Lt 2 - Blok C16 No. 01<br>
                Jl. Hayam Wuruk no. 127 Jakarta Barat, 11180 - Indonesia<br>
                T: 021-26071151 ; F: 021-26071151<br>
                Email: sales@sentralnet.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-3 invoice-col">
              <?php echo date('d F Y') ?><br/>
              <br/>
              <b>Faktur No : <?php echo $kdnota; ?></b><br/>
              <b>Date:</b> <?php echo $notadate; ?><br/>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Item & Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
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
                      <td><?php echo $detail->itemkd.' - '.$detail->itemname ?></td>
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
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Total:</th>
                    <td>Rp <?php echo $grdtotal; ?>,00</td>
                  </tr>
                </table>
              </div>
              <br><br><br><br><br>
              <P>
                <strong>(PT. Infranetindo Mitra Solusi)</strong>
              </P>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('nota') ?>" class="btn btn-default">Cancel</a>
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>