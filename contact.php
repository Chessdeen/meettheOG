<!-- Configuration-->
<?php require_once("resources/config.php"); ?>

<?php add_contact(); ?>

<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

<!-- Navigation -->
<?php include(TEMPLATE_FRONT .  "/nav.php");?>




<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="flex flex-col justify-between lg:flex-row">
    
    <div class="px-5 pt-6 pb-5 text-center border border-gray-300 rounded lg:w-2/5">
      <div class="mb-5 font-semibold">Send us lots of Love, We will be waiting to respond</div>
      <h3 class="align-items-center text-center" style="background-color:#839ffa;"><?php display_message(); ?></h3>
      
      
       <form action="" class="mx-auto mt-8 mb-0 max-w-md space-y-4" method="post">
      <div>
        <label for="name" class="sr-only">Name</label>

        <div class="relative">
          <input
          name="name"
            type="name"
            class="w-full rounded-lg border border-purple-700 p-4 pr-12 text-sm shadow-sm"
            placeholder="Enter Your Name"
          />

          <span
            class="absolute inset-y-0 right-0 grid place-content-center px-4"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
          </span>
        </div>
      </div>
      
      <div>
        <label for="email" class="sr-only">Email</label>

        <div class="relative">
          <input
          name="email"
            type="email"
            class="w-full rounded-lg border border-purple-700 p-4 pr-12 text-sm shadow-sm"
            placeholder="name@email.com"
          />

          <span
            class="absolute inset-y-0 right-0 grid place-content-center px-4"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
          </span>
        </div>
      </div>
           
      <div>
        <label for="message" class="sr-only">Message</label>

        <div class="relative">
          <textarea
          name="message"
            type="message"
            class="w-full rounded-lg border border-purple-700 p-4 pr-12 text-sm shadow-sm"
            placeholder="Enter Your Message"
          ></textarea>
          <span
            class="absolute inset-y-0 right-0 grid place-content-center px-4"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
          </span>
        </div>
      </div>


      <div class="flex items-center justify-between">

        <button
        name="add_contact"
          type="submit"
          class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium bg-purple-500 text-white"
        >
          Send Message
        </button>
      </div>
    </form>
      

     
    </div>
    
    <div class="mb-12 lg:max-w-lg lg:pr-5 lg:mb-0">
      <div class="max-w-xl mb-6">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
           If you have any questions or concerns, <br class="hidden md:block" />
         please don't hesitate to
          <span class="inline-block text-purple-300">contact us</span>
        </h2>
        <p class="text-base text-gray-700 md:text-lg">
         

We will be happy to assist you with any inquiries<br />

We are happy to help and can't wait to celebrate with you on our special day!
        </p>
      </div>
      <hr class="mb-6 border-gray-300" />
      <div class="flex">
       
        <div class="flex flex-col">
         
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>