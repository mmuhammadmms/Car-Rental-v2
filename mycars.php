<?php session_start();
$_SESSION['page'] = 'Mycars';

  if(!isset($_SESSION['role'])){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Please login.')
 window.location.href='index.php';
 </SCRIPT>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Cars</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="navbar.css">




    <link rel="stylesheet" href="css/jPages.css">

        <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/highlight.pack.js"></script>
    <script type="text/javascript" src="js/tabifier.js"></script>
    <script src="js/js.js"></script>
    <script src="js/jPages.js"></script>



    <script>
    $(function(){
      $("div.holder").jPages({
        containerID : "movies",
        previous : "←",
        next : "→",
        perPage : 5,
        delay : 20
      });
    });


    </script>

<style>



</style>

</head>

<body>

    <!-- Navigation -->
    <?php
    include ("navbar.php");
    ?>

    <!-- Page Content -->
    <br /><br /><br /><br />
    <div class="container" style="left:-50px">

        <div class="row">

            <div class="col-md-3">
              <?php
              include("sidebar.php");

              ?>
            </div>

            <div class="col-md-9">

              <h4 id="menu">My Cars</h4>
          <div align="" class="pull-right"><br />
          <a href="addcars.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Cars</a><br />
          </div>
          <br />

          <div id="print">
            <br />

            <div id="content" class="defaults">

              <div class="holder"></div>

              <?php
              $cid = 	$_SESSION['id'];
              include ("connect.php");
              $strSQL = "SELECT * FROM cars where cust_id = '$cid' and cars_status != 'Removed' ORDER BY CARS_ID DESC";
              $objParse = oci_parse($conn, $strSQL);
              oci_execute ($objParse,OCI_DEFAULT);


              ?>

              <table class="table table-striped table-hover table-bordered" >
                <thead>
                  <th  width="25%" height="40%"><center>CARS</center></th>
                              <th><center>ID</center></th>
                              <th><center>BRAND</center></th>
                              <th><center>NAME</center></th>
                              <th><center>STATUS</center></th>
                              <th width="13  %"><center>ACTION</center></th>
                </thead>
                <tbody id="movies">
                  <?php
                  while($objResult = oci_fetch_array($objParse,OCI_ASSOC))
                  {
                    $carsid = $objResult['CARS_ID'];
                    $strSQL2 = "SELECT FILESTYPE FROM carsimage where CARS_ID = '$carsid' ";
                    $objParse2 = oci_parse($conn, $strSQL2);
                    oci_execute ($objParse2,OCI_DEFAULT);
                    $objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);
                   ?>


                  <tr>
                    <th><center> <img src="<?php echo $objResult2['FILESTYPE'];?>" alt="Toyota Hiace" height = "100%" width="100%"></center></th>
                    <th><center><a href="details.php?id=<?php echo $objResult['CARS_ID'];?>" target="_blank"><?php echo $objResult['CARS_ID'];?></a></center></th>
                    <th><center><?php echo $objResult['CARS_MAKE'];?></center></th>
                    <th><center><?php echo $objResult['CARS_NAME'];?></center></th>
                    <th><center><?php echo $objResult['CARS_STATUS'];?></center></th>
                    <th><center>
                    <a href="carsedit.php?cid=<?php echo $objResult['CARS_ID'];?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="carsdel.php?cid=<?php echo $objResult['CARS_ID'];?>" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></a>
                    </center> </th>
                  </tr>

                  <?php

                }
                  ?>
                </tbody>
              </table>

            </div>












            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->


    </div>
    <!-- /.container -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
