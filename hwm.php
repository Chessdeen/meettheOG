<!-- Configuration-->
<?php require_once("resources/config.php"); ?>

<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

<!-- Navigation -->
<?php include(TEMPLATE_FRONT .  "/nav.php");?>



<div class="bg-yellow-700 met">
  <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
      <div class="flex flex-col mb-16 sm:text-center sm:mb-0">
        <a href="/" class="mb-6 sm:mx-auto">
          <div class="flex items-center justify-center w-12 h-12 rounded-full bg-teal-accent-400">
            <svg class="w-10 h-10 text-deep-purple-900" stroke="currentColor" viewBox="0 0 52 52">
              <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
            </svg>
          </div>
        </a>
        <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
          <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-white sm:text-4xl md:mx-auto">
            <span class="relative inline-block">
              <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-deep-purple-accent-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                <defs>
                  <pattern id="700c93bf-0068-4e32-aafe-ef5b6a647708" x="0" y="0" width=".135" height=".30">
                    <circle cx="1" cy="1" r=".7"></circle>
                  </pattern>
                </defs>
                <rect fill="url(#700c93bf-0068-4e32-aafe-ef5b6a647708)" width="52" height="24"></rect>
              </svg>
              <span class="relative">How We Met</span><span class="text-yellow-900"> .</span>
            </span>
            <span class="inline-block text-teal-500">The early days</span>
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>

 <div class="mx-10 my-10">
      <h3 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-dark sm:text-4xl md:mx-auto" style="text-align:center;">Our Love Story</h3>
      
      <?php get_about_front(); ?>
      
      </div>
      <br />
      <hr />
      <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="flex flex-col justify-between lg:flex-row">
    
    <div class="px-5 pt-6 pb-5 text-center border border-gray-300 rounded lg:w-2/5" style="height:300px;">
      <div class="flex items-center w-full mb-5">
        
        
        <div>
        <img src="anuoluwa.jpg" alt="" class="items-center object-fill h-48 w-96 " style="width:500px;height:250px;">
        </div>
      </div>
     
    </div>
    
    <div class="mb-12 lg:max-w-lg lg:pr-5 lg:mb-0">
      <div class="max-w-xl mb-6">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
           
          <span class="inline-block text-purple-300">About Anuoluwa</span>
        </h2>
        
        <?php get_bride_front(); ?>
        
         
      </div>
      <hr class="mb-6 border-gray-300" />
      
    </div>
  </div>
</div>


<div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="flex flex-col justify-between lg:flex-row">
    
   
    <div class="mb-12 lg:max-w-lg lg:pr-5 lg:mb-0">
      <div class="max-w-xl mb-6">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
           
          <span class="inline-block text-yellow-500">About Olayinka</span>
        </h2>
        <?php get_groom_front(); ?>
      </div>
      
    </div>
    
     <div class="px-5 pt-6 pb-5 text-center border border-gray-300 rounded lg:w-2/5" style="height:300px;">
      <div class="flex items-center w-full mb-5">
        
        
        <div class="bg-sky-300">
        <img src="olayinka.jpg" class="items-center object-fill h-48 w-96 " alt="" style="width:500px;height:250px;">
        </div>
      </div>
     
    </div>
    
  </div>
</div>
      
   


<!-- Footer -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>