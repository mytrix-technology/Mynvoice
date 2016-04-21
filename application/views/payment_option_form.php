<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-8'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PAYMENT_OPTION</h3>
                      <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                        <table class='table table-bordered'>
                    	    <tr><td>Nama <?php echo form_error('nmpay') ?></td>
                                <td><input type="text" class="form-control" name="nmpay" id="nmpay" placeholder="Name Payment Option" value="<?php echo $nmpay; ?>" />
                            </td>
                    	    <tr><td>Description <?php echo form_error('descpay') ?></td>
                                <td>
                                <textarea class="form-control" rows="3" name="descpay" id="descpay" placeholder="Description Payment Option" value="<?php echo $descpay; ?>"></textarea>
                            </td>
                    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    	    <a href="<?php echo site_url('payment_option') ?>" class="btn btn-default">Cancel</a></td></tr>
                    	  </table></form>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->