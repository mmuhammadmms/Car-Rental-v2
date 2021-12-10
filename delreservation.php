<?php


  include ('connect.php');
  $rid = $_GET['rid'];



    $sql = "UPDATE RESERVATION SET reservation_status = 'Canceled' WHERE reservation_id = :rid";

  $stmt = oci_parse($conn, $sql);
  oci_bind_by_name($stmt, ':rid', $rid);
  oci_execute($stmt);







      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Reservation canceled.')
            window.location.href='myreservation.php';
              </SCRIPT>");


?>
