<?php 

    
    if(isset($_GET['id'])) {
        
        $query = query("SELECT * FROM users WHERE user_id = " . escape_string($_GET['id']) . " ");
        confirm($query);
        
        while($row = fetch_array($query)) {
            
            
$username                 = escape_string($row['username']);
$email                    = escape_string($row['email']);
$password                 = escape_string($row['password']);
$user_firstname           = escape_string($row['user_firstname']);
$user_lastname            = escape_string($row['user_lastname']);
$user_role                = escape_string($row['user_role']);

       
        }
        
        update_user_onboard();
    }


?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo ucwords(get_user_email()); ?></h1>
        
      </div>

      
      <div class="table-responsive">
         <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="color:red;"> <span style="border-bottom: dashed 0.5px currentColor;">Welcome to our wedding Planner! We are so excited to have you here and to share our special day with you.</span></h5>
                <p class="card-text">In our bid to provide the best experience for you on our special day, we would love to onboard you so as to notify you periodically and share any new details with you.</p>
                <hr>
               <form action="" method="post" style="padding-top:15px;" enctype="multipart/form-data">
    
         <div class="form-group">
             <input type="hidden" name="user_role" value="subscriber">
            <label for="username">Username</label>
            <input name="username" type="text" class="form-control" autocomplete="off" onfocus="this.value=''" value="Username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control" value="<?php echo ucwords(get_user_email()); ?>">
        </div>
        <div class="form-group">
            <label for="push-notification">First Name</label>
            <input name="user_firstname" type="text" class="form-control" required>
        </div>
         <div class="form-group">
            <label for="last_name">Last Name</label>
            <input name="user_lastname" type="text" class="form-control" required>
        </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" autocomplete="off" onfocus="this.value=''" required>
        </div>

        <div class="form-group">
            <button name="update" type="submit" class="btn btn-primary">
            Weddinng Info <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>      


    </form>
              </div>
              
       
            </div>
          </div>
      </div>
      
      