<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrapvalidator.min.js"></script>

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
}

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
          <?php include ("sidebar.php");?>
          </div>



          <div class="col-md-9">
                                  <form enctype="multipart/form-data"  class="form-horizontal" action="" method="post"  id="reg_form">
              <fieldset>

                <!-- Form Name -->
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

                <!-- Text input-->
          			    	<div class="col-md-5">
                <div class="form-group">
                  <label class="col-md-3 control-label">Plate</label>
                  <div class="col-md-9 inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                      <input  name="plate" placeholder="Plate Number" class="form-control"  type="text">
                    </div>
                  </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-3 control-label" >Model</label>
                  <div class="col-md-9 inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                      <input name="model" placeholder="Car Model" class="form-control"  type="text">
                    </div>
                  </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                  <label class="col-md-3 control-label">Make</label>
                  <div class="col-md-9  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                      <input name="make" placeholder="Car Make" class="form-control" type="text">
                    </div>
                  </div>
                </div>

                <!-- Text input-->


          			<div class="form-group">
          				<label class="col-md-3 control-label">Status</label>
          				<div class="col-md-9 selectContainer">
          					<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          						<select name="status" class="form-control selectpicker" >
          							<option value=" " >Choose</option>
          							<option>Available</option>
          							<option>Not Available</option>
          							<option>Rented</option>
          							<option>Maintenence</option>
          						</select>
          					</div>
          				</div>
          			</div>

          			<div class="form-group">
                  <label class="col-md-3 control-label">Location</label>
                  <div class="col-md-9  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                      <input name="location" placeholder="Rental Location" class="form-control" type="text">
                    </div>
                  </div>
                </div>

          					</div>




          				<div class="col-md-5">


          					<div class="form-group">
          						<label class="col-md-2 control-label">Name</label>
          						<div class="col-md-10  inputGroupContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          								<input  name="name" placeholder="Car Name" class="form-control"  type="text">
          							</div>
          						</div>
          					</div>



          					<div class="form-group">
          						<label class="col-md-2 control-label">Color</label>
          						<div class="col-md-10 selectContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          								<select name="color" class="form-control selectpicker" >
          									<option value="">Choose ..</option>
          									<option>Red</option>
          									<option>White</option>
          									<option>Black</option>
          									<option>Purple</option>
          									<option>Pink</option>
          									<option>Blue</option>
          									<option>Green</option>
          									<option>Yellow</option>
          								</select>
          							</div>
          						</div>
          					</div>



          					<div class="form-group">
          						<label class="col-md-2 control-label">Doors</label>
          						<div class="col-md-10 selectContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          								<select name="doors" class="form-control selectpicker" >
          									<option value="">Choose ..</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
          								</select>
          							</div>
          						</div>
          					</div>


          					<div class="form-group">
          						<label class="col-md-2 control-label">Fuel</label>
          						<div class="col-md-10 selectContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          								<select name="fuel" class="form-control selectpicker" >
          									<option value="">Choose ..</option>
                            <option>Petrol</option>
                            <option>Diesel</option>
                            <option>Other</option>
          								</select>
          							</div>
          						</div>
          					</div>



          					<div class="form-group">
          						<label class="col-md-2 control-label">Gear</label>
          						<div class="col-md-10 selectContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          								<select name="gearbox" class="form-control selectpicker" >
          									<option value="">Choose ..</option>
          									<option>Automatic</option>
          									<option>Manual</option>
          								</select>
          							</div>
          						</div>
          					</div>


          					<div class="form-group">
          						<label class="col-md-2 control-label">Seats</label>
          						<div class="col-md-9 selectContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          								<select name="seats" class="form-control selectpicker" >
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
          								</select>
          							</div>
          						</div>
          					</div>




          					<div class="form-group">
          						<label class="col-md-2 control-label">Type</label>
          						<div class="col-md-9 selectContainer">
          							<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          								<select name="vtype" class="form-control selectpicker" >
          									<option value="">Choose ..</option>
                            <option>Sports</option>
                            <option>Estate</option>
                            <option>Van</option>
                            <option>Pickup Vechicle</option>
                            <option>Other</option>
          								</select>
          							</div>
          						</div>
          					</div>


          					<div class="form-group">
          						<label class="col-md-2 control-label">Power</label>
          						<div class="col-md-10  inputGroupContainer">
          							<div class="input-group"> <span class="input-group-addon"><i>CC</i></span>
          								<input  name="power" placeholder="Car Power" class="form-control"  type="text">
          							</div>
          						</div>
          					</div>


          </div>

        </div>


        <div id="price" class="tab-pane fade">
          <h2 id="menu">Price</h2>

          <div align="center">
            <div class="form-group">
  						<label class="col-md-4 control-label">Price</label>
  						<div class="col-md-4  inputGroupContainer">
  							<div class="input-group"> <span class="input-group-addon"><i>RM </i></span>
  								<input  name="price" placeholder="Car price/day" class="form-control"  type="text">
  							</div>
  						</div>
  					</div>



  					<div class="form-group">
  						<label class="col-md-4 control-label">Promotion</label>
  						<div class="col-md-4 inputGroupContainer">
  							<div class="input-group"> <span class="input-group-addon"><i >%</i></span>
  								<input  name="promotion" placeholder="Promotion" class="form-control"  type="text">
  							</div>
  						</div>
  					</div>
          </div>

        </div>
        <div id="desc" class="tab-pane fade">
          <h2 id="menu">Description</h2>

                    <div class="form-group">

                      <div class="col-md-9  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                          <textarea  name="descr" placeholder="Car Name" class="form-control"  type="text"> </textarea>
                        </div>
                      </div>
                    </div>
        </div>

      </div>


      <br /><br />
      <div align="right">
      <input type="submit" value="Add Cars" name="submit" id="upload" class="upload"/>Add Car
        <span class="glyphicon glyphicon-arrow-right"></span></button>

      </div>
    </form>

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
    <script type="text/javascript">

       $(document).ready(function() {
        $('#reg_form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                plate: {
                    validators: {
                            stringLength: {
                            min: 1,
                        },
                            notEmpty: {
                            message: 'Please enter the car plate number.'
                        }
                    }
                },
    						location: {
    								validators: {
    												stringLength: {
    												min: 1,
    										},
    												notEmpty: {
    												message: 'Please enter the available location for the car rental.'
    										}
    								}
    						},
                 model: {
                    validators: {
                         stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Pleae enter the car model.'
                        }
                    }
                },
    						make: {
    							 validators: {
    										stringLength: {
    											 min: 2,
    									 },
    									 notEmpty: {
    											 message: 'Pleae enter the car make.'
    									 }
    							 }
    					 },

    					 name: {
    							validators: {
    									 stringLength: {
    											min: 2,
    									},
    									notEmpty: {
    											message: 'Pleae enter the car name.'
    									}
    							}
    					},




                status: {
                    validators: {
                        notEmpty: {
                            message: 'Please select the car status.'
                        }
                    }
                },
    						color: {
    								validators: {
    										notEmpty: {
    												message: 'Please select the car color.'
    										}
    								}
    						},
    						doors: {
    								validators: {
    										notEmpty: {
    												message: 'Please select the number of doors.'
    										}
    								}
    						},
    						fuel: {
    								validators: {
    										notEmpty: {
    												message: 'Please select the car fuel.'
    										}
    								}
    						},
    						gearbox: {
    								validators: {
    										notEmpty: {
    												message: 'Please select the car gearbox.'
    										}
    								}
    						},
    						seats: {
    								validators: {
    										notEmpty: {
    												message: 'Please select the car number of seats.'
    										}
    								}
    						},

    						vtype: {
    								validators: {
    										notEmpty: {
    												message: 'Please select the car type.'
    										}
    								}
    						},
    						power: {
    								validators: {
    										notEmpty: {
    												message: 'Please enter the car power.'
    										},
    										integer: {
    												message: 'The value is not an integer'
    										}

    								}
    						},
    						price: {
    								validators: {
    										notEmpty: {
    												message: 'Please enter the car power.'
    										},
    										integer: {
    												message: 'The value is not an integer'
    										}

    								}
    						},
    						promotion: {
    								validators: {
    										notEmpty: {
    												message: 'Please enter the car power.'
    										},
    										integer: {
    												message: 'The value is not an integer'
    										}

    								}
    						},
                descr: {
                   validators: {
                        stringLength: {
                           min: 2,
                       },
                       notEmpty: {
                           message: 'Pleae enter the car description.'
                       }
                   }
               },
                }
            })

                    .on('success.form.bv', function(e) {
                        $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                            $('#reg_form').data('bootstrapValidator').resetForm();

                        // Prevent form submission
                        e.preventDefault();

                        // Get the form instance
                        var $form = $(e.target);

                        // Get the BootstrapValidator instance
                        var bv = $form.data('bootstrapValidator');

                        // Use Ajax to submit form data
                        $.post($form.attr('action'), $form.serialize(), function(result) {
                            console.log(result);
                        }, 'json');
                    });
            });

     </script>

</body>

</html>
