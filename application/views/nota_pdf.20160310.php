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
        <br/>
        <?php 
            foreach ($nota_data as $nota) {
        ?>
        <table class="word-table" style="margin-bottom: 10px">
            
        </table>
        <address>
            Lindeteves Trade Center (LTC Glodok) - Lt 2 - Blok C16 No. 01<br>
            Jl. Hayam Wuruk no. 127 Jakarta Barat, 11180 - Indonesia<br>
            T: 021-26071151 ; F: 021-26071151<br>
            Email: sales@sentralnet.com
        </address>
            <?php echo date('d F Y') ?><br/>
            <br/>
            <b>Faktur No : <?php echo $nota->kdnota; ?></b><br/>
            <b>Date:</b> <?php echo $nota->notadate; ?><br/>
        
        <!-- Table row -->
            <table class="word-table" style="margin-bottom: 10px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Item & Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Call of Duty - 455-981-221</td>
                    <td>1</td>
                    <td>$64.50</td>
                    <td>$64.50</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Need for Speed IV - 247-925-726</td>
                    <td>1</td>
                    <td>$50.00</td>
                    <td>$50.00</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Monsters DVD - 735-845-642</td>
                    <td>1</td>
                    <td>$10.70</td>
                    <td>$10.70</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Grown Ups Blue Ray - 422-568-642</td>
                    <td>1</td>
                    <td>$25.99</td>
                    <td>$25.99</td>
                  </tr>
                </tbody>
            </table>
            
            <P align="right">
                <strong>Total: Rp <?php echo $nota->grdtotal; ?>,00</strong>
            </P>
            <br><br><br><br><br>
            <P align="right">
                <strong>(PT. Infranetindo Mitra Solusi)</strong>
            </P>
        <?php        
            }
        ?>

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