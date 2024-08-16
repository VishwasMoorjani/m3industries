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
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>Blog Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- start wpo-blog-pg-section -->
<section class="wpo-blog-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="wpo-blog-content">
                    <div class="row">
                        <?php foreach($blogs as $blog){ ?>
                        <div class="col-lg-6 post format-standard-image">
                            <div class="entry-media">
                                <a href="<?=base_url('blog/'.$blog['link']);?>">
                                    <img src="<?=base_url('assets/front/images/'.$blog['image']);?>" alt>
                                </a>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="fi flaticon-user"></i> By <a href="#"><?=$blog['blogger_name']?></a> </li>
                                    <!-- <li><i class="fi flaticon-comment-white-oval-bubble"></i> Comments 35 </li> -->
                                    <li><i class="fi flaticon-calendar"></i> 24 Jun 2023</li>
                                </ul>
                            </div>
                            <div class="entry-details">
                                <h3><a href="<?=base_url('blog/'.$blog['link']);?>"><?=$blog['post_title']?></a></h3>
                                <p><?php $this->load->helper('text'); echo word_limiter(strip_tags($blog['post']), 8); ?></p>
                                <a href="<?=base_url('blog/'.$blog['link']);?>" class="read-more">READ MORE...</a>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>

                    <!-- <div class="pagination-wrapper pagination-wrapper-left">
                        <ul class="pg-pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <i class="fi ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <i class="fi ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>




        </div>
    </div> <!-- end container -->
</section>


<?php include('footer.php');?>