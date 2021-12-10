            <h4 id="menu"><?php echo $_SESSION['us'];?></h4>
              <ul class="nav nav-pills nav-stacked">
          <li <?php if($_SESSION['page'] == 'Dashboard'){echo "class=\"active\"";}?>><a href="dashboard.php">Dashboard</a></li>
          <li <?php if($_SESSION['page'] == 'Myprofile'){echo "class=\"active\"";}?>><a href="myprofile.php">My Profile</a></li>
            <li <?php if($_SESSION['page'] == 'Myreservation'){echo "class=\"active\"";}?>><a href="myreservation.php">My Reservation</a></li>
          <li <?php if($_SESSION['page'] == 'Mycars'){echo "class=\"active\"";}?>><a href="mycars.php">My Cars</a></li>
          <li <?php if($_SESSION['page'] == 'Myfeedback'){echo "class=\"active\"";}?>><a href="myfeedback.php">My Feedback</a></li>
          <li <?php if($_SESSION['page'] == 'Mypayment'){echo "class=\"active\"";}?>><a href="payment.php">My Payment</a></li>
          <li <?php if($_SESSION['page'] == 'Statistics'){echo "class=\"active\"";}?>><a href="statistics.php">Statistics</a></li>
        </ul><br>
