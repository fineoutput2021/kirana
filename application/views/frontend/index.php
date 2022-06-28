    <!-- ========================================================SLIDER AREA START======================================== (slider-3) -->
    <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">



    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <?$i=1; foreach($slider_data->result() as $slider){?>
      <div class="carousel-item <?if($i==1){echo "active";}?>">
        <img src="<?=base_url().$slider->image?>" alt="" class="d-block" style="width:100%">
      </div>
      <?$i++;}?>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>


    <!-- SLIDER AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area mt-100 mt--65 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border section-bg-6">
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="<?=base_url()?>assets/frontend/img/icons/svg/8-trolley.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Free shipping</h4>
                                <p>On all orders over ₹49.00</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="<?=base_url()?>assets/frontend/img/icons/svg/9-money.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>15 days returns</h4>
                                <p>Moneyback guarantee</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="<?=base_url()?>assets/frontend/img/icons/svg/10-credit-card.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Secure checkout</h4>
                                <p>Protected by Paypal</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="<?=base_url()?>assets/frontend/img/icons/svg/11-gift-card.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Offer & gift here</h4>
                                <p>On all orders over</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-120 pb-120 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="<?=base_url()?>assets/frontend/img/others/6.png" alt="About Us Image">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">Know More About Shop</h6>
                            <h1 class="section-title">Trusted Organic <br class="d-none d-md-block">  Food  Store</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                        </div>
                        <p>sellers who aspire to be good, do good, and spread goodness. We
                                democratic, self-sustaining, two-sided marketplace which thrives
                                on trust and is built on community and quality content.</p>
                        <div class="about-author-info d-flex">
                            <div class="author-name-designation  align-self-center mr-30">
                                <h4 class="mb-0">Jerry Henson</h4>
                                <small>/ Shop Director</small>
                            </div>
                            <div class="author-sign  align-self-center">
                                <img src="<?=base_url()?>assets/frontend/img/icons/icon-img/author-sign.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!--============================================ CATEGORY AREA START ========================================-->
    <div class="ltn__category-area section-bg-1--  pt-115 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h4 class="section-title white-black">Top Categories</h4>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active slick-arrow-1 arrow1">
              <?foreach($category_data->result() as $category){?>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-3 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <img src="<?=base_url().$category->image?>" alt="Image">
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h5><a href="shop.html"><?=$category->name;?></a></h5>
                            <h6><?$this->db->select('*');
                            $this->db->from('tbl_product');
                            $this->db->where('is_active', 1);
                            $this->db->where('category_id', $category->id);
                            $to_count = $this->db->count_all_results();
                            echo "(".$to_count." item)";
                            ?></h6>
                        </div>
                    </div>
                </div>
                <?}?>
            </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

    <!--===================================-banner image===========================---->
<div class="container-fluid p-0 text-center ">
    <img src="<?=base_url()?>assets/frontend/img\bg\2.jpg" class="img-fluid">
</div>
<!---=================================================================================-->

    <!--============================================ PRODUCT TAB AREA START (product-item-3) ======================================-->
    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area  pt-85 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Our Products</h1>
                    </div>
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">
                            <a class="active show" data-toggle="tab" href="#liton_tab_3_1">Food & Drinks</a>
                            <a data-toggle="tab" href="#liton_tab_3_2" class="">Vegetables</a>
                            <a data-toggle="tab" href="#liton_tab_3_3" class="">Dried Foods</a>
                            <a data-toggle="tab" href="#liton_tab_3_4" class="">Bread & Cake</a>
                            <a data-toggle="tab" href="#liton_tab_3_5" class="">Fish & Meat</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_3_1">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>
                                                </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                   <div class="row justify-content-center" style="padding:0px 21px;">
                                                            <div class="cart-plus-minus p-0">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                            <select class="select ml-3">
                                                                <option selected>kg</option>
                                                                <option> kg-1 </option>
                                                                <option> kg-2 </option>
                                                                <option> kg-3 </option>
                                                                <option> kg-4 </option>
                                                            </select>
                                                    </div>

                                                </div>
                                                <div class="row justify-content-center">
                                                <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/12.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/8.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/13.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/9.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/14.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/10.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_3_2">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/16.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/10.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/9.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/14.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/8.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/13.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/10.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_3_3">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/12.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/8.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/9.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/14.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/10.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_3_4">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/3.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/5.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/2.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/16.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/14.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/14.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/10.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_3_5">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/13.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/5.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/9.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/14.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/12.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/10.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/15.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                            </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/6.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-center" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/11.png" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart iconn"></i></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                                <div class="product-price">
                                                    <span>₹32.00</span>
                                                    <del>₹46.00</del>
                                                    <div class="row justify-content-between" style="padding:0px 21px;">
                                                        <div class="cart-plus-minus p-0">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                        <select class="select ml-3">
                                                            <option selected>kg</option>
                                                            <option> kg-1 </option>
                                                            <option> kg-2 </option>
                                                            <option> kg-3 </option>
                                                            <option> kg-4 </option>
                                                        </select>
                                                </div>

                                                </div>
                                                <div class="row">
                                                     <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->

<!---==============================================================================================================-->

<!--===================================-banner image===========================---->
<div class="container-fluid p-0 mt-5">
    <img src="<?=base_url()?>assets/frontend/img\bg\2.jpg" class="img-fluid">
</div>
<!--============================================slider2============================================================-->


<div class="ltn__product-tab-area ltn__product-gutter pt-115 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Featured Products</h1>
                </div>

                <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">

                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_3_1">
                        <div class="ltn__product-tab-content-inner">
                            <div class="row ltn__tab-product-slider-one-active slick-arrow-1 col-md-12">
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/7.png" alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                            <div class="product-price">
                                                <span>₹32.00</span>
                                                <del>₹46.00</del>
                                                <div class="row justify-content-between" style="padding:0px 21px;">
                                                    <div class="cart-plus-minus p-0">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select">
                                                        <option selected>kg</option>
                                                        <option> kg-1 </option>
                                                        <option> kg-2 </option>
                                                        <option> kg-3 </option>
                                                        <option> kg-4 </option>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row">
                                              <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/1.png" alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                            <div class="product-price">
                                                <span>₹32.00</span>
                                                <del>₹46.00</del>
                                                <div class="row justify-content-between" style="padding:0px 21px;">
                                                    <div class="cart-plus-minus p-0">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select">
                                                        <option selected>kg</option>
                                                        <option> kg-1 </option>
                                                        <option> kg-2 </option>
                                                        <option> kg-3 </option>
                                                        <option> kg-4 </option>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row">
                                              <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/4.png" alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                            <div class="product-price">
                                                <span>₹52.00</span>
                                                <del>₹46.00</del>
                                                <div class="row justify-content-between" style="padding:0px 21px;">
                                                    <div class="cart-plus-minus p-0">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select">
                                                        <option selected>kg</option>
                                                        <option> kg-1 </option>
                                                        <option> kg-2 </option>
                                                        <option> kg-3 </option>
                                                        <option> kg-4 </option>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row">
                                                <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/5.png" alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                            <div class="product-price">
                                                <span>₹32.00</span>
                                                <del>₹46.00</del>
                                                <div class="row justify-content-between" style="padding:0px 21px;">
                                                    <div class="cart-plus-minus p-0">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select">
                                                        <option selected>kg</option>
                                                        <option> kg-1 </option>
                                                        <option> kg-2 </option>
                                                        <option> kg-3 </option>
                                                        <option> kg-4 </option>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row">
                                                <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/2.png" alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                            <div class="product-price">
                                                <span>₹32.00</span>
                                                <del>₹46.00</del>
                                                <div class="row justify-content-between" style="padding:0px 21px;">
                                                    <div class="cart-plus-minus p-0">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select">
                                                        <option selected>kg</option>
                                                        <option> kg-1 </option>
                                                        <option> kg-2 </option>
                                                        <option> kg-3 </option>
                                                        <option> kg-4 </option>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row">
                                                <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="<?=base_url()?>assets/frontend/img/product/3.png" alt="#"></a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="sale-badge"><a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                                            <div class="product-price">
                                                <span>₹32.00</span>
                                                <del>₹46.00</del>
                                                <div class="row justify-content-between" style="padding:0px 21px;">
                                                    <div class="cart-plus-minus p-0">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select">
                                                        <option selected>kg</option>
                                                        <option> kg-1 </option>
                                                        <option> kg-2 </option>
                                                        <option> kg-3 </option>
                                                        <option> kg-4 </option>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row">
                                                <a href="cart.html"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
                </div>



<!---=================================================================================-->

    <!-- PRODUCT TAB AREA END -->
        <!--==============banner========================-->


    <div class="container-fluid p-0 mt-5">
        <img src="<?=base_url()?>assets/frontend/img\bg\2.jpg" class="img-fluid">
    </div>

    <!--==============banner========================-->

    <!-- TESTIMONIAL AREA START (testimonial-4) -->
    <div class="ltn__testimonial-area section-bg-1 pt-60 pb-35  "  style="overflow:hidden;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                <h1 class="section-title">Testimonials</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="<?=base_url()?>assets/frontend/img/testimonial/6.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="<?=base_url()?>assets/frontend/img/testimonial/7.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="<?=base_url()?>assets/frontend/img/testimonial/1.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="<?=base_url()?>assets/frontend/img/testimonial/2.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="<?=base_url()?>assets/frontend/img/testimonial/5.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->
