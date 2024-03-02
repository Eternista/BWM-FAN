<?php global $wp;
$loginUrl = $wp->request;
if ($loginUrl != "login") {
  ?>
  <footer class="footer sec">

    <!--  OLD FOOTER 	   -->

    <!--     <div class="container">
      <div class="row footer__main">
        <div class="col-lg-3">
          <h4>Services</h4>
          <ul class="menu">
            <li class="menu__item"><a href="#" class="link">FAQs</a></li>
            <li class="menu__item"><a href="#" class="link">Shop@Home</a></li>
            <li class="menu__item"><a href="#" class="link">Glossary</a></li>
            <li class="menu__item"><a href="#" class="link">Contact us</a></li>
            <li class="menu__item"><a href="#" class="link">Tyre label information</a></li>
            <li class="menu__item"><a href="#" class="link">Live Chat</a></li>
          </ul>
        </div>
        <div class="col-lg-3">
          <h4>Font range</h4>
          <ul class="menu">
            <li class="menu__item"><a href="#" class="link">Commercial Vehicles</a></li>
            <li class="menu__item"><a href="#" class="link">Electric Cars</a></li>
            <li class="menu__item"><a href="#" class="link">Mild Hybrid Cars</a></li>
            <li class="menu__item"><a href="#" class="link">Crossovers</a></li>
            <li class="menu__item"><a href="#" class="link">Hatchback</a></li>
            <li class="menu__item"><a href="#" class="link">Nismo</a></li>
          </ul>
        </div>
        <div class="col-lg-3">
          <h4>Font network</h4>
          <ul class="menu">
            <li class="menu__item"><a href="#" class="link">Find Your Font Dealer</a></li>
            <li class="menu__item"><a href="#" class="link">Check stock</a></li>
            <li class="menu__item"><a href="#" class="link">Font Dealer Careers</a></li>
            <li class="menu__item"><a href="#" class="link">Font Intelligent Mobility</a></li>
          </ul>
        </div>
        <div class="col-lg-3">
          <h4 class="social-heading">Social</h4>
          <ul class="menu menu--social">
            <li class="menu__item"><a href="#" class="link icon icon--facebook"></a></li>
            <li class="menu__item"><a href="#" class="link icon icon--fb-message"></a></li>
            <li class="menu__item"><a href="#" class="link icon icon--whats-up"></a></li>
          </ul>
        </div>
      </div>
      <div class="separator"></div>
      <div class="row footer__bottom">
        <div class="col-lg-6">
          <ul class="menu menu--wide">
            <li class="menu__item"><a href="#" class="link">Global sites</a></li>
            <li class="menu__item"><a href="#" class="link">Sitemap</a></li>
            <li class="menu__item"><a href="#" class="link">Newsroom</a></li>
            <li class="menu__item"><a href="#" class="link">Recruitment</a></li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="menu menu--wide menu--wide--right">
            <li class="menu__item">Privacy</li>
            <li class="menu__item">Terms & Conditions</li>
            <li class="menu__item">© Font 2021</li>
          </ul>
        </div>
      </div>
    </div> -->

    <!--  END OF OLD FOOTER 	   -->

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12">
          <p>
            <strong>©
              <?php echo date("Y"); ?> I'm BMW Fan
            </strong><br />
            From fans to fans
          </p>
        </div>
        <div class="col-md-6  col-12">
          <ul class="menu menu--wide menu--wide--right">
            <li class="menu__item"><a href="/contact">Contact</a></li>
            <!--<li class="menu__item"><a href="#">Terms and Condition</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <?php
}
wp_footer();
?>

</body>

</html>