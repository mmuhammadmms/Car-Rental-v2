<?php session_start();
$_SESSION['page'] = 'Dashboard';
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

    <title>Dashboard</title>

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
    /* when document is ready */
    $(function() {

      /* initiate pugin assigning the desired button labels  */
      $("div.holder").jPages({
        containerID : "itemContainer",
        perPage     : 3,
        first       : false,
        previous    : "span.arrowPrev",
        next        : "span.arrowNext",
        last        : false
      });

    });
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
.thumbnail img {
    width: 320px;
    height: 200px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
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

<body>

    <!-- Navigation -->
    <?php
    include ("navbar.php");
    ?>

    <!-- Page Content -->
    <br /><br /><br /><br />
    <div class="container">

        <div class="row">

            <div class="col-md-3">
              <?php
              include("sidebar.php");

              ?>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="car/1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="car/2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="car/3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                <br /><br /><br />
                <h4 id="menu">New cars for rented</h4>
                <br />

                <div class="row">





                  <div id="content" class="defaults">

                    <!-- navigation holder -->


                    <!-- item container -->








                  </div>













                </div>


                <?php
                include("connect.php");

                $strSQL = "select * from (  select DISTINCT(C.cars_id) , cars_name , cars_location , cars_price_day   from cars C, carsimage I where C.cars_status = 'Available' and C.cars_id = I.cars_id AND I.imgstatus = 'Able'  order by C.CARS_ID DESC  ) where rownum <= 9";
                $objParse = oci_parse($conn, $strSQL);
                oci_execute ($objParse,OCI_DEFAULT);




                ?>










                <div class="row">
                  <div class="holder"></div>

                  <!-- wrapped custom buttons for easier styling -->
                  <div class="customBtns">
                    <span class="arrowPrev"></span>
                    <span class="arrowNext"></span>
                  </div>

                <ul id="itemContainer">
                  <?php

                  while($objResult = oci_fetch_array($objParse,OCI_ASSOC))
                  {


                  $cid = $objResult['CARS_ID'];
                  $strSQL2 = "select * from carsimage where imgstatus = 'Able' and cars_id = '$cid' and imagenum = ( select min(imagenum) from carsimage where imgstatus = 'Able' and cars_id = '$cid' )";
                  $objParse2 = oci_parse($conn, $strSQL2);
                  oci_execute ($objParse2,OCI_DEFAULT);

                  $objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);

                   ?>
                        <li>
                    <div class="col-sm-4 col-lg-4 col-md-5">
                        <div class="thumbnail">
                            <img src="<?php echo $objResult2['FILESTYPE'];?>"alt="">
                            <div class="caption">
                              <h4><a href="details.php"><?php echo $objResult['CARS_NAME'];?></a>

                                <h5>Available around : </h5><h4><input type="text" class="form-control" value="<?php echo $objResult['CARS_LOCATION'];?>" readonly /></h4>
                                <h4 class="pull-left" style="color:green">RM <?php echo $objResult['CARS_PRICE_DAY'];?>/day</h4>

                                <br /><br />
                                </h4>

                                  </div>

                            <p>
                                 <a href="details.php?id=<?php echo $objResult['CARS_ID'];?>" class="btn btn-default ">More Info </a> <a href="#" class="btn btn-primary">Rent Now!</a>
                            </p>
                        </div>
                    </div>
                  </li>
                    <?php
                  }
                     ?>
                  </ul>

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
