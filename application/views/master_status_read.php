
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Master_status Read</h3>
        <table class="table table-bordered">
	    <tr><td>Group</td><td><?php echo $group; ?></td></tr>
	    <tr><td>Status Name</td><td><?php echo $status_name; ?></td></tr>
	    <tr><td>Status Desc</td><td><?php echo $status_desc; ?></td></tr>
	    <tr><td>Is Active</td><td><?php echo $is_active; ?></td></tr>
	    <tr><td>User Created</td><td><?php echo $user_created; ?></td></tr>
	    <tr><td>User Updated</td><td><?php echo $user_updated; ?></td></tr>
	    <tr><td>Create On</td><td><?php echo $create_on; ?></td></tr>
	    <tr><td>Update On</td><td><?php echo $update_on; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('master_status') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->