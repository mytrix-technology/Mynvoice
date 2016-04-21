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
                  <tr>
                    <td>1</td>
                    <td>Call of Duty - 455-981-221</td>
                    <td>1</td>
                    <td>$64.50</td>
                    <td>$64.50</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Need for Speed IV - 247-925-726</td>
                    <td>1</td>
                    <td>$50.00</td>
                    <td>$50.00</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Monsters DVD - 735-845-642</td>
                    <td>1</td>
                    <td>$10.70</td>
                    <td>$10.70</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Grown Ups Blue Ray - 422-568-642</td>
                    <td>1</td>
                    <td>$25.99</td>
                    <td>$25.99</td>
                  </tr>
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