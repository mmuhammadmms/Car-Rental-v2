<?php session_start();
$_SESSION['page'] = 'Mycars';
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

    <title>Add Cars</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrapvalidator.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB8tkmY-UJlQgmpJLIWFcvCW04UNHeZnY&v=3.exp&sensor=false&libraries=places"></script>

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <link rel="stylesheet" type="text/css" href="css/carimage.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>


#title{
  background-color: #333;
  color: #fff !important;
  text-align: center;
  font-size: 30px;

}


</style>

</head>
<?php

if (isset($_POST['submit'])) {

  include ('connect.php');






  $sql = "INSERT INTO cars VALUES ( DEFAULT , :plate, :name, :vtype, :make , :model , :power , :color , :doors , :fuel , :seats
                                            , :gearbox , :descr , :price , :status , :location , :custid , :promotion)";
  $stmt = oci_parse($conn, $sql);
  oci_bind_by_name($stmt, ':plate', $_POST["plate"]);
  oci_bind_by_name($stmt, ':name', $_POST["name"] );
  oci_bind_by_name($stmt, ':model', $_POST["model"] );
  oci_bind_by_name($stmt, ':color', $_POST["color"] );
  oci_bind_by_name($stmt, ':make', $_POST["make"] );
  oci_bind_by_name($stmt, ':doors', $_POST["doors"] );
  oci_bind_by_name($stmt, ':fuel', $_POST["fuel"] );
  oci_bind_by_name($stmt, ':gearbox', $_POST["gearbox"] );
  oci_bind_by_name($stmt, ':seats', $_POST["seats"] );
  oci_bind_by_name($stmt, ':vtype', $_POST["vtype"]);
  oci_bind_by_name($stmt, ':power', $_POST["power"]);
  oci_bind_by_name($stmt, ':price', $_POST["price"] );
  oci_bind_by_name($stmt, ':descr', $_POST["descr"] );
  oci_bind_by_name($stmt, ':status', $_POST["status2"]);
  oci_bind_by_name($stmt, ':location', $_POST["location"]);
  oci_bind_by_name($stmt, ':custid', $_SESSION['id']);
    oci_bind_by_name($stmt, ':promotion', $_POST["promotion"]);
  oci_execute($stmt);











   //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
      $target_path = "uploads/";
        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable

    $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image


    if (($_FILES["file"]["size"][$i] < 100000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder

               $imagename=basename($_FILES['file']['tmp_name'][$i]);
               $imagetmp="uploads/" . $imagename;

               echo $target_path;

              //Insert the image name and image content in image_table



              $strSQL2 = " select max(cars_id) as max from cars ";
              $objParse2 = oci_parse($conn, $strSQL2);
              oci_execute ($objParse2,OCI_DEFAULT);
              $objResult2 = oci_fetch_array($objParse2,OCI_ASSOC);
              $max = $objResult2['MAX'];


                $sql = "INSERT INTO CARSIMAGE(CARS_ID,IMAGENUM,FILESTYPE,IMGSTATUS) VALUES (:max, $i , :image , 'Able')";
                $stmt = oci_parse($conn, $sql);
                oci_bind_by_name($stmt, ':max', $max);
                oci_bind_by_name($stmt, ':image', $target_path);
                oci_execute($stmt);




            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }





















      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('New cars added successfully.')
            window.location.href='mycars.php';
              </SCRIPT>");




}

























 ?>
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

              <h4 id="menu">Add Cars</h4>
              <br /><br />
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#image">Cars Image</a></li>
                <li><a data-toggle="tab" href="#details">Car Details</a></li>
                <li><a data-toggle="tab" href="#price">Price</a></li>
                <li><a data-toggle="tab" href="#desc">Description</a></li>

              </ul>


              <div class="tab-content">
              <div id="image" class="tab-pane fade in active">

                <h2 id="menu">Car Photos</h2>


                <center>
                <div id="formdiv">
                    <form enctype="multipart/form-data" id="addcar" action="" method="post">

                        <hr/>
                        <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>

                        <input type="button" id="add_more" class="upload" value="Add More Files"/>


                    <br/>

            <!-------Including PHP Script here------>

                </div>
              </center>


              </div>
              <div id="details" class="tab-pane fade">
                <h2 id="menu">Car Details</h2>




                <table width="100%" border="0" cellspacing="1" cellpadding="1">

                <tr>
                <td width="7%"><div align="center">Plate </div></td>
                <td width="24%">
                  <div align="center">
                    <input name="plate" type="text" id="plate" size="20" maxlength="40" class="form-control" required/>
                  </div></td>
                <td width="29%"><div align="center">Name</div></td>
                <td width="40%"><input name="name" type="text" id="name" size="40" maxlength="40" class="form-control" required/></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td><div align="center">Model</div></td>
                <td><div align="center">
                  <input name="model" type="text" id="model" size="20" maxlength="40"  class="form-control" class="form-control" required/>
                </div></td>
                <td><div align="center">Color</div></td>
                <td><label for="asd"></label>
                  <select name="color" id="color" class="form-control" class="form-control" required>
                    <option value="">Choose ..</option>
                    <option>Red</option>
                    <option>White</option>
                    <option>Black</option>
                    <option>Purple</option>
                    <option>Pink</option>
                    <option>Blue</option>
                    <option>Green</option>
                    <option>Yellow</option>
                  </select></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td><div align="center">Make</div></td>
                <td><div align="center">
                  <input name="make" type="text" id="make" size="20" maxlength="40" class="form-control" required/>
                </div></td>
                <td><div align="center">Doors</div></td>
                <td><select name="doors" id="doors" class="form-control" required >
                  <option value="">Choose ..</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                </select></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td>Status</td>
                <td><select name="status2" id="status2"  class="form-control" required>
                  <option value="">Choose ..</option>
                  <option>Available</option>
                  <option>Not Available</option>
                  <option>Rented</option>
                  <option>Maintenance</option>
                </select></td>
                <td><div align="center">Fuel</div></td>
                <td><select name="fuel" id="fuel"  class="form-control" required>
                  <option value="">Choose ..</option>
                  <option>Petrol</option>
                  <option>Diesel</option>
                  <option>Other</option>
                </select></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                <td>Location&nbsp;&nbsp;</td>
                <td><input name="location" type="text" id="location" size="20"  class="form-control" required/></td>
                <td><div align="center">Gearbox</div></td>
                <td><select name="gearbox" id="gearbox" class="form-control" required>
                  <option value="">Choose ..</option>
                  <option>Automatic</option>
                  <option>Manual</option>
                </select></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div align="center">Number of seats</div></td>
                <td><select name="seats" id="seats" class="form-control" required>
                  <option value="">Choose ..</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                </select></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div align="center">Vehicle Type</div></td>
                <td><select name="vtype" id="vtype" class="form-control" required>
                  <option value="">Choose ..</option>
                  <option>Sports</option>
                  <option>Estate</option>
                  <option>Van</option>
                  <option>Pickup Vechicle</option>
                  <option>Other</option>
                </select></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div align="center">Power</div></td>
                <td><input name="power" type="number" id="power" size="10" maxlength="40" class="form-control" required/></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
                </table>












              </div>



              <div id="price" class="tab-pane fade">
                <h2 id="menu">Price</h2>

                <div align="center">
                  <table width="53%" border="0" cellspacing="1" cellpadding="1">
                    <tr>
                      <td width="57%"><div align="center">Price Per Day</div></td>
                      <td width="43%">
                        <center>RM</center>
                        <input type="number" name="price" id="price" class="form-control" required/></td>
                    </tr>
                    <tr>
                      <td width="57%"><div align="center">Promotion</div></td>
                      <td width="43%">
                        <center>%</center>
                        <input type="number" name="promotion" id="promotion" class="form-control" required/></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>

                  </table>
                </div>

              </div>
              <div id="desc" class="tab-pane fade">
                <h2 id="menu">Description</h2>
                              <textarea name="descr" cols="93" rows="5" class="form-control" required></textarea>
              </div>
            </div>




              <br /><p align="right">

                <input type="submit" value="Add Cars" name="submit" id="upload" class="upload"/>
              </p>
              </form>














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
        function init() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }

        google.maps.event.addDomListener(window, 'load', init);
    </script>

</body>

</html>
