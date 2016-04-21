<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DELIVERY_NOTICE_DETAILS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kddelnot <?php echo form_error('kddelnot') ?></td>
            <td><input type="text" class="form-control" name="kddelnot" id="kddelnot" placeholder="Kddelnot" value="<?php echo $kddelnot; ?>" />
        </td>
	    <tr><td>Itemkd <?php echo form_error('itemkd') ?></td>
            <td><input type="text" class="form-control" name="itemkd" id="itemkd" placeholder="Itemkd" value="<?php echo $itemkd; ?>" />
        </td>
	    <tr><td>Itemname <?php echo form_error('itemname') ?></td>
            <td><input type="text" class="form-control" name="itemname" id="itemname" placeholder="Itemname" value="<?php echo $itemname; ?>" />
        </td>
	    <tr><td>Qty <?php echo form_error('qty') ?></td>
            <td><input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </td>
	    <tr><td>Upload <?php echo form_error('upload') ?></td>
            <td><input type="text" class="form-control" name="upload" id="upload" placeholder="Upload" value="<?php echo $upload; ?>" />
        </td>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('delivery_notice_details') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->