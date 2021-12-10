<?php session_start();
include("connect.php");
$_SESSION['page'] = 'Statistics';


  if(!isset($_SESSION['role'])){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Please login.')
 window.location.href='index.php';
 </SCRIPT>");
}?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Statistics</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <link rel="stylesheet" href="css/jPages.css">


  <script src="js/jquery.js"></script>

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="bar/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>



  <link rel="stylesheet" href="bar/morris.css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <h4 id="menu">Statistics</h4>

              <br />






              <div align="center">
                Statistics
                <select onChange="Site(this.value)">
                <option value="statistics.php">Most Rented Car</a></option>
                <option value="statistics2.php" selected="selected">Most Profitable Car</a></option>

                </select>
        </div><br />

              <div class="container" style="width:100%">


                <p id="menu">Most Profitable Cars</p>
              </div>

              <div align="right">
              <select id="month">
              <option>Select month</option>
              <option value="01">January</option>
              <option value="02">February</option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
              </select>

              <select id="year">
              <option value="2017">Select Year</option>
              <option value="2016">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              </select>

              </div>
              <br /><br />
                <div id="display2"></div>





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




    <script>

    $(document).ready(function()
    {


      var month = "05";
      var year = "2017";

      $.ajax
      ({
        url: 'checkstat2.php',
        data: 'month=' + month + '&year=' + year,
        cache: false,
        method:'POST',
        success: function(r)
        {
          $("#display2").html(r);
        }
      });


    });











    $("#month").change(function()
    {

      var month = $('#month :selected').val();
      var year = $('#year :selected').val();

      $.ajax
      ({
        url: 'checkstat2.php',
        data: 'month=' + month + '&year=' + year,
        cache: false,
        method:'POST',
        success: function(r)
        {
          $("#display2").html(r);
        }
      });




    })











    $("#year").change(function()
    {

      var month = $('#month :selected').val();
      var year = $('#year :selected').val();


      $.ajax
      ({
        url: 'checkstat2.php',
        data: 'month=' + month + '&year=' + year,
        cache: false,
        method:'POST',
        success: function(r)
        {
          $("#display2").html(r);
        }
      });




    })




    function Site(val)
    {
    window.location.href = val;
    }



    // Use Morris.Bar
    </script>








</body>

</html>
