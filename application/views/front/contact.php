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
                    <h2>contact us</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>contact us</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div>

</section>



<!-- start wpo-contact-pg-section -->
<section class="wpo-contact-pg-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12">
                <div class="wpo-contact-title">
                    <h2>Have Any Question?</h2>
                    <p>Have questions or need assistance? Reach out to us, and our team will be happy to assist you.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="wpo-contact-form-area">
                    <form method="post" action="<?=base_url('home/save')?>" class="contact-validation-active"
                        id="contact-form-main">
                        <div>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name*"
                                required>
                        </div>
                        <div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email*"
                                required>
                        </div>
                        <div>
                            <input type="text" class="form-control" pattern="[7896][0-9]{9}" name="phone" id="phone" placeholder="Your Phone*"
                                required>
                        </div>
                        <div class="fullwidth">
                            <textarea class="form-control" name="message" id="note" placeholder="Message..."
                                required></textarea>
                        </div>
                        <div class="submit-area">
                            <button type="submit" class="theme-btn">send message</button>
                            <div id="loader">
                                <i class="ti-reload"></i>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


            <div class="col-lg-5 col-md-8 col-12">
                <div class="office-info">
                    <div class="office-info-item">
                        <div class="office-info-icon">
                            <div class="icon">
                                <i class="fi flaticon-phone-call"></i>
                            </div>
                        </div>
                        <div class="office-info-text">
                            <h2>Call Us:</h2>
                            <p>
                                <a href="tel:<?=$mobile?>"> <?=$mobile?></a><br>
                                <a href="tel:<?=$mobile2?>"> <?=$mobile2?></a>
                            </p>
                        </div>
                    </div>

                    <div class="office-info-item">
                        <div class="office-info-icon">
                            <div class="icon">
                                <i class="fi flaticon-email"></i>
                            </div>
                        </div>
                        <div class="office-info-text">
                            <h2>Mail Id:</h2>
                            <p><a href="mailto:<?=$email?>"> <?=$email?></a></p>
                        </div>
                    </div>

                    <div class="office-info-item">
                        <div class="office-info-icon">
                            <div class="icon">
                                <i class="fi flaticon-pin-1"></i>
                            </div>
                        </div>
                        <div class="office-info-text">
                            <h2>Visit Us:</h2>
                            <p><?=$address?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div> <!-- end container -->
</section>



<section class="wpo-contact-map-section section-padding">
    <div class="container">
        <h2 class="hidden">Contact map</h2>
        <div class="wpo-contact-map">
            <iframe src="<?=$gmb?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php include('footer.php');?>