<?php
include('connect.php');

if (isset($_REQUEST['num'])){
	$num = $_REQUEST['num'];
	$cid = $_REQUEST['cid'];

	$sql = "	UPDATE CARSIMAGE SET imgstatus = 'Disabled' WHERE cars_id = :cid and imagenum = :num ";

	$stmt = oci_parse($conn, $sql);
	oci_bind_by_name($stmt, ':cid', $cid);
	oci_bind_by_name($stmt, ':num', $num);
	oci_execute($stmt);


	echo $num;
	echo $cid;

}else{

		$cid = $_GET['cid'];


}


$strSQL3 = "SELECT CARS_ID,FILESTYPE,IMAGENUM from CARSIMAGE where cars_id = '$cid' and imgstatus != 'Disabled'";
$objParse3 = oci_parse($conn, $strSQL3);
oci_execute ($objParse3,OCI_DEFAULT);



while($objResult3 = oci_fetch_array($objParse3,OCI_ASSOC))
{
	$i=0;
?>

<div>
		<img data-u="image" src="<?php echo $objResult3['FILESTYPE'];?>" width="450px"/>
		<a data-id="<?php echo $objResult3['CARS_ID'];?>" data-num="<?php echo $objResult3['IMAGENUM'];;?>" title="Remove images" class="deletecar btn btn-danger"> <img src="x.png" /></a>
</div>
<br />
<?php
$i++;


}











?>
