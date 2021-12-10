<?php session_start();
if(isset($_SESSSION['role'])){
  $_SESSION['role'] = "";
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

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <link rel="stylesheet" type="text/css" href="background.css">

    <link rel="stylesheet" href="css/jPages.css">

        <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/highlight.pack.js"></script>
    <script type="text/javascript" src="js/tabifier.js"></script>
    <script src="js/js.js"></script>
    <script src="js/jPages.js"></script>
    <link rel="stylesheet" href="js/val/bootstrapValidator.css"/>
    <script type="text/javascript" src="js/val/bootstrapValidator.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.jumbotron.hero-spacer {
    opacity: 0.5;
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


.btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
}

/* On hover, the color of .btn will transition to white with black text */
.btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
}
.thumbnail img {
    width: 320px;
    height: 250px;
}

</style>
</head>


<body>

    <!-- Navigation -->

<?php
include ("navbar.php");
?>



    <div class="modal fade" id="register" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">


            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><span class="glyphicon glyphicon-user"></span>Register</h4>
            </div>
            <div class="modal-body">
              <form id="reg" role="form" method="post" action="">
                <div class="form-group">
                  <label for="psw"><span class=""></span> Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                  <label for="psw"><span class=""></span> Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username">
                </div>



                <div class="row">
                  <div class="col-sm-3 col-md-6">
                    <div class="form-group">
                      <label for="psw"><span class=""></span>First Name</label>
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your password">
                    </div>
                  </div>
                  <div class="col-sm-9 col-md-6">
                    <div class="form-group">
                      <label for="psw"><span class=""></span>Last Name</label>
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your password">
                    </div>
                  </div>
                </div>








                <div class="row">
                  <div class="col-sm-3 col-md-6">
                    <div class="form-group">
                      <label for="psw"><span class=""></span>Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                  </div>
                  <div class="col-sm-9 col-md-6">
                    <div class="form-group">
                      <label for="psw"><span class=""></span>Re-password</label>
                      <input type="password" class="form-control" id="password2" name="password2" placeholder="Enter your password">
                    </div>
                  </div>
                </div>
                <button type="submit" name="register" class="btn btn-block">Register
                  <span class="glyphicon glyphicon-ok"></span>
                </button>
              </form>
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


<?php


  include ('connect.php');

  if (isset($_POST['register'])) {



  $sql = "INSERT INTO customer VALUES (DEFAULT , :username , :fname, :lname, :password,' ' ,  :email , ' ' , ' ' , ' ' , ' ' , ' ' , sysdate)";
  $stmt = oci_parse($conn, $sql);

  oci_bind_by_name($stmt, ':username', $_POST["username"]);
  oci_bind_by_name($stmt, ':fname', $_POST["fname"] );
  oci_bind_by_name($stmt, ':lname', $_POST["lname"] );
  oci_bind_by_name($stmt, ':password', $_POST["password"] );
  oci_bind_by_name($stmt, ':email', $_POST["email"] );

  oci_execute($stmt);


  echo ("<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Register successful.Please log in to continue.')
 window.location.href='index.php';
 </SCRIPT>");


}

?>











    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <div id = "home" class="jumbotron text-center">
          <h1>Rental Enterprise</h1>
          <p>We provide car for rents.</p>
          <form class="form-inline">
            <?php     if(!isset($_SESSION['role'])){
            ?>
                <a href="#"  data-toggle="modal" data-target="#register"><button type="button" class="btn btn-danger">Register </button></a>
            <?php
          }else{
          ?>
            <a href="mrent1.php"><button type="button" class="btn btn-danger">Make reservation</button></a>

          <?php
          }?>

          </form>
        </div>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h2 style="color:black">Latest Cars</h2><br />
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->

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
                                    <img src="<?php echo $objResult2['FILESTYPE'];?>"alt="" width="500px" height="500px">
                                    <div class="caption">
                                      <h4><a href="details.php"><input type="text" class="form-control" value="<?php echo $objResult['CARS_NAME'];?>" readonly></a>

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


        <!-- /.row -->

        <hr>

        <!-- Footer -->


    </div>
    <!-- /.container -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // Generate a simple captcha

        $('#reg').bootstrapValidator({
    //        live: 'disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fname: {
                    validators: {
                        notEmpty: {
                            message: 'The first name is required and cannot be empty'
                        }
                    }
                },
                lname: {
                    validators: {
                        notEmpty: {
                            message: 'The last name is required and cannot be empty'
                        }
                    }
                },
                username: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The username is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'The username must be more than 6 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'The username can only consist of alphabetical, number, dot and underscore'
                        },
                        remote: {
                            type: 'POST',
                            url: 'remote.php',
                            message: 'The username is already been used.'
                        },
                        different: {
                            field: 'password,confirmPassword',
                            message: 'The username and password cannot be the same as each other'
                        }
                    }
                },
                email: {
                    validators: {
                      notEmpty: {
                          message: 'The email is required and cannot be empty'
                      },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        },
                        remote: {
                            type: 'POST',
                            url: 'remote3.php',
                            message: 'The email is already been used.'
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        identical: {
                            field: 'password2',
                            message: 'The password and its confirm are not the same'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        }
                    }
                },
                password2: {
                    validators: {
                        notEmpty: {
                            message: 'The confirm password is required and cannot be empty'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        }
                    }
                },


            }
        });

        // Validate the form manually
        $('#validateBtn').click(function() {
            $('#register').bootstrapValidator('validate');
        });

        $('#resetBtn').click(function() {
            $('#register').data('bootstrapValidator').resetForm(true);
        });
    });
    </script>
</body>

</html>
