<?php
$conn = oci_connect("BENGKEL1","1234","XE");
if($conn)
{
//echo "Oracle Server Connected";
}
else
{
echo "Can not connect to Oracle Server";
}
?>
