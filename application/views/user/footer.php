
<footer>
    <div class="container">
      <div class="footermn">

        <div class="row">

          <div class="col-lg-4 col-md-6 col-12">
            <div class="footerbox">
              <div class="footerinr">

                <ul class="list-unstyled ">
                  <li class="imgsc"><a href="<?=base_url();?>" class="imga"><img src="<?=base_url('assets/front/imageslogo.png');?>"
                        alt="logo"></a></li>
                  <li>
                    <ul class="list-unstyled">
                      <li><i class="fa-solid fa-phone"></i>&nbsp; <a href="tel:9828950550">+91-9828950550</a>
                      </li>
    
                      <li><i class="fa-solid fa-envelope"></i></i>&nbsp; <a href="mailto:pranshicreationsjewels@gmail.com">
                          pranshicreationsjewels@gmail.com</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
          </div>


          <div class="col-lg-2 col-md-6 col-12">
            <div class="footerbox">
              <div class="footerinr">
                <ul class="list-unstyled">
                  <li>Quick Links</li>
                  <li><a href="<?=base_url('shop');?>">SHOP</a></li>
                  <li><a href="<?=base_url('popular');?>">POPULAR</a></li>
                  <li><a href="<?=base_url('about');?>">ABOUT US</a></li>
                  <li><a href="<?=base_url('contact');?>">CONTACT US</a></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 col-12 ">
            <div class="footerbox">
              <div class="footerinr">
                <ul class="list-unstyled">
                  <li>USEFUL LINKS</li>
                  <?php foreach($getcategories as $category){ ?>
                  <li><a href="<?=base_url('category/'.$category['name'])?>"><?=$category['name']?></a></li>
                 <?php } ?>
                </ul>
              </div>
            </div>
          </div>
              
          <div class="col-lg-3 col-md-6 col-12 ">
            <div class="footerbox">
              <div class="footerinr">
                <ul class="list-unstyled">
                  <li>INFORMATION</li>
                  <li><a href="<?=base_url('privacy');?>">Privacy Policy</a></li> 
                  <li><a href="<?=base_url('terms');?>">Terms & Conditions</a></li>
                  <li><a href="<?=base_url('refund');?>">Refund Policy</a></li>
                  <li><a href="<?=base_url('shipping');?>">Shipping Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          

        </div>

        <div class="gdi">
          <a href="https://gdigitalindia.com/" target="_blank"><img src="<?=base_url('assets/front/imagesgdilogo.png');?>" alt=""></a>
        </div>

      </div>
    </div>
  </footer>



  <!--  -->
  <div class="quickcontact">
    <a href="https://wa.me/9828950550" target="_blank"><img src="<?=base_url('assets/front/imageswhatsapp.gif');?>"></a>
    <a href="tel:9828950550" target="_blank"><img src="<?=base_url('assets/front/imagescall.gif');?>"></a>
  </div>


  <!-- sosyilicon -->
  <div class="quickcontacta">
    <ul class="icon list-unstyled ">
      <li>
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
      </li>

      <li>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </li>

      <li>
        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
      </li>
    </ul>
  </div>



  <!-- search ka popup -->


<div id="search-menu">
  <div class="wrapper">
    <form id="form" class="text-center" action="#" method="">
      <input id="popup-search" type="text" name="u" placeholder="Search for a user"/>
      <button id="popup-search-button" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </div>
</div>


  <!-- model -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Enquire Now</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="thanks.php" method="post" class="row g-3 needs-validation" novalidate>

            <div class="col-md-12">
              <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Enter Name"
                required>
            </div>

            <div class="col-md-12">
              <input type="tel" name="mobile" class="form-control" min="1000000000" max="9999999999999" pattern="[0-9]"
                placeholder="Enter phone" required="">
            </div>

            <div class="col-md-12">
              <input name="email" type="email" class="form-control" id="validationCustom02" placeholder="Enter Email"
                required>
            </div>

            <div class="mb-3">
              <textarea name="message" type="message" class="form-control" id="exampleFormControlTextarea1"
                placeholder="Enter Message " rows="3"></textarea>
            </div>

            <div class="col-12">
              <button name="submit" class="btn btn1" type="submit">Submit</button>
            </div>
          </form>


        </div>

      </div>
    </div>
  </div>



  <!--  script  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js" type="text/javascript"></script>

  <script src="<?=base_url('assets/front/js/jquery-3.6.1.min.js');?>" type="text/javascript"></script>
  <!-- <script src="<?=base_url('assets/front/js/bootstrap.min.js');?>" type="text/javascript"></script> -->
  <script src="<?=base_url('assets/front/js/magiczoomplus.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('assets/front/js/bootstrap.bundle.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('assets/front/js/owl.carousel.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('assets/front/js/wow.min.js');?>" type="text/javascript"></script>
  <script src="<?=base_url('assets/front/js/custom.js');?>" type="text/javascript"></script>



</body>

</html>