<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CUSTOMER_DETAILS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post">
        <div class="col-md-6">
            <table class='table table-bordered'>
                <tr><td>Billing Address Street <?php echo form_error('bill_addr_street') ?></td>
                    <td>
                    <textarea class="form-control" rows="3" name="bill_addr_street" id="bill_addr_street" placeholder="Billing Address Street" value="<?php echo $bill_addr_street; ?>"></textarea>
                    <!--<input type="text" class="form-control" name="bill_addr_street" id="bill_addr_street" placeholder="Bill Addr Street" value="<?php echo $bill_addr_street; ?>" />-->
                </td>
                <tr><td>Billing Address City <?php echo form_error('bill_addr_city') ?></td>
                    <td><input type="text" class="form-control" name="bill_addr_city" id="bill_addr_city" placeholder="Bill Addr City" value="<?php echo $bill_addr_city; ?>" />
                </td>
                <tr><td>Billing Address State <?php echo form_error('bill_addr_state') ?></td>
                    <td><input type="text" class="form-control" name="bill_addr_state" id="bill_addr_state" placeholder="Bill Addr State" value="<?php echo $bill_addr_state; ?>" />
                </td>
                <tr><td>Billing Address Zip Code <?php echo form_error('bill_addr_zip_code') ?></td>
                    <td><input type="text" class="form-control" name="bill_addr_zip_code" id="bill_addr_zip_code" placeholder="Bill Addr Zip Code" value="<?php echo $bill_addr_zip_code; ?>" />
                </td>
                <tr><td>Billing Address Country <?php echo form_error('bill_addr_country') ?></td>
                    <td><input type="text" class="form-control" name="bill_addr_country" id="bill_addr_country" placeholder="Bill Addr Country" value="<?php echo $bill_addr_country; ?>" />
                </td>
                <tr><td>Billing Address Phone <?php echo form_error('bill_addr_phone') ?></td>
                    <td><input type="text" class="form-control" name="bill_addr_phone" id="bill_addr_phone" placeholder="Bill Addr Phone" value="<?php echo $bill_addr_phone; ?>" />
                </td>
                <tr><td>Billing Address Fax <?php echo form_error('bill_addr_fax') ?></td>
                    <td><input type="text" class="form-control" name="bill_addr_fax" id="bill_addr_fax" placeholder="Bill Addr Fax" value="<?php echo $bill_addr_fax; ?>" />
                </td>
            </table>
        </div>
        <div class="col-md-6">
            <table class='table table-bordered'>
                <tr><td>Shipping Address Street <?php echo form_error('ship_addr_street') ?></td>
                    <td>
                    <textarea class="form-control" rows="3" name="ship_addr_street" id="ship_addr_street" placeholder="Shipping Address Street" value="<?php echo $ship_addr_street; ?>"></textarea>
                    <!--<input type="text" class="form-control" name="ship_addr_street" id="ship_addr_street" placeholder="Ship Addr Street" value="<?php echo $ship_addr_street; ?>" />-->
                </td>
                <tr><td>Shipping Address City <?php echo form_error('ship_addr_city') ?></td>
                    <td><input type="text" class="form-control" name="ship_addr_city" id="ship_addr_city" placeholder="Ship Addr City" value="<?php echo $ship_addr_city; ?>" />
                </td>
                <tr><td>Shipping Address State <?php echo form_error('ship_addr_state') ?></td>
                    <td><input type="text" class="form-control" name="ship_addr_state" id="ship_addr_state" placeholder="Ship Addr State" value="<?php echo $ship_addr_state; ?>" />
                </td>
                <tr><td>Shipping Address Zip Code <?php echo form_error('ship_addr_zip_code') ?></td>
                    <td><input type="text" class="form-control" name="ship_addr_zip_code" id="ship_addr_zip_code" placeholder="Ship Addr Zip Code" value="<?php echo $ship_addr_zip_code; ?>" />
                </td>
                <tr><td>Shipping Address Country <?php echo form_error('ship_addr_country') ?></td>
                    <td><input type="text" class="form-control" name="ship_addr_country" id="ship_addr_country" placeholder="Ship Addr Country" value="<?php echo $ship_addr_country; ?>" />
                </td>
                <tr><td>Shipping Address Phone <?php echo form_error('ship_addr_phone') ?></td>
                    <td><input type="text" class="form-control" name="ship_addr_phone" id="ship_addr_phone" placeholder="Ship Addr Phone" value="<?php echo $ship_addr_phone; ?>" />
                </td>
                <tr><td>Shipping Address Fax <?php echo form_error('ship_addr_fax') ?></td>
                    <td><input type="text" class="form-control" name="ship_addr_fax" id="ship_addr_fax" placeholder="Ship Addr Fax" value="<?php echo $ship_addr_fax; ?>" />
                </td>
            </table>
        </div>
        <table class='table table-bordered'>
	    <!--<tr><td>Customer Id <?php echo form_error('customer_id') ?></td>
            <td><input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="<?php echo $customer_id; ?>" />
        </td>-->
        <tr><td>Notes <?php echo form_error('notes') ?></td>
            <td>
            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes" value="<?php echo $notes; ?>"></textarea>
            <!--<input type="text" class="form-control" name="notes" id="notes" placeholder="Notes" value="<?php echo $notes; ?>" />-->
        </td>
	    <input type="hidden" name="" value="<?php echo $customer_id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('customer_details') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->