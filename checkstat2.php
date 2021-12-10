
<div id="graph"></div>
<br /><br /><br />
<div id="graph2"></div>




<?php
session_start();
include("connect.php");
$cid = $_SESSION['id'];


$strSQL = "SELECT CARS_ID , CARS_NAME , CARS_DOORS FROM cars where cust_id = '$cid' and cars_status != 'Removed'";
$objParse = oci_parse($conn, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);

$month = $_REQUEST['month'];
$year = $_REQUEST['year'];


echo $month;
echo $year;
?>





<script>
Morris.Bar({

  element: 'graph',
  data: [


        <?php

        $date = '%%/' . $month . '/' . $year;

        while($objResult = oci_fetch_array($objParse,OCI_ASSOC))
        {
          $cid = $objResult['CARS_ID'];
          $strSQL2 = "select SUM(RENTAL_PRICE) AS COUNT from reservation where cars_id =  '$cid' AND PICKUP_DATE LIKE '$date' AND RESERVATION_STATUS = 'Completed'";
          $objParse2 = oci_parse($conn, $strSQL2);
          oci_execute ($objParse2,OCI_DEFAULT);
          $objResult2 = oci_fetch_array($objParse2,OCI_ASSOC)





        ?>
        {x: '<?php echo $objResult['CARS_NAME'];?>', y: <?php  if(empty($objResult2['COUNT'])){echo 0;}else{ echo $objResult2['COUNT'];}?>},
        <?php
        }
         ?>





  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['RM '],
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





<script>

Morris.Donut({
  element: 'graph2',
  data: [




    <?php

    $strSQL5 = "SELECT CARS_ID , CARS_NAME , CARS_DOORS FROM cars where cust_id = 'C00001' and cars_status != 'Removed'";
    $objParse5 = oci_parse($conn, $strSQL5);
    oci_execute ($objParse5,OCI_DEFAULT);

    $p=0;
    $date = '%%/' . $month . '/' . $year;

    while($objResult5 = oci_fetch_array($objParse5,OCI_ASSOC))
    {

      $cid = $objResult5['CARS_ID'];
      $strSQL6 = "select RENTAL_PRICE as count from reservation where cars_id =  '$cid' AND PICKUP_DATE LIKE '$date'  ";
      $objParse6 = oci_parse($conn, $strSQL6);
      oci_execute ($objParse6,OCI_DEFAULT);
      $objResult6 = oci_fetch_array($objParse6,OCI_ASSOC);

      if(empty($objResult6['COUNT'])){
        $count = 0;
      }else{
        $count = $objResult6['COUNT'];
      }
      $p = $count / $num * 100;

      $newp = number_format((float)$p, 1, '.', '');

      ?>
      {value: <?php echo $newp;?>, label: '<?php echo $objResult5['CARS_NAME'];?>'},
      <?php
    }
    ?>











  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});


</script>
