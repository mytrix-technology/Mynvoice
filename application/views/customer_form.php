<!-- Main content -->
    <section class='content'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='box'>
                    <form action="<?php echo $action; ?>" method="post">
                        <div class='box-header'>
                            <h3 class='box-title'>CUSTOMER</h3>
                            <div class='box box-primary'>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr><td>Salutation <?php echo form_error('salutation') ?></td>
                                            <td>
                                                <SELECT name="salutation" id="salutation" class="js-example-basic-single js-states form-control">
                                                    <OPTION value="Tn">Tuan</OPTION>
                                                    <OPTION value="Ny">Nyonya</OPTION>
                                                    <OPTION value="Nn">Nona</OPTION>
                                                </SELECT>
                                        </td>
                                        <tr><td>First Name <?php echo form_error('first_name') ?></td>
                                            <td><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
                                        </td>
                                        <tr><td>Last Name <?php echo form_error('last_name') ?></td>
                                            <td><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
                                        </td>
                                        <tr><td>Display Name <?php echo form_error('display_name') ?></td>
                                            <td><input type="text" class="form-control" name="display_name" id="display_name" placeholder="Display Name" value="<?php echo $display_name; ?>" />
                                        </td>
                                        <tr><td>Email <?php echo form_error('email') ?></td>
                                            <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                        </td>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <table class='table table-bordered'>
                                        <tr><td>Phone <?php echo form_error('phone') ?></td>
                                            <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                                        </td>
                                        <tr><td>Website <?php echo form_error('website') ?></td>
                                            <td><input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" />
                                        </td>
                                        <tr><td>Company Name <?php echo form_error('company_name') ?></td>
                                            <td><input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>" />
                                        </td>
                                        <tr><td>Currency <?php echo form_error('currency') ?></td>
                                            <td>
                                                <SELECT name="currency" id="currency" class="js-example-basic-single js-states form-control">
                                                    <OPTION value="IDR">IDR - Rupiah</OPTION>
                                                    <OPTION value="USD">USD - US Dollar</OPTION>
                                                </SELECT>
                                            <!--<input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" value="<?php echo $currency; ?>" />-->
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
                                            <!--<input type="text" class="form-control" name="payment_terms" id="payment_terms" placeholder="Payment Terms" value="<?php echo $payment_terms; ?>" />-->
                                        </td>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <table class='table table-bordered'>
                                        <tr><td>Notes <?php echo form_error('notes') ?></td>
                                            <td>
                                            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes" value="<?php echo $notes; ?>"></textarea>
                                        </td>
                                        <input type="hidden" name="kdcust" value="<?php echo $kdcust; ?>" /> 
                                    </table>
                                </div>
                            </div><!-- /.box-body -->
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class='box-header'>
                                    <h3 class='box-title'>BILLING ADDRESS</h3>
                                    <div class='box box-primary'>
                                        <table class='table table-bordered'>
                                            <tr><td>Street <?php echo form_error('bill_addr_street') ?></td>
                                                <td><textarea class="form-control" rows="3" name="bill_addr_street" id="bill_addr_street" placeholder="Billing Address Street" value="<?php echo $bill_addr_street; ?>"></textarea>
                                            </td>
                                            <tr><td>City <?php echo form_error('bill_addr_city') ?></td>
                                                <td><input type="text" class="form-control" name="bill_addr_city" id="bill_addr_city" placeholder="Billing Address City" value="<?php echo $bill_addr_city; ?>" />
                                            </td>
                                            <tr><td>State <?php echo form_error('bill_addr_state') ?></td>
                                                <td><input type="text" class="form-control" name="bill_addr_state" id="bill_addr_state" placeholder="Billing Address State" value="<?php echo $bill_addr_state; ?>" />
                                            </td>
                                            <tr><td>Zip Code <?php echo form_error('bill_addr_zip_code') ?></td>
                                                <td><input type="text" class="form-control" name="bill_addr_zip_code" id="bill_addr_zip_code" placeholder="Billing Address Zip Code" value="<?php echo $bill_addr_zip_code; ?>" />
                                            </td>
                                            <tr><td>Country <?php echo form_error('bill_addr_country') ?></td>
                                                <td><input type="text" class="form-control" name="bill_addr_country" id="bill_addr_country" placeholder="Billing Address Street" value="<?php echo $bill_addr_country; ?>" />
                                            </td>
                                            <tr><td>Phone <?php echo form_error('bill_addr_phone') ?></td>
                                                <td><input type="text" class="form-control" name="bill_addr_phone" id="bill_addr_phone" placeholder="Billing Address Phone" value="<?php echo $bill_addr_phone; ?>" />
                                            </td>
                                            <tr><td>Fax <?php echo form_error('bill_addr_fax') ?></td>
                                                <td><input type="text" class="form-control" name="bill_addr_fax" id="bill_addr_fax" placeholder="Billing Address Fax" value="<?php echo $bill_addr_fax; ?>" />
                                            </td>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class='box-header'>
                                    <h3 class='box-title'>SHIPPING ADDRESS</h3>
                                    <div class='box box-primary'>
                                        <table class='table table-bordered'>
                                            <tr><td>Street <?php echo form_error('ship_addr_street') ?></td>
                                                <td><textarea class="form-control" rows="3" name="ship_addr_street" id="ship_addr_street" placeholder="Shipping Address Street" value="<?php echo $ship_addr_street; ?>"></textarea>
                                            </td>
                                            <tr><td>City <?php echo form_error('ship_addr_city') ?></td>
                                                <td><input type="text" class="form-control" name="ship_addr_city" id="ship_addr_city" placeholder="Shipping Address City" value="<?php echo $ship_addr_city; ?>" />
                                            </td>
                                            <tr><td>State <?php echo form_error('ship_addr_state') ?></td>
                                                <td><input type="text" class="form-control" name="ship_addr_state" id="ship_addr_state" placeholder="Shipping Address State" value="<?php echo $ship_addr_state; ?>" />
                                            </td>
                                            <tr><td>Zip Code <?php echo form_error('ship_addr_zip_code') ?></td>
                                                <td><input type="text" class="form-control" name="ship_addr_zip_code" id="ship_addr_zip_code" placeholder="Shipping Address Zip Code" value="<?php echo $ship_addr_zip_code; ?>" />
                                            </td>
                                            <tr><td>Country <?php echo form_error('ship_addr_country') ?></td>
                                                <td><input type="text" class="form-control" name="ship_addr_country" id="ship_addr_country" placeholder="Shipping Address Country" value="<?php echo $ship_addr_country; ?>" />
                                            </td>
                                            <tr><td>Phone <?php echo form_error('ship_addr_phone') ?></td>
                                                <td><input type="text" class="form-control" name="ship_addr_phone" id="ship_addr_phone" placeholder="Shipping Address Phone" value="<?php echo $ship_addr_phone; ?>" />
                                            </td>
                                            <tr><td>Fax <?php echo form_error('ship_addr_fax') ?></td>
                                                <td><input type="text" class="form-control" name="ship_addr_fax" id="ship_addr_fax" placeholder="Shipping Address Fax" value="<?php echo $ship_addr_fax; ?>" />
                                            </td>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <div align="right">
                            <input type="checkbox" name="check1" onchange="copyTextValue(this);">
                            <em>Check this box if Shipping Address and Billing Address are the same.</em>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a>
                        </center>
                        <br/>
                    </form>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <script type="text/javascript">
        function copyTextValue(bf) {
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
        }
    </script>