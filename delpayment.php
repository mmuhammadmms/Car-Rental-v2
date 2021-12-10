<?php

include ("connect.php");
$rid = $_GET['rid'];
$pid = $_GET['pid'];




echo $rid;
echo $pid;

  $sql = 'BEGIN delpayment( :rsv , :pid ); END;';

  $stmt = oci_parse($conn,$sql);
  oci_bind_by_name($stmt, ':rsv', $rid);
  oci_bind_by_name($stmt, ':pid', $pid);
  oci_execute($stmt);










    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Payment deleted.')
          window.location.href='payment.php';
            </SCRIPT>");






 ?>
