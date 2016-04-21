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
        <h2>Items List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Unit</th>
		<th>Purchase Price</th>
		<th>Sell Price</th>
		<th>Tax</th>
		<th>Remark</th>
		
            </tr><?php
            foreach ($items_data as $items)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $items->name ?></td>
		      <td><?php echo $items->unit ?></td>
		      <td><?php echo $items->purchase_price ?></td>
		      <td><?php echo $items->sell_price ?></td>
		      <td><?php echo $items->tax ?></td>
		      <td><?php echo $items->remark ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>