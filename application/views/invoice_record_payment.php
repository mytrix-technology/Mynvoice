<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>RECORD PAYMENT RECEIVED</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8">
                                    <table class='table table-bordered'>
                                        <tr><td>Customer Name <?php echo form_error('custkd') ?></td>
                                            <td>
                                            <input type="text" class="form-control" name="custkd" id="custkd" placeholder="custkd" value="<?php echo $custkd; ?>" readonly/>
                                        </td>
                                        <tr><td>Bank Charge </td>
                                            <td>
                                            <input type="text" class="form-control" name="bankcharge" id="bankcharge" placeholder="bankcharge" />
                                        </td>
                                        <tr><td>Paydate </td>
                                            <td><input type="text" class="form-control" name="paydate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Paydate" value="<?php echo $paydate; ?>" />
                                        </td>
                                        <tr><td>Paymode </td>
                                            <td>
                                            <?php echo cmb_dinamis('paymode','payment_option','nmpay','id','nmpay'); ?>
                                            <!--<input type="text" class="form-control" name="paymode" id="paymode" placeholder="Paymode" value="<?php echo $paymode; ?>" />-->
                                        </td>
                                        <tr><td>Reference </td>
                                            <td><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference" value="<?php echo $reference; ?>" />
                                        </td>
                                        <input type="hidden" name="kdpayrec" value="<?php echo $kdpayrec; ?>" />
                                        <input type="hidden" name="ctpay" id="ctpay" />
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class="table table-bordered" id="purchaseItems" name="purchaseItems" align="center">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Invoice Date</th>
                                                <th>Invoice Amount</th>
                                                <th>Amount Due</th>
                                                <th>Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="kdinv" id="kdinv" value="<?php echo $kdinv ?>" readonly />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="invdate" id="invdate" value="<?php echo $invdate ?>" readonly />
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invamount" id="invamount" value="<?php echo $invamount ?>" readonly />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="dueamount" id="dueamount" value="<?php echo $dueamount ?>" readonly />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount Payment" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered'>
                                        <tr><td>Remark <?php echo form_error('remark') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>
                                            <!--<input type="text" class="form-control" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>" />-->
                                        </td>
                                        <tr><td><label for="exampleInputFile">Attach File</label></td>
                                            <td>
                                            <input type="file" name="upload" id="exampleInputFile">
                                            <!--<input type="text" class="form-control" name="upload" id="upload" placeholder="Upload" value="<?php echo $upload; ?>" />-->
                                        </td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <center>
                <button type="submit" class="btn btn-primary">Convert</button> 
                <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Cancel</a>
              </center>
              <br/>
              </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        