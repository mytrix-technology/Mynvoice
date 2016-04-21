<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>PAYMENT RECEIVED</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8">
                                    <table class='table table-bordered'>
                                        <tr><td>Customer Name <?php echo form_error('custkd') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>
                                        </td>
                                        <tr><td>Bank Charge <?php echo form_error('bankcharge') ?></td>
                                            <td><input type="text" class="form-control" name="bankcharge" id="bankcharge" placeholder="Bankcharge" value="<?php echo $bankcharge; ?>" />
                                        </td>
                                        <tr><td>Payment Date <?php echo form_error('paydate') ?></td>
                                            <td><input type="text" class="form-control" name="paydate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Paydate" value="<?php echo $paydate; ?>" />
                                        </td>
                                        <tr><td>Payment Mode <?php echo form_error('paymode') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('paymode','payment_option','nmpay','id','nmpay'); ?>
                                        </td>
                                        <tr><td>Reference <?php echo form_error('reference') ?></td>
                                            <td><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference" value="<?php echo $reference; ?>" />
                                        </td>
                                        <input type="hidden" name="kdpayrec" value="<?php echo $kdpayrec; ?>" /> 
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
                                                <!-- no invoice -->
                                                <input type="text" name="payreckdinv" id="payreckdinv" class="form-control"  />
                                            </td>
                                            <td>
                                                <!-- tgl invoice -->
                                                <input type="text" name="payrecdate" id="payrecdate" class="form-control"  />
                                            </td>
                                            <td>
                                                <!-- total nominal invoice -->
                                                <input type="text" name="invamount" id="invamount" class="form-control"  />
                                            </td>
                                            <td>
                                                <!-- sisa pembayaran -->
                                                <input type="text" name="amountdue" id="amountdue" class="form-control"  />
                                            </td>
                                            <td>
                                                <!-- jumlah yang dibayarkan -->
                                                <input type="text" name="amount" id="amount" class="form-control"  />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-6"></div>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr><td>Total (Rp) <?php echo form_error('totamount') ?></td>
                                            <td>
                                            <!--<label for="totamount" name="totamount" id="totamount" value="<?php echo $totamount; ?>"></label>-->
                                            <input type="text" class="form-control" name="totamount" id="totamount" placeholder="Total Amount" value="<?php echo $totamount; ?>"  />
                                        </td>
                                        <tr><td>Amount Received (Rp) <?php echo form_error('amountrec') ?></td>
                                            <td>
                                            <!--<label for="amountrec" name="amountrec" id="amountrec" value="<?php echo $amountrec; ?>"></label>-->
                                            <input type="text" class="form-control" name="amountrec" id="amountrec" placeholder="Amount Received" value="<?php echo $amountrec; ?>"  />
                                        </td>
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
                                            <input type="file" id="exampleInputFile">
                                        </td>
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
    <script type="text/javascript">
        /*function copyTextValue(bf) {
            if (bf.checked) {
                var text1 = document.getElementById("bill_addr_street").value;
                var text2 = document.getElementById("bill_addr_city").value;
                var text3 = document.getElementById("bill_addr_state").value;
                var text4 = document.getElementById("bill_addr_zip_code").value;
                var text5 = document.getElementById("bill_addr_country").value;
                var text6 = document.getElementById("bill_addr_phone").value;
                var text7 = document.getElementById("bill_addr_fax").value;
            } else{
                text1='';
                text2='';
                text3='';
                text4='';
                text5='';
                text6='';
                text7='';
            }
            
            document.getElementById("ship_addr_street").value=text1;
            document.getElementById("ship_addr_city").value=text2;
            document.getElementById("ship_addr_state").value=text3;
            document.getElementById("ship_addr_zip_code").value=text4;
            document.getElementById("ship_addr_country").value=text5;
            document.getElementById("ship_addr_phone").value=text6;
            document.getElementById("ship_addr_fax").value=text7;
        }*/
    </script>