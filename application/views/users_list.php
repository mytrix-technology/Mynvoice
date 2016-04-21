
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>USERS LIST <?php echo anchor('users/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('users/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('users/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('users/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped table-hover dt-responsive" id="example1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="20px">No</th>
		    <th>Username</th>
		    <th>Email</th>
		    <th>Active</th>
		    <th>Full Name</th>
		    <th>Group</th>
		    <th>Permission</th>
		    <th>Is Active</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $users->username ?></td>
		    <td><?php echo $users->email ?></td>
		    <td><?php echo $users->active ?></td>
		    <td><?php echo $users->first_name+' '+$users->last_name ?></td>
		    <td>
                <?php 
                    //echo $users->name;
                    foreach ($groups_data as $groups)
                    {
                        if ($users->id == $groups->user_id) {
                            echo $groups->name;
                            echo ",";
                        }
                    }
                ?>
            </td>
		    <td><?php echo $users->permission ?></td>
		    <td><?php echo $users->active ?></td>
		    <td style="text-align:center" width="140px">
			<?php
			echo anchor(site_url('users/read/'.$users->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm'));
			echo '  ';
			echo anchor(site_url('users/update/'.$users->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm'));
			//echo '  ';
			//echo anchor(site_url('users/delete/'.$users->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->