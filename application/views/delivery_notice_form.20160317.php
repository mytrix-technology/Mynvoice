<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-header">
                        <h3 class='box-title'>DELIVERY_NOTICE</h3>
                            <div class="box box-primary">
                                <div class="col-xs-12 col-sm-8">
                                    <table class='table table-bordered'>
                                        <tr><td>Customer Name <?php echo form_error('custkd') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>
                                        </td>
                                        <tr><td>Kode Invoice <?php echo form_error('kdinv') ?></td>
                                            <td>
                                            <?php echo cmb_dinamis('kdinv','invoice','kdinv','kdinv',$kdinv); ?>
                                        </td>
                                        <tr><td>Delivery Notice Date <?php echo form_error('delnotdate') ?></td>
                                            <td><input type="text" class="form-control" name="delnotdate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Delnotdate" value="<?php echo $delnotdate; ?>" />
                                        </td>
                                        <input type="hidden" name="kddelnot" value="<?php echo $kddelnot; ?>" /> 
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered' id="purchaseItems" name="purchaseItems" align="center">
                                        <tr>
                                            <th>Kode Item</th>
                                            <th>Name Item</th>
                                            <th>Quantity</th>
                                            <th>Sent Quantity</th>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="kodeitem[]" class="form-control next"  />
                                            </td>
                                            <td>
                                                <input type="text" name="nameitem[]" class="form-control tbDescription next"  />
                                            </td>
                                            <td>
                                                <input type="text" name="quantity[]" class="form-control next"  />
                                            </td>
                                            <td>
                                                <input type="text" name="sentquantity[]" class="form-control nextRow" required />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-6"></div>
                                <div class="col-xs-12 col-sm-6"></div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered'>
                                        <tr><td>Notes <?php echo form_error('custnotes') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="custnotes" id="custnotes" placeholder="Customer Notes" value="<?php echo $custnotes; ?>"></textarea>
                                        </td>
                                        <tr><td>Remark <?php echo form_error('remark') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>
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
                <a href="<?php echo site_url('delivery_notice') ?>" class="btn btn-default">Cancel</a>
              </center>
              <br/>
              </form>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->