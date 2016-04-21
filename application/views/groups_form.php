<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-8'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>GROUPS</h3>
                      <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
                    	    <tr><td>Name <?php echo form_error('name') ?></td>
                                <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                            </td>
                    	    <tr><td>Description <?php echo form_error('description') ?></td>
                                <td>
                                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>"></textarea>
                                <!--<input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />-->
                          </td>
                          <tr><td>Permissions </td>
                              <td>
                              <?php echo cmb_dinamis_multi('id','permissions','name','id',$id); ?>
                            </td>
                    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    	    <a href="<?php echo site_url('groups') ?>" class="btn btn-default">Cancel</a></td></tr>
                  	    </table></form>
                      </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->