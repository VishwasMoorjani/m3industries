<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<style>
p {
    margin: 0;
}

.upload__inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.upload__btn {
    display: inline-block;
    font-weight: 600;
    color: #fff;
    text-align: center;
    min-width: 116px;
    padding: 5px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color: #4045ba;
    border-color: #4045ba;
    border-radius: 10px;
    line-height: 26px;
    font-size: 14px;
}

.upload__btn:hover {
    background-color: unset;
    color: #4045ba;
    transition: all 0.3s ease;
}

.upload__btn-box {
    margin-bottom: 10px;
}

.upload__img-wrap {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.upload__img-box {
    width: 100px;
    padding: 0 10px;
    margin-bottom: 12px;
}

.upload__img-close {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    line-height: 24px;
    z-index: 1;
    cursor: pointer;
}

.upload__img-close:after {
    content: "✖";
    font-size: 14px;
    color: white;
}

.img-bg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    padding-bottom: 100%;
}

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
            <form class="multisteps-form__form" method="post" action="addproducts" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <input type="hidden" name="date_added" value="<?= date("Y-m-d"); ?>">
                                <input type="hidden" name="images" value="[]">
                                <input type="hidden" name="maincategory" value="products">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Product Title *</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="sku">Product ID (SKU)</label>
                                    <input class=" form-control" type="text" name="sku" id="sku">
                                </div>
                                
                                <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                                <!--    <div class="input-group input-group-static m-2">-->
                                <!--        <label for="video">Product Video</label>-->
                                <!--        <input class="form-control" type="text" name="video" id="video">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="quantity">Quantity</label>
                                    <input class=" form-control" type="text" name="quantity" id="quantity">
                                </div> -->
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="metal">Metal</label>-->
                                <!--    <select class="form-control" name="metal" id="metal">-->
                                <!--        <option value="">Select Metal</option>-->
                                <!--        <option value="gold">Gold</option>-->
                                <!--        <option value="silver">Silver</option>-->
                                <!--    </select>-->
                                    <!-- <input class="form-control" type="text" name="metal" id="metal"> -->
                                <!--</div>-->
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="category">Category</label>-->
                                <!--    <select class="form-control" name="maincategory" id="category" required>-->
                                <!--        <option value="">Select Category</option>-->
                                <!--        <?php foreach ($maincategories as $category) { ?>-->
                                <!--        <option value="<?= $category['link'] ?>"><?= $category['name'] ?></option>-->
                                <!--        <?php  } ?>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="shipping_charges">Shipping Charges</label>
                                    <input class="form-control" type="number" step="0.01" name="shipping_charges"
                                        id="shipping_charges" required> -->
                                    <input type="hidden" name="shipping_charges" value="0" >
                                <!-- </div> -->
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="mrp">MRP Price (in ₹)</label>
                                    <input class=" form-control" type="number" step="0.01" name="price" id="mrp"
                                        onkeyup="calculatediscount()" >
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="sale">Sale Price (in ₹)</label>
                                    <input class=" form-control" type="number" step="0.01" name="saleprice" id="sale"
                                        onkeyup="calculatediscount()" >
                                </div>
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="discount">Discount(%) (in ₹)</label>-->
                                <!--    <input class="form-control" type="number" name="discount" step="0.01" id="discount"-->
                                <!--        readonly>-->
                                <!--</div>-->
                               
                                
                                <!--<div class="input-group input-group-static m-2">-->
                                <!--    <label for="category">Sub Category</label>-->
                                <!--    <select class="form-control" name="category" id="sub_category" required>-->

                                <!--    </select>-->
                                <!--</div>-->
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                             <div class="input-group input-group-static m-2">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category" required>
                                        <option value="">Select Category</option>
                                        <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['link'] ?>"><?= $category['name'] ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                            <!--    <label for="size_id" class="control-label mb-1"> Size</label>-->
                            <!--    <div class="input-group input-group-static m-2">-->
                            <!--        <select id="size_id" name="size" class="form-control">-->
                            <!--            <option value="" disabled selected>Select Size</option>-->
                            <!--            <?php foreach ($sizes as $size) { ?>-->
                            <!--            <option value="<?=$size['id'] ?>"><?=$size['name'] ?></option>-->
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
                            <!--            <option value="<?=$plating['name'] ?>"><?=$plating['name'] ?></option>-->
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
                            <!--                value="<?=$color['name'] ?>"><?=$color['name'] ?></option>-->
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
                                        <option value="<?=$gems['name'] ?>"><?=$gems['name'] ?></option>
                                        <?php  } ?>
                                    </select>

                                </div>
                            </div> -->
                        </div>


                        <!-- <div class="row">
                            
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label for="similiar_id" class="control-label mb-1">Similiar Product</label>
                                <div class="input-group input-group-static m-2">
                                    <select id="similiar_id" name="similiar[]" class="form-control chosen-select"
                                        multiple>
                                        <?php foreach ($products as $similiar) { ?>
                                        <option value="<?=$similiar['id'] ?>"><?=$similiar['name'] ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <label for="shortdescription">Features</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control" name="shortdescription"></textarea>
                            </div>
                            <label for="description">Description</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <!-- <label for="shipping_description">Shipping Description</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control" name="shipping_description"></textarea>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Main Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="featured_image" accept="image/*" required />
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['success_msg'])) {
                                        echo '<p class="status-msg success">' . $success_msg . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="col-6 col-sm-4">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Plating 1 Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var1" accept="image/*" />
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['success_msg'])) {
                                        echo '<p class="status-msg success">' . $success_msg . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Plating 2 Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var2" accept="image/*" />
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['success_msg'])) {
                                        echo '<p class="status-msg success">' . $success_msg . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Plating 3 Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var3" accept="image/*" />
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['success_msg'])) {
                                        echo '<p class="status-msg success">' . $success_msg . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Plating 4 Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="var4" accept="image/*" />
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['success_msg'])) {
                                        echo '<p class="status-msg success">' . $success_msg . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div> -->
                            <!-- <div class="col-12 col-sm-6">
                                <label for="pdf">Brochure</label>
                                <div class="input-group input-group-static m-2">
                                    <input type="file" name="pdf" accept=".pdf" />
                                </div>
                            </div> -->

                        </div>

                        <div class="row">
                            <!-- <div class="col-4 col-sm-4">
                                <div class="input-group-static m-2 form-check form-switch">
                                    <input class="form-control form-check-input" type="checkbox" id="featured"
                                        name="featured">
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="input-group-static m-2 form-check form-switch">
                                    <input class="form-control form-check-input" type="checkbox" id="trending"
                                        name="trending">
                                    <label class="form-check-label" for="trending">Trending</label>
                                </div>
                            </div> -->
                            <div class="col-4 col-sm-4">
                                <div class="input-group-static m-2 form-check form-switch">
                                    <input class="form-control form-check-input" type="checkbox" id="new_arrival"
                                        name="new_arrival">
                                    <label class="form-check-label" for="new_arrival">New Arrival</label>
                                </div>
                            </div>
                        </div>


                        <hr style="background-color:#000">

                        <!-- <h2 class="mb10 ml15">Product Attributes</h2>
                        <div class="col-lg-12" id="product_attr_box">
                            <div class="card" id="product_attr_1">

                                <div class="card-body">

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="input-group input-group-static m-2">

                                                    <label for="price" class="control-label mb-1"> Price</label>

                                                    <input id="price" name="varprice[]" type="text" class="form-control"
                                                        aria-required="true" aria-invalid="false" value="">

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="input-group input-group-static m-2">

                                                    <label for="size_id" class="control-label mb-1"> Size</label>

                                                    <select id="size_id" name="varsize[]" class="form-control">

                                                        <option value="">Select</option>
                                                        <?php foreach ($sizes as $size) { ?>
                                                        <option value="<?=$size['id'] ?>"><?=$size['name'] ?>
                                                        </option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group input-group-static m-2">
                                                    <label for="stone_id" class="control-label mb-1"> Stone</label>


                                                    <select id="stone_id" name="varstone[]" class="form-control">

                                                        <option value="">Select</option>
                                                        <?php foreach ($gemstones as $stone) { ?>
                                                        <option value="<?=$stone['id'] ?>"><?=$stone['name'] ?>
                                                        </option>
                                                        <?php  } ?>
                                                    </select>

                                                </div>
                                            </div>



                                            <div class="col-md-2">

                                                <label for="varimage" class="control-label mb-1">

                                                    &nbsp;&nbsp;&nbsp;</label>




                                                <button type="button" class="btn btn-success btn-lg"
                                                    onclick="add_more()">

                                                    <i class="fa fa-plus"></i>&nbsp; Add</button>




                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div> -->


                    </div>

                    <button type="submit" name="submit" class="btn btn-lg btn-primary mt-5">Submit</button>
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
var loop_count = 1;

// function add_more() {
//     loop_count++;
//     var html = '<div class="card mt-2" id="product_attr_' + loop_count +
//         '"><div class="card-body"><div class="form-group"><div class="row">';
//     html +=
//         '<div class="col-md-2"><div class="input-group input-group-static m-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="varprice[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';
//     var size_id_html = jQuery('#size_id').html();
//     size_id_html = size_id_html.replace("selected", "");
//     html +=
//         '<div class="col-md-3"><div class="input-group input-group-static m-2"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="varsize[]" class="form-control">' + size_id_html + '</select></div></div>';
//     // var color_id_html = jQuery('#color_id').html();
//     // color_id_html = color_id_html.replace("selected", "");

//     var stone_id_html = jQuery('#stone_id').html();
//     stone_id_html = stone_id_html.replace("selected", "");
//     html +=
//         '<div class="col-md-3"><div class="input-group input-group-static m-2"><label for="stone_id" class="control-label mb-1"> Stone</label><select id="stone_id" name="varstone[]" class="form-control">' + stone_id_html + '</select></div></div>';
    
//     html +=
//         '<div class="col-md-2"><div class="input-group input-group-static m-2"><label for="varimage" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("' +
//         loop_count + '")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';
//     html += '</div></div></div></div>';
//     jQuery('#product_attr_box').append(html)
// }

// function remove_more(loop_count) {
//     jQuery('#product_attr_' + loop_count).remove();

// }

CKEDITOR.replace('shortdescription');
CKEDITOR.replace('description');
CKEDITOR.config.width = '100%';
</script>
<script>
function calculatediscount() {
    let mrp = document.getElementById('mrp').value;
    let sale = document.getElementById('sale').value;
    let discount = (mrp - sale) / mrp * 100;
    document.getElementById('discount').value = discount;
}

function ucalculatediscount() {
    let mrp = document.getElementById('umrp').value;
    let sale = document.getElementById('usale').value;
    let discount = (mrp - sale) / mrp * 100;
    document.getElementById('udiscount').value = discount;
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
</script>
<script>
// dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
//     evt.preventDefault();
// };

// dropContainer.ondrop = function(evt) {
//     // pretty simple -- but not for IE :(
//     images.files = evt.dataTransfer.files;

//     // If you want to use some of the dropped files
//     const dT = new DataTransfer();
//     dT.items.add(evt.dataTransfer.files[0]);
//     dT.items.add(evt.dataTransfer.files[3]);
//     images.files = dT.files;

//     evt.preventDefault();
// };
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
            success: function(dataResult) {
                $("#sub_category").html(dataResult);
            }
        });


    });
});
</script>