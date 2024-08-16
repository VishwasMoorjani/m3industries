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
                    <h2><?=$details->name?></h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><?=$details->name?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="wpo-shop-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="shop-grids clearfix">
                    <?php foreach($categories as $cat){ ?>

                    <div class="grid">
                        <div class="img-holder">
                            <a href="<?=base_url('category/'.$cat['link']);?>">
                                <img src="<?=base_url('assets/front/images/'.$cat['image']);?>" alt>
                            </a>
                        </div>
                        <div class="details">
                            <h3><a href="<?=base_url('category/'.$cat['link']);?>"><?=$cat['name']?></a></h3>

                        </div>
                    </div>

                    <?php } ?>


                </div>
                <!-- <div class="pagination-wrapper pagination-wrapper-center">
                    <ul class="pg-pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <i class="fi flaticon-left-arrow-1"></i>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <i class="fi flaticon-next"></i>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</section>


<?php include('footer.php');?>