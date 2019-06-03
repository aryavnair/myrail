<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
 <?php
session_start();
include("header.php");

?>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg4.jpg'); data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          	<h2 class="subheading" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We are here to help!</h2>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            	<span>Experience</span> . <span>Innovation</span> . <span>Excellence</span>
            </h1>

          </div>
        </div>
      </div>
    </div>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
  <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
  <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg>
  </div>
<?php
include("footer.php");
?>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
