<!--==========================
    Footer
  ============================-->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>SKORS</h3>
            <p>Skor adalah aplikasi manajemen Human Resources (HR) yang dirancang untuk membantu perusahaan dalam mengelola kinerja karyawan secara lebih efektif dan efisien. Aplikasi ini dirancang dengan tujuan memberikan solusi praktis untuk mengukur, memantau, dan meningkatkan produktivitas serta performa individu atau tim dalam suatu organisasi.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <?php
              $menu_items = wp_get_nav_menu_items('Menu Atas');
              if($menu_items) {
                foreach($menu_items as $item) {
                  echo '<li><i class="ion-ios-arrow-right"></i> <a href="' . $item->url . '">' . $item->title . '</a></li>';
                }
              }
              ?>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Bangka Raya No 42 A Pela Mampang<br>
              Jakarta Selatan<br>
              <strong>Nomer Handphone:</strong> 082291158733<br>
              <strong>Email:</strong> fafan@skor.biz.id<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/ArthanesiaSolusi/?_rdc=2&_rdr#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/arthanesiasolusikita?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="mailto:fafan@skor.biz.id" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="https://www.linkedin.com/company/arthanesia-solusi-kita/" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Artikel Harian Kami</h4>
            <p>Berlangganan Artikel Harian Kami</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>SKORS</strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- #footer -->

  <a href="https://wa.me/1234567890" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
  </a>

<?php wp_footer(); ?>

</body>
</html>
