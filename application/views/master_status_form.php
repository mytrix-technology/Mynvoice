<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>MASTER_STATUS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Group <?php echo form_error('group') ?></td>
            <td><input type="text" class="form-control" name="group" id="group" placeholder="Group" value="<?php echo $group; ?>" />
        </td>
	    <tr><td>Status Name <?php echo form_error('status_name') ?></td>
            <td><input type="text" class="form-control" name="status_name" id="status_name" placeholder="Status Name" value="<?php echo $status_name; ?>" />
        </td>
	    <tr><td>Status Desc <?php echo form_error('status_desc') ?></td>
            <td>
            <textarea class="form-control" rows="3" name="status_desc" id="status_desc" placeholder="Description" value="<?php echo $status_desc; ?>"></textarea>
            <!--<input type="text" class="form-control" name="status_desc" id="status_desc" placeholder="Status Desc" value="<?php echo $status_desc; ?>" />-->
        </td>
	    <tr><td>Is Active <?php echo form_error('is_active') ?></td>
            <td>
            <select name="is_active" id="is_active" class="js-example-basic-single js-states form-control">
                <OPTION value="0">Not Active</OPTION>
                <OPTION value="1">Active</OPTION>
            </select>
            <!--<input type="text" class="form-control" name="is_active" id="is_active" placeholder="Is Active" value="<?php echo $is_active; ?>" />-->
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('master_status') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->