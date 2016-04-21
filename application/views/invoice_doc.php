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
        <h2>Invoice List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kdquo</th>
		<th>Custkd</th>
		<th>Invdate</th>
		<th>Subtotal</th>
		<th>Discount</th>
		<th>Tax</th>
		<th>Grdtotal</th>
		<th>Payopt</th>
		<th>Custnotes</th>
		<th>Remark</th>
		
            </tr><?php
            foreach ($invoice_data as $invoice)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $invoice->kdquo ?></td>
		      <td><?php echo $invoice->custkd ?></td>
		      <td><?php echo $invoice->invdate ?></td>
		      <td><?php echo $invoice->subtotal ?></td>
		      <td><?php echo $invoice->discount ?></td>
		      <td><?php echo $invoice->tax ?></td>
		      <td><?php echo $invoice->grdtotal ?></td>
		      <td><?php echo $invoice->payopt ?></td>
		      <td><?php echo $invoice->custnotes ?></td>
		      <td><?php echo $invoice->remark ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>