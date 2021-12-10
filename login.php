<?php
include('connect.php');
session_start();


$_SESSION['us'] = $_POST['username'];
$_SESSION['pw'] = $_POST['password'];


$cust = oci_parse($conn, "select * from customer where cust_username = :us and cust_password = :pw ");


oci_bind_by_name($cust, ":us", $_POST['username']);
oci_bind_by_name($cust, ":pw", $_POST['password']);


oci_execute($cust);




$row = oci_fetch_all($cust, $res);



if ($row == 1 && $row2 == 0){
  $_SESSION['role'] = "Member";
  $sql3 = "select cust_id from customer where cust_username = :username";
  $stid3 = oci_parse($conn, $sql3);
  oci_bind_by_name($stid3, ':username', $_SESSION["us"]);
  oci_execute($stid3);
  $row3 = oci_fetch_row($stid3);
  $cid = $row3[0];
	$_SESSION['id'] = $cid;
  header("location: dashboard.php");

}else{
  echo "<script>";
  echo "alert('Login Failed. Wrong username or password.')";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
}
?>
