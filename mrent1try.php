<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loading MySQL Records on Drop Down Selection using PHP jQuery</title>




      <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="dp/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
      <!-- Custom CSS -->
      <link href="css/shop-homepage.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="navbar.css">

      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="bootstrap/css/font-awesome.css" rel="stylesheet">

      <script src="bootstrap/js/jquery-1.11.1.min.js"></script>


      <link rel="stylesheet" href="css/jPages.css">

      <link rel="stylesheet" href="css/github.css">

      <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
      <script type="text/javascript" src="js/highlight.pack.js"></script>
      <script type="text/javascript" src="js/tabifier.js"></script>
      <script src="js/js.js"></script>
      <script src="js/jPages.js"></script>






<style type="text/css">
ul#stepForm, ul#stepForm li {
  margin: 0;
  padding: 0;
}
ul#stepForm li {
  list-style: none outside none;
}
label{margin-top: 10px;}
.help-inline-error{color:red;}
select{

	width:250px;
	padding:5px;
	border-radius:3px;
}
body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
}
.btn2 {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
    width: 40%;
}

#title{
  background-color: #333;
  color: #fff !important;
  text-align: center;
  font-size: 30px;

}
.thumbnail img {
    width: 320px;
    height: 150px;
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

<script>
$(function() {

  /* initiate pugin assigning the desired button labels  */
  $("div.holder").jPages({
    containerID : "itemContainer",
    perPage     : 5,
    first       : false,
    previous    : "span.arrowPrev",
    next        : "span.arrowNext",
    last        : false
  });

});

</script>






<script type="text/javascript">

$(document).ready(function()
{
	// function to get all records from table
	function getAll(){

		$.ajax
		({
			url: 'getproducts2.php',
			data: 'fuel=&type=&gear=&s=0',
			cache: false,
			success: function(r)
			{
				$("#display").html(r);
			}
		});
	}

	getAll();
	// function to get all records from table


	// code to get all records from table via select box
	$("#submit").click(function()
	{

		var type = $('#type :selected').text();
		var fuel = $('#fuel :selected').text();

		var dataString = $('#basicform').serialize();


		$.ajax
		({
			url: 'getproducts2.php',
			data: dataString,
			cache: false,
			method:'POST',
			success: function(r)
			{
				$("#display").html(r);
			}
		});
	})


	$("#type").change(function()
	{

		var type = $('#type :selected').text();
		var fuel = $('#fuel :selected').text();

		var dataString = $('#basicform').serialize();


		$.ajax
		({
			url: 'getproducts2.php',
			data: dataString,
			cache: false,
			method:'POST',
			success: function(r)
			{
				$("#display").html(r);
			}
		});
	})





	function load_data(query)
  {
		var dataString = $('#basicform').serialize();

   $.ajax({
    url:"getproducts2.php",
    method:"POST",
    data:dataString,
		success: function(r)
		{
			$("#display").html(r);
		}
   });
  }

	$('#search_text').keyup(function(){
	 var search = $(this).val();
	 if(search != '')
	 {
		load_data(search);
	 }
	 else
	 {
		load_data();
	 }
	});



	$("#fuel").change(function()
	{

		var type = $('#type :selected').text();
		var fuel = $('#fuel :selected').text();

		var dataString = $('#basicform').serialize();


		$.ajax
		({
			url: 'getproducts2.php',
			data: dataString,
			cache: false,
			method:'POST',
			success: function(r)
			{
				$("#display").html(r);
			}
		});
	})



	$("#gear").change(function()
	{

		var type = $('#type :selected').text();
		var fuel = $('#fuel :selected').text();

		var dataString = $('#basicform').serialize();


		$.ajax
		({
			url: 'getproducts2.php',
			data: dataString,
			cache: false,
			method:'POST',
			success: function(r)
			{
				$("#display").html(r);
			}
		});
	})


  $("#location").change(function()
  {

    var type = $('#type :selected').text();
    var fuel = $('#fuel :selected').text();

    var dataString = $('#basicform').serialize();


    $.ajax
    ({
      url: 'getproducts2.php',
      data: dataString,
      cache: false,
      method:'POST',
      success: function(r)
      {
        $("#display").html(r);
      }
    });
  })
	// code to get all records from table via select box



});










</script>
</head>
<body>
  <?php
  include ("navbar.php");
  ?>
  <br /><br /><br /><br />
  <div class="container" style="left:-50px">

      <div class="row">

          <div class="col-md-3">
            <?php
            include("sidebar.php");

            ?>
          </div>

          <div class="col-md-9">
        <h4 id="menu">Make Reservation</h4>



<div class="container-fluid">



  <div class="container" style="width:100%">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Complete this form in 3 steps!</h3>
      </div>
      <div class="panel-body">
        <form name="basicform" id="basicform" method="post" action="resevpro.php" enctype="multipart/form-data">

          <div id="sf1" class="frm">
            <fieldset>
              <legend>Step 1 of 3</legend>



              <div class="col-sm-6">



                       Pickup Date
                       <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                           <input class="form-control" size="16" type="text"  id="pdate" name="pdate" required>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                       </div>
                       Pickup Time
                       <div class="input-group date form_time col-md-6" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                           <input class="form-control" size="16" type="text" id="ptime" name="ptime" required>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                 <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                       </div>

                 </div>
                 <div class="col-sm-6">


                      Return Date
                      <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                          <input class="form-control" size="16" type="text"  id="rdate" name="rdate" required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      Return Time
                      <div class="input-group date form_time col-md-6" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                          <input class="form-control" size="16" type="text" id="rtime"  name="rtime" required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                      </div>
            <br />

              </div>












              <div class="form-group" style="float:right">
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-success open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
                </div>
              </div>

            </fieldset>
          </div>

          <div id="sf2" class="frm" style="display: none;">
            <fieldset>
              <legend>Step 2 of 3</legend>


              <p id="title">Available Cars</p><br />

              <center>


                <select id="location" name="location" class="form-control selcls" style="width:80%" required>
                <option value="">Location...</a></option>
                <option value="klia/klia2">klia/klia2</a></option>
                <option value="Klang">Klang</a></option>
                </select>


              <br /><br />
              <input type="text" name="search_text" id="search_text" placeholder="Search by Cars Name" class="form-control" />


              </center>

              <br /><br />





              <div class="col-sm-4">
              <select id="type" name="type" class="form-control selcls" style="width:80%" required>
              <option value="">Vehicle Type..</a></option>
              <option value="Sports">Sports</a></option>
              <option value="Luxury">Luxury</a></option>
              <option value="Van">Van</a></option>
              <option value="Estate">Estate</a></option>
              </select>
              </div>

              <div class="col-sm-4">
              <select id="gear" name="gear" class="form-control selcls" style="width:80%" required>
              <option value="">Gearbox..</a></option>
              <option value="Manual">Manual</a></option>
              <option value="Auto">Auto</a></option>
              </select>
              </div>

              <div class="col-sm-4" >
                <select id= "fuel" name="fuel" class="form-control selcls" style="width:80%" required>
                <option value="" selected="selected">Choose Fuel Type..</option>
                <option value="Diesel">Diesel</a></option>
                <option value="Petrol">Petrol</a></option>
                <option value="Other">Other</a></option>
                </select>
              </div>
              <br /><br />






              <div class="holder"></div>

              <!-- wrapped custom buttons for easier styling -->
              <div class="customBtns">
                <span class="arrowPrev"></span>
                <span class="arrowNext"></span>
              </div>





                <ul id="itemContainer">
                <div class="" id="display">
                   <!-- Records will be displayed here -->
                </div>
                </ul>





              <div class="form-group" style="float:left">
                <div class="col-lg-10 col-lg-offset-2" style="float:left">
                  <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>

                </div>
              </div>

            </fieldset>











          </div>

          <div id="sf3" class="frm" style="display: none;">
            <fieldset>
              <legend>Step 3 of 3</legend>

              <div class="" id="displayrented">
                 <!-- Records will be displayed here -->
              </div>


              <div class="clearfix" style="height: 10px;clear: both;"></div>

              <div class="form-group" style="float:right">
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                  <input type="button" id="submit1" class="btn btn-success" value="Confirm" />
                  <img src="images/spinner.gif" alt="" id="loader" style="display: none">
                </div>
              </div>

            </fieldset>
          </div>
        </form>
      </div>
    </div>


  </div>












</div>





          </div>

      </div>

<div class="container">








        </div>








				</form>

<br /><br />




</div>



<script type="text/javascript" src="dp/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">


    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1,
                linkFormat: "yyyy-mm-dd"

    });
  $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    startDate: '+2d',
    linkFormat: "yyyy-mm-dd"
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0,
    linkFormat: "yyyy-mm-dd"
    });
</script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">

  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({

      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {



        var pdate = $("#pdate").val();
        var ptime = $("#ptime").val();
        var rdate = $("#rdate").val();
        var rtime = $("#rtime").val();


        if (!pdate || !ptime || !rdate || !rtime)
        {
            alert("Please enter all info.");
            e.preventDefault();
        }else{
          $(".frm").hide("fast");
          $("#sf2").show("slow");

        }


        var dataString = $('#basicform').serialize();

        $.ajax
        ({
          url: 'getproducts2.php',
          data: dataString,
          cache: false,
          method:'POST',
          success: function(r)
          {
            $("#display").html(r);
          }
        });




      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });

    $("#button").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });


    $(".open3").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time.</h2>');
         }, 1000);
        return false;
      }
    });

    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

  });
</script>

<script>
$(document).ready(function()
{
    $("#submit1").click(function()
    {
        $("#basicform").submit();

    });

});


$(document).on("click", ".choosecar", function () {
     var carID = $(this).data('id');

     $(".frm").hide("fast");
     $("#sf3").show("slow");




     $.ajax
     ({
       url: 'displayrented.php',
       data : $('#basicform').serialize() + "&cid=" + carID + "&par2=2&par3=232",
       cache: false,
       method:'POST',
       success: function(r)
       {
         $("#displayrented").html(r);
       }
     });




});

</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
