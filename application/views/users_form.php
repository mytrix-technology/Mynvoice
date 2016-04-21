<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>USERS</h3>
                      <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                        <div class="col-xs-12 col-sm-6">
                          <table class='table table-bordered'>
                            <tr><td>Username <?php echo form_error('username') ?></td>
                                  <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                              </td>
                            <tr><td>Password <?php echo form_error('password') ?></td>
                                  <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                              </td>
                            <tr><td>Email <?php echo form_error('email') ?></td>
                                  <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                              </td>
                            <tr><td>Active <?php echo form_error('active') ?></td>
                                  <td>
                                  <?php echo form_dropdown('active',array('1'=>'AKTIF','0'=>'TIDAK AKTIF'),$active,"class='js-example-basic-single js-states form-control'");?>
                                  <!--<input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />-->
                              </td>
                          </table>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <table class='table table-bordered'>
                            <tr><td>First Name <?php echo form_error('first_name') ?></td>
                                  <td><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
                              </td>
                            <tr><td>Last Name <?php echo form_error('last_name') ?></td>
                                  <td><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
                              </td>
                            <tr><td>Company <?php echo form_error('company') ?></td>
                                  <td><input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $company; ?>" />
                              </td>
                            <tr><td>Phone <?php echo form_error('phone') ?></td>
                                  <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                              </td>
                          </table>
                        </div>
                        <center>
                          <input type="hidden" name="id" value="<?php echo $id; ?>" />
                          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                          <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>  
                        </center>
                        </form>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->