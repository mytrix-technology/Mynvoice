<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>NOTA</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8">
                                    <table class='table table-bordered'>
                                        <tr><td>Customer Name <?php echo form_error('custkd') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>
                                        </td>
                                        <tr><td>Nota Date <?php echo form_error('notadate') ?></td>
                                            <td><input type="text" class="form-control" name="notadate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Notadate" value="<?php echo $notadate; ?>" />
                                        </td>
                                         
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <!--<table class='table table-bordered' id="purchaseItems" name="purchaseItems" align="center">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Item Desc</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Tax</th>
                                            <th>Line Total</th>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php //echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>
                                                <input type="text" name="kodeitem[]" id="kodeitem" class="autocomplete nama form-control nextRow" required />
                                            </td>
                                            <td>
                                                <textarea class="autocomplete form-control tbDescription nextRow" rows="2" name="description[]" id="v_description" placeholder="Remark" required></textarea>
                                            </td>
                                            <td>
                                                <input type="text" name="quantity[]" id="quantity" class="form-control next" required />
                                            </td>
                                            <td>
                                                <input type="text" name="price[]" id="v_price" class="autocomplete form-control nextRow" required />
                                            </td>
                                            <td>
                                                <input type="text" name="tax[]" id="tax" class="form-control nextRow" required />
                                            </td>
                                            <td>
                                                <input type="text" name="lineTotal[]" id="lineTotal" class="form-control" required />
                                            </td>
                                            <td>
                                                <input type="button" name="addRow[]" class="add" value='+' />
                                            </td>
                                            <td>
                                                <input type="button" name="addRow[]" class="removeRow" value='-' />
                                            </td>
                                        </tr>
                                    </table>
                                    -->
                                </div>
                                <div class="col-xs-12 col-sm-4"></div>
                                <div class="col-xs-12 col-sm-8">
                                    <table class='table table-bordered'>
                                        <tr><td>Sub Total <?php echo form_error('subtotal') ?></td>
                                            <td>
                                            <input type="text" class="form-control" name="subtotal" id="subtotal" placeholder="subtotal" value="<?php echo $custkd; ?>"  />
                                        </td>
                                        <tr><td>Discount (%) <?php echo form_error('discount') ?></td>
                                            <td><input type="text" class="form-control" name="discount" id="discount" placeholder="Quodate" value="<?php echo $subtotal; ?>" />
                                        </td>
                                        <tr><td>PPN (10%) <?php echo form_error('ppn') ?></td>
                                            <td><input type="text" class="form-control" name="ppn" id="ppn" placeholder="Expdate" value="<?php echo $subtotal; ?>" />
                                        </td>
                                        <tr><td>Shipping Charges <?php echo form_error('shipcharge') ?></td>
                                            <td><input type="text" class="form-control" name="shipcharge" id="shipcharge" placeholder="Subtotal" value="<?php echo $subtotal; ?>" />
                                        </td>
                                        <tr><td>Grand Total (Rp) <?php echo form_error('grdtotal') ?></td>
                                            <td><input type="text" class="form-control" name="grdtotal" id="grdtotal" placeholder="Tax" value="<?php echo $grdtotal; ?>"  />
                                        </td>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered'>
                                        <tr><td>Notes <?php echo form_error('custnotes') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="custnotes" id="custnotes" placeholder="Customer Notes" value="<?php echo $custnotes; ?>"></textarea>
                                        </td>
                                        <tr><td>Payment Option <?php echo form_error('payopt') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('payopt','payment_option','nmpay','id','nmpay'); ?>
                                        </td>
                                        <tr><td>Remark <?php echo form_error('remark') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>
                                        </td>
                                    </table>
                                </div>
                                <input type="hidden" name="kdnota" value="<?php echo $kdnota; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
              <center>
                <button type="submit" class="btn btn-primary">Save</button> 
                <a href="<?php echo site_url('nota') ?>" class="btn btn-default">Cancel</a>
              </center>
              <br/>
              </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->