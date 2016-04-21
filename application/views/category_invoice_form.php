<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CATEGORY_INVOICE</h3>
                      <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                        <div class="col-xs-12 col-sm-6">
                          <table class='table table-bordered'>
                            <tr><td>Name <?php echo form_error('name') ?></td>
                                  <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                              </td>
                          </table>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <table class='table table-bordered'>
                            <tr><td>Tag <?php echo form_error('tag') ?></td>
                                  <td><input type="text" class="form-control" name="tag" id="tag" placeholder="Tag" value="<?php echo $tag; ?>" />
                              </td>
                          </table>
                        </div>
                        <center>
                          <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                          <a href="<?php echo site_url('category_invoice') ?>" class="btn btn-default">Cancel</a>
                        </center>
                        </form>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->