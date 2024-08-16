<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Global Settings</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-sm-4">Name</div>
                <div class="col-4 col-sm-4">Value</div>
                <div class="col-4 col-sm-4">Submit</div>
            </div>
            <!-- <form class="multisteps-form__form" method="post" action="editsettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="headerlogo" hidden>
                        <h5>Header Logo</h5>
                    </div>
                    <div class="col-4 col-sm-4">
                        <?php if ($this->Global['headerlogo'] != "") {
                            $img = $this->Global['headerlogo'];
                        ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?= base_url('/assets/front/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg()">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="footerlogo" hidden>
                        <h5>Footer Logo</h5>
                    </div>
                    <div class="col-4 col-sm-4"><?php if ($this->Global['footerlogo'] != "") {
                                                    $img = $this->Global['footerlogo'];
                                                ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?= base_url('/assets/front/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg()">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="address" hidden>
                        <h5>Address</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?= strip_tags($this->Global['address']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="mobile" hidden>
                        <h5>Mobile</h5>
                    </div>

                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['mobile']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="mobile2" hidden>
                        <h5>Mobile 2</h5>
                    </div>

                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['mobile2']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="email" hidden>
                        <h5>Email</h5>
                    </div>
                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['email']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
             
            <!-- <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="topdata" hidden>
                        <h5>Top Bar Content</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?= strip_tags($this->Global['topdata']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="footercontent" hidden>
                        <h5>Footer Content</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?= strip_tags($this->Global['footercontent']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <!-- <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="youtubevideo" hidden>
                        <h5>Youtube Video</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="3" cols="30"><?= strip_tags($this->Global['youtubevideo']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
            <h2>Social Links</h2>
            <br>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="facebook" hidden>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?= ($this->Global['facebook']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <!--<form class="multisteps-form__form" method="post" action="editsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="twitter" hidden>-->
            <!--            <i class="fa fa-twitter" aria-hidden="true"></i>-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="value" value="<?= ($this->Global['twitter']); ?>" id="">-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="instagram" hidden>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?= ($this->Global['instagram']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <!--<form class="multisteps-form__form" method="post" action="editsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="youtube" hidden>-->
            <!--            <i class="fa fa-youtube-play" aria-hidden="true"></i>-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="value" value="<?= ($this->Global['youtube']); ?>" id="">-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!--<form class="multisteps-form__form" method="post" action="editsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="etsy" hidden>-->
            <!--            <i class="fa fa-etsy" aria-hidden="true"></i>-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="value" value="<?= ($this->Global['etsy']); ?>" id="">-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!-- <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="tumblr" hidden>
                        <i class="fa fa-tumblr" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?= ($this->Global['tumblr']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
            <!--<form class="multisteps-form__form" method="post" action="editsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="pinterest" hidden>-->
            <!--            <i class="fa fa-pinterest" aria-hidden="true"></i>-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="value" value="<?= ($this->Global['pinterest']); ?>" id="">-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="linkedin" hidden>
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?= ($this->Global['linkedin']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="whatsapp" hidden>
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?= ($this->Global['whatsapp']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="gmb" hidden>
                        <i class="fa fa-google" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?= ($this->Global['gmb']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <!--<form class="multisteps-form__form" method="post" action="editcsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="shippingon" hidden>-->
            <!--            Shipping charges (INR)-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <div class="input-group-static m-2 form-check form-switch">-->
            <!--                <input class="form-control form-check-input" type="checkbox" id="value" name="value" <?= ($this->Global['shippingon']) == 'on' ? 'checked' : '' ?> onChange="this.form.submit()">-->
            <!--            </div>-->
            <!--        </div>-->
                    <!--<div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!--<form class="multisteps-form__form" method="post" action="editcsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="ushippingon" hidden>-->
            <!--            Shipping charges (USD)-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <div class="input-group-static m-2 form-check form-switch">-->
            <!--                <input class="form-control form-check-input" type="checkbox" id="value" name="value" <?= ($this->Global['ushippingon']) == 'on' ? 'checked' : '' ?> onChange="this.form.submit()">-->
            <!--            </div>-->
            <!--        </div>-->
                    <!--<div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!--<form class="multisteps-form__form" method="post" action="editcsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="couponon" hidden>-->
            <!--            Coupon Code (INR)-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <div class="input-group-static m-2 form-check form-switch">-->
            <!--                <input class="form-control form-check-input" type="checkbox" id="value" name="value" <?= ($this->Global['couponon']) == 'on' ? 'checked' : '' ?> onChange="this.form.submit()">-->
            <!--            </div>-->
            <!--        </div>-->
                    <!--<div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!--<form class="multisteps-form__form" method="post" action="editcsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="ucouponon" hidden>-->
            <!--            Coupon Code (USD)-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <div class="input-group-static m-2 form-check form-switch">-->
            <!--                <input class="form-control form-check-input" type="checkbox" id="value" name="value" <?= ($this->Global['ucouponon']) == 'on' ? 'checked' : '' ?> onChange="this.form.submit()">-->
            <!--            </div>-->
            <!--        </div>-->
                    <!--<div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!--<form class="multisteps-form__form" method="post" action="editcsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="freebie" hidden>-->
            <!--            Freebie (India)-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <div class="input-group-static m-2 form-check form-switch">-->
            <!--                <input class="form-control form-check-input" type="checkbox" id="value" name="value" <?= ($this->Global['freebie']) == 'on' ? 'checked' : '' ?> onChange="this.form.submit()">-->
            <!--            </div>-->
            <!--        </div>-->
                    <!--<div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            <!--<form class="multisteps-form__form" method="post" action="editcsettings">-->
            <!--    <div class="row mt-2">-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <input type="text" name="name" value="freebieu" hidden>-->
            <!--            Freebie (USA)-->
            <!--        </div>-->
            <!--        <div class="col-4 col-sm-4">-->
            <!--            <div class="input-group-static m-2 form-check form-switch">-->
            <!--                <input class="form-control form-check-input" type="checkbox" id="value" name="value" <?= ($this->Global['freebieu']) == 'on' ? 'checked' : '' ?> onChange="this.form.submit()">-->
            <!--            </div>-->
            <!--        </div>-->
                    <!--<div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>-->
            <!--    </div>-->
            <!--    <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">-->
            <!--</form>-->
            
            <!-- <form class="multisteps-form__form" method="post" action="editisettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="topleftbanner" hidden>
                        <h5>Top Banner Image</h5>
                    </div>
                    <div class="col-4 col-sm-4">
                        <?php if ($this->Global['topleftbanner'] != "") {
                            $img = $this->Global['topleftbanner'];
                        ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('topleftbanner')">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                                <p>(Image Size Must be 262*445)</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="topleftbannerlink" hidden>
                        <h5>Link</h5>
                    </div>
                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['topleftbannerlink']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
            <form class="multisteps-form__form" method="post" action="editisettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="homebanner1" hidden>
                        <h5>Sale Banner Image 1</h5>
                    </div>
                    <div class="col-4 col-sm-4">
                        <?php if ($this->Global['homebanner1'] != "") {
                            $img = $this->Global['homebanner1'];
                        ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('homebanner1')">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                                <p>(Image Size Must be 336*200)</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="homebanner1link" hidden>
                        <h5>Link</h5>
                    </div>
                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['homebanner1link']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
             <form class="multisteps-form__form" method="post" action="editisettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="homebanner2" hidden>
                        <h5>Sale Banner Image 2</h5>
                    </div>
                    <div class="col-4 col-sm-4">
                        <?php if ($this->Global['homebanner2'] != "") {
                            $img = $this->Global['homebanner2'];
                        ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('homebanner2')">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                                <p>(Image Size Must be 482*200)</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="homebanner2link" hidden>
                        <h5>Link</h5>
                    </div>
                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['homebanner2link']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            
            <form class="multisteps-form__form" method="post" action="editisettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="bottombanner" hidden>
                        <h5>Bottom Banner Image</h5>
                    </div>
                    <div class="col-4 col-sm-4">
                        <?php if ($this->Global['bottombanner'] != "") {
                            $img = $this->Global['bottombanner'];
                        ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?= base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('bottombanner')">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                                <p>(Image Size Must be 263*450)</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="bottombannerlink" hidden>
                        <h5>Link</h5>
                    </div>
                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?= ($this->Global['bottombannerlink']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
        </div>
    </div>
</div>
</main>
<script>
    function removeimg($val) {
        console.log($val);
                $.ajax({
            url: "<?=base_url('admin/removesettingsdata/');?>"+$val, //the page containing php script
            type: "post", //request type,
            success: function(result) {
                if (result == "done") {
                    location.reload();
                }
            }
        });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php $this->load->view('admin/footer'); ?>