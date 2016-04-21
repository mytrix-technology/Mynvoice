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
        <h2>Delivery_notice List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kdinv</th>
		<th>Kdquo</th>
		<th>Custkd</th>
		<th>Payoptid</th>
		<th>Delnotdate</th>
		<th>Dateofreceipt</th>
		<th>Custnotes</th>
		<th>Remark</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($delivery_notice_data as $delivery_notice)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $delivery_notice->kdinv ?></td>
		      <td><?php echo $delivery_notice->kdquo ?></td>
		      <td><?php echo $delivery_notice->custkd ?></td>
		      <td><?php echo $delivery_notice->payoptid ?></td>
		      <td><?php echo $delivery_notice->delnotdate ?></td>
		      <td><?php echo $delivery_notice->dateofreceipt ?></td>
		      <td><?php echo $delivery_notice->custnotes ?></td>
		      <td><?php echo $delivery_notice->remark ?></td>
		      <td><?php echo $delivery_notice->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>