<?php
session_start();

	include("connect.php");

	$cid = $_SESSION['cid'];
	$ptime = $_POST['ptime'];
	$pdate = $_POST['pdate'];
	$rtime = $_POST['rtime'];
	$rdate = $_POST['rdate'];


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
	$total = $objResult["CARS_PRICE_DAY"] * $objResult2["DIFFDATE"];
	$deposit = 0.1 * $total;
	$pstatus = "Not Paid";
	$rstatus = "Pending";
	$location = $objResult["CARS_LOCATION"];


	$promosi = $total * $objResult['CARS_PROMOTION'] / 100;
	$hargalepaspromosi = $total - $promosi;





	$sql = "INSERT INTO reservation VALUES ( DEFAULT , sysdate ,  :custid , :carid, :pl , :pdate , :ptime , :rl , :rdate , :rtime ,
	:reduration , :reprice , :redeposit , :pstatus , :rstatus  )";

            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ':custid', $_SESSION['id']);
            oci_bind_by_name($stmt, ':carid', $cid );
            oci_bind_by_name($stmt, ':pl', $location );
           	oci_bind_by_name($stmt, ':pdate', $pdate );
            oci_bind_by_name($stmt, ':ptime', $ptime);
            oci_bind_by_name($stmt, ':rl', $location );
            oci_bind_by_name($stmt, ':rdate', $rdate );
            oci_bind_by_name($stmt, ':rtime', $rtime );
            oci_bind_by_name($stmt, ':reduration', $duration );
            oci_bind_by_name($stmt, ':reprice', $hargalepaspromosi);
            oci_bind_by_name($stmt, ':redeposit', $deposit);
            oci_bind_by_name($stmt, ':pstatus', $pstatus );
						oci_bind_by_name($stmt, ':rstatus', $rstatus );
            oci_execute($stmt);





						  echo ("<SCRIPT LANGUAGE='JavaScript'>
						      window.alert('Car reservation successful.')
						        window.location.href='myreservation.php';
						          </SCRIPT>");




 ?>
