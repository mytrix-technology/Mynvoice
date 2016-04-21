<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
            <form action="<?php echo $action; ?>" method="post">
            <div class="row">
                <div class='col-sm-12'>
                    <div class='box-header'>
                        <h3 class='box-title'>DELIVERY_NOTICE</h3>
                        <div class='box box-primary'>
                            <div class='col-xs-12 col-sm-8'>
                                <table class='table table-bordered'>
                                    <tr><td>Kdinv <?php echo form_error('kdinv') ?></td>
                                        <td>
                                        <?php echo cmb_dinamis('kdinv','invoice','kdinv','kdinv',$kdinv); ?>
                                        <!--<input type="text" class="form-control" name="kdinv" id="kdinv" placeholder="Kdinv" value="<?php echo $kdinv; ?>" />-->
                                    </td>
                                    <tr><td>Custkd <?php echo form_error('custkd') ?></td>
                                        <td>
                                        <?php echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>
                                        <!--<input type="text" class="form-control" name="custkd" id="custkd" placeholder="Custkd" value="<?php echo $custkd; ?>" />-->
                                    </td>
                                    <tr><td>Delivery Notice Date <?php echo form_error('delnotdate') ?></td>
                                        <td><input type="text" class="form-control" name="delnotdate" id="datepicker" data-format="dd-mm-yyyy" placeholder="Delnotdate" value="<?php echo $delnotdate; ?>" />
                                    </td>    
                                </table>
                            </div>
                            <div class='col-xs-12 col-sm-12'>
                                <table class='table table-bordered' id='purchaseItems' name='purchaseItems' align='center'>
                                    <tr>
                                        <th>Kode Item</th>
                                        <th>Name Item</th>
                                        <th>Quantity</th>
                                        <th>Sent Quantity</th>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="kodeitem[]" id="kodeitem" class="form-control next"  />
                                        </td>
                                        <td>
                                            <input type="text" name="nameitem[]" id="nameitem" class="form-control tbDescription next"  />
                                        </td>
                                        <td>
                                            <input type="text" name="quantity[]" id="quantity" class="form-control next"  />
                                        </td>
                                        <td>
                                            <input type="text" name="sentquantity[]" id="sentquantity" class="form-control nextRow" required />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class='col-xs-12 col-sm-12'>
                                <table class='table table-bordered'>
                                    <tr><td>Custnotes <?php echo form_error('custnotes') ?></td>
                                        <td>
                                        <textarea class="form-control" rows="3" name="custnotes" id="custnotes" placeholder="Customer Notes" value="<?php echo $custnotes; ?>"></textarea>
                                        <!--<input type="text" class="form-control" name="custnotes" id="custnotes" placeholder="Custnotes" value="<?php echo $custnotes; ?>" />-->
                                    </td>
                                    <tr><td>Remark <?php echo form_error('remark') ?></td>
                                        <td>
                                        <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>
                                        <!--<input type="text" class="form-control" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>" />-->
                                    </td>
                                    <input type="hidden" name="kddelnot" value="<?php echo $kddelnot; ?>" />
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