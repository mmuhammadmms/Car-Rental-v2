<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

include("connect.php");

$us = $_POST['email'];


$strSQL = "SELECT count(*) as COUNT FROM customer where CUST_EMAIL = :us ";
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':us', $us);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse,OCI_BOTH);



if($objResult['COUNT'] > 0 ){
  $valid = false;

}else{
  $valid = true;
}



echo json_encode(array(
    'valid' => $valid,
));
