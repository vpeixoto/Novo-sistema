<!-- Logo -->
<a href="index2.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>A</b>dm</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Admin</b></span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
     
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <i class="fa fa-user"></i>
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">
            <?php
              echo $user_name;
            ?> 
          </span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
			<?php
                echo $this->Html->image(
                    'TwitterBootstrap.user2-160x160.jpg',
                    ['class'=>'img-circle',  "alt"=>"User Image"]
                );
            ?>

            <p>
              <?php
                echo $user_name;
              ?> 
              <small>
                <?php
                  echo $setor_name;
                ?> 

              </small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="users/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      
    </ul>
  </div>
</nav>