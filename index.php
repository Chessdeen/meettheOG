<!-- Configuration-->
<?php require_once("resources/config.php"); ?>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    
    $email = trim($_POST['email']);
    
    
    $error = [
        
        'email'=> ''
        
        
        ];
        
      
        
        
         if($email == ''){
            
            $error['email'] = 'Email cannot be empty';
            
        }
        
        
        if(email_exists($email)){
            
            $error['email'] = 'Email already exists, <a href="login.php" class="text-purple-800">Please login</a>';
            
        }
        
        
        
        foreach ($error as $key => $value) {
            
            if(empty($value)) {
                
                unset($error[$key]);
            }
            
            
            
            
        } //foreach
        
        
        if(empty($error)) {
            
            register_user($email);
            
            
            login_user_reg($email);
            
        }


} 




?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

<!-- Navigation -->
<?php include(TEMPLATE_FRONT .  "/nav.php");?>



<div class="relative bg-deep-purple-accent-400">
  <div class="absolute inset-x-0 bottom-0">
    <svg viewBox="0 0 224 12" fill="currentColor" class="w-full -mb-1 text-white" preserveAspectRatio="none">
      <path d="M0,0 C48.8902582,6.27314026 86.2235915,9.40971039 112,9.40971039 C137.776408,9.40971039 175.109742,6.27314026 224,0 L224,12.0441132 L0,12.0441132 L0,0 Z"></path>
    </svg>
  </div>
  <div class="body px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
      <br />
    <div class="relative max-w-2xl sm:mx-auto sm:max-w-xl md:max-w-2xl sm:text-center">
      <h2 class="mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none"><span class="relative text-teal-900">Olayinka</span> &
        <span class="relative inline-block px-2">
          <div class="absolute inset-0 transform -skew-x-12 bg-teal-accent-400"></div>
          <span class="relative text-teal-900">Anuoluwa</span>
        </span>
        <br />
      </h2>
      <br />
      <br />
     <br />
     <br />
<!-- Script to submit and login guest -->
      <?php //add_guest(); ?>
      <p style="color:red;"><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
      <form action="" method="post" class="flex flex-col items-center w-full mb-4 md:flex-row md:px-16">
       
        <input
          name="email"
          placeholder="Email"
          type="email"
          class="flex-grow w-full h-12 px-4 mb-3 text-purple-300 transition duration-200 border-2 border-transparent rounded appearance-none md:mr-2 md:mb-0 bg-deep-purple-900 focus:border-teal-accent-700 focus:outline-none focus:shadow-outline"
         required/>
         
         <button name="submit" type="submit" class="btn inline-flex items-center justify-center w-full h-12 px-6 font-semibold tracking-wide text-teal-900 transition duration-200 rounded shadow-md md:w-auto hover:text-deep-purple-900  focus:shadow-outline focus:outline-none  hover:text-yellow-700 duration-300 hover:border border border-yellow-500 hover:bg-transparent hover:border-purple-300">RSVP</button>
        
      </form>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <a href="#foot"
        aria-label="Scroll down"
        class="flex items-center justify-center w-10 h-10 mx-auto text-white duration-300 transform border border-gray-400 rounded-full hover:text-teal-accent-400 hover:border-teal-accent-400 hover:shadow hover:scale-110"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
          <path d="M10.293,3.293,6,7.586,1.707,3.293A1,1,0,0,0,.293,4.707l5,5a1,1,0,0,0,1.414,0l5-5a1,1,0,1,0-1.414-1.414Z"></path>
        </svg>
      </a>
    </div>
  </div>
</div>




<!-- Footer -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>

