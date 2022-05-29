  <!--  Header  -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="homepage" class="logo d-flex align-items-center">
        <img src="assets/img/cardb-logo.svg" alt="">
        <span class="d-none d-lg-block">CarDB Analytics</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <?php 
                if(isset($_SESSION["username"]))
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>".$_SESSION['username']."</span>";
                }
                else
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>Guest</span>";
                }
            ?>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php 
                if(isset($_SESSION["username"]))
                {
                  echo "<h6>".$_SESSION['username']."</h6>";
                  echo "<span>".$_SESSION['email']."</span>";
		          ?>
          	  </li>
            	<li>
              	<hr class="dropdown-divider">
            	</li>

	            <li>
              	  <a class="dropdown-item d-flex align-items-center" href="logout">
                  <i class="bi bi-box-arrow-right"></i>
                 <span>Sign Out</span>
                <?php } 
                else
                {
                  echo "<h6>Guest</h6>";
                  echo "<span>Not logged in</span>";
                  ?>
          	  </li>
            	<li>
              	<hr class="dropdown-divider">
            	</li>

	            <li>
              	  <a class="dropdown-item d-flex align-items-center" href="login">
                  <i class="bi bi-box-arrow-right"></i>
                 <span>Sign In</span>
		          <?php }
              ?>

              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

<!-- Sidebar  -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#research-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Research</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="research-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="overview">
              <i class="bi bi-circle"></i><span>Overview</span>
            </a>
          </li>
        <li>
            <a href="cars">
              <i class="bi bi-circle"></i><span>Car Research</span>
            </a>
          </li>
        </ul>        
      </li><!-- End Research Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#analytics-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Analytics</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="analytics-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
            <a href="dashboard">
              <i class="bi bi-circle"></i><span>Dashboard</span>
            </a>
          </li>
        <li>
            <a href="region">
              <i class="bi bi-circle"></i><span>Region</span>
            </a>
          </li>
          <li>
            <a href="age">
              <i class="bi bi-circle"></i><span>Age</span>
            </a>
          </li>
          <li>
            <a href="gender">
              <i class="bi bi-circle"></i><span>Gender</span>
            </a>
          </li>
          <li>
            <a href="colour">
              <i class="bi bi-circle"></i><span>Colour</span>
            </a>
          </li>                    
        </ul>        
      </li><!-- End Analytics Nav -->      
         
      
      <li class="nav-heading">Pages</li>      

      <li class="nav-item">
        <a class="nav-link collapsed" href="team">
          <i class="bi bi-person"></i>
          <span>Team</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="contact">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="register">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="login">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->      
      </ul>

</aside><!-- End Sidebar-->      