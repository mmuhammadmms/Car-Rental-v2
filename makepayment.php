<?php

include ("connect.php");
$rid = $_POST['rid'];
$amount = $_POST['amount'];
$type = $_POST['type'];




  $sql = 'BEGIN addpayment( :rsv , :amount , :type ); END;';

  $stmt = oci_parse($conn,$sql);
  oci_bind_by_name($stmt, ':rsv', $rid);
  oci_bind_by_name($stmt, ':amount', $amount );
  oci_bind_by_name($stmt, ':type', $type );
  oci_execute($stmt);









  echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Payment added.')
        window.location.href='payment.php';
          </SCRIPT>");






 ?>
