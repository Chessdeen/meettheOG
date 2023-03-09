<?php //add_user(); ?>





<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $user_firstname = trim($_POST['user_firstname']);
    $user_lastname = trim($_POST['user_lastname']);
    $user_role = trim($_POST['user_role']);
    
    $error = [
        
        'username'=> '',
        'email'=> '',
        'password'=> ''
        
        
        ];
        
        if(strlen($username) < 4){
            
            $error['username'] = 'Username needs to be longer';
            
        }
        
        if($username == ''){
            
            $error['username'] = 'Username cannot be empty';
            
        }
        
        if(username_exists($username)){
            
            $error['username'] = 'Username already exists, pick another';
            
        }
        
        
         if($email == ''){
            
            $error['email'] = 'Email cannot be empty';
            
        }
        
        
        if(email_exists($email)){
            
            $error['email'] = 'Email already exists, Pick another';
            
        }
        
        if(strlen($password) < 6){
            
            $error['password'] = 'Password needs to be longer';
            
        }
        if($password == '') {
            
            $error['password'] = 'Password cannot be empty';
        }
        
        
        foreach ($error as $key => $value) {
            
            if(empty($value)) {
                
                unset($error[$key]);
            }
            
            
            
            
        } //foreach
        
        
        if(empty($error)) {
            register_user_in_admin($username, $email, $user_firstname, $user_lastname, $password, $user_role);
            
           set_message("User Created");
        
        redirect("index.php?guest");
            
        }


} 




?>





  <h1 class="page-header">
      Add User
      <small>Page</small>
  </h1>
<div class="row">
<div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-4x'></span>

</div>




<div class="col-md-6">

<form role="form" action="" method="post" id="login-form" autocomplete="off">
                        
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on">
                            
                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on">
                            
                            <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="user_firstname" class="sr-only">Firstname</label>
                            <input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="Firstname">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname" class="sr-only">Lastname</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Lastname" >
                        </div>
                        <div class="form-group">
                            <select name="user_role" for="user_role" required>User Role
                            <option type="text" value="subscriber" class="form-control">Select Options</option>
                            <option type="text" value="admin" class="form-control">Admin</option>
                            <option type="text" value="subscriber" class="form-control">Subscriber</option>
                            <option type="text" value="editor" class="form-control">Editor</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            
                            <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="register" id="btn-registration" class="btn btn-custom btn-lg btn-block" value="Add User" style="background-color: #839ffa;">
                        </div>
                        
                        
                    </form>

</div>

</div>












    