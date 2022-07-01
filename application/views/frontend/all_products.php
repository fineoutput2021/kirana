<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-3 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h1 class="section-title white-color">Shop</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?=base_url()?>Home/">Home</a></li>
                            <li><a href="javascript:;">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


<div class="ltn__slider-area ltn__slider-3---  section-bg-1--- mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- CATEGORY-MENU-LIST START -->
                    <div class="ltn__category-menu-wrap">
                        <div class="ltn__category-menu-title">
                            <h2 class="section-bg-2--- ltn__secondary-bg text-color-white">categories</h2>
                        </div>
                        <div class="ltn__category-menu-toggle ltn__one-line-active">
                            <ul>


                              <?php $i=1; foreach($category_data->result() as $category) { ?>
                                <!-- Submenu Column - unlimited -->
                                <li class="ltn__category-menu-item ltn__category-menu-drop">
                                    <a href="javascript:void(0)"><i class="icon-shopping-bags"></i><?=$category->name?></a>
                                    <ul class="ltn__category-submenu ltn__category-column-5">
                                      <?$this->db->select('*');
                                      $this->db->from('tbl_subcategory');
                                      $this->db->where('is_active', 1);
                                      $this->db->where('category_id', $category->id);
                                      $subcat_data = $this->db->get();
                                      foreach($subcat_data->result() as $subcat){
                                      ?>
                                        <li class="ltn__category-submenu-title ltn__category-menu-drop"><a href="<?=base_url()?>Home/all_products/<?=base64_encode($subcat->id)?>"><?=$subcat->name;?></a>
                                            <ul class="ltn__category-submenu-children">
                                              <?$this->db->select('*');
                                              $this->db->from('tbl_product');
                                              $this->db->where('is_active', 1);
                                              $this->db->where('subcategory_id', $subcat->id);
                                              $pro_da = $this->db->get();
                                              foreach($pro_da->result() as $pro){
                                              ?>
                                                <li><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($pro->id)?>"><?=$pro->name;?> </a></li>
                                                <?}?>
                                            </ul>
                                        </li>
                                        <?}?>
                                    </ul>
                                </li>
<?}?>


                                <!-- Show more menu -->
                                <!-- <li class="ltn__category-menu-more-item-child">
                                    <a href="#"><i class="icon-shopping-bags"></i>Apple Juice</a>
                                    <ul class="ltn__category-submenu">
                                        <li class="ltn__category-submenu-title ltn__category-menu-drop"><a href="javascript:void(0)">Handbags</a>
                                            <ul class="ltn__category-submenu-children">
                                                <li><a href="javascript:void(0)">Clutches</a></li>
                                                <li><a href="javascript:void(0)">Cross Body</a></li>
                                                <li><a href="javascript:void(0)">Satchels</a></li>
                                                <li><a href="javascript:void(0)">Sholuder</a></li>
                                                <li><a href="javascript:void(0)">Toter</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="ltn__category-menu-more-item-parent">
                                    <a class="rx-default">
                                        More categories <span class="cat-thumb  icon-plus"></span>
                                    </a>
                                    <a class="rx-show">
                                        close menu <span class="cat-thumb  icon-remove"></span>
                                    </a>
                                </li> -->
                                <!-- Single menu end -->
                            </ul>
                        </div>
                    </div>
                <!-- END CATEGORY-MENU-LIST -->
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                              <?foreach($products_data->result() as $product){?>
                                <!-- ltn__product-item -->
                                <div class="col-xl-4 col-sm-6 col-6">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="<?=base_url()?>Home/product_detail/<?=base64_encode($product->id)?>"><img src="<?=base_url().$product->image1?>" alt="#"></a>
                                            <?if(!empty($this->session->userdata('user_data'))){?>
                                            <div class="product-badge">
                                                <!-- <ul>
                                                    <li class="sale-badge"><a href="javascript:void(0)" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart iconn"></i></a></li>
                                                </ul> -->
                                            </div>
                                            <?}?>

                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($product->id)?>"><?=$product->name?></a></h2>
                                            <?$this->db->select('*');
                                            $this->db->from('tbl_type');
                                            $this->db->where('is_active', 1);
                                            $this->db->where('product_id', $product->id);
                                            $type_data = $this->db->get();
                                            $first_type = $type_data->row();
                                            ?>
                                            <div class="product-price">
                                                <span>₹<?=$first_type->spgst?></span>
                                                <del>₹<?=$first_type->mrp?></del>
                                                <div class="row justify-content-center" style="padding:0px 0px;">
                                                    <div class="cart-plus-minus ">
                                                        <input type="text" value="1" readonly name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                    <select class="select ml-3">
                                                      <?foreach($type_data->result() as $type){?>
                                                        <option value="<?=$type->id?>"><?=$type->name?></option>
                                                        <?}?>
                                                    </select>
                                            </div>

                                            </div>
                                            <div class="row justify-content-center">
                                              <?if(empty($this->session->userdata('user_data'))){
                                                $this->db->select('*');
                                                $this->db->from('tbl_cart');
                                                // $this->db->where('user_id', base64_decode($this->session->userdata('user_id')));
                                                $this->db->where('type_id', $type->id);
                                                $cartCheck = $this->db->get()->row();
                                                if(empty($cartCheck)){
                                                ?>
                                               <a href="javascript:void(0)" product_id="<?=base64_encode($type->product_id)?>" type_id="<?=base64_encode($type->id)?>" id="addToCart" quantity=1 onclick="addToCartOffline(this)"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                               <?}else{?>
                                                 <a href="javascript:void(0)" product_id="<?=base64_encode($type->product_id)?>" type_id="<?=base64_encode($type->id)?>" id="addToCart" quantity=1 onclick="deleteCartOnline(this)"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Remove from cart</i></button></a>
                                               <?}
                                             }else{?>
                                                  <a href="javascript:void(0)" product_id="<?=base64_encode($type->product_id)?>" type_id="<?=base64_encode($type->id)?>" id="addToCart" quantity=1 onclick="addToCartOnline(this)"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart" >&nbsp;&nbsp;Add to cart</i></button></a>
                                                   <?}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </div>



                </div>

                </div>
        </div>
    </div>
</div>
