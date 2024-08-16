<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php'); ?>


<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Verify Code</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>Verify Code</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="otp-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-contain">
                    <img src="<?=base_url('assets/front/images/login.png');?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="sendotp">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3 class="text-title">Please enter the one time password to verify your account</h3>
                            <h5 class="text-content">A code has been sent to <span>*******sh@gmail.com</span></h5>
                        </div>
                        <div id="otp" class="inputs d-flex flex-row justify-content-center">
                            <input class="text-center form-control rounded" type="text" id="first" maxlength="1" placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="second" maxlength="1" placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="third" maxlength="1" placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="fourth" maxlength="1" placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="fifth" maxlength="1" placeholder="0">
                            <input class="text-center form-control rounded" type="text" id="sixth" maxlength="1" placeholder="0">
                        </div>
                        <div class="send-box pt-4">
                            <h5>Didn't get the code? <a href="javascript:void(0)" class="theme-color fw-bold">Resend It</a></h5>
                        </div>
                        <button onclick="location.href='change-password.php';" class="theme-btn">Verify</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('footer.php');?>