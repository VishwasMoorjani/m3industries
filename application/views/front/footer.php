 <!-- start of wpo-site-footer-section -->
 <footer class="wpo-site-footer noPrint">
     <div class="wpo-upper-footer">
         <div class="container">
             <div class="row">
                 <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                     <div class="widget about-widget">
                         <div class="logo widget-title">
                             <img src="<?=base_url('assets/front/images/logo.png');?>" alt="">
                         </div>
                         <p><?=$footercontent?></p>
                         <ul class="social">
                             <li><a target="_blank" href="<?=$facebook?>"><i
                                         class="flaticon-facebook-app-symbol"></i></a></li>
                             <li><a target="_blank" href="<?=$twitter?>"><i class="flaticon-twitter"></i></a></li>
                             <li><a target="_blank" href="<?=$linkedin?>"><i class="flaticon-linkedin"></i></a></li>
                             <li><a target="_blank" href="<?=$instagram?>"><i class="flaticon-instagram"></i></a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                     <div class="widget link-widget">
                         <div class="widget-title">
                             <h3>Quick Links:</h3>
                         </div>
                         <ul>
                             <li><a href="<?=base_url()?>">Home</a></li>
                             <li><a href="<?=base_url('about')?>">About</a></li>
                             <li><a href="<?=base_url('blog')?>">Blog</a></li>
                             <li><a href="<?=base_url('contact')?>">Contact us</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                     <div class="widget link-widget">
                         <div class="widget-title">
                             <h3>PRODUCTS:</h3>
                         </div>
                         <ul>
                             <?php foreach($maincategories as $headcategories){ ?>
                             <li><a
                                     href="<?=base_url('category/'.$headcategories['link'])?>"><?=$headcategories['name']?></a>
                             </li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>

                 <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                     <div class="widget social-widget text-white">
                         <div class="widget-title">
                             <h3>GET IN TOUCH:</h3>
                         </div>
                         <p><i class="fi flaticon-phone-call"></i>&nbsp;<?=$mobile?></p>
                         <?php if($mobile2 != ''){ ?>
                         <p> <i class="fi flaticon-phone-call"></i>&nbsp;<?=$mobile2?></p>
                         <?php } ?>
                         <p><i class="fi flaticon-email"></i>&nbsp;<?=$email?></p>
                         <p><i class="fi flaticon-pin-1"></i>&nbsp;<?=$address?></p>
                         <!-- <form class="subscribe">
                             <input class="sub" type="email" placeholder="Email here">
                             <button type="submit">
                                 <i class="flaticon-telegram"></i>
                             </button>
                         </form> -->
                     </div>
                 </div>
             </div>
         </div> <!-- end container -->
     </div>
     <div class="wpo-lower-footer">
         <div class="container">
             <div class="row">
                 <div class="col col-xs-12">
                     <div class="footerbottom">
                         <p class="copyright"> Copyright &copy; 2024 <a href="<?=base_url()?>">Silver Tradition </a> by
                             All
                             Rights Reserved.</p>
                         <a href="<?=base_url()?>"><img src="<?=base_url('assets/front/images/gdilogo.png');?>"
                                 alt=""></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- <div class="shape">
         <svg viewBox="0 0 260 394" fill="none">
             <rect opacity="0.5" x="0.5" y="0.5" width="191" height="393" rx="95.5" stroke="white"
                 stroke-opacity="0.2" />
             <rect width="260" height="140" fill="#5C623D" />
         </svg>
     </div> -->
 </footer>

 <div class="modal fade theme-modal" id="enquirynow" tabindex="-1" aria-labelledby="exampleModalLabel3"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel3">Enquiry</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="mb-3">
                         <input type="text" autocomplete="Name" placeholder="Name" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="email" autocomplete="E-mail" placeholder="E-mail" name="email"
                             class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="text" autocomplete="Mobile" class="form-control" placeholder="Phone Number"
                             name="phone">
                     </div>
                     <div class="mb-3">
                         <button type="submit" class="btn theme-btn">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>



 <!-- <div class="modal fade theme-modal" id="editname" tabindex="-1" aria-labelledby="exampleModalLabel3"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel3">Change Info</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="mb-3">
                         <input type="text" autocomplete="Name" placeholder="Name" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="email" autocomplete="E-mail" placeholder="E-mail" name="email"
                             class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="text" autocomplete="Mobile" class="form-control" placeholder="Phone Number"
                             name="phone">
                     </div>
                     <div class="mb-3">
                         <button type="submit" class="btn theme-btn">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="change-password" tabindex="-1" aria-labelledby="exampleModalLabelpass"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabelpass">Change Password</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">
                         <div class="mb-3 col-md-12">
                             <div class="input-group">
                                 <input type="password" name="old-pass" id="oldpass" class="form-control"
                                     placeholder="Enter Old Password">
                                 <button type="button" class="input-group-text"
                                     onclick="togglePasswordVisibility('oldpass')">
                                     <i class="fa fa-eye" aria-hidden="true"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="mb-3 col-md-12">
                             <div class="input-group">
                                 <input type="password" name="new-pass" id="newpass" class="form-control"
                                     placeholder="Enter New Password">
                                 <button type="button" class="input-group-text"
                                     onclick="togglePasswordVisibility('newpass')">
                                     <i class="fa fa-eye" aria-hidden="true"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="mb-3 col-md-12">
                             <div class="input-group">
                                 <input type="password" name="confirm-pass" id="confirmpass" class="form-control"
                                     placeholder="Enter Confirm Password">
                                 <button type="button" class="input-group-text"
                                     onclick="togglePasswordVisibility('confirmpass')">
                                     <i class="fa fa-eye" aria-hidden="true"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="mb-3">
                             <button type="submit" class="btn theme-btn">Save</button>
                         </div>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="addnewAddress" tabindex="-1" aria-labelledby="exampleModalLabel4"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel4">Change Address</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">

                         <div class="mb-3 col-md-6">
                             <input type="text" name="houseno" class="form-control" placeholder="Plot/House No.">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="street" class="form-control" placeholder="Street">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="city" class="form-control" placeholder="City">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="state" class="form-control" placeholder="State">
                         </div>
                         <div class="mb-3 col-md-6">
                             <?php include('country.php'); ?>
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="pincode" class="form-control" placeholder="Pin Code">
                         </div>
                         <div class="mb-3 col-md-12 shipp-radio">
                             <span><input type="radio" id="shipping-addnew" name="addresschange"
                                     value="Shipping Address:">
                                 <label for="shipping-addnew">Shipping Address:</label></span>
                             <span><input type="radio" id="billing-addnew" name="addresschange"
                                     value="Billing Address:">
                                 <label for="billing-addnew">Billing Address:</label></span>
                         </div>
                         <div class="mb-3">
                             <button type="submit" class="btn theme-btn">Save</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="editadress" tabindex="-1" aria-labelledby="exampleModalLabel4"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel4">Change Address</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">

                         <div class="mb-3 col-md-6">
                             <input type="text" name="houseno" class="form-control" placeholder="Plot/House No.">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="street" class="form-control" placeholder="Street">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="city" class="form-control" placeholder="City">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="state" class="form-control" placeholder="State">
                         </div>
                         <div class="mb-3 col-md-6">
                             <?php include('country.php'); ?>
                         </div>

                         <div class="mb-3 col-md-6">
                             <input type="text" name="pincode" class="form-control" placeholder="Pin Code">
                         </div>
                         <div class="mb-3 col-md-12 shipp-radio">
                             <span><input type="radio" id="shipping-add" name="addresschange" value="Shipping Address:">
                                 <label for="shipping-add">Shipping Address:</label></span>
                             <span><input type="radio" id="billing-add" name="addresschange" value="Billing Address:">
                                 <label for="billing-add">Billing Address:</label></span>
                         </div>

                         <div class="mb-3">
                             <button type="submit" class="btn theme-btn">Save</button>
                         </div>

                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="addnewcontact" tabindex="-1" aria-labelledby="addAddressEdit"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addAddressEdit">Add Address</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">
                         <div class="mb-3">
                             <input type="text" autocomplete="Name" placeholder="Name" name="name" class="form-control"
                                 id="name">
                         </div>
                         <div class="mb-3">
                             <input type="email" autocomplete="E-mail" placeholder="E-mail" name="email"
                                 class="form-control">
                         </div>
                         <div class="mb-3">
                             <input type="text" id="editmobilen" class="form-control" placeholder="Phone Number"
                                 autocomplete="on" name="phone">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="houseno" class="form-control" placeholder="Plot/House No.">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="street" class="form-control" placeholder="Street">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="city" class="form-control" placeholder="City">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="state" class="form-control" placeholder="State">
                         </div>
                         <div class="mb-3 col-md-6">
                             <?php include('country.php'); ?>
                         </div>

                         <div class="mb-3 col-md-6">
                             <input type="text" name="pincode" class="form-control" placeholder="Pin Code">
                         </div>

                         <div class="mb-3 col-md-12 shipp-radio">
                             <span><input type="radio" id="shipping1" name="addresschange" value="Shipping Address:">
                                 <label for="shipping1">Shipping Address:</label></span>
                             <span><input type="radio" id="billingaddnew" name="addresschange" value="Billing Address:">
                                 <label for="billingaddnew">Billing Address:</label></span>
                         </div>
                         <div class="mb-3">
                             <button type="submit" class="btn btn-sm theme-bg-color text-white">Save</button>
                         </div>

                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="editAddress" tabindex="-1" aria-labelledby="addAddressEdit" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addAddressEdit">Change Address</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">
                         <div class="mb-3">
                             <input type="text" autocomplete="Name" placeholder="Name" name="name" class="form-control"
                                 id="name">
                         </div>
                         <div class="mb-3">
                             <input type="email" autocomplete="E-mail" placeholder="E-mail" name="email"
                                 class="form-control">
                         </div>
                         <div class="mb-3">
                             <input type="text" id="editmobile_code" class="form-control" placeholder="Phone Number"
                                 autocomplete="on" name="phone">
                         </div>
                         <div class="mb-3 col-md-4">
                             <input type="text" name="houseno" class="form-control" placeholder="Plot/House No.">
                         </div>
                         <div class="mb-3 col-md-4">
                             <input type="text" name="street" class="form-control" placeholder="Street">
                         </div>
                         <div class="mb-3 col-md-4">
                             <input type="text" name="city" class="form-control" placeholder="City">
                         </div>
                         <div class="mb-3 col-md-4">
                             <input type="text" name="state" class="form-control" placeholder="State">
                         </div>
                         <div class="mb-3 col-md-4">
                             <?php include('country.php'); ?>
                         </div>

                         <div class="mb-3 col-md-4">
                             <input type="text" name="pincode" class="form-control" placeholder="Pin Code">
                         </div>

                         <div class="mb-3 col-md-12 shipp-radio">
                             <span><input type="radio" id="shippingedit" name="addresschange" value="Shipping Address:">
                                 <label for="shippingedit">Shipping Address:</label></span>
                             <span><input type="radio" id="billing1" name="addresschange" value="Billing Address:">
                                 <label for="billing1">Billing Address:</label></span>
                         </div>

                         <div class="mb-3">
                             <button type="submit" class="btn btn-sm theme-bg-color text-white">Save</button>
                         </div>

                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel4"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel4">Edit Profile Details</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">
                         <div class="mb-3 col-md-6">
                             <input type="text" placeholder="Enter Your Name" name="mail" class="form-control">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" autocomplete="Mobile" id="mobile_code" class="form-control"
                                 placeholder="Enter Mobile No." name="phone">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="houseno" class="form-control" placeholder="Plot/House No.">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="street" class="form-control" placeholder="Street">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="city" class="form-control" placeholder="City">
                         </div>
                         <div class="mb-3 col-md-6">
                             <input type="text" name="state" class="form-control" placeholder="State">
                         </div>
                         <div class="mb-3 col-md-6">
                             <?php include('country.php'); ?>
                         </div>

                         <div class="mb-3 col-md-6">
                             <input type="text" name="pincode" class="form-control" placeholder="Pin Code">
                         </div>
                         <div class="mb-3">
                             <button type="submit" class="btn btn-sm theme-bg-color text-white">Save</button>
                         </div>

                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade theme-modal" id="editlogin" tabindex="-1" aria-labelledby="exampleModalLabel3"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel3">Change Info</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="mb-3">
                         <input type="text" placeholder="Change E-mail ID" name="mail" class="form-control" id="mail">
                     </div>
                     <div class="mb-3">
                         <button type="submit" class="btn btn-sm theme-btn">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div> -->

 </div>
 
 <div class="quickcontact">
      <a href="https://wa.me/<?=$whatsapp?>" target="_blank"><img src="<?=base_url('assets/front/images/whatsapp.gif');?>"></a>
      <a href="tel:<?=$mobile?>"><img src="<?=base_url('assets/front/images/call.gif');?>"></a>
  </div>


 <!-- All JavaScript files
    ================================================== -->
 <script src="<?=base_url('assets/front/js/jquery.min.js');?>"></script>
 <script src="<?=base_url('assets/front/js/bootstrap.bundle.min.js');?>"></script>
 <!-- Plugins for this template -->
 <script src="<?=base_url('assets/front/js/modernizr.custom.js');?>"></script>
 <script src="<?=base_url('assets/front/js/jquery.dlmenu.js');?>"></script>
 <script src="<?=base_url('assets/front/js/jquery-plugin-collection.js');?>"></script>
 <!-- Custom script for this template -->
 <script src="<?=base_url('assets/front/js/script.js');?>"></script>

 <script>
function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    const toggleButton = input.nextElementSibling;
    if (input.type === "password") {
        input.type = "text";
        toggleButton.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
    } else {
        input.type = "password";
        toggleButton.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
    }
};
 </script>

 <!-- Country Code Selection -->
 <script src="<?=base_url('assets/front/js/intlTelInput-jquery.min.js');?>"></script>
 <script>
$("#mobile_code").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
});
 </script>
 <script>
$("#editmobile_code").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
});
 </script>
 <script>
$("#Addmobile_code").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
});
 </script>

 </body>

 </html>