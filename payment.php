<?php session_start();
$_SESSION['page'] = 'Mypayment';?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Payments</title>

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
            perPage : 10,
            delay : 20
          });
        });




    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

.hiddenRow {
    padding: 0 !important;
}
.holder {
  margin: 15px 0;
}

.holder a {
  font-size: 12px;
  cursor: pointer;
  margin: 0 5px;
  color: #333;
}

.holder a:hover {
  background-color: #222;
  color: #fff;
}

.holder a.jp-current, a.jp-current:hover {
  color: #FF4242;
  font-weight: bold;
  cursor: default;
  background: none;
}

.holder span { margin: 0 5px; }

.customBtns { position: relative; }
.arrowPrev, .arrowNext { width:29px; height:29px; position: absolute; top: 55px; cursor: pointer; }
.arrowPrev { background-image: url('img/back.gif'); left: -45px; }
.arrowNext { background-image: url('img/next.gif'); right: -40px; }

.arrowPrev.jp-disabled, .arrowNext.jp-disabled { display: none; }

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

              <h4 id="menu">My Payment</h4>

          <br />







        <div class="container" style="width:100%">
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">



          <?php
          include ("connect.php");
          $cid = $_SESSION['id'];
          $strSQL2 = "select * from cars C , reservation R where C.cars_id = R.cars_id and C.cust_id = '$cid' AND R.PAYMENT_STATUS != 'Canceled' ";
          $objParse2 = oci_parse($conn, $strSQL2);
          oci_execute ($objParse2,OCI_DEFAULT);


          ?>


          <div id="content" class="defaults" style="width:100%">

            <div class="holder"></div>
          <table class="table table-striped table-hover table-bordered"  >
            <thead>
                        <th ><center>Reservation ID</center></th>
                          <th><center>Car Name</center></th>
                          <th><center>Pickup Date</center></th>
                          <th><center>Return Date</center></th>
                          <th><center>Total Price</center></th>
                          <th><center>Status</center></th>
                          <th><center>Action</center></th>
            </thead>
            <tbody id="movies">
              <?php
              $i=0;

              while($objResult2 = oci_fetch_array($objParse2,OCI_ASSOC))
              {
                $total = 0;
               ?>


              <tr >
                <th><center><h4 class="panel-title"><?php echo $objResult2['RESERVATION_ID'];?>

                        </h4></center></th>
                <th><center><?php echo $objResult2['CARS_NAME'];?></center></th>
                <th><center><?php echo $objResult2['PICKUP_DATE'];?></center></th>
                <th><center><?php echo $objResult2['RETURN_DATE'];?></center></th>
                <th><center>RM <?php echo $objResult2['RENTAL_PRICE'];?></center></th>
                <th><center><?php echo $objResult2['PAYMENT_STATUS'];?></center></th>
                <th><center><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                <span class="glyphicon glyphicon-eye-open"></span></a>

                </center> </th>

              </tr>

                <td colspan="7" class="hiddenRow">

                  <div class="accordian-body collapse" id="collapse<?php echo $i; ?>">

                    <div align="center" ><br />
                    <a href="#" data-toggle="modal" data-target="#rsv<?php echo $i; ?>" class="btn btn-success" ><span class="glyphicon glyphicon-plus"></span> Add payment</a><br />
                  </div><br />







                  <div class="modal fade" id="rsv<?php echo $i; ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <form name="payment" method="post" action="makepayment.php">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4>Make Payment</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="post" action="login.php">
                            <div class="form-group">
                              <label for="psw"><span class=""></span> Reservation ID</label>
                              <input type="text" class="form-control" id="rid" name="rid" value="<?php echo $objResult2['RESERVATION_ID'];?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="usrname"><span class=""></span>Amount</label>
                              <input type="number" class="form-control" id="amount" name="amount" placeholder="RM">
                            </div>

                            <div class="form-group">
                            <label for="usrname"><span class=""></span>Payment Type</label>
                            <select id="type" name="type" class="form-control selcls" style="width:80%" required>
                            <option value=""></a></option>
                            <option value="Cash">Cash</a></option>
                            <option value="Online Banking">Online Banking</a></option>
                            </select>
                              </div>

                            <button type="submit" class="btn btn-block">Make Payment
                              <span class="glyphicon glyphicon-ok"></span>
                            </button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> Cancel
                          </button>

                        </div>
                        </form>
                      </div>
                    </div>
                  </div>















                    <center>





                      <?php

                      $rid =  $objResult2['RESERVATION_ID'];
                      $strSQL3 = "select * from payments where reservation_id = :rsv";
                      $objParse3 = oci_parse($conn, $strSQL3);
                      oci_bind_by_name($objParse3, ':rsv', $rid);
                      oci_execute ($objParse3,OCI_DEFAULT);


                      ?>






                    <table class="table table-striped table-hover table-bordered"  style="width:70%">
                      <thead>
                                    <th><center>Reservation ID</center></th>
                                    <th><center>Payment ID</center></th>
                                    <th><center>Payment Date</center></th>
                                    <th><center>Amount</center></th>
                                    <th><center>Action</center></th>
                      </thead>





                      <?php

                      while($objResult3 = oci_fetch_array($objParse3,OCI_ASSOC))
                      {

                       ?>
                      <tr>
                                    <th><center><?php echo $objResult3['RESERVATION_ID']?></center></th>
                                    <th><center><?php echo $objResult3['PAYMENT_ID']?></center></th>
                                    <th><center><?php echo $objResult3['PAYMENT_DATE']?></center></th>
                                    <th><center>RM <?php echo $objResult3['AMOUNT']?></center></th>
                                    <th><center><a href="delpayment.php?rid=<?php echo $objResult3["RESERVATION_ID"];?>&pid=<?php echo $objResult3["PAYMENT_ID"];?>" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this payment?');"><span class="glyphicon glyphicon-remove"></span></a>
                                    </center></th>

                      </tr>

                      <?php
                      $total = $total + $objResult3['AMOUNT'];
                    }
                       ?>

                    <tr>
                      <th colspan="3"><center>Amount</center></th>
                      <th colspan="2"><center>RM <?php echo $total;?></center></td>
                    </tr>
                  </table>
                    </center>


                  </div>
                </td>


              <?php
              $i++;

            }
              ?>
            </tbody>
          </table>
        </div>











      </div>

    </div>
  </div>
</div>







          <div id="print">
            <br /><br />


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
