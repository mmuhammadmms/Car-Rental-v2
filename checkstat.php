
<div id="graph"></div>
<br /><br /><br />
<div id="graph2"></div>



<?php
session_start();
include("connect.php");

$cid = $_SESSION['id'];
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];



$strSQL = "SELECT CARS_ID , CARS_NAME , CARS_DOORS FROM cars where cust_id = '$cid' and cars_status != 'Removed'";
$objParse = oci_parse($conn, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);



echo $month;
echo $year;
?>





<script>
Morris.Bar({

  element: 'graph',
  data: [


        <?php

        $date = '%%/' . $month . '/' . $year;

        $num = 0;
        while($objResult = oci_fetch_array($objParse,OCI_ASSOC))
        {

          $cid = $objResult['CARS_ID'];
          $strSQL2 = "select count(*) as count from reservation where cars_id =  '$cid' AND PICKUP_DATE LIKE '$date' AND RESERVATION_STATUS = 'Completed'";
          $objParse2 = oci_parse($conn, $strSQL2);
          oci_execute ($objParse2,OCI_DEFAULT);
          $objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);

          if ($objResult2['COUNT'] == 0){
            $num = $num;
          }else{
            $num++;
          }



        ?>
        {x: '<?php echo $objResult['CARS_NAME'];?>', y: <?php echo $objResult2['COUNT']?>},
        <?php
        }
         ?>





  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Rent'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
      var red = Math.ceil(255 * row.y / this.ymax);
      return 'rgb(' + red + ',0,0)';
    }
    else {
      return '#000';
    }
  }
});




</script>
