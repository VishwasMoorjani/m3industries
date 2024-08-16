<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php'); ?>


<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="login wpo-accountWrapper" action="#">
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Signup</h2>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Your name here..">
                            </div>
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <label>Email</label>
                                <input type="text" id="email" name="email" placeholder="Your email here..">
                            </div>
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <div class="input-group">
                                    <input type="password" name="confirm-pass" id="newpass" class="form-control"
                                        placeholder="Enter Confirm Password">
                                    <button type="button" class="input-group-text"
                                        onclick="togglePasswordVisibility('newpass')">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <div class="input-group">
                                    <input type="password" name="confirm-pass" id="confirmpass" class="form-control"
                                        placeholder="Enter Confirm Password">
                                    <button type="button" class="input-group-text"
                                        onclick="togglePasswordVisibility('confirmpass')">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <button type="submit" class="wpo-accountBtn">Sign Up</button>
                            </div>
                        </div>

                        <!-- <h4 class="or"><span>OR</span></h4>
                         <ul class="wpo-socialLoginBtn">
                            <li><button class="facebook" tabindex="0" type="button"><span><i
                                            class="ti-facebook"></i></span></button></li>
                            <li><button class="twitter" tabindex="0" type="button"><span><i
                                            class="ti-twitter"></i></span></button></li>
                            <li><button class="linkedin" tabindex="0" type="button"><span><i
                                            class="ti-linkedin"></i></span></button></li>
                        </ul> -->
                        <p class="subText">Don't have an account? <a href="login.php">Create free account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>