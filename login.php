<!-- Configuration-->
<?php require_once("resources/config.php"); ?>

<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

<!-- Navigation -->
<?php include(TEMPLATE_FRONT .  "/nav.php");?>

<?php

		checkIfUserIsLoggedInAndRedirect('admin');


		if(ifItIsMethod('post')){

				if(isset($_POST['email']) && isset($_POST['password'])){

				login_user($_POST['email'], $_POST['password'], $POST['username']);


			}else {

               set_message("Email or Password Incorrect");
				redirect('login.php');
			}

		}






?>


<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="flex flex-col justify-between lg:flex-row">
    <div class="mb-12 lg:max-w-lg lg:pr-5 lg:mb-0">
      <div class="max-w-xl mb-6">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
         Meet The<br class="hidden md:block" />
          <span class="inline-block text-yellow-700">Oginni's</span> Web-App
        </h2>
        <p class="text-base text-gray-700 md:text-lg">
          This web-app is designed to provide you with access to exclusive content and features related to our special day. By logging in, you can view our wedding registry, RSVP to our events, and view our wedding timeline.</p>
          <p class="text-base text-gray-700 md:text-lg">
          If you have any questions or need assistance, please don't hesitate to <a href="contact.php" class="font-semibold text-yellow-700">contact us</a>. <br class="hidden md:block" />Thank you for joining us on this journey towards our wedding day!
        </p>
      </div>
      <hr class="mb-6 border-gray-300" />
      <div class="flex">
        <!--<div class="flex flex-col">-->
        <!--  <div class="text-sm font-semibold">Rich the kid &amp; Famous Dex</div>-->
        <!--  <div class="text-xs text-gray-700">Rich Forever Intro</div>-->
        <!--</div>-->
      </div>
    </div>
    <div class="px-5 pt-6 pb-5 text-center border border-gray-300 rounded lg:w-2/5">
      <div class="mb-5 font-semibold">Login with your Email</div>
      <div class="mb-5 font-semibold text-red-500"><?php display_message(); ?></div>
      <form action="login.php" method="post" class="flex flex-col items-center w-full mb-4 md:flex-row md:px-16">
        <input
          name="email"
          placeholder="Email"
          type="email"
          class="flex-grow w-full h-12 px-4 mb-3 text-dark-800 transition duration-200 border-2 border-yellow-100 rounded appearance-none md:mr-2 md:mb-0 bg-deep-purple-900 focus:border-yellow-700 focus:outline-none focus:shadow-outline"
         required/>
         <input
          name="password"
          placeholder="Password"
          type="password"
          class="flex-grow w-full h-12 px-4 mb-3 text-dark-800 transition duration-200 border-2 border-yellow-100 rounded appearance-none md:mr-2 md:mb-0 bg-deep-purple-900 focus:border-yellow-700 focus:outline-none focus:shadow-outline"
         required/>
         <button name="submit" type="submit" class="btn inline-flex items-center justify-center w-full h-12 px-6 font-semibold tracking-wide text-teal-900 transition duration-200 rounded shadow-md md:w-auto hover:text-deep-purple-900 bg-yellow-100 hover:bg-yellow-300 focus:shadow-outline focus:outline-none border border-yellow-700">Login</button>
        
      </form>
      <p class="max-w-md px-5 mb-3 text-xs text-gray-600 sm:text-sm md:mb-5">
        Enter your email and password to access your dashboard. If you have forgotten your password, <a href="password_reset.php" class="font-semibold text-yellow-700">RESET YOUR PASSWORD</a> here
      </p>
      <div class="flex items-center w-full mb-5">
        <hr class="flex-1 border-gray-300" />
        <div class="px-3 text-xs text-gray-500 sm:text-sm">or</div>
        <hr class="flex-1 border-gray-300" />
      </div>
      <a href="/" class="inline-flex items-center justify-center w-full h-12 px-6 font-semibold transition duration-200 bg-white border border-gray-300 rounded md:w-auto hover:bg-gray-100 focus:shadow-outline focus:outline-none">
        Sign Up with Email
      </a>
    </div>
  </div>
</div>


<!-- Footer -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>