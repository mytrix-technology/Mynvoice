<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
            <form action="<?php echo $action; ?>" method="post">
            <div class="row">
                <div class='col-sm-12'>
                    <div class='box-header'>
                        <h3 class='box-title'>DELIVERY NOTICE</h3>
                        <div class='box box-primary'>
                            <div class='col-xs-12 col-sm-8'>
                                <table class='table table-bordered'>
                                    <tr><td>Kdinv <?php echo form_error('kdinv') ?></td>
                                        <td>
                                        <!--<?php echo cmb_dinamis('kdinv','invoice','kdinv','kdinv',$kdinv); ?>-->
                                        <input type="text" class="form-control" name="kdinv" id="kdinv" placeholder="Kdinv" value="<?php echo $kdinv; ?>" readonly />
                                    </td>
                                    <tr><td>Custkd <?php echo form_error('custkd') ?></td>
                                        <td>
                                        <!--<?php echo cmb_dinamis('custkd','customer','display_name','kdcust','display_name'); ?>-->
                                        <input type="text" class="form-control" name="custkd" id="custkd" placeholder="Custkd" value="<?php echo $custkd; ?>" readonly />
                                    </td>
                                    <tr><td>Delivery Notice Date </td>
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
                                    <?php
                                        foreach ($detail_data as $detail) 
                                        {
                                    ?> 
                                    <tr>
                                        <td>
                                            <input type="text" name="kodeitem[]" id="kodeitem" class="form-control" value="<?php echo $detail->itemkd ?>" readonly />
                                        </td>
                                        <td>
                                            <input type="text" name="nameitem[]" id="nameitem" class="form-control" value="<?php echo $detail->itemname ?>" readonly />
                                        </td>
                                        <td>
                                            <input type="text" name="quantity[]" id="quantity" class="form-control" value="<?php echo $detail->qty ?>" readonly />
                                        </td>
                                        <td>
                                            <input type="text" name="sentquantity[]" id="sentquantity" class="form-control nextRow" required />
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                            <div class='col-xs-12 col-sm-12'>
                                <table class='table table-bordered'>
                                    <tr><td>Custnotes <?php echo form_error('custnotes') ?></td>
                                        <td>
                                        <!--<textarea class="form-control" rows="3" name="custnotes" id="custnotes" placeholder="Customer Notes" value="<?php echo $custnotes; ?>"></textarea>-->
                                        <input type="text" class="form-control" name="custnotes" id="custnotes" value="<?php echo $custnotes; ?>" readonly />
                                    </td>
                                    <tr><td>Remark <?php echo form_error('remark') ?></td>
                                        <td>
                                        <!--<textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>-->
                                        <input type="text" class="form-control" name="remark" id="remark" value="<?php echo $remark; ?>" readonly />
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