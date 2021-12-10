<?php
$rid = $_REQUEST['rid'];


 ?>




<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4><span class="glyphicon glyphicon-user"></span>Reservation : <?php echo $rid;?></h4>
</div>
<div class="modal-body">

<?php
include ("connect.php");


$strSQL2 = "select * from customer CR,cars C , reservation R , carsimage I where C.cars_id = I.cars_id AND R.reservation_id = '$rid' AND C.cars_id = R.cars_id AND CR.cust_id = R.cust_id";
$objParse2 = oci_parse($conn, $strSQL2);
oci_execute ($objParse2,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse2,OCI_ASSOC);








$pricecar = $objResult['CARS_PRICE_DAY'] * $objResult['RENTAL_DURATION'];


 ?>


 <center>

 <img src="<?php echo $objResult['FILESTYPE'];?>"alt="" width="70%" height="70%">


 </center>
 <br /><br />


	<table class="table table-striped table-hover table-bordered">
		    <tr>
		      <td class="col-md-3">Car</td>
		      <td width="35%"><?php echo $objResult['CARS_NAME'];?></td>
		    </tr>
        <tr>
          <td class="col-md-3">Customer</td>
          <td width="35%"><?php echo $objResult['CUST_FNAME'] . " " . $objResult['CUST_LNAME'];?></td>
        </tr>
        <tr>
          <td class="col-md-3">Contact Number</td>
          <td width="35%"><?php echo $objResult['CUST_NUMBER'];?></td>
        </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		    </tr>
		    <tr>
		      <td>Rental Duration</td>
		      <td><?php echo $objResult['RENTAL_DURATION'];?> Days</td>
		    </tr>
		    <tr>
		      <td> &nbsp;</td>
		      <td> &nbsp;</td>
		    </tr>
		    <tr>
		      <td>Location</td>
		      <td><?php echo $objResult['CARS_LOCATION'];?></td>
		    </tr>
				<tr>
					<td> &nbsp;</td>
					<td> &nbsp;</td>
				</tr>
		    <tr>
		      <td>Price</td>
		      <td>RM <?php echo $objResult['CARS_PRICE_DAY'];?> / day</td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><?php echo $objResult['RENTAL_DURATION'];?> days x RM <?php echo $objResult['CARS_PRICE_DAY'];?></td>
		    </tr>
				<tr>
					<td>&nbsp;</td>
					<td>RM <?php echo $pricecar;?></td>
				</tr>
		    <tr>
		      <td>Discount</td>
		      <td><?php echo $objResult['CARS_PROMOTION'];?> %</td>
		    </tr>
		    <tr>
		      <td>Total Price</td>
		      <td>RM <?php echo $objResult['RENTAL_PRICE'];?></td>
		    </tr>
				<tr>
					<td>Deposit	( 10% of RM <?php echo $objResult['RENTAL_PRICE'];?> )</td>
					<td>RM <?php echo $objResult['RENTAL_DEPOSIT'];?></td>
				</tr>

		  </table>






</div>
