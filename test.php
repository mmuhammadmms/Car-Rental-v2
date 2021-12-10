<?php session_start();
$_SESSION['page'] = 'Myprofile';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrapvalidator.min.js"></script>
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="navbar.css">

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
              include ("connect.php");
              $us= $_SESSION['us'];
              $strSQL = "SELECT * FROM customer where CUST_USERNAME = :us ";
              $objParse = oci_parse($conn, $strSQL);
              oci_bind_by_name($objParse, ':us', $us);
              oci_execute ($objParse,OCI_DEFAULT);
              $objResult = oci_fetch_array($objParse,OCI_BOTH);


              ?>
            </div>






















            <div class="col-md-9">
              <h4 id="menu">My Profile</h4>

              <form class="well form-horizontal"  method="post" action="umyprofile.php?cid=<?php echo $objResult["CUST_USERNAME"];?>" id="contact_form">
          <fieldset>

          <!-- Form Name -->
          <div class="alert alert-success" role="alert" id="success_message">Change the value to update your profile informations.</div>

          <!-- Text input-->



            <div class="form-group">
              <label class="col-md-4 control-label">First Name</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="fname" placeholder="First Name" class="form-control"  type="text" value="<?php echo $objResult["CUST_FNAME"];?>">
                </div>
              </div>

            </div>



      <div class="form-group">
        <label class="col-md-4 control-label" >Last Name</label>
          <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="lname" placeholder="Last Name" class="form-control"  type="text" value="<?php echo $objResult["CUST_LNAME"];?>">
          </div>
        </div>
      </div>










                          <div class="form-group">
                            <label class="col-md-4 control-label" >Username</label>
                              <div class="col-md-4 inputGroupContainer">
                              <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="usname" placeholder="Username" class="form-control"  type="text" value ="<?php echo $objResult["CUST_USERNAME"];?>"readonly>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-4 control-label" >Password</label>
                              <div class="col-md-4 inputGroupContainer">
                              <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="pword" placeholder="Password" class="form-control"  type="password" value="<?php echo $objResult["CUST_PASSWORD"];?>">
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="col-md-4 control-label" >IC / Passport </label>
                              <div class="col-md-4 inputGroupContainer">
                              <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="ic" placeholder="IC / Passport" class="form-control"  type="text" value="<?php echo $objResult["CUST_IC"];?>">
                              </div>
                            </div>
                          </div>





          <!-- Text input-->


          <!-- Text input-->
                 <div class="form-group">
            <label class="col-md-4 control-label">E-Mail</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value="<?php echo $objResult["CUST_EMAIL"];?>">
              </div>
            </div>
          </div>

          <div class="form-group">
     <label class="col-md-4 control-label">E-Mail</label>
       <div class="col-md-4 inputGroupContainer">
       <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
     <input name="email2" placeholder="E-Mail Address" class="form-control"  type="text" value="">
       </div>
     </div>
   </div>




          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Phone #</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="cnumber" placeholder="(845)555-1212" class="form-control" type="text" value="<?php echo $objResult["CUST_NUMBER"];?>">
              </div>
            </div>
          </div>

          <!-- Text input-->

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">City</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="city" placeholder="City" class="form-control"  type="text" value="<?php echo $objResult["CUST_CITY"];?>">
              </div>
            </div>
          </div>

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">State</label>
              <div class="col-md-4 selectContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="country" class="form-control selectpicker" >
                <option value="<?php echo $objResult["CUST_COUNTRY"];?>"><?php echo $objResult["CUST_COUNTRY"];?></option>
                <option value=" " >Please select your state</option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
          </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" >Address</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <textarea name="address" placeholder="IC / Passport" class="form-control"  type="text"><?php echo $objResult["CUST_ADDRESS"];?></textarea>
              </div>
            </div>
          </div>
          <!-- Text input-->




          <!-- Text area -->



          <!-- Success message -->

          <!-- Button -->
          <div align="right">
          <button type="submit" id="update" class="btn2 btn-block" >Update My Profile
            <span class="glyphicon glyphicon-arrow-right"></span></button>

          </div>

          </fieldset>
          </form>


            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>


    </div><!-- /.container -->

        <!-- Footer -->


    </div>
    <!-- /.container -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>





<script>
    $(document).ready(function() {


      $('#contact_form').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              fname: {
                  validators: {
                          stringLength: {
                          min: 2,
                      },
                          notEmpty: {
                          message: 'Please supply your first name'
                      }
                  }
              },
              pword: {
                  validators: {
                          stringLength: {
                          min: 2,
                      },
                          notEmpty: {
                          message: 'Please supply your first name'
                      }
                  }
              },
              ic: {
                  validators: {
                          stringLength: {
                          min: 2,
                      },
                          notEmpty: {
                          message: 'Please supply your first name'
                      }
                  }
              },
               lname: {
                  validators: {
                       stringLength: {
                          min: 2,
                      },
                      notEmpty: {
                          message: 'Please supply your last name'
                      }
                  }
              },
              email: {
                  validators: {
                      notEmpty: {
                          message: 'Please supply your email address'
                      },
                      emailAddress: {
                          message: 'Please supply a valid email address'
                      },

                  }
              },
              email2: {
                  validators: {
                      notEmpty: {
                          message: 'Please suppasdasdasd'
                      },
                      emailAddress: {
                          message: 'Please12323'
                      },
                      custom: {

                            var matchValue = "toh" // foo
                            if ("toh" == matchValue) {
                              return "Hey, that's not valid! It's gotta be " + matchValue
                            }
                          }
                        }

                  }
              },
              cnumber: {
                  validators: {
                      notEmpty: {
                          message: 'Please supply your phone number'
                      },
                      number: {
                          country: 'MY',
                          message: 'Please supply a vaild phone number with area code'
                      }
                  }
              },
              address: {
                  validators: {
                       stringLength: {
                          min: 8,
                      },
                      notEmpty: {
                          message: 'Please supply your street address'
                      }
                  }
              },
              city: {
                  validators: {
                       stringLength: {
                          min: 4,
                      },
                      notEmpty: {
                          message: 'Please supply your city'
                      }
                  }
              },
              country: {
                  validators: {
                      notEmpty: {
                          message: 'Please select your state'
                      }
                  }
              },
              zip: {
                  validators: {
                      notEmpty: {
                          message: 'Please supply your zip code'
                      },
                      zipCode: {
                          country: 'US',
                          message: 'Please supply a vaild zip code'
                      }
                  }
              },
              address: {
                  validators: {
                        stringLength: {
                          min: 10,
                          max: 200,
                          message:'Please enter at least 10 characters and no more than 200'
                      },
                      notEmpty: {
                          message: 'Please supply a description of your project'
                      }
                      }
                  }
              }
          })
          .on('success.form.bv', function(e) {
              $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                  $('#contact_form').data('bootstrapValidator').resetForm();

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
