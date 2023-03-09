 <div class="container">
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <img src="https://meettheogs.com/resources/uploads/log.png" alt="logo" width="35px" height="">
      </a>
      <span class="mb-3 mb-md-0 text-muted">Meet The Oginni &copy; <?php echo date("Y"); ?></span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/Adebest_pro"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/Ade Codes"><i class="fa-brands fa-linkedin-in"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://github.com/Chessdeen"><i class="fa-brands fa-github"></i></a></li>
      
    </ul>
  </footer>
</div>
 </main>
  </div>
</div>
 <?php 
 $dateTime = strtotime('September 28, 2023 00:00:00');
 $getDateTime = date("F d, Y H:i:s", $dateTime); 
?>
<!-- Script -->
<script>
        var countDownTimer = new Date("<?php echo "$getDateTime"; ?>").getTime();
        // Update the count down every 1 second
        var interval = setInterval(function() {
            var current = new Date().getTime();
            // Find the difference between current and the count down date
            var diff = countDownTimer - current;
            // Countdown Time calculation for days, hours, minutes and seconds
            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +
            minutes + "m " + seconds + "s ";
            // Display Expired, if the count down is over
            if (diff < 0) {
                clearInterval(interval);
                document.getElementById("counter").innerHTML = "EXPIRED";
            }
        }, 1000);
</script>

    <script src="js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="js/dashboard.js"></script>
      
  </body>
</html>

