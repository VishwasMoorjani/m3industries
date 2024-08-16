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
                    <h2>about us</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>about</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div>

</section>
<!-- end page-title -->

<!-- start of wpo-about-section-->
<section class="wpo-about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-left-wrap">
                    <div class="image-1">
                        <img src="<?=base_url('assets/front/images/'.$about['image']);?>" alt="">
                    </div>
                    <div class="image-2">
                        <img src="<?=base_url('assets/front/images/'.$about['image2']);?>" alt="">
                    </div>
                    <div class="icon">
                        <img src="<?=base_url('assets/front/images/about-icon.png');?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-right-wrap">
                    <h2 class="title">about us</h2>
                    <p><?=$about['content']?></p>
                    <div class="about-btn">
                        <a href="<?=base_url('contact');?>" class="theme-btn">contact us</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of wpo-about-section-->

<!-- start of wpo-team-section-->
<!-- <section class="wpo-team-section section-padding">
    <div class="left-shape-top"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="wpo-section-title">
                    <h2>team members</h2>
                    <p>Neque convallis a cras semper auctor.
                        Adipiscing elit ut aliquam purus sit amet luctus.
                        Mauris vitae ultricies leo integer.</p>
                </div>
            </div>
        </div>
        <div class="team-wrap">
            <div class="row g-0">
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="team-card">
                        <div class="image">
                            <img src="<?=base_url('assets/front/images/team/1.jpg');?>" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="team-single.html">Frederick Norris</a></h2>
                            <span>Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="team-card">
                        <div class="image">
                            <img src="<?=base_url('assets/front/images/team/2.jpg');?>" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="team-single.html">Theodore Herrera</a></h2>
                            <span>Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="team-card">
                        <div class="image">
                            <img src="<?=base_url('assets/front/images/team/3.jpg');?>" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="team-single.html">Leon Horton</a></h2>
                            <span>Designation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="left-shape"></div>
    <div class="right-shape">
        <svg viewBox="0 0 515 515" fill="none">
            <circle cx="257.5" cy="257.5" r="257" stroke="#EEDECB" />
            <path
                d="M515 257C515 223.185 508.34 190.2 495.399 158.959C482.458 127.718 463.491 99.3311 439.58 75.42C415.669 51.5089 387.282 32.5416 356.041 19.601C324.8 6.66043 291.815 -1.47812e-06 258 0V257H515Z"
                fill="#F4E8DA" />
        </svg>
    </div>
</section> -->
<!-- end of wpo-team-section-->

<!-- start of wpo-testimonial-section -->
<section class="wpo-testimonial-section-s2 section-padding">
    <div class="container">
        <div class="testimonial-wrap">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-12 d-flex align-items-center">
                    <div class="wpo-section-title ">
                        <h2>trusted from clients </h2>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="testimonial-slider">
                        <?php foreach($reviews as $review){ ?>
                        <div class="item">
                            <div class="quote-btn">
                                <i class="flaticon-double-quotes"></i>
                                <span></span>
                            </div>
                            <p>“<?=strip_tags($review['message'])?>”</p>
                            <h2><?=$review['name']?></h2>
                            <span>happy customer</span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="<?=base_url('assets/front/images/trastimonial.jpg');?>" alt="">
            </div>
        </div>
    </div>
</section>

<?php include('footer.php');?>