<?php
session_start();

                      include ('connect.php');
                      $status = $_GET['status'];
                      $rid =  $_GET['rid'];


                      $sql = "UPDATE reservation SET  reservation_status = :s WHERE RESERVATION_ID = :rid";

                      $stmt = oci_parse($conn, $sql);
                      oci_bind_by_name($stmt, ':rid', $rid);
                      oci_bind_by_name($stmt, ':s', $status);
                      oci_execute($stmt);

                      echo "<script>";
                      echo "alert('Reservation updated')";
                      echo "</script>";
                      echo "<meta http-equiv=\"refresh\" content=\"0; URL=myreservation.php\">";

             ?>
