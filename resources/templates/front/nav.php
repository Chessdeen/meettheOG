
<?php 

    $home_main = '';
    $hwm_main = '';
    $gallery_main = '';
    $gift_main = '';
    $contact_main = '';
    $login_main = '';
    
    $pageOruko = basename($_SERVER['PHP_SELF']);
    
    $homePage = 'index.php';
    $hwmPage = 'hwm.php';
    $galleryPage = 'gallery.php';
    $giftPage = 'gift.php';
    $contactPage = 'contact.php';
    $loginPage = 'login.php';
    
     if($pageOruko == $homePage ) {
        
         $home_main = 'activelg';
        
    }else if($pageOruko == $hwmPage ) {
        
         $hwm_main = 'activelg';
        
    }else if($pageOruko == $galleryPage ) {
        
         $gallery_main = 'activelg';
        
    }else if($pageOruko == $giftPage ) {
        
         $gift_main = 'activelg';
        
    }else if($pageOruko == $contactPage ) {
        
         $contact_main = 'activelg';
        
    }else if($pageOruko == $loginPage ) {
        
         $login_main = 'activelg';
        
    }


?>







<!-- Navbar goes here -->
		<nav class="bg-transparent shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="index.php" class="flex items-center py-4 px-2">
								<img src="https://meettheogs.com/resources/uploads/log.png" alt="Logo" class="h-8 w-8 mr-2">
								<span class="font-semibold text-gray-500 text-lg"></span>
							</a>
						</div>
						<!-- Primary Navbar items -->
						<div class="hidden md:flex items-center space-x-1">
							<a href="index" class="<?php echo $home_main; ?> py-4 px-2 font-semibold hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-house"></i> Home</a>
						
							<a href="hwm" class="<?php echo $hwm_main; ?> py-4 px-2 font-semibold hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-heart"></i> How We Met</a>
							
							<a href="gallery" class="<?php echo $gallery_main; ?> py-4 px-2 font-semibold hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-images"></i> Gallery</a>
							
							<a href="gift" class="<?php echo $gift_main; ?> py-4 px-2 font-semibold hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-gift"></i> Gift</a>
							
								<a href="contact" class="<?php echo $contact_main; ?> py-4 px- font-semibold hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-envelopes-bulk"></i> Contact Us</a>
						</div>
					</div>
					<!-- Secondary Navbar items -->
					<div class="hidden md:flex items-center space-x-3 ">
					    
						 <?php if(!isset($_SESSION['user_role'])): ?>
						 
						<a href="login" class="<?php echo $login_main; ?> py-2 px-2 font-medium text-white bg-yellow-600 rounded hover:bg-yellow-700 transition duration-300"><i class="fa-solid fa-right-to-bracket"></i></a>
						
						 <?php else: ?>
						 
						 
						 <?php if(isset($_SESSION['user_role'])): ?>
						 
						 
						 <a href="admin/" class="py-2 px-2 font-medium text-white bg-yellow-600 rounded hover:bg-yellow-700 transition duration-300"><i class="fa-solid fa-lock-open"></i></a>
						 <a href="admin/index.php?inbox" class="py-2 px-2 font-medium text-white bg-yellow-600 rounded hover:bg-yellow-700 transition duration-300"> <i class="fa-solid fa-bell"></i></a>
						 
						 <?php endif ?>
                        
                        <?php endif; ?>
					</div>
					<!-- Mobile menu button -->
					<div class="md:hidden flex items-center">
						<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-gray-500 hover:text-yellow-600 "
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>
					</div>
				</div>
			</div>
			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="">
					<li class=""><a href="index" class="<?php echo $home_main; ?>  block px-3 py-2 rounded-md text-base font-medium " aria-current="page"><i class="fa-solid fa-house"></i> Home</a></li>
					<li class=""><a href="hwm" class="<?php echo $hwm_main; ?>  hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-heart"></i> How We Met</a></li>
					<li class=""><a href="gallery" class="<?php echo $gallery_main; ?>  hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-images"></i> Gallery</a></li>
					<li class=""><a href="gift" class="<?php echo $gift_main; ?>  hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-gift"></i> Gift</a></li>
					<li class=""><a href="contact" class="<?php echo $contact_main; ?> hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-envelopes-bulk"></i> Contact Us</a></li>
					
					<?php if(!isset($_SESSION['user_role'])): ?>
					
					<li class=""><a href="login" class="<?php echo $login_main; ?>  hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
					
					 <?php else: ?>
                    
                        
                        
                        <?php if(isset($_SESSION['user_role'])): ?>
                    
                    <li class=""><a href="admin/" class="hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-lock-open"></i> Dashboard</a></li>
                    
                    
                    <li class=""><a href="admin/index.php?inbox" class="hover:bg-purple-100 hover:text-yellow-600 block px-3 py-2 rounded-md text-base font-medium"><i class="fa-solid fa-bell"></i> Inbox</a></li>
                    
                        
                        <?php endif ?>
                        
                        <?php endif ?>
                        
				</ul>
			</div>
			<script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>
		</nav>