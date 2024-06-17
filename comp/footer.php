<!-- <footer class="pt-3 text-center pb-4 bg-light">
  <p class="mb-0 text-secondary">Copyright 2024 | Majalah Online</p>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html> -->


<footer class="footer">
    <div class="border-top border-bottom footer-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s"><img src="assets/images/logo-dark.png" alt="image"
              class="img-fluid mb-3">
            <p class="mb-4">Temukan informasi terbaru dan terpercaya dari berbagai bidang di setiap update kami. Dari berita politik hingga teknologi, gaya hidup hingga kesehatan, kami hadir untuk memastikan Anda tetap terhubung dengan dunia.</p>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                <h5 class="mb-4">Company</h5>
                <ul class="list-unstyled footer-link">
                  <li><a href="https://www.instagram.com/zlhm.a">Profile</a></li>
                  <li><a href="https://www.instagram.com/zlhm.a">Portfolio</a></li>
                  <li><a href="https://www.instagram.com/zlhm.a">Follow Us</a></li>
                  <li><a href="https://www.instagram.com/zlhm.a">Website</a></li>
                </ul>
              </div>
              <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.8s">
                <h5 class="mb-4">Help & Support</h5>
                <ul class="list-unstyled footer-link">
                  <li><a href="https://www.instagram.com/zlhm.a">Documentation</a></li>
                  <li><a href="https://www.instagram.com/zlhm.a">Feature Request</a>
                </ul>
              </div>
              <div class="col-sm-4 wow fadeInUp" data-wow-delay="1s">
                <h5 class="mb-4">Useful Resources</h5>
                <ul class="list-unstyled footer-link">
                  <li><a href="https://www.instagram.com/zlhm.a">Support Policy</a></li>
                  <li><a href="https://www.instagram.com/zlhm.a">Licenses Term</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col my-1 wow fadeInUp" data-wow-delay="0.4s">
          <p class="mb-0">© Majalah Nusantara by Team <a href="https://www.instagram.com/zlhm.a"
              >Rapid Web Craft Id</a></p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-sos-link mb-0">
            <li class="list-inline-item wow fadeInUp" data-wow-delay="0.4s"><a href="https://www.instagram.com/zlhm.a"><svg
                  class="pc-icon">
                  <use xlink:href="#custom-airplane"></use>
                </svg></a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script>
    $(document).ready(function(){
      $('.navbar-toggler').click(function(){
        $('#navbarNav').toggleClass('show');
      });
    });
  </script>
  
  <script src="../code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="assets/js/plugins/popper.min.js"></script>
  <script src="assets/js/plugins/simplebar.min.js"></script>
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="assets/js/fonts/custom-font.js"></script>
  <script src="assets/js/pcoded.js"></script>
  <script src="assets/js/plugins/feather.min.js"></script>
  <script>
    layout_change('light');
  </script>
  <script>
    layout_theme_contrast_change('false');
  </script>
  <script>
    change_box_container('false');
  </script>
  <script>
    layout_caption_change('true');
  </script>
  <script>
    layout_rtl_change('false');
  </script>
  <script>
    preset_change('preset-1');
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script>
    let ost = 0;
    document.addEventListener('scroll', function () {
      let cOst = document.documentElement.scrollTop;
      if (cOst == 0) {
        document.querySelector('.navbar').classList.add('top-nav-collapse');
      } else if (cOst > ost) {
        document.querySelector('.navbar').classList.add('top-nav-collapse');
        document.querySelector('.navbar').classList.remove('default');
      } else {
        document.querySelector('.navbar').classList.add('default');
        document.querySelector('.navbar').classList.remove('top-nav-collapse');
      }
      ost = cOst;
    });

    var wow = new WOW({
      animateClass: 'animated'
    });
    wow.init();

    $('.screen-slide').owlCarousel({
      loop: true,
      margin: 30,
      center: true,
      nav: false,
      dotsContainer: '.app_dotsContainer',
      URLhashListener: true,
      items: 1
    });
    $('.workspace-slider').owlCarousel({
      loop: true,
      margin: 30,
      center: true,
      nav: false,
      dotsContainer: '.workspace-card-block',
      URLhashListener: true,
      items: 1.5
    });
    $('.marquee').marquee({
      duration: 500000,
      pauseOnHover: true,
      startVisible: true,
      duplicated: true
    });
    $('.marquee-1').marquee({
      duration: 500000,
      pauseOnHover: true,
      startVisible: true,
      duplicated: true,
      direction: 'right'
    });

  </script>
  
</body>
</html>