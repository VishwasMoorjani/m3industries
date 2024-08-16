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
                    <h2><?=$product->name?></h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><?=$product->name?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="wpo-shop-single-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-12">
                <div class="shop-single-slider">
                    <div class="slider-for">
                        <div><img src="<?=base_url('assets/front/images/'.$product->featured_image);?>" alt></div>
                        <?php foreach(json_decode($product->images) as $image){ ?>
                        <div><img src="<?=base_url('assets/front/images/'.$image);?>" alt></div>
                        <?php } ?>
                    </div>
                    <div class="slider-nav">
                        <div><img src="<?=base_url('assets/front/images/'.$product->featured_image);?>" alt></div>
                        <?php foreach(json_decode($product->images) as $image){ ?>
                            <div><img src="<?=base_url('assets/front/images/'.$image);?>" alt></div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-12">
                <div class="product-details">
                    <h2><?=$product->name?></h2>

                    

                    <!--<div class="price">-->
                    <!--    <span class="current"><del style="color:#000; font-size:smaller">₹<?=$product->price?> </del> &nbsp; ₹<?=$product->saleprice?> </span>-->
                    <!--</div>-->
                    <p><?=$product->shortdescription?></p>
                    <!-- <div class="tg-btm">
                        <p><span>Category:</span>Ear Ring</p>
                        <p><span>Tags:</span>Ring, Jewellery, Gold</p>
                    </div> -->
                    <div class="product-option">
                        <form class="form" >
                            <div class="product-row">
                                <!-- <div>
                                    <input id="product-count" type="text" value="1" name="product-count">
                                </div> -->
                                <div>
                                    <a href="<?=base_url('addtocart/'.$product->link);?>" class="theme-btn">Add to cart</a>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#productenquiry" class="theme-btn">Enquiry Now</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end option -->
                </div> <!-- end product details -->
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col col-xs-12">
                <div class="product-info">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="false">product details</a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab"
                                aria-controls="Description" aria-selected="true">Details & specs</a>
                        </li> -->
                        <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Review-tab" data-bs-toggle="tab" href="#Review" role="tab"
                                aria-controls="Review" aria-selected="false">Customer Reviews</a>
                        </li> -->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="details">
                            <p><?=$product->description?></p>
                        </div>
                        <!-- <div role="tabpanel" class="tab-pane" id="Description">
                            <p>Sed risus pretium quam vulputate dignissim suspendisse in est. Aliquet nibh praesent
                                tristique magna.
                                Tempus iaculis urna id volutpat. Ornare arcu odio ut sem nulla pharetra diam.
                                Suspendisse in est ante in nibh.
                                Purus non enim praesent elementum facilisis leo vel fringilla est. Auctor eu augue ut
                                lectus arcu bibendum at.
                                Integer eget aliquet nibh praesent tristique. Amet volutpat consequat mauris nunc
                                congue.
                                A scelerisque purus semper eget duis. At tellus at urna condimentum mattis pellentesque
                                id.</p>
                            <p>Sed risus pretium quam vulputate dignissim suspendisse in est. Aliquet nibh praesent
                                tristique magna.
                                Tempus iaculis urna id volutpat. Ornare arcu odio ut sem nulla pharetra diam.
                                Suspendisse in est ante in nibh.
                                Purus non enim praesent elementum facilisis leo vel fringilla est. Auctor eu augue ut
                                lectus arcu bibendum at.</p>
                            <p>Neque convallis a cras semper auctor.
                                Adipiscing elit ut aliquam purus sit amet luctus. Mauris vitae ultricies leo integer.
                                Odio facilisis mauris sit amet massa.</p>
                        </div> -->

                        <!-- <div role="tabpanel" class="tab-pane" id="Review">
                            <div class="row">
                                <div class="col col-lg-10 col-12">
                                    <div class="client-rv">
                                        <div class="client-pic">
                                            <img src="<?=base_url('assets/front/images/shop/shop-single/review/img-1.jpg');?>" alt>
                                        </div>
                                        <div class="details">
                                            <div class="name-rating-time">
                                                <div class="name-rating">
                                                    <div>
                                                        <h4>Jenefar Willium</h4>
                                                    </div>
                                                    <div class="product-rt">
                                                        <span>25 Sep 2023</span>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>There are many variations of passages of Lorem Ipsum
                                                    available, but the majority have suffered alteration in some
                                                    form, by injected humour, or randomised words which don't
                                                    look.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="client-rv">
                                        <div class="client-pic">
                                            <img src="<?=base_url('assets/front/images/shop/shop-single/review/img-2.jpg');?>" alt>
                                        </div>
                                        <div class="details">
                                            <div class="name-rating-time">
                                                <div class="name-rating">
                                                    <div>
                                                        <h4>Maria Bannet</h4>
                                                    </div>
                                                    <div class="product-rt">
                                                        <span>28 Sep 2023</span>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>There are many variations of passages of Lorem Ipsum
                                                    available, but the majority have suffered alteration in some
                                                    form, by injected humour, or randomised words which don't
                                                    look.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col col-lg-12 col-12 review-form-wrapper">
                                    <div class="review-form">
                                        <h4>Add a review</h4>
                                        <p>Your email address will not be published. Required fields are marked
                                            *</p>
                                        <form>
                                            <div class="give-rat-sec">
                                                <p>Your rating *</p>
                                                <div class="give-rating">
                                                    <label>
                                                        <input type="radio" name="stars" value="1" />
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="2" />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="3" />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="4" />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="5" />
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                        <span class="icon">★</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" class="form-control" placeholder="Name *" required>
                                            </div>
                                            <div>
                                                <input type="email" class="form-control" placeholder="Email *" required>
                                            </div>
                                            <div>
                                                <textarea class="form-control" placeholder="Review *"></textarea>
                                            </div>
                                            <div class="rating-wrapper">
                                                <div class="submit">
                                                    <button type="submit" class="theme-btn">Post
                                                        review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end of container -->
</section>
<!-- end of wpo-shop-single-section -->

<!-- start of wpo-new-arrival-section -->
<section class="wpo-new-arrival-section-s2 section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="wpo-section-title">
                    <h2>related products</h2>
                    <!-- <p>Neque convallis a cras semper auctor.
                        Adipiscing elit ut aliquam purus sit amet luctus.
                        Mauris vitae ultricies leo integer.</p> -->
                </div>
            </div>
        </div>
        <div class="new-arrival-wrap">
            <div class="row one-time">
                <?php foreach($related_product as $rproduct){ ?>
                <div class="col-lg-3">
                    <div class="prodact-item">
                        <div class="image">
                            <a href="<?=base_url('product/'.$rproduct['link']);?>">
                                <img src="<?=base_url('assets/front/images/'.$rproduct['featured_image']);?>" alt="">
                            </a>
                            <div class="icon">
                                <a href="<?=base_url('addtocart/'.$rproduct['link']);?>">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <h2><a href="<?=base_url('product/'.$rproduct['link']);?>"><?=$rproduct['name']?></a></h2>
                            <span>₹<?=$rproduct['name']?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</section>

<div class="modal fade theme-modal" id="productenquiry" tabindex="-1" aria-labelledby="exampleModalLabel3"
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
                 <form action="<?=base_url('enquiry')?>" method="post">
                    <input type="hidden" value="<?=$product->name?> (<?=base_url('product/'.$product->link)?>)" name="product">
                     <div class="mb-3">
                         <input type="text" autocomplete="Name" placeholder="Name" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="email" autocomplete="E-mail" placeholder="E-mail" name="email"
                             class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="text" autocomplete="Mobile" pattern="[7896][0-9]{9}" class="form-control" placeholder="Phone Number"
                             name="mobile">
                     </div>
                     <div class="mb-3">
                         <button type="submit" class="btn theme-btn">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

<?php include('footer.php');?>