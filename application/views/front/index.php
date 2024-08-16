<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php'); ?>

<section class="static-hero">
    <?php foreach($sliders as $slider){ ?>
    <div class="hero-inner">
        <div class="container">
            <div class="hero-content">
                <h2 class="title"><?=$slider['heading'] ?></h2>
                <p><?=$slider['description'] ?></p>
                <a href="<?=$slider['url'] ?>" class="theme-btn">all collection</a>
            </div>
            <div class="hero-img">
                <div class="image">
                    <img src="<?=base_url('assets/front/images/'.$slider['image']);?>" alt="">
                </div>
                <div class="shape-box-on"></div>
                <div class="shape-box-two"></div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="sider-img-on">
        <img src="<?=base_url('assets/front/images/slider/img-2.jpg');?>" alt="">
    </div>
    <div class="sider-img-two">
        <img src="<?=base_url('assets/front/images/slider/img-3.jpg');?>" alt="">
    </div>
</section>

<!-- start of wpo-collection-section -->
<section class="wpo-collection-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="wpo-section-title">
                    <h2>Bag's Collection</h2>
                    <p>Discover elegance in every stitch with our exquisite bag collection. Elevate your style with our versatile and timeless designs.</p>
                </div>
            </div>
        </div>

        <div class="collection-wrap">
            <div class="row">
                <?php 
                $count = 1;
                foreach($maincategories as $maincategory){ ?>
                <div class="col col-lg-4 col-md-12 col-12">
                    <div class="collection-item">
                        <?php if($count++%2 == 1) { ?>
                        <div class="images">
                            <a href="<?=base_url('category/'.$maincategory['link'])?>">
                                <img src="<?=base_url('assets/front/images/'.$maincategory['image']);?>" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <h2><a
                                    href="<?=base_url('category/'.$maincategory['link'])?>"><?=$maincategory['name']?></a>
                            </h2>
                            <a href="<?=base_url('category/'.$maincategory['link'])?>" class="theme-btn">See more</a>
                        </div>
                        <?php } else { ?>
                        <div class="content">
                            <h2><a
                                    href="<?=base_url('category/'.$maincategory['link'])?>"><?=$maincategory['name']?></a>
                            </h2>
                            <a href="<?=base_url('category/'.$maincategory['link'])?>" class="theme-btn">See more</a>
                        </div>
                        <div class="images">
                            <a href="<?=base_url('category/'.$maincategory['link'])?>">
                                <img src="<?=base_url('assets/front/images/'.$maincategory['image']);?>" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<!-- end of wpo-collection-section -->

<!-- start of wpo-new-arrival-section -->
<section class="wpo-new-arrival-section">
    <div class="left-shape"></div>
    <div class="right-shape">
        <svg viewBox="0 0 515 515" fill="none">
            <circle cx="257.5" cy="257.5" r="257" stroke="#EEDECB" />
            <path
                d="M515 257C515 223.185 508.34 190.2 495.399 158.959C482.458 127.718 463.491 99.3311 439.58 75.42C415.669 51.5089 387.282 32.5416 356.041 19.601C324.8 6.66043 291.815 -1.47812e-06 258 0V257H515Z"
                fill="#F4E8DA" />
        </svg>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="wpo-section-title">
                    <h2>new arrival</h2>
                    <!--<p>Neque convallis a cras semper auctor.-->
                    <!--    Adipiscing elit ut aliquam purus sit amet luctus.-->
                    <!--    Mauris vitae ultricies leo integer.</p>-->
                </div>
            </div>
        </div>
        <div class="new-arrival-wrap">
            <div class="row one-time">
                <?php foreach($products as $topproducts) { ?>
                <div class="col-lg-3">
                    <div class="prodact-item">
                        <div class="image">
                            <a href="<?=base_url('product/'.$topproducts['link']);?>">
                                <img src="<?=base_url('assets/front/images/'.$topproducts['featured_image']);?>" alt="">
                            </a>
                            <div class="icon">
                                <a href="<?=base_url('addtocart/'.$topproducts['link']);?>">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <h2><a href="<?=base_url('product/'.$topproducts['link']);?>"><?=$topproducts['name']?></a></h2>
                            <!--<?php if($topproducts['price'] > 0){ ?>-->
                            <!--<span><del>₹ <?=$topproducts['price']?></del> / ₹ <?=$topproducts['price']?></span>-->
                            <!--<?php } ?>-->
                        </div>
                        <div class="addtocart">
                            <a href="<?=base_url('addtocart/'.$topproducts['link']);?>" class="theme-btn">add to cart</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                

            </div>
        </div>
    </div>
</section>
<!-- end of wpo-new-arrival-section -->

<?php 
    $CI =& get_instance();
    $CI->load->model('Product_Model');
    $result= $CI->Product_Model->getdata('link', $dealoftheday)[0]; 
    if($result!=NULL){
?>

    <!-- start of wpo-deal-day-section -->
    <section class="wpo-deal-day-section">
        <div class="container">
            <div class="deal-day-wrap">
                <div class="left-images">
                    <img src="<?=base_url('assets/front/images/'.$result['featured_image']);?>" alt="">
                </div>
                <div class="right-content">
                    <div class="title">
                        <h2>deal of the day</h2>
                        <!-- <p>Neque convallis a cras semper auctor. Adipiscing elit ut aliquam purus sit amet luctus.
                        </p> -->
                    </div>
                    <div class="content">
                        <div class="text">
                            <h3><?=$result['name']?></h3>
                            <!--<span><del>₹<?=$result['price']?></del> / ₹<?=$result['saleprice']?></span>-->
                            <a href="<?=base_url('addtocart/'.$result['link']);?>" class="theme-btn">add to cart</a>
                        </div>
                        <div class="day">
                            <h1><?php date_default_timezone_set('Asia/Kolkata'); echo(24 - date('G'));?></h1>
                            <span>hours left</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of wpo-deal-day-section -->

<?php } ?>

<!-- start of wpo-testimonial-section -->
<section class="wpo-testimonial-section section-padding">
    <div class="container">
        <div class="testimonial-wrap">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-12 d-flex align-items-center">
                    <div class="wpo-section-title">
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
                <img src="<?=base_url('assets/front/images/'.$testimonialimage);?>" alt="">
            </div>
        </div>
    </div>
</section>
<!-- end of wpo-testimonial-section -->

<!-- start of wpo-blog-section -->
<section class="wpo-blog-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="wpo-section-title">
                    <h2>blog & article</h2>
                    <p><?=$blogline?></p>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <?php foreach($blogs as $blog){ ?>
            <div class="col col-lg-4 col-md-12 col-12">
                <div class="blog-card">
                    <div class="image">
                        <img src="<?=base_url('assets/front/images/'.$blog['image']);?>" alt="">
                        <span><?=date('d M, Y',strtotime($blog['date_added']))?></span>
                    </div>
                    <div class="content">
                        <h2>
                            <a href="<?=base_url('blog/'.$blog['link'])?>"><?=$blog['post_title']?></a>
                        </h2>
                        <p><?php $this->load->helper('text'); echo word_limiter(strip_tags($blog['post']), 8); ?></p>
                        <a href="<?=base_url('blog/'.$blog['link'])?>" class="theme-btn">read more</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>