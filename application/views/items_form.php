<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>ITEMS</h3>
                      <div class='box box-primary'>
                      <form action="<?php echo $action; ?>" method="post">
                        <div class="col-xs-12 col-sm-6">
                          <table class='table table-bordered'>
                            <tr><td>Name <?php echo form_error('name') ?></td>
                                  <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                              </td>
                            <tr><td>Unit <?php echo form_error('unit') ?></td>
                                  <td><input type="text" class="form-control" name="unit" id="unit" placeholder="Unit" value="<?php echo $unit; ?>" />
                              </td>
                            <tr><td>Tax <?php echo form_error('tax') ?></td>
                                  <td><input type="text" class="form-control" name="tax" id="tax" placeholder="Tax" value="<?php echo $tax; ?>" />
                              </td>
                          </table>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <table class='table table-bordered'>
                            <tr><td>Purchase Price <?php echo form_error('purchase_price') ?></td>
                                  <td><input type="text" class="form-control" name="purchase_price" id="purchase_price" placeholder="Purchase Price" value="<?php echo $purchase_price; ?>" />
                              </td>
                            <tr><td>Sell Price <?php echo form_error('sell_price') ?></td>
                                  <td><input type="text" class="form-control" name="sell_price" id="sell_price" placeholder="Sell Price" value="<?php echo $sell_price; ?>" />
                              </td>
                          </table>
                        </div>
                        <div class="col-xs-12 col-sm-12">
                          <table class='table table-bordered'>
                            <tr><td>Remark <?php echo form_error('remark') ?></td>
                              <td>
                                <textarea class="form-control" rows="3" name="remark" id="remark" placeholder="Remark" value="<?php echo $remark; ?>"></textarea>
                              </td>
                              <input type="hidden" name="kditem" value="<?php echo $kditem; ?>" />
                            <tr><td>
                              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                              <a href="<?php echo site_url('items') ?>" class="btn btn-default">Cancel</a>
                            </td></tr>
                          </table>
                        </div>
                    </form>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->