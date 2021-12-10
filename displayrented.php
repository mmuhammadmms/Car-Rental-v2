<?php
include ("connect.php");
session_start();
$cid = $_REQUEST['cid'];
$_SESSION['cid'] = $_REQUEST['cid'];


$ptime = $_REQUEST['ptime'];
$pdate = $_REQUEST['pdate'];
$rtime = $_REQUEST['rtime'];
$rdate = $_REQUEST['rdate'];
$location = $_REQUEST['location'];

$strSQL2 = "SELECT to_date('$rdate','DD/MM/YYYY')-to_date('$pdate','DD/MM/YYYY') AS DiffDate from dual";
$objParse2 = oci_parse($conn, $strSQL2);
oci_execute ($objParse2,OCI_DEFAULT);

$objResult2 = oci_fetch_array($objParse2,OCI_BOTH);
$duration = $objResult2["DIFFDATE"];




$strSQL = "select * from cars C , carsimage I where C.cars_id = I.cars_id and C.cars_id = '$cid' ";
$objParse = oci_parse($conn, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse,OCI_ASSOC);

$pricecar = $objResult["CARS_PRICE_DAY"] * $objResult2["DIFFDATE"] ;
$total = $objResult["CARS_PRICE_DAY"] * $objResult2["DIFFDATE"] ;
$deposit = 0.1 * $total;

$promosi = $total * $objResult['CARS_PROMOTION'] / 100;
$hargalepaspromosi = $total - $promosi;
	?>
<center>

<img src="<?php echo $objResult['FILESTYPE'];?>"alt="" width="70%" height="70%">


</center>
<br /><br />


<div class="col-md-8 col-md-offset-2" >
<table class="table table-striped table-hover table-bordered">
	    <tr>
	      <td class="col-md-3">Car</td>
	      <td width="35%"><?php echo $objResult['CARS_NAME']?><input name="cid" type="hidden" value="<?php echo $cid;?>"></td>
	    </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	    </tr>
	    <tr>
	      <td>Rental Duration</td>
	      <td><?php echo $duration;?> Days</td>
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
	      <td>Pickup</td>
	      <td><?php echo $pdate;?>, <?php echo $ptime;?></td>
	    </tr>

	    <tr>
	      <td>Return</td>
	      <td><?php echo $rdate;?>, <?php echo $rtime;?></td>
	    </tr>
			<tr>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
			</tr>
	    <tr>
	      <td>Price</td>
	      <td>RM <?php echo $objResult['CARS_PRICE_DAY']?> / day</td>
	    </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td><?php echo $duration;?> days x RM <?php echo $objResult['CARS_PRICE_DAY']?></td>
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
	      <td>RM <?php echo $hargalepaspromosi;?></td>
	    </tr>
			<tr>
				<td>Deposit	( 10% of RM <?php echo $hargalepaspromosi;?> )</td>
				<td>RM <?php echo $deposit;?></td>
			</tr>

	  </table>
</div>
