<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
                <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class='box-header'>
                            <h3 class='box-title'>PAYMENT_RECEIVED</h3>
                            <div class='box box-primary'>
                                <div class="col-xs-12 col-sm-8">
                                    <table class='table table-bordered'>
                                        <tr><td>Custkd <?php echo form_error('custkd') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>
                                            <!--<input type="text" class="form-control" name="custkd" id="custkd" placeholder="Custkd" value="<?php echo $custkd; ?>" />-->
                                        </td>
                                        <tr><td>Bankcharge <?php echo form_error('bankcharge') ?></td>
                                            <td><input type="text" class="form-control" name="bankcharge" id="bankcharge" placeholder="Bankcharge" value="<?php echo $bankcharge; ?>" />
                                        </td>
                                        <tr><td>Paydate <?php echo form_error('paydate') ?></td>
                                            <td><input type="text" class="form-control" name="paydate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Paydate" value="<?php echo $paydate; ?>" />
                                        </td>
                                        <tr><td>Paymode <?php echo form_error('paymode') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('paymode','payment_option','nmpay','id','nmpay'); ?>
                                            <!--<input type="text" class="form-control" name="paymode" id="paymode" placeholder="Paymode" value="<?php echo $paymode; ?>" />-->
                                        </td>
                                        <tr><td>Reference <?php echo form_error('reference') ?></td>
                                            <td><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference" value="<?php echo $reference; ?>" />
                                        </td>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered' id="purchaseItems" name="purchaseItems" align="center">
                                        <tr>
                                            <th>Invoice Number</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Amount</th>
                                            <th>Amount Due</th>
                                            <th>Payment</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="kdinv" id="kdinv" placeholder="No Invoice" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="invdate" id="invdate" placeholder="Tgl Invoice" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="invamount" id="invamount" placeholder="Amount Invoice" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="dueamount" id="dueamount" placeholder="Sisa Amount" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount Payment" />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-6"></div>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td>Total(Rp) : </td>
                                            <td><label for="totamount" name="totamount" id="totamount" placeholder="Total Amount Invoice"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Amount Received(Rp) : </td>
                                            <td><label for="amountrec" name="amountrec" id="amountrec" placeholder="Total Amount Payment"></label></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered'>
                                        <!--<tr><td>Ctpay <?php echo form_error('ctpay') ?></td>
                                            <td><input type="text" class="form-control" name="ctpay" id="ctpay" placeholder="Ctpay" value="<?php echo $ctpay; ?>" />
                                        </td>-->
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
                                        <input type="hidden" name="kdpayrec" value="<?php echo $kdpayrec; ?>" />
                                        <input type="hidden" name="ctpay" id="ctpay" /> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary">Save</button> 
                    <a href="<?php echo site_url('payment_received') ?>" class="btn btn-default">Cancel</a>
                </center>
                <br/>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->