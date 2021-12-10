
  <link rel="stylesheet" type="text/css" href="navbar.css">


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CAR RENTAL</a>

    </div>
    <?php
    if(!isset($_SESSION['role'])){
    ?>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cars.php">CARS</a></li>

          <li><a href="#" data-toggle="modal" data-target="#myModal">LOGIN</a></li>
          <li><a href="#"  data-toggle="modal" data-target="#register">REGISTER</a></li>

      </ul>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form name="login" method="post" action="login.php">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4><span class="glyphicon glyphicon-user"></span> Login</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" action="login.php">
              <div class="form-group">
                <label for="psw"><span class=""></span> Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
              </div>
              <div class="form-group">
                <label for="usrname"><span class=""></span> Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-block">Login
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
  }else if ($_SESSION['role'] == "Member"){
    ?>



    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="dashboard.php">HOME</a></li>
        <li><a href="mrent1.php">RENT</a></li>
        <li><a href="cars.php">CARS</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MEMBER
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="myprofile.php">My Profile</a></li>
          <li><a href="myreservation.php">My Reservation</a></li>
          <li><a href="mycars.php">My Cars</a></li>
          <li><a href="myfeedback.php">My Feedback</a></li>
          <li><a href="payment.php">My Payment</a></li>
          <li><a href="statistics.php">Statistics</a></li>
          <li class="divider"></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li>
      </ul>
    </div>




  <?php
  }
    ?>

  </div>
</nav>
