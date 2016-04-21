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
        <h2>Customer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Salutation</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Display Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Website</th>
		<th>Company Name</th>
		<th>Currency</th>
		<th>Payment Terms</th>
		
            </tr><?php
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $customer->salutation ?></td>
		      <td><?php echo $customer->first_name ?></td>
		      <td><?php echo $customer->last_name ?></td>
		      <td><?php echo $customer->display_name ?></td>
		      <td><?php echo $customer->email ?></td>
		      <td><?php echo $customer->phone ?></td>
		      <td><?php echo $customer->website ?></td>
		      <td><?php echo $customer->company_name ?></td>
		      <td><?php echo $customer->currency ?></td>
		      <td><?php echo $customer->payment_terms ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>