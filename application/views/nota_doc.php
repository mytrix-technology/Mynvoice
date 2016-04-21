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
        <h2>Nota List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Custkd</th>
		<th>Notadate</th>
		<th>Subtotal</th>
		<th>Discount</th>
		<th>Tax</th>
		<th>Grdtotal</th>
		<th>Payopt</th>
		<th>Custnotes</th>
		<th>Remark</th>
		
            </tr><?php
            foreach ($nota_data as $nota)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nota->custkd ?></td>
		      <td><?php echo $nota->notadate ?></td>
		      <td><?php echo $nota->subtotal ?></td>
		      <td><?php echo $nota->discount ?></td>
		      <td><?php echo $nota->tax ?></td>
		      <td><?php echo $nota->grdtotal ?></td>
		      <td><?php echo $nota->payopt ?></td>
		      <td><?php echo $nota->custnotes ?></td>
		      <td><?php echo $nota->remark ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>