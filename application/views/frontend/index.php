    <!-- ========================================================SLIDER AREA START======================================== (slider-3) -->
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">



      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <?$i=1; foreach ($slider_data->result() as $slider) {?>
        <div class="carousel-item <?if ($i==1) {
    echo " active"; }?>">
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
          <?foreach ($category_data->result() as $category) {?>
          <div class="col-12">
            <div class="ltn__category-item ltn__category-item-3 text-center">
              <div class="ltn__category-item-img">
                <a href="javascript:;">
                  <img src="<?=base_url().$category->image?>" alt="Image">
                </a>
              </div>
              <div class="ltn__category-item-name">
                <h5><a href="javascript:;"><?=$category->name;?></a></h5>
                <h6>
                  <?$this->db->select('*');
                            $this->db->from('tbl_product');
                            $this->db->where('is_active', 1);
                            $this->db->where('category_id', $category->id);
                            $to_count = $this->db->count_all_results();
                            echo "(".$to_count." item)";
                            ?>
                </h6>
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
                <?$s = 1; foreach ($subcategory->result() as $subcat) {?>
                <a <?if ($s==1) { echo "class='active show'" ; }?> data-toggle="tab" href="#liton<?=$subcat->id?>"><?=$subcat->name;?></a>
                <?$s++;}?>
              </div>
            </div>
            <div class="tab-content">
              <?$s = 1; foreach ($subcategory->result() as $subcat) {
                                $this->db->select('*');
                                $this->db->from('tbl_product');
                                $this->db->where('is_active', 1);
                                $this->db->where('subcategory_id', $subcat->id);
                                $product_data = $this->db->get(); ?>
              <div class="tab-pane fade  <?if ($s==1) {
                                    echo " active show"; } ?> " id="liton<?=$subcat->id?>">
                <div class="ltn__product-tab-content-inner">
                  <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                    <?foreach ($product_data->result() as $product) {
                                    $this->db->select('*');
                                    $this->db->from('tbl_type');
                                    $this->db->where('is_active', 1);
                                    $this->db->where('product_id', $product->id);
                                    $type_data = $this->db->get();
                                    $type_row = $type_data->row(); ?>
                    <!-- ltn__product-item -->
                    <div class="col-lg-12">
                      <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                          <a href="<?=base_url()?>Home/product_detail/<?=base64_encode($product->id)?>"><img src="<?=base_url().$product->image1?>" alt="#"></a>
                          <?if (!empty($this->session->userdata('user_data'))) {?>
                          <div class="product-badge">
                            <ul>
                              <?$this->db->select('*');
                                $this->db->from('tbl_wishlist');
                                $this->db->where('type_id', $type_row->id);
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $wishlist_data= $this->db->get()->row();
                                if (empty($wishlist_data)) {?>
                              <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish" status="add"
                                  user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                  <i class="far fa-heart iconn"></i></a></li>
                              <?} else {?>
                              <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish" status="remove"
                                  user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                  <i class="far fa-heart iconn"></i></a></li>
                              <?}?>
                            </ul>
                          </div>
                          <?} ?>
                        </div>
                        <div class="product-info">
                          <h2 class="product-title"><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($type_row->product_id)?>"><?=$product->name?></a></h2>
                          <div class="product-price">
                            <span id="typespgst<?=$product->id?>">₹<?=$type_row->spgst?></span>
                            <del id="typemrp<?=$product->id?>">₹<?=$type_row->mrp?></del>
                            <div class="row justify-content-center" style="padding:0px 0px;">
                              <div class="cart-plus-minus p-0">
                                <div class="dec qtybutton" onclick="incdeec(<?=$product->id?>,1)">-</div>
                                <input type="text" value="1" id="quantity<?=$product->id?>" readonly name="qtybutton" class="cart-plus-minus-box">
                                <div class="inc qtybutton" onclick="incdeec(<?=$product->id?>,2)">+</div>
                              </div>
                              <select class="select ml-3" id="myselect" changes="<?=$product->id?>" onchange="type_change(this)">
                                <?foreach ($type_data->result() as $type) {?>
                                <option value="<?=base64_encode($type->id)?>"><?=$type->name?></option>
                                <?} ?>
                              </select>
                            </div>

                          </div>
                          <div class="row justify-content-center">
                            <?if (empty($this->session->userdata('user_data'))) {?>
                            <a href="javascript:void(0)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart<?=$product->id?>" quantity=1 onclick="addToCartOffline(this)"><button
                                class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                            <?} else {?>
                            <a href="javascript:void(0)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart<?=$product->id?>" quantity=1 onclick="addToCartOnline(this)"><button
                                class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                            <?} ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?
                                } ?>

                    <!--  -->
                  </div>
                </div>
              </div>
              <?$s++;
                            }?>
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
              <h1 class="section-title">Trending Products</h1>
            </div>

            <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">

            </div>
            <div class="tab-content">
              <div class="tab-pane fade active show" id="liton_tab_3_1">
                <div class="ltn__product-tab-content-inner">
                  <div class="row ltn__tab-product-slider-one-active slick-arrow-1 col-md-12">
                    <!-- ltn__product-item -->
                    <?php $i=1; foreach ($feature_data->result() as $feature) {
                                $this->db->select('*');
                                $this->db->from('tbl_type');
                                $this->db->where('is_active', 1);
                                $this->db->where('product_id', $feature->id);
                                $type_data = $this->db->get();
                                $type_row = $type_data->row(); ?>
                                <div class="col-lg-12">
                                  <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                      <a href="<?=base_url()?>Home/product_detail/<?=base64_encode($feature->id)?>"><img src="<?=base_url().$feature->image1?>" alt="#"></a>
                                      <?if (!empty($this->session->userdata('user_data'))) {?>
                                      <div class="product-badge">
                                        <ul>
                                          <?$this->db->select('*');
                                            $this->db->from('tbl_wishlist');
                                            $this->db->where('type_id', $type_row->id);
                                            $this->db->where('user_id', $this->session->userdata('user_id'));
                                            $wishlist_data= $this->db->get()->row();
                                            if (empty($wishlist_data)) {?>
                                          <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish" status="add"
                                              user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                              <i class="far fa-heart iconn"></i></a></li>
                                          <?} else {?>
                                          <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish" status="remove"
                                              user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                              <i class="far fa-heart iconn"></i></a></li>
                                          <?}?>
                                        </ul>
                                      </div>
                                      <?} ?>
                                    </div>
                                    <div class="product-info">
                                      <h2 class="product-title"><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($type_row->product_id)?>"><?=$feature->name?></a></h2>
                                      <div class="product-price">
                                        <span id="typespgst<?="Ft".$feature->id?>">₹<?=$type_row->spgst?></span>
                                        <del id="typemrp<?="Ft".$feature->id?>">₹<?=$type_row->mrp?></del>
                                        <div class="row justify-content-center" style="padding:0px 0px;">
                                          <div class="cart-plus-minus p-0">
                                            <div class="dec qtybutton" onclick="incdeec('<?="Ft".$feature->id?>',1)">-</div>
                                            <input type="text" value="1" id="quantity<?="Ft".$feature->id?>" readonly name="qtybutton" class="cart-plus-minus-box">
                                            <div class="inc qtybutton" onclick="incdeec('<?="Ft".$feature->id?>',2)">+</div>
                                          </div>
                                          <select class="select ml-3" id="myselect" changes="<?="Ft".$feature->id?>" onchange="type_change(this)">
                                            <?foreach ($type_data->result() as $type) {?>
                                            <option value="<?=base64_encode($type->id)?>"><?=$type->name?></option>
                                            <?} ?>
                                          </select>
                                        </div>

                                      </div>
                                      <div class="row justify-content-center">
                                        <?if (empty($this->session->userdata('user_data'))) {?>
                                        <a href="javascript:void(0)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart<?="Ft".$feature->id?>" quantity=1 onclick="addToCartOffline(this)"><button
                                            class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                                        <?} else {?>
                                        <a href="javascript:void(0)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart<?="Ft".$feature->id?>" quantity=1 onclick="addToCartOnline(this)"><button
                                            class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                                        <?} ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                    <?
                            }?>


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
    <div class="ltn__testimonial-area section-bg-1 pt-60 pb-35" style="overflow:hidden;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 text-center">
              <h1 class="section-title">Testimonials</h1>
            </div>
          </div>
        </div>
        <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">

          <?php $i=1; foreach ($testimonials_data->result() as $testimonials) { ?>
          <div class="col-lg-12">
            <div class="ltn__testimonial-item ltn__testimonial-item-4">
              <div class="ltn__testimoni-img">
                <img src="<?=base_url().$testimonials->image?>?>" alt="#">
              </div>
              <div class="ltn__testimoni-info">
                <p><?=$testimonials->text?></p>
                <h4><?=$testimonials->name?></h4>
              </div>
              <div class="ltn__testimoni-bg-icon">
                <i class="far fa-comments"></i>
              </div>
            </div>
          </div>
          <?php $i++; } ?>

        </div>
      </div>
    </div>
    <!-- TESTIMONIAL AREA END -->
