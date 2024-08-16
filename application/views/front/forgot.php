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
                    <h2>Forgot</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>Forgot</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="wpo-accountWrapper" action="verify-code.php">
                    <div class="wpo-accountInfo">
                        <div class="wpo-accountInfoHeader">                            
                            <a class="wpo-accountBtn" href="register.php">
                                Create Account
                            </a>
                        </div>
                        <div class="image">
                            <img src="<?=base_url('assets/front/images/login.png');?>" alt="">
                        </div>
                       
                    </div>
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Reset Password</h2>
                            <!-- <p>Sign Please enter the one time password to verify your account</p>
                            <p>A code has been sent to *******sh@gmail.com</p> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>Email</label>
                                <input type="text" id="email" name="email" placeholder="Your email here..">
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" class="wpo-accountBtn">Send OTP</button>
                            </div>
                        </div>
                        <h4 class="or"><span>OR</span></h4>
                        <!-- <ul class="wpo-socialLoginBtn">
                            <li><button class="facebook" tabindex="0" type="button"><span><i
                                            class="ti-facebook"></i></span></button></li>
                            <li><button class="twitter" tabindex="0" type="button"><span><i
                                            class="ti-twitter"></i></span></button></li>
                            <li><button class="linkedin" tabindex="0" type="button"><span><i
                                            class="ti-linkedin"></i></span></button></li>
                        </ul> -->
                        <p class="subText">Don't have an account? <a href="register.php">Create free account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php');?>