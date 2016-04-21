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
        <h2>Quotation List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Custkd</th>
		<th>Quodate</th>
		<th>Expdate</th>
		<th>Subtotal</th>
		<th>Discount</th>
		<th>Tax</th>
		<th>Grdtotal</th>
		<th>Custnotes</th>
		<th>Remark</th>
		
            </tr><?php
            foreach ($quotation_data as $quotation)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $quotation->custkd ?></td>
		      <td><?php echo $quotation->quodate ?></td>
		      <td><?php echo $quotation->expdate ?></td>
		      <td><?php echo $quotation->subtotal ?></td>
		      <td><?php echo $quotation->discount ?></td>
		      <td><?php echo $quotation->tax ?></td>
		      <td><?php echo $quotation->grdtotal ?></td>
		      <td><?php echo $quotation->custnotes ?></td>
		      <td><?php echo $quotation->remark ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>