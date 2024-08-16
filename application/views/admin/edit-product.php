<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<style>
.ui-autocomplete {
    list-style: none;
    background: white;
    padding: 5px;
    width: 250px !important;
}

.ui-autocomplete>li {
    border: 1px solid #999;
    max-width: 100%px;
}
</style>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Product Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="editproduct" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <input type="hidden" name="date_added" value="<?= date("Y-m-d"); ?>">
                    <input type="hidden" name="link" value="<?= $product['link']; ?>">
                    <input type="hidden" name="maincategory" value="products">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Product Title *</label>
                                    <input class="form-control" type="text" name="name" id="name" value="<?= $product['name']; ?>" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="sku">Product ID (SKU)</label>
                                    <input class=" form-control" type="text" name="sku" id="sku"
                                        value=<?= $product['sku']; ?>>
                                </div>
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="metal">Metal</label>-->
                                <!--    <select class="form-control" name="metal" id="metal">-->
                                <!--        <option value="">Select Metal</option>-->
                                <!--        <option value="gold" <?=($product['metal'] == 'gold')?'selected':''?>>Gold</option>-->
                                <!--        <option value="silver" <?=($product['metal'] == 'silver')?'selected':''?>>Silver</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="quantity">Quantity</label>
                                    <input class=" form-control" type="text" name="quantity" id="quantity"
                                        value="<?= $product['quantity']; ?>">
                                </div> -->
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="category">Category</label>-->
                                <!--    <select class="form-control" name="maincategory" id="category" required>-->
                                <!--        <option value="<?= $product['maincategory']; ?>" selected disabled>SELECTED CATEGORY <?=strtoupper($product['maincategory']); ?></option>-->
                                <!--        <?php foreach ($maincategories as $category) { ?>-->
                                        
                                <!--        <option value="<?=$category['link'] ?>" ><?=$category['name'] ?></option>-->

                                <!--        <?php  } ?>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="shipping_charges">Shipping Charges</label>
                                    <input class="form-control" type="number" step="0.01" name="shipping_charges"
                                        id="shipping_charges" value="<?= $product['shipping_charges']; ?>" required>
                                </div> -->
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                 <div class="input-group input-group-static m-2">
                                    <label for="mrp">MRP Price (in ₹)</label>
                                    <input class=" form-control" type="number" step="0.01" name="price" id="mrp"
                                        onkeyup="calculatediscount()" value="<?= $product['price']; ?>">
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="sale">Sale Price (in ₹)</label>
                                    <input class=" form-control" type="number" step="0.01" name="saleprice" id="sale"
                                        onkeyup="calculatediscount()" value="<?= $product['saleprice']; ?>">
                                </div>
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="discount">Discount(%) (in ₹)</label>-->
                                <!--    <input class="form-control" type="number" step="0.01" name="discount" id="discount"-->
                                <!--        value="<?= $product['discount']; ?>" readonly>-->
                                <!--</div>-->
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="category">Sub Category</label>-->
                                <!--    <select class="form-control" name="category" id="sub_category" required>-->
                                <!--            <option value="<?= $product['category']; ?>" selected disabled>SELECTED CATEGORY <?=strtoupper($product['category']); ?></option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                            <!--    <div class="input-group input-group-static m-2">-->
                            <!--        <label for="video">Product Video</label>-->
                            <!--        <input class="form-control" type="text" name="video"-->
                            <!--            value="<?= $product['video']; ?>" id="video">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                            <!--    <label for="size_id" class="control-label mb-1"> Size</label>-->
                            <!--    <div class="input-group input-group-static m-2">-->
                            <!--        <select id="size_id" name="size" class="form-control">-->
                            <!--            <?php foreach ($sizes as $size) { ?>-->
                            <!--            <option value="<?=$size['id'] ?>"-->
                            <!--                <?=$product['size'] == $size['id']?'selected':'';?>>-->
                            <!--                <?=$size['name'] ?></option>-->
                            <!--            <?php  } ?>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                            <!--    <div class="input-group input-group-static m-2">-->
                            <!--        <label for="color_id" class="control-label mb-1"> Plating</label>-->

                            <!--        <select id="color_id" name="plating[]" class="form-control">-->

                            <!--            <option value="" disabled selected>Select</option>-->
                            <!--            <?php foreach ($platings as $plating) { ?>-->
                            <!--            <option value="<?=$plating['name'] ?>" <?php if (strpos($product['plating'],$plating['name']) !== false) { echo 'selected';}?>><?=$plating['name'] ?></option>-->
                            <!--            <?php  } ?>-->
                            <!--        </select>-->

                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                            <!--    <div class="input-group input-group-static m-2">-->
                            <!--        <label for="color_id" class="control-label mb-1"> Color</label>-->

                            <!--        <select id="color_id" name="color" class="form-control">-->

                            <!--            <option value="" disabled selected>Select</option>-->
                            <!--            <?php foreach ($colors as $color) { ?>-->
                            <!--            <option style="background-color:<?=$color['code']?>"-->
                            <!--                value="<?=$color['name'] ?>" <?=$product['color'] == $color['name']?'selected':'';?>><?=$color['name'] ?></option>-->
                            <!--            <?php  } ?>-->
                            <!--        </select>-->

                            <!--    </div>-->
                            <!--</div>-->
                            <!-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="color_id" class="control-label mb-1"> Gemstones</label>

                                    <select id="color_id" name="gemstones" class="form-control">

                                        <option value="" disabled selected>Select</option>
                                        <?php foreach ($gemstones as $gems) { ?>
                                        <option value="<?=$gems['name'] ?>" <?=$product['gemstones'] == $gems['name']?'selected':'';?>><?=$gems['name'] ?></option>
                                        <?php  } ?>
                                    </select>

                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            
                            <div class="input-group input-group-static m-2">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category" required>
                                    <option value="<?= $product['category']; ?>" selected disabled>SELECTED CATEGORY <?=strtoupper($product['category']); ?></option>
                                    <?php foreach ($categories as $category) { ?>
                                    <option value="<?=$category['link'] ?>" ><?=$category['name'] ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                                
                            <label for="shortdescription">Features</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control"
                                    name="shortdescription"><?= $product['shortdescription']; ?></textarea>
                            </div>
                            <label for="description">Description</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control"
                                    name="description"><?= $product['description']; ?></textarea>
                            </div>
                            <!-- <label for="shipping_description">Shipping Description</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control"
                                    name="shipping_description"><?= $product['shipping_description']; ?></textarea>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <label for="image">Main Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($product['featured_image'] != "") {
                                        $img = $product['featured_image'];
                                    ?>
                                    <div class="input-group input-group-static m-2">
                                        <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px"
                                            srcset="">
                                    </div>
                                    <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('featured_image')">
                                        Remove Image</div>
                                    <?php } else { ?>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="featured_image" accept="image/*" required />
                                    </div>
                                    <?php } ?>

                                </div>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div>
                            <!-- <div class="col-6 col-sm-4">
                                <label for="image">Plating1 Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($product['var1'] != "") {
                                        $img = $product['var1'];
                                    ?>
                                    <div class="input-group input-group-static m-2">
                                        <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px"
                                            srcset="">
                                    </div>
                                    <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('var1')">
                                        Remove Image</div>
                                    <?php } else { ?>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var1" accept="image/*" />
                                    </div>
                                    <?php } ?>

                                </div>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label for="image">Plating2 Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($product['var2'] != "") {
                                        $img = $product['var2'];
                                    ?>
                                    <div class="input-group input-group-static m-2">
                                        <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px"
                                            srcset="">
                                    </div>
                                    <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('var2')">
                                        Remove Image</div>
                                    <?php } else { ?>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var2" accept="image/*" />
                                    </div>
                                    <?php } ?>

                                </div>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label for="image">Plating3 Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($product['var3'] != "") {
                                        $img = $product['var3'];
                                    ?>
                                    <div class="input-group input-group-static m-2">
                                        <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px"
                                            srcset="">
                                    </div>
                                    <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('var3')">
                                        Remove Image</div>
                                    <?php } else { ?>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var3" accept="image/*" />
                                    </div>
                                    <?php } ?>

                                </div>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label for="image">Plating4 Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($product['var4'] != "") {
                                        $img = $product['var4'];
                                    ?>
                                    <div class="input-group input-group-static m-2">
                                        <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px"
                                            srcset="">
                                    </div>
                                    <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('var4')">
                                        Remove Image</div>
                                    <?php } else { ?>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var4" accept="image/*" />
                                    </div>
                                    <?php } ?>

                                </div>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div> -->
                        </div> 
                        <div class="row">   
                            <!-- <div class="col-6 col-sm-4">
                                <div class="input-group-static m-2 form-check form-switch">
                                    <input class="form-control form-check-input" type="checkbox" id="featured"
                                        name="featured" <?= $product['featured'] == 'on' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="input-group-static m-2 form-check form-switch">
                                    <input class="form-control form-check-input" type="checkbox" id="trending"
                                        name="trending" <?= $product['trending'] == 'on' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="trending">Trending</label>
                                </div>
                            </div> -->
                            <div class="col-6 col-sm-4">
                                <div class="input-group-static m-2 form-check form-switch">
                                    <input class="form-control form-check-input" type="checkbox" id="new_arrival"
                                        name="new_arrival" <?= $product['new_arrival'] == 'on' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="new_arrival">New Arrival</label>
                                </div>
                            </div>

                        </div>

                        
                        
                    <div class="multisteps-form__content">
                        
                    <!--  <div class="row">
                            <h2 class="mb10 ml15">Product Attributes</h2>
                            
                            <div class="col-lg-12" id="product_varbox">

                                <?php 

                                $loop_count_num=1;
                                foreach($productAttrArr as $key=>$val) {

                                $loop_count_prev=$loop_count_num;

                                $pAArr=(array)$val;

                               ?>


                                <div class="card mt-2" id="product_var<?=$loop_count_num++?>">
                                <input name="varid[]" type="hidden" value="<?=$pAArr['id']?>" >
                                    <div class="card-body">

                                        <div class="form-group">

                                            <div class="row">
                                                <div class="col-md-2">
                                                <div class="input-group input-group-static">
                                                    <label for="price<?=$loop_count_num?>" class="control-label mb-1"> Price</label>

                                                    <input id="price<?=$loop_count_num?>" name="varprice[]" type="text" class="form-control"
                                                        aria-required="true" aria-invalid="false"
                                                        value="<?=$pAArr['varprice']?>" required>
                                                </div>
                                                </div>

                                                <div class="col-md-3">
                                                <div class="input-group input-group-static">
                                                    <label for="size_id<?=$loop_count_num?>" class="control-label mb-1"> Size</label>
                                                    <select id="size_id<?=$loop_count_num?>" name="varsize[]" class="form-control">

                                                        <option value="">Select</option>                                            
                                                        <?php foreach ($sizes as $size) { ?>
                                                        <option value="<?=$size['id'] ?>" <?=($size['id'] == $pAArr['varsize'])?'selected':'';?>><?=$size['name'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                <div class="input-group input-group-static">
                                                    <label for="stone_id<?=$loop_count_num?>" class="control-label mb-1"> Size</label>
                                                    <select id="stone_id<?=$loop_count_num?>" name="varstone[]" class="form-control">

                                                        <option value="">Select</option>                                            
                                                        <?php foreach ($gemstones as $stone) { ?>
                                                        <option value="<?=$stone['id'] ?>" <?=($stone['id'] == $pAArr['varstone'])?'selected':'';?>><?=$stone['name'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="input-group input-group-static">
                                                        <label for="varimage" class="control-label mb-1">

                                                            &nbsp;&nbsp;&nbsp;</label>

                                                        <a onclick="confirmpopup('<?=base_url('admin/delete/products_attr/'.$pAArr['id'])?>');"
                                                            >
                                                            <button
                                                                type="button" class="btn btn-danger btn-lg">
                                                                <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                                                        

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <?php } ?>

                            </div> 

                            <div class="col-lg-12" id="product_varbox">                  
                                <div class="card" id="product_var1">

                                    <div class="card-body">

                                        <div class="form-group">

                                            <div class="row">

                                                <div class="col-md-2">
                                                <div class="input-group input-group-static m-2">

                                                    <label for="price" class="control-label mb-1"> Price</label>

                                                    <input id="price" name="varprice[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">

                                                </div>
                                                </div>

                                                <div class="col-md-3">
                                                <div class="input-group input-group-static m-2">

                                                    <label for="size_id" class="control-label mb-1"> Size</label>

                                                    <select id="size_id" name="varsize[]" class="form-control">

                                                        <option value="">Select</option>
                                                        <?php foreach ($sizes as $size) { ?>
                                                        <option value="<?=$size['id'] ?>"><?=$size['name'] ?></option>
                                                        <?php  } ?>
                                                    </select>

                                                </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                <div class="input-group input-group-static m-2">

                                                    <label for="stone_id" class="control-label mb-1"> Size</label>

                                                    <select id="stone_id" name="varstone[]" class="form-control">

                                                        <option value="">Select</option>
                                                        <?php foreach ($gemstones as $stone) { ?>
                                                        <option value="<?=$stone['id'] ?>"><?=$stone['name'] ?></option>
                                                        <?php  } ?>
                                                    </select>

                                                </div>
                                                </div>

                                                <div class="col-md-2">

                                                    <label for="varimage" class="control-label mb-1">

                                                        &nbsp;&nbsp;&nbsp;</label>



                                                    
                                                    <button type="button" class="btn btn-success btn-lg" onclick="add_more()">

                                                        <i class="fa fa-plus"></i>&nbsp; Add</button>

                                                    


                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>-->
                        <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Submit</button>
                    </div> 
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

// function confirmpopup($var='NULL') { 
//     if (window.confirm("Are You Sure to Remove this Varient"))
//  {
//    alert("Varient Removed Successful") 
//    window.location.href = $var;
//  }
// }
CKEDITOR.replace('shortdescription');
CKEDITOR.replace('description');
CKEDITOR.replace('shipping_description');
CKEDITOR.config.width = '100%';
</script>

<script>
// var loop_count = 1;
// function add_more() {
//     loop_count++;
//     var html = '<div class="card mt-2" id="product_var' + loop_count + '"><div class="card-body"><div class="form-group"><div class="row">';
//     html += '<div class="col-md-2"><div class="input-group input-group-static m-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="varprice[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';
//     var size_id_html = jQuery('#size_id').html();
//     size_id_html = size_id_html.replace("selected", "");
//     html += '<div class="col-md-3"><div class="input-group input-group-static m-2"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="varsize[]" class="form-control">' + size_id_html + '</select></div></div>';
    
//     var stone_id_html = jQuery('#stone_id').html();
//     stone_id_html = stone_id_html.replace("selected", "");
//     html +=
//         '<div class="col-md-3"><div class="input-group input-group-static m-2"><label for="stone_id" class="control-label mb-1"> Stone</label><select id="stone_id" name="varstone[]" class="form-control">' + stone_id_html + '</select></div></div>';
    
    
//     var color_id_html = jQuery('#color_id').html();
//     color_id_html = color_id_html.replace("selected", "");
//     html += '<div class="col-md-2"><div class="input-group input-group-static m-2"><label for="varimage" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("' + loop_count + '")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';
//     html += '</div></div></div></div>';
//     jQuery('#product_varbox').append(html)
// }

// function remove_more(loop_count) {
//     jQuery('#product_var' + loop_count).remove();

// }

function calculatediscount() {
    let mrp = document.getElementById('mrp').value;
    let sale = document.getElementById('sale').value;
    let discount = (mrp - sale) / mrp * 100;
    document.getElementById('discount').value = discount;
}
jQuery(document).ready(function() {
    ImgUpload();
});

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile').each(function() {
        $(this).on('change', function(e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function(f, index) {

                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var html =
                                "<div class='upload__img-box'><div style='background-image: url(" +
                                e.target.result + ")' data-number='" + $(
                                    ".upload__img-close").length + "' data-file='" + f
                                .name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function(e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}

function removeimg(plating) {
    <?php $link = $product['link'];  ?>
    $.ajax({
        url: "removeimg/<?= $link ?>/"+plating, //the page containing php script
        type: "post", //request type,
        success: function(result) {
            if (result == "done") {
                location.reload();
            }
        }
    });
}

// function removepdf() {
//     <?php $link = $product['link'];  ?>
//     $.ajax({
//         url: "removepdf/<?= $link ?>", //the page containing php script
//         type: "post", //request type,
//         success: function(result) {
//             if (result == "done") {
//                 location.reload();
//             }
//             console.log(result);
//         }
//     });
// }
</script>
<?php $this->load->view('admin/footer'); ?>
 <script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "getsubcategory",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
		
		
	});
});
</script>