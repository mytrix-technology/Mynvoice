<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Master_status List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Group</th>
		<th>Status Name</th>
		<th>Status Desc</th>
		<th>Is Active</th>
		<th>User Created</th>
		<th>User Updated</th>
		<th>Create On</th>
		<th>Update On</th>
		
            </tr><?php
            foreach ($master_status_data as $master_status)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $master_status->group ?></td>
		      <td><?php echo $master_status->status_name ?></td>
		      <td><?php echo $master_status->status_desc ?></td>
		      <td><?php echo $master_status->is_active ?></td>
		      <td><?php echo $master_status->user_created ?></td>
		      <td><?php echo $master_status->user_updated ?></td>
		      <td><?php echo $master_status->create_on ?></td>
		      <td><?php echo $master_status->update_on ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>