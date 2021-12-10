<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="details.css">
    <script src="js2/bootstrap.min.js"></script>
    <link href="availability-calendar.css" rel="stylesheet" type="text/css">
    <script src="availability-calendar.js"></script>

        <link rel="stylesheet" href="css/jssel.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <script src="js/jssor.slider-23.1.5.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      jssor_1_slider_init = function() {

          var jssor_1_options = {
            $AutoPlay: 1,
            $BulletNavigatorOptions: {
              $Class: $JssorBulletNavigator$
            },
            $ThumbnailNavigatorOptions: {
              $Class: $JssorThumbnailNavigator$,
              $Cols: 3,
              $Align: 200
            }
          };

          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

          /*responsive code begin*/
          /*remove responsive code if you don't want the slider scales while window resizing*/
          function ScaleSlider() {
              var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
              if (refSize) {
                  refSize = Math.min(refSize, 600);
                  jssor_1_slider.$ScaleWidth(refSize);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }
          ScaleSlider();
          $Jssor$.$AddEvent(window, "load", ScaleSlider);
          $Jssor$.$AddEvent(window, "resize", ScaleSlider);
          $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
          /*responsive code end*/
      };
  </script>
    <!-- Navigation -->
<?php
include ("navbar.php");
 ?>

    <!-- Page Content -->
    <br /><br /><br />
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-sm-6">
                <h1 class="page-header">Toyota Hiace 2.5
                    <small>Available at : klia/klia2 </small>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
              <br /><br /><br />


              <?php
              include ("connect.php");
            //  $cid = $_GET['cid'];
            $cid = $_GET['id'];
              $strSQL = "SELECT * FROM cars where cars_id = '$cid'";
              $objParse = oci_parse($conn, $strSQL);
              oci_execute ($objParse,OCI_DEFAULT);
              $objResult = oci_fetch_array($objParse,OCI_BOTH);
              $id = $objResult['CUST_ID'];

              $strSQL2 = "SELECT CUST_USERNAME from CUSTOMER where cust_id = '$id'";
              $objParse2 = oci_parse($conn, $strSQL2);
              oci_execute ($objParse2,OCI_DEFAULT);
              $objResult2 = oci_fetch_array($objParse2,OCI_BOTH);


              $strSQL3 = "SELECT FILESTYPE from CARSIMAGE where cars_id = '$cid'";
              $objParse3 = oci_parse($conn, $strSQL3);
              oci_execute ($objParse3,OCI_DEFAULT);
            //  $objResult3 = oci_fetch_array($objParse3,OCI_BOTH);



?>




              <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:400px;overflow:hidden;visibility:hidden;">
                  <!-- Loading Screen -->
                  <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                      <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                      <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                  </div>
                  <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:300px;overflow:hidden;">

                    <?php
                    while($objResult3 = oci_fetch_array($objParse3,OCI_ASSOC))
                    {
                    ?>

                    <div>
                        <img data-u="image" src="<?php echo $objResult3['FILESTYPE'];?>" />
                        <div data-u="thumb">
                            <img src="<?php echo $objResult3['FILESTYPE'];?>" width="10%" height="10%"/>


                        </div>
                    </div>

                    <?php

                    }
                     ?>


                  </div>
                  <!-- Thumbnail Navigator -->
                  <div data-u="thumbnavigator" class="jssort16" style="position:absolute;left:0px;bottom:0px;width:600px;height:100px;" data-autocenter="1">
                      <!-- Thumbnail Item Skin Begin -->
                      <div data-u="slides" style="cursor: default;">
                          <div data-u="prototype" class="p">
                              <div data-u="thumbnailtemplate" class="t"></div>
                          </div>
                      </div>
                      <!-- Thumbnail Item Skin End -->
                  </div>
                  <!-- Bullet Navigator -->
                  <div data-u="navigator" class="jssorb03" style="bottom:116px;right:16px;">
                      <!-- bullet navigator item prototype -->
                      <div data-u="prototype" style="width:21px;height:21px;">
                          <div data-u="numbertemplate"></div>
                      </div>
                  </div>
              </div>
              <script type="text/javascript">jssor_1_slider_init();</script>












            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-5">
              <h2 align="center" style="color:green">RM <?php echo $objResult["CARS_PRICE_DAY"];?>/day</h2>
              <table class="table table-striped table-hover table-bordered" >
                  <tbody>
                    <tr>
                      <td>Owner</td>
                      <td><?php echo $objResult2['CUST_USERNAME'];?></td>
                    </tr>
                    <tr>
                      <td>Make</td>
                      <td><?php echo $objResult["CARS_MAKE"];?></td>
                    </tr>
                    <tr>
                      <td>Model</td>
                      <td><?php echo $objResult["CARS_MODEL"];?></td>
                    </tr>
                    <tr>
                      <td>Power</td>
                      <td><?php echo $objResult["CARS_POWER"];?> CC</td>
                    </tr>
                    <tr>
                      <td>Color</td>
                      <td><?php echo $objResult["CARS_COLOR"];?></td>
                    </tr>
                    <tr>
                      <td>Doors</td>
                      <td><?php echo $objResult["CARS_DOORS"];?></td>
                    </tr>
                    <tr>
                      <td>Fuel</td>
                      <td><?php echo $objResult["CARS_FUEL"];?></td>
                    </tr>
                    <tr>
                      <td>Number of Seats</td>
                      <td>><?php echo $objResult["CARS_SEATS"];?></td>
                    </tr>
                    <tr>
                      <td>Vehicle Type</td>
                      <td><?php echo $objResult["CARS_TYPE"];?></td>
                    </tr>

                  </tbody>
                </table>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    <h1>Car Avaibility</h1>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div><br /><br />
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
          <div id="calendar"></div>

            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

















        <!-- Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>

    // Stop carousel
    $('.carousel').carousel({
      interval: false
    });

    </script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="availability-calendar.js"></script>
    <script>
    var unavailableDates = [
    {start: '2017-04-01', end: '2017-04-15'},
        {start: '2017-04-25', end: '2017-04-30'},
    ];

    $('#calendar').availabilityCalendar(unavailableDates);
    </script>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

      <script type="text/javascript">
      $(document).ready(function(){
          $('#lightgallery').lightGallery();
      });
      </script>
      <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
      <script src="js/lightgallery.js"></script>
      <script src="js/lg-fullscreen.js"></script>
      <script src="js/lg-thumbnail.js"></script>
      <script src="js/lg-video.js"></script>
      <script src="js/lg-autoplay.js"></script>
      <script src="js/lg-zoom.js"></script>
      <script src="js/lg-hash.js"></script>
      <script src="js/lg-pager.js"></script>
      <script src="lib/jquery.mousewheel.min.js"></script>
</body>

</html>
