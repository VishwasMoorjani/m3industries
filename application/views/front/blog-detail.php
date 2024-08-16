<?php
$title = $blog['post_title']." - M3 Industries";
$description = $blog['post_title'];
$keyword = "";
include('header.php');?>

<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2><?=$blog['post_title']?></h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><?=$blog['post_title']?></li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div>
    <!-- end container -->
    
</section>
<!-- end page-title -->

<!-- start wpo-blog-single-section -->
<section class="wpo-blog-single-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 col-12">
                <div class="wpo-blog-content">
                    <div class="post format-standard-image">
                        <div class="entry-media">
                            <img src="<?=base_url('assets/front/images/'.$blog['image']);?>" alt>
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li><i class="fi flaticon-user"></i> By <a href="#"><?=$blog['blogger_name']?></a> </li>
                                <li><i class="fi flaticon-calendar"></i> <?=date('d M, Y',strtotime($blog['date_added']))?></li>
                            </ul>
                        </div>
                        <h2><?=$blog['post_title']?></h2>
                        <?=$blog['post']?>
                    </div>
                    
                    
                    
                </div>
            </div>
            <div class="col col-lg-4">
                <div class="blog-sidebar">
                    
                    <div class="widget recent-post-widget">
                        <h3>Related Posts</h3>
                        <div class="posts">
                            <?php foreach($recentblogs as $rblog){ ?>
                            <div class="post">
                                <div class="img-holder">
                                    <a href="<?=base_url('blog/'.$rblog['link'])?>">
                                        <img src="<?=base_url('assets/front/images/'.$rblog['image']);?>" alt>
                                    </a>
                                </div>
                                <div class="details">
                                    <h4><a href="<?=base_url('blog/'.$rblog['link'])?>"><?=$rblog['post_title']?></a>
                                    </h4>
                                    <span class="date"><?=date('d M, Y',strtotime($rblog['date_added']))?> </span>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end wpo-blog-single-section -->

<?php include('footer.php'); ?>