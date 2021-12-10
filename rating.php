<?php

include("connect.php");
$rating = $_REQUEST['rating'];
$rid = $_REQUEST['rid'];




$sql = "INSERT INTO feedback VALUES ( '$rid' , sysdate , '$rating' )";

          $stmt = oci_parse($conn, $sql);
          @oci_execute($stmt);

if(!$stmt){

}else{
  $sql2 = "UPDATE feedback set feedback_rating = '$rating' , feedback_date = sysdate where RESERVATION_ID = '$rid'  ";

  $stmt2 = oci_parse($conn, $sql2);
  oci_execute($stmt2);



}


echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Thank you for rating.')
window.location.href='myfeedback.php';
</SCRIPT>");




 ?>
