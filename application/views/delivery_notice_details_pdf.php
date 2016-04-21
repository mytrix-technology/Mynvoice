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
        <h2>Delivery_notice_details List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kddelnot</th>
		<th>Itemkd</th>
		<th>Itemname</th>
		<th>Qty</th>
		<th>Upload</th>
		
            </tr><?php
            foreach ($delivery_notice_details_data as $delivery_notice_details)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $delivery_notice_details->kddelnot ?></td>
		      <td><?php echo $delivery_notice_details->itemkd ?></td>
		      <td><?php echo $delivery_notice_details->itemname ?></td>
		      <td><?php echo $delivery_notice_details->qty ?></td>
		      <td><?php echo $delivery_notice_details->upload ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>