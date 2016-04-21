<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>CONVERT INVOICE</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr><td>Customer Name <?php echo form_error('custkd') ?></td>
                                            <td>
                                            <input type="text" class="form-control" name="custkd" id="custkd" placeholder="custkd" value="<?php echo $custkd; ?>" readonly/>
                                        </td>
                                        <tr><td>Kode Quotation <?php echo form_error('kdquo') ?></td>
                                            <td>
                                            <input type="text" class="form-control" name="kdquo" id="kdquo" placeholder="kdquo" value="<?php echo $kdquo; ?>" readonly/>
                                        </td>
                                        <tr><td>Order Number <?php echo form_error('ordernumber') ?></td>
                                            <td><input type="text" class="form-control" name="ordernumber" id="ordernumber" placeholder="ordernumber" />
                                        </td>
                                        <input type="hidden" name="kdinv" id="kdinv" /> 
                                         
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr><td>Invoice Date <?php echo form_error('invdate') ?></td>
                                            <td><input type="text" class="form-control" name="invdate" id="datepicker1" placeholder="Invdate" />
                                        </td>
                                        <tr><td>Payment Terms <?php echo form_error('payment_terms') ?></td>
                                            <td>
                                                <SELECT name="payment_terms" id="payment_terms" class="js-example-basic-single js-states form-control">
                                                    <OPTION value="0-DOR">Due on Receipt</OPTION>
                                                    <OPTION value="1-N15">Net 15</OPTION>
                                                    <OPTION value="2-N30">Net 30</OPTION>
                                                    <OPTION value="3-N45">Net 45</OPTION>
                                                    <OPTION value="4-N60">Net 60</OPTION>
                                                </SELECT>
                                        </td>
                                        <tr><td>Due Date <?php echo form_error('duedate') ?></td>
                                            <td><input type="text" class="form-control" name="duedate" id="datepicker" placeholder="duedate" />
                                        </td>
                                         
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class="table table-bordered" id="purchaseItems" name="purchaseItems" align="center">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                foreach ($detail_data as $detail) 
                                                {
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="invoice_product[]" id="invoice_product" placeholder="Payment Term" value="<?php echo $detail->itemname ?>" readonly/>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="invoice_product_qty[]" id="invoice_product_qty" placeholder="Payment Term" value="<?php echo $detail->qty; ?>" readonly/>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invoice_product_price[]" id="invoice_product_price" placeholder="Payment Term" value="<?php echo $detail->priceperitem; ?>" readonly/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invoice_product_discount[]" id="invoice_product_discount" placeholder="Payment Term" value="<?php echo $detail->discount; ?>" readonly/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invoice_product_sub[]" id="invoice_product_sub" placeholder="Payment Term" value="<?php echo $detail->totalprice; ?>" readonly/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php  
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div id="invoice_totals" class="padding-right row text-right">
                                        <div class="col-xs-6 col-sm-12"></div>
                                        <div class="col-xs-6 col-sm-12 no-padding-right">
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Sub Total:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="subtotal" id="subtotal" value="<?php echo $subtotal ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Discount:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="discount" id="discount" value="<?php echo $discount ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong class="shipping">Shipping:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invoice_shipping" id="invoice_shipping" value="<?php echo $shipprice ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>TAX:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="invoice_vat" id="invoice_vat" value="<?php echo $tax ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-offset-5">
                                                    <strong>Total:</strong>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon"><?php echo 'Rp' ?></span>
                                                        <input type="text" class="form-control" name="grdtotal" id="grdtotal" value="<?php echo $grdtotal ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered'>
                                        <tr><td>Notes <?php echo form_error('custnotes') ?></td>
                                            <td>
                                            <input type="text" class="form-control" name="custnotes" id="custnotes" placeholder="custnotes" value="<?php echo $custnotes; ?>" readonly/>
                                            <!--<textarea class="form-control" rows="3" name="custnotes" id="custnotes" placeholder="Customer Notes" value="<?php echo $custnotes; ?>"></textarea>-->
                                        </td>
                                        <tr><td>Payment Option <?php echo form_error('payopt') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('payopt','payment_option','nmpay','id','nmpay'); ?>
                                        </td>
                                        <tr><td>Remark <?php echo form_error('remark') ?></td>
                                            <td>
                                            <input type="text" class="form-control" name="remark" id="remark" placeholder="remark" value="<?php echo $remark; ?>" readonly/>
                                            <!--<textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>-->
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
                <button type="submit" class="btn btn-primary">Convert</button> 
                <a href="<?php echo site_url('invoice') ?>" class="btn btn-default">Cancel</a>
              </center>
              <br/>
              </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        