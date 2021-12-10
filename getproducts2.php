<style>
s, strike {
    text-decoration: none;    /*we're replacing the default line-through*/
    position: relative;
    display: inline-block;  /* keeps it from wrapping across multiple lines */
}
s:after, strike:after {
    content:"";    /* required property */
    position: absolute;
    bottom: 0;
    left: 0;
    border-top: 2px solid red;
    height: 45%;    /* adjust as necessary, depending on line thickness */
    /* or use calc() if you don't need to support IE8: */
    height: calc(50% - 1px); /* 1px = half the line thickness */
    width: 100%;
    transform: rotateZ(-4deg);
}








</style>













<script>
/* when document is ready */
$(function() {

	/* initiate pugin assigning the desired button labels  */
	$("div.holder").jPages({
		containerID : "itemContainer",
		perPage     : 6,
		first       : false,
		previous    : "span.arrowPrev",
		next        : "span.arrowNext",
		last        : false
	});

});
</script>










<?php
	session_start();
		include ("connect.php");

	$fuel = $_REQUEST['fuel'];
	$type = $_REQUEST['type'];
	$gear = $_REQUEST['gear'];
	$cid = $_SESSION['id'];


if(isset($_REQUEST['pdate'])){$pdate = $_REQUEST['pdate'];
}
if(isset($_REQUEST['rdate'])){$rdate = $_REQUEST['rdate']; }
	if(isset($_REQUEST['location'])){$location = $_REQUEST['location'];}

	if(isset($_REQUEST['search_text'])){
			$search = $_REQUEST['search_text'];

			$strSQL = "select * from cars C , carsimage I where C.cars_id = I.cars_id AND C.cars_fuel LIKE '%$fuel%' AND C.cars_gears LIKE '%$gear%' AND C.cars_type LIKE '%$type'  AND I.imagenum = 0 AND CARS_NAME LIKE '%$search%' AND C.CARS_location LIKE '%$location%' AND C.CARS_STATUS = 'Available' AND C.cust_id != '$cid'";
			$objParse = oci_parse($conn, $strSQL);
			oci_execute ($objParse,OCI_DEFAULT);

			$strSQL2 = "select COUNT(*) AS COUNT FROM (select * from cars C , carsimage I where C.cars_id = I.cars_id AND C.cars_fuel LIKE '%$fuel%' AND C.cars_gears LIKE '%$gear%' AND C.cars_type LIKE '%$type'  AND I.imagenum = 0 AND CARS_NAME LIKE '%$search%' AND C.CARS_location LIKE '%$location%' AND C.CARS_STATUS = 'Available' AND C.cust_id != '$cid' )";
			$objParse2 = oci_parse($conn, $strSQL2);
			oci_execute ($objParse2,OCI_DEFAULT);
			$objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);



	}
	else if(isset($_REQUEST['s'])){
						$strSQL = "select * from cars C , carsimage I where C.cars_id = I.cars_id AND C.cars_fuel LIKE '%' AND C.cars_gears LIKE '%' AND C.cars_type LIKE '%'  AND I.imagenum = 0 AND C.CARS_location LIKE '%' AND C.CARS_STATUS = 'Available' AND C.cust_id != '$cid' ";
					$objParse = oci_parse($conn, $strSQL);
					oci_execute ($objParse,OCI_DEFAULT);

					$strSQL2 = "select COUNT(*) AS COUNT FROM (select * from cars C , carsimage I where C.cars_id = I.cars_id AND C.cars_fuel LIKE '%' AND C.cars_gears LIKE '%' AND C.cars_type LIKE '%'  AND I.imagenum = 0 AND C.CARS_location LIKE '%'  AND C.CARS_STATUS = 'Available' AND C.cust_id != '$cid')";
				$objParse2 = oci_parse($conn, $strSQL2);
				oci_execute ($objParse2,OCI_DEFAULT);
				$objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);
	}else{
		$strSQL = "select * from cars C , carsimage I where C.cars_id = I.cars_id AND C.cars_fuel LIKE '%$fuel%' AND C.cars_gears LIKE '%$gear%' AND C.cars_type LIKE '%$type'  AND I.imagenum = 0 AND C.CARS_location LIKE '%$location%' AND C.CARS_STATUS = 'Available' AND C.cust_id != '$cid' ";
		$objParse = oci_parse($conn, $strSQL);
		oci_execute ($objParse,OCI_DEFAULT);

		$strSQL2 = "select COUNT(*) AS COUNT FROM (select * from cars C , carsimage I where C.cars_id = I.cars_id AND C.cars_fuel LIKE '%$fuel%' AND C.cars_gears LIKE '%$gear%' AND C.cars_type LIKE '%$type'  AND I.imagenum = 0 AND C.CARS_location LIKE '%$location%' AND C.CARS_STATUS = 'Available' AND C.cust_id != '$cid')";
		$objParse2 = oci_parse($conn, $strSQL2);
		oci_execute ($objParse2,OCI_DEFAULT);
		$objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);
	}


		$count = $objResult2['COUNT'];

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
	if($count > 0){

		while($objResult = oci_fetch_array($objParse,OCI_ASSOC))
		{

			$car = $objResult['CARS_ID'];
			$valid = "";




			$strSQL5 = "SELECT PICKUP_DATE , RETURN_DATE FROM RESERVATION WHERE CARS_ID = '$car' AND RESERVATION_STATUS NOT IN ('Canceled' , 'Pending' , 'Rejected' ) ";
			$objParse5 = oci_parse($conn, $strSQL5);
			oci_execute ($objParse5,OCI_DEFAULT);
			while($objResult5 = oci_fetch_row($objParse5))
			{
			//echo $objResult3[0] . "<br />" . $objResult3[1] . "<br />";


			  $strSQL8 = "SELECT TO_DATE(:pd, 'DD/MM/YYYY') - 1 + rownum AS d
			  FROM all_objects
			  WHERE TO_DATE(:pd, 'DD/MM/YYYY') - 1 + rownum <= TO_DATE(:rd, 'DD/MM/YYYY')";
			  $objParse8 = oci_parse($conn, $strSQL8);
			  oci_bind_by_name($objParse8, ':pd', $objResult5[0]);
			  oci_bind_by_name($objParse8, ':rd', $objResult5[1]);
			  oci_execute ($objParse8,OCI_DEFAULT);


			      while($objResult8 = oci_fetch_row($objParse8))
			      {
			      //echo $objResult[0] . "<br />";

			      $strSQL6 = "SELECT TO_DATE(:pdate, 'DD/MM/YYYY') - 1 + rownum AS d
			      FROM all_objects
			      WHERE TO_DATE(:pdate, 'DD/MM/YYYY') - 1 + rownum <= TO_DATE(:rdate, 'DD/MM/YYYY')";
			      $objParse6 = oci_parse($conn, $strSQL6);
			      oci_bind_by_name($objParse6, ':pdate', $pdate);
			      oci_bind_by_name($objParse6, ':rdate', $rdate);
			      //($objParse, ':cu', $_SESSION['us']);
			      oci_execute ($objParse6,OCI_DEFAULT);


			          while($objResult6 = oci_fetch_row($objParse6))
			          {
			            if ($objResult8[0] == $objResult6[0]){
			              $valid = "N";
			            }

			          }
			      }

			}








			$dis = $objResult['CARS_PROMOTION'] / 100 * $objResult['CARS_PRICE_DAY'];
			$dis2 = $objResult['CARS_PRICE_DAY'] - $dis;


			?>
			<li>
			<div class="col-sm-4 col-lg-4 col-md-5">
					<center>
					<div class="thumbnail">
							<img src="<?php echo $objResult['FILESTYPE'];?>" alt="" >
							<div class="caption">
								<h4><input class="form-control"  value="<?php echo $objResult['CARS_NAME'];?>" readonly />

									<h5>Available around : </h5><h4><input class="form-control"  value="<?php echo $objResult['CARS_LOCATION'];?>" readonly /></h4>
									<h4 class="pull-left" style="color:green">
										<?php
										if ($dis2 != $objResult['CARS_PRICE_DAY']){
										?>
										RM <strike><?php echo $objResult['CARS_PRICE_DAY'];?></strike> &nbsp;<?php echo $dis2;?>/day</h4>

										<?php
									}else if ($dis2 == $objResult['CARS_PRICE_DAY']){
									?>
									RM <?php echo $objResult['CARS_PRICE_DAY'];?>/day</h4>
									<?php
									}
										?>


									<br /><br />
									</h4>

										</div>

							<p>
									 <a href="details.php?id=<?php echo $objResult['CARS_ID'];?>" class="btn btn-default"  target="_blank">More Info </a>
									 <?php if ($valid != "N"){

									?>
									<a data-id="<?php echo $objResult['CARS_ID'];?>" title="Add this item" class="choosecar btn btn-success" href="#addBookDialog">Rent Now <span class="fa fa-arrow-right"></span></a>


									 <?php
									  }
									 else{
									?>
									<a data-id="<?php echo $objResult['CARS_ID'];?>" title="Add this item" class="btn btn-danger" disabled>Been Rented !</a>

									<?php
									 }
									 ?>

							</p>

					</div>
					</center>
			</div>
		</li>

			<?php

		}
?></ul><?php
	}else{

		?>
        No car available
        <?php
	}


	?>
	</div>
