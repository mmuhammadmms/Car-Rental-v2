
              <?php

              include ("connect.php");
              $cid = $_GET['cid'];
              $sql = "UPDATE cars SET cars_status = 'Removed' where cars_id = :cid";
              $stmt = oci_parse($conn, $sql);
              oci_bind_by_name($stmt, ':cid', $cid);
              $result = oci_execute($stmt);





              						  echo ("<SCRIPT LANGUAGE='JavaScript'>
              						      window.alert('Car removed.')
              						        window.location.href='mycars.php';
              						          </SCRIPT>");



              ?>
