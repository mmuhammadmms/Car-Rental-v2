<?php session_start();
$_SESSION['page'] = 'Myreservation';

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

    <title>My Reservation</title>

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


$(document).on("click", ".open-AddBookDialog", function () {
         var rID = $(this).data('id');




              $.ajax
              ({
                url: 'resdetail.php',
                data : "&rid=" + rID ,
                cache: false,
                method:'POST',
                success: function(r)
                {
                  $("#rdetail2").html(r);
                }
              });




});

$(document).on("click", ".open-AddBookDialog2", function () {
         var rID = $(this).data('id');




              $.ajax
              ({
                url: 'resdetail.php',
                data : "&rid=" + rID ,
                cache: false,
                method:'POST',
                success: function(r)
                {
                  $("#rdetail").html(r);
                }
              });




});












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



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>



#Pending{
  color:  #4484ce;
}
#Completed{
  color: #18f88c;
}
#Paid{
  color: #18f88c;
}
#Confirmed{
  color: #18f88c;
}
#Approved{
  color: #18f88c;
}
#Canceled{
  color: #f53240;
}
#Disapproved{
  color: #f53240;
}
#Rejected{
  color: #f53240;
}
#Rented{
  color:  #f58632;
}
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
          <h4 id="menu">My Reservation</h4>
              <div align="" class="pull-right"><br />
              <a href="mrent1.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Make Reservation</a><br />
              </div>
              <br /><br />








              <div class="container" style="width:100%">
              <ul class="nav nav-tabs">
                <li><a  href="myreservation.php">My Reservation</a></li>
                <li class="active"><a  href="myreservation2.php">My Car Reservation</a></li>
              </ul>

              <div class="tab-content">
                <div id="my" class="tab-pane fade in active" width="100%">


                    <?php
                    include ("connect.php");


                  $cid = $_SESSION['id'];
                    $strSQL2 = "select * from cars C , reservation R where C.cars_id = R.cars_id and C.cust_id = '$cid' AND R.RESERVATION_STATUS != 'Canceled' ORDER BY R.RESERVATION_ID DESC";
                    $objParse2 = oci_parse($conn, $strSQL2);
                    oci_execute ($objParse2,OCI_DEFAULT);


                    ?>


                    <div id="content" class="defaults" style="width:100%">

                      <div class="holder"></div>
                    <table class="table table-striped table-hover table-bordered"  >
                      <thead>
                                  <th ><center>Reservation ID</center></th>
                                    <th ><center>Car Name</center></th>
                                    <th><center>Pickup Date</center></th>
                                    <th><center>Return Date</center></th>
                                    <th><center>Total Price</center></th>
                                    <th><center>Status</center></th>
                                    <th><center>Action</center></th>
                      </thead>
                      <tbody id="movies">
                        <?php

                        while($objResult2 = oci_fetch_array($objParse2,OCI_ASSOC))
                        {

                         ?>


                        <tr>
                          <th><center><?php echo $objResult2['RESERVATION_ID'];?> </center></th>
                            <th><center><a href="details.php?id=<?php echo $objResult2['CARS_ID'];?>" target="_blank"><?php echo $objResult2['CARS_NAME'];?></center></th>
                          <th><center><?php echo $objResult2['PICKUP_DATE'];?></center></th>
                          <th><center><?php echo $objResult2['RETURN_DATE'];?></center></th>
                          <th><center>RM <?php echo $objResult2['RENTAL_PRICE'];?></center></th>
                          <th><center><?php echo $objResult2['RESERVATION_STATUS'];?></center></th>
                          <th><center>

                            <a data-toggle="modal" data-id="<?php echo $objResult2['RESERVATION_ID'];?>" title="Add this item" class="open-AddBookDialog2 btn" href="#addBookDialog2"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <div class="btn-group">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Status
                              </button>
                              <div class="dropdown-menu">
                                <a id="Pending" class="dropdown-item2" href="upreservstat.php?status=Pending&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Pending</a><br />
                                <a id="Confirmed" class="dropdown-item" href="upreservstat.php?status=Confirmed&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Confirmed</a><br />
                                <a id="Rented" class="dropdown-item" href="upreservstat.php?status=Rented&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Rented</a><br />
                                <a id="Canceled" class="dropdown-item" href="upreservstat.php?status=Canceled&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Canceled</a><br />
                                <a id="Approved" class="dropdown-item" href="upreservstat.php?status=Approved&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Approved</a><br />
                                <a id="Disapproved" class="dropdown-item" href="upreservstat.php?status=Rejected&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Rejected</a><br />
                                <a id="Completed" class="dropdown-item" href="upreservstat.php?status=Completed&rid=<?php echo $objResult2["RESERVATION_ID"];?>">Completed</a>
                              </div>
                            </div>
                          </center> </th>
                        </tr>

                        <?php

                      }
                        ?>
                      </tbody>
                    </table>
                        </div>
                    <div class="modal fade" id="addBookDialog2" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <form name="login" method="post" action="login.php">



                            <div class="" id="rdetail">
                               <!-- Records will be displayed here -->
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
                </div>


              </div>
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
