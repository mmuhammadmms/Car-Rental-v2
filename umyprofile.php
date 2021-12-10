
            <?php
              include ("myprofile.php");
                      $cid = $_SESSION['us'];
                      include ('connect.php');

                      $sql = "UPDATE customer SET  CUST_FNAME = :fname, CUST_LNAME = :lname, CUST_PASSWORD = :password
                      , CUST_IC = :ic , CUST_NUMBER = :cnumber , CUST_COUNTRY =  :country , CUST_CITY =  :city
                      , CUST_STATE = :state , CUST_ADDRESS = :address WHERE CUST_USERNAME = :username";
                      $stmt = oci_parse($conn, $sql);
                      oci_bind_by_name($stmt, ':username', $cid);
                      oci_bind_by_name($stmt, ':fname', $_POST["fname"] );
                      oci_bind_by_name($stmt, ':lname', $_POST["lname"] );
                      oci_bind_by_name($stmt, ':password', $_POST["pword"] );
                      oci_bind_by_name($stmt, ':ic', $_POST["ic"] );
                      oci_bind_by_name($stmt, ':cnumber', $_POST["cnumber"] );
                      oci_bind_by_name($stmt, ':country', $_POST["country"] );
                      oci_bind_by_name($stmt, ':city', $_POST["city"] );
                      oci_bind_by_name($stmt, ':state', $_POST["state"]);

                      oci_bind_by_name($stmt, ':address', $_POST["address"] );
                      oci_execute($stmt);


                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('Update profile successfully.')
                       window.location.href='myprofile.php';
                       </SCRIPT>");


            ?>
