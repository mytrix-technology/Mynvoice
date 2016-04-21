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
              
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <h3><b>Delivery Notice</b></h3>
              <b>Delivery Notice #<?php echo $kddelnot; ?></b><br/>
              <b>Invoice:</b> <?php echo $kdinv; ?><br/>
              <b>PO / Ref:</b> <?php echo $remark; ?><br/>
              <b>Date:</b> <?php echo $delnotdate; ?><br/>
              <b>TOP:</b> <?php echo $payoptid; ?><br/>
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
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Qty</th>
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
              <center>
                <p>
                  Received
                </p>
                <br><br><br><br>
                <p>
                  <strong>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</strong>
                </p>
              </center>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              
              </p>
              
            </div><!-- /.col -->
            <div class="col-xs-6">
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
              <a href="<?php echo site_url('delivery_notice') ?>" class="btn btn-default">Cancel</a>
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>