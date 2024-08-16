<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php'); ?>

        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>404</h2>
                            <ol>
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li>Error-404</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end container -->
            <div class="left-img">
                <img src="<?=base_url('assets/front/images/pagetitle.png');?>" alt="">
            </div>
            <div class="right-img">
                <div class="shape-1">
                    <img src="<?=base_url('assets/front/images/shape-1.png');?>" alt="">
                </div>
                <div class="image">
                    <img src="<?=base_url('assets/front/images/pagetitle-1.jpg');?>" alt="">
                </div>
                <div class="shape-2">
                    <img src="<?=base_url('assets/front/images/shape-2.png');?>" alt="">
                </div>
            </div>
        </section>
        <!-- end page-title -->

        <!-- start error-404-section -->
        <section class="error-404-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="content clearfix">
                            <div class="error">
                                <img src="<?=base_url('assets/front/images/error-404.png');?>" alt>
                            </div>
                            <div class="error-message">
                                <h3>Oops! Page Not Found!</h3>
                                <p>We’re sorry but we can’t seem to find the page you requested. This might be because
                                    you have typed the web address incorrectly.</p>
                                <a href="<?=base_url()?>" class="theme-btn">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end error-404-section -->

<?php include('footer.php'); ?>