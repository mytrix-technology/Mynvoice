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
        <h2>Payment_received List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Ctpay</th>
		<th>Custkd</th>
		<th>Bankcharge</th>
		<th>Paydate</th>
		<th>Paymode</th>
		<th>Reference</th>
		<th>Kdinv</th>
		<th>Invdate</th>
		<th>Invamount</th>
		<th>Dueamount</th>
		<th>Amount</th>
		<th>Remark</th>
		<th>Upload</th>
		
            </tr><?php
            foreach ($payment_received_data as $payment_received)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $payment_received->ctpay ?></td>
		      <td><?php echo $payment_received->custkd ?></td>
		      <td><?php echo $payment_received->bankcharge ?></td>
		      <td><?php echo $payment_received->paydate ?></td>
		      <td><?php echo $payment_received->paymode ?></td>
		      <td><?php echo $payment_received->reference ?></td>
		      <td><?php echo $payment_received->kdinv ?></td>
		      <td><?php echo $payment_received->invdate ?></td>
		      <td><?php echo $payment_received->invamount ?></td>
		      <td><?php echo $payment_received->dueamount ?></td>
		      <td><?php echo $payment_received->amount ?></td>
		      <td><?php echo $payment_received->remark ?></td>
		      <td><?php echo $payment_received->upload ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>