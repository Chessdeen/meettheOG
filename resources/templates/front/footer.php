<!-- Footer -->
<section class="relative bg-deep-purple-accent-400 shadow-lg" id="foot">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
       
        
        <div class="border border-purple-300 ...">
            <div class="grid grid-cols-3 gap-4">
            <div class=""><b>Venue: <?php get_venue_front(); ?></b></div>
            <div class=""><b>Date: <?php get_date_front(); ?> </b></div>
            <div class=""><b>Colour: <span class="border border-purple-700 text-white" style="background-color:#C8A2C8;">Lilac</span>&nbsp;&nbsp;<span class="border border-yellow-700 text-white" style="background-color:#d4af37;">Gold</span></b></div>
           
            </div>
        </div>
        <p class="mt-8 text-base leading-6 text-center text-gray-400">
            © 2023 Meet The OG's, Inc. All rights reserved.
        </p>
    </div>
</section>
<script>
      let $root = $('html, body');
      $('a[href^="#"]').click(function() {
          let href = $.attr(this, 'href');
          $root.animate({
            scrollTop: $(href).offset().top
          }, 500, function() {
            window.location.hash = href;
          });
          return false;
        });
    </script>
</body>
</html>
