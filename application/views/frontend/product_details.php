<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?=base_url()?>assets/frontend/img/bg/9.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
          <div class="section-title-area ltn__section-title-2">
            <h1 class="section-title white-color">Product Detail</h1>
          </div>
          <div class="ltn__breadcrumb-list">
            <ul>
              <li><a href="<?=base_url()?>Home/">Home</a></li>
              <li>Product Detail</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMB AREA END -->


<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area" style="margin-top:70px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="ltn__shop-details-inner mb-60">
          <div class="row">
            <div class="col-md-6">
              <div class="ltn__shop-details-img-gallery">
                <div class="ltn__shop-details-large-img">
                  <div class="single-large-img">
                    <a href="img/product/1.png" data-rel="lightcase:myCollection">
                      <img src="<?=base_url().$product_data->image1?>" alt="Image">
                    </a>
                  </div>
                  <div class="single-large-img">
                    <a href="img/product/2.png" data-rel="lightcase:myCollection">
                      <img src="<?=base_url().$product_data->image2?>" alt="Image">
                    </a>
                  </div>
                  <div class="single-large-img">
                    <a href="img/product/3.png" data-rel="lightcase:myCollection">
                      <img src="<?=base_url().$product_data->image3?>" alt="Image">
                    </a>
                  </div>
                  <div class="single-large-img">
                    <a href="img/product/4.png" data-rel="lightcase:myCollection">
                      <img src="<?=base_url().$product_data->image4?>" alt="Image">
                    </a>
                  </div>
                </div>
                <div class="ltn__shop-details-small-img slick-arrow-2">
                  <div class="single-small-img">
                    <img src="<?=base_url().$product_data->image1?>" alt="Image">
                  </div>
                  <div class="single-small-img">
                    <img src="<?=base_url().$product_data->image2?>" alt="Image">
                  </div>
                  <div class="single-small-img">
                    <img src="<?=base_url().$product_data->image3?>" alt="Image">
                  </div>
                  <div class="single-small-img">
                    <img src="<?=base_url().$product_data->image4?>" alt="Image">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="modal-product-info shop-details-info pl-0">
                <h3><?=$product_data->name?></h3>
                <?
                  $this->db->select('*');
                  $this->db->from('tbl_type');
                  $this->db->where('is_active', 1);
                  $this->db->where('product_id', $product_data->id);
                  $type_data = $this->db->get();
                  $type_row = $type_data->row();
                  ?>
                <div class="product-price" style="font-size:30px;">
                  <del>₹<?=$type_row->mrp?></del><br>
                  <span>₹<?=$type_row->spgst?></span>

                </div>
                <ul style="list-style:none;display:flex;">
                  <li style="font-size:20px;">Type:</li>


                  <li class="ml-3">
                    <select>
                      <?foreach($type_data->result() as $type){?>
                      <option onclick="type_change(<?=$type->id?>)" value="<?=$type->id?>"><?=$type->name?></option>
                      <?}?>
                    </select>
                  </li>
                  <li style="font-size:20px; margin-left: 13px;">Qty:</li>


                  <li class=" ml-3">
                    <div class="cart-plus-minus p-0">
                      <div class="dec qtybutton" onclick="incdeec(<?=$product_data->id?>,1)">-</div>
                      <input type="text" value="1" id="quantity<?=$product_data->id?>" readonly name="qtybutton" class="cart-plus-minus-box">
                      <div class="inc qtybutton" onclick="incdeec(<?=$product_data->id?>,2)">+</div>
                    </div>
                  </li>


                </ul>

                <div class="ltn__product-details-menu-3">
                  <ul>
                    <li>
                    <?if(empty($this->session->userdata('user_data'))){?>
                      <a href="javascript:void(0)" class="theme-btn-1 btn btn-effect-1" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart" quantity=1 onclick="addToCartOffline(this)">
                        <i class="fas fa-shopping-cart"></i>
                        <span>ADD TO CART</span>
                      </a>
                      <?}else{?>
                        <a href="javascript:void(0)" class="theme-btn-1 btn btn-effect-1" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart" quantity=1 onclick="addToCartOnline(this)">
                          <i class="fas fa-shopping-cart"></i>
                          <span>ADD TO CART</span>
                        </a>
                        <?}?>
                    </li>
                    <?if(!empty($this->session->userdata('user_data'))){?>
                    <li>
                      <a href="broccoli/wishlist.html" class="theme-btn-1 btn btn-effect-1" title="Wishlist">
                        <i class="far fa-heart"></i>
                        <span>ADD TO WISHLIST</span>
                      </a>
                    </li>
                    <?}?>

                  </ul>
                </div>
                <hr>

                <div class="nav">
                  <a class="active show" data-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                  <!-- <a data-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a> -->
                </div>

                <div class="tab-content">
                  <div class="tab-pane fade active show">
                    <div class="">
                      <!-- <h4 class="title-2">Lorem ipsum dolor sit amet elit.</h4> -->
                      <p><?=$product_data->description?></p>

                    </div>
                  </div>
                  <hr>
                  <!-- <div class="ltn__safe-checkout">
                                        <h5>Guaranteed Safe Checkout</h5>
                                        <img src="<?=base_url()?>assets/frontend/img/icons/payment-2.png" alt="Payment Image">
                                    </div> -->
                </div>
              </div>
            </div>
          </div>






          <!-- Related Products Slider -->


          <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-70 mt-5">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Related Products</h1>
                  </div>

                  <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">

                  </div>
                  <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_3_1">
                      <div class="ltn__product-tab-content-inner">
                        <div class="row ltn__tab-product-slider-one-active slick-arrow-1 col-md-12">
                          <?php $i=1; foreach($related_data->result() as $feature) {
                            $this->db->select('*');
                            $this->db->from('tbl_type');
                            $this->db->where('is_active', 1);
                            $this->db->where('product_id', $feature->id);
                            $type_data = $this->db->get();
                            $type_row = $type_data->row();?>
                            <div class="col-lg-12">
                              <div class="ltn__product-item ltn__product-item-3 text-center">
                                <div class="product-img">
                                  <a href="<?=base_url()?>Home/product_detail/<?=base64_encode($feature->id)?>"><img src="<?=base_url().$feature->image1?>" alt="#"></a>
                                  <?if(!empty($this->session->userdata('user_data'))){?>
                                  <div class="product-badge">
                                    <ul>
                                      <?$this->db->select('*');
                                        $this->db->from('tbl_wishlist');
                                        $this->db->where('type_id',$type_row->id);
                                        $this->db->where('user_id',$this->session->userdata('user_id'));
                                        $wishlist_data= $this->db->get()->row();
                                        if(empty($wishlist_data)){?>
                                      <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish" status="add" user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                          <i class="far fa-heart iconn"></i></a></li>
                                          <?}else{?>
                                      <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish" status="remove" user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                          <i class="far fa-heart-fill iconn"></i></a></li>
                                                <?}?>
                                    </ul>
                                  </div>
                                  <?}?>
                                </div>
                                <div class="product-info">
                                  <h2 class="product-title"><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($feature->id)?>"><?=$feature->name?></a></h2>
                                  <div class="product-price">
                                    <span id="typespgst">₹<?=$type_row->spgst?></span>
                                    <del id="typemrp">₹<?=$type_row->mrp?></del>
                                    <div class="row justify-content-center" style="padding:0px 0px;">
                                      <div class="cart-plus-minus p-0">
                                        <div class="dec qtybutton" onclick="incdeec(<?=$type_row->id?>,1)">-</div>
                                        <input type="text" value="1" id="quantity<?=$type_row->id?>" readonly name="qtybutton" class="cart-plus-minus-box">
                                        <div class="inc qtybutton" onclick="incdeec(<?=$type_row->id?>,2)">+</div>
                                      </div>
                                      <select class="select ml-3" onchange="typechange(this)">
                                        <?foreach($type_data->result() as $type){?>
                                        <option value="<?=$type->id?>"><?=$type->name?></option>
                                        <?}?>
                                      </select>
                                    </div>

                                  </div>
                                  <div class="row justify-content-center">
                                    <?if(empty($this->session->userdata('user_data'))){?>
                                    <a href="javascript:void(0)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart<?=$type_row->id?>" quantity=1 onclick="addToCartOffline(this)"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                                    <?}else{?>
                                      <a href="javascript:void(0)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="addToCart<?=$type_row->id?>" quantity=1 onclick="addToCartOnline(this)"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                                      <?}?>
                                  </div>
                                </div>
                              </div>
                            </div>
      <?}?>

                          <!-- ltn__product-item -->


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
  <script>
    function incdeec(i, pm) {
      var oldValue = $("#quantity" + i).val()
      if (pm == 2) {
        var newVal = parseFloat(oldValue) + 1;
      } else {
        if (oldValue > 1) {
          var newVal = parseFloat(oldValue) - 1;
        } else {
          newVal = 1;
        }
      }
      // $button.parent().find("input").val(newVal);
      $("#addToCart").attr('quantity', newVal)
      $("#quantity" + i).val(newVal)
    }
  </script>
  <script>
  function type_change(typeid){
    alert()
  }
  </script>
