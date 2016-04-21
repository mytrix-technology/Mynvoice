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
        <h2>Customer_details List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Customer Id</th>
		<th>Bill Addr Street</th>
		<th>Bill Addr City</th>
		<th>Bill Addr State</th>
		<th>Bill Addr Zip Code</th>
		<th>Bill Addr Country</th>
		<th>Bill Addr Phone</th>
		<th>Bill Addr Fax</th>
		<th>Ship Addr Street</th>
		<th>Ship Addr City</th>
		<th>Ship Addr State</th>
		<th>Ship Addr Zip Code</th>
		<th>Ship Addr Country</th>
		<th>Ship Addr Phone</th>
		<th>Ship Addr Fax</th>
		<th>Notes</th>
		
            </tr><?php
            foreach ($customer_details_data as $customer_details)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $customer_details->customer_id ?></td>
		      <td><?php echo $customer_details->bill_addr_street ?></td>
		      <td><?php echo $customer_details->bill_addr_city ?></td>
		      <td><?php echo $customer_details->bill_addr_state ?></td>
		      <td><?php echo $customer_details->bill_addr_zip_code ?></td>
		      <td><?php echo $customer_details->bill_addr_country ?></td>
		      <td><?php echo $customer_details->bill_addr_phone ?></td>
		      <td><?php echo $customer_details->bill_addr_fax ?></td>
		      <td><?php echo $customer_details->ship_addr_street ?></td>
		      <td><?php echo $customer_details->ship_addr_city ?></td>
		      <td><?php echo $customer_details->ship_addr_state ?></td>
		      <td><?php echo $customer_details->ship_addr_zip_code ?></td>
		      <td><?php echo $customer_details->ship_addr_country ?></td>
		      <td><?php echo $customer_details->ship_addr_phone ?></td>
		      <td><?php echo $customer_details->ship_addr_fax ?></td>
		      <td><?php echo $customer_details->notes ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>