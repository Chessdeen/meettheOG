 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
          
       
        <ul class="nav flex-column">
            
          <?php if(is_admin()): ?>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="layers" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?guest">
              <span data-feather="users" class="align-text-bottom"></span>
              Guests
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?hwm">
              <span data-feather="heart" class="align-text-bottom"></span>
              How We Met 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?gift">
              <span data-feather="gift" class="align-text-bottom"></span>
              Gift
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?gallery">
              <span data-feather="image" class="align-text-bottom"></span>
              Gallery 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?data">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Wedding Information 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?admin_timeline">
              <span data-feather="clock" class="align-text-bottom"></span>
              Timeline 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?contact">
              <span data-feather="message-circle" class="align-text-bottom"></span>
              Contacts
            </a>
          </li>
          
          <?php endif ?>
          
          <?php if(!is_admin()): ?>
           <li class="nav-item">
            <a class="nav-link" href="index.php?info">
              <span data-feather="layers" class="align-text-bottom"></span>
              Dashboard 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?user_gift">
              <span data-feather="gift" class="align-text-bottom"></span>
              Gifts 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?inbox">
              <span data-feather="bell" class="align-text-bottom"></span>
              Inbox 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?timeline">
              <span data-feather="clock" class="align-text-bottom"></span>
              Timeline 
            </a>
          </li>
          <?php endif ?>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Guest Email </span>
          <i class="fa-solid fa-gear"></i>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link disabled" href="index.php?profile" disable>
              <span data-feather="user" class="align-text-bottom"></span>
              <?php echo ucwords(get_user_email()); ?>
            </a>
          </li>
          </ul>
        <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">-->
        <!--  <span>USERNAME </span>-->
        <!--  <i class="fa-solid fa-gear"></i>-->
        <!--</h6>-->
        <!--<ul class="nav flex-column mb-2">-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link" href="index.php?profile">-->
        <!--      <span data-feather="user" class="align-text-bottom"></span>-->
        <!--      About Us-->
        <!--    </a>-->
        <!--  </li>-->
        <!--  </ul>-->
       
      </div>
    </nav>