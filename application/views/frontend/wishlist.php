<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
          <div class="section-title-area ltn__section-title-2">
            <h1 class="section-title white-color">Wishlist</h1>
          </div>
          <div class="ltn__breadcrumb-list">
            <ul>
              <li><a href="<?=base_url()?>Home">Home</a></li>
              <li>Wishlist</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMB AREA END -->


<!-- WISHLIST AREA START -->
<!-- FEATURE AREA END -->
<div class="container col-12 mt-5">
  <div class="tab-content">
    <div class="tab-pane fade active show" id="liton_product_grid">
      <div class="ltn__product-tab-content-inner ltn__product-grid-view">
        <div class="row" id="wishlist">
          <?if(!empty($wish_check)){
            foreach($wish_data->result() as $wish){
              $this->db->select('*');
              $this->db->from('tbl_product');
              $this->db->where('is_active', 1);
              $this->db->where('id', $wish->product_id);
              $product = $this->db->get()->row();
              $this->db->select('*');
              $this->db->from('tbl_type');
              $this->db->where('is_active', 1);
              $this->db->where('id', $wish->type_id);
              $type= $this->db->get()->row();
            ?>
          <!-- ltn__product-item -->
          <div class="col-xl-3 col-md-3 col-sm-6 col-6">
            <div class="ltn__product-item ltn__product-item-3 text-center">
              <div class="product-img">
                <a href="<?=base_url()?>Home/product_detail/<?=base64_encode($wish->product_id)?>"><img src="<?=base_url().$product->image1?>" alt="#"></a>
                <div class="prod">
                  <ul>
                    <li class="sale-badge"><a href="javascript:;" title="Remove" onclick="wishlist(this)" product_id="<?=base64_encode($wish->product_id)?>" type_id="<?=base64_encode($wish->type_id)?>" id="add_wish" status="remove" user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                        <h5>X</h5>
                      </a></li>
                  </ul>
                </div>

              </div>
              <div class="product-info">
                <h2 class="product-title"><a href="product-details.html">Carrots Group Scal</a></h2>
                <div class="product-price">
                  <span>₹<?=$type->spgst?></span>
                  <del>₹<?=$type->mrp?></del>
                </div>
                <div class="row justify-content-center">
                  <a href="javascript:;" product_id="<?=base64_encode($type->product_id)?>" type_id="<?=base64_encode($type->id)?>" id="addToCart<?=$type->id?>" quantity=1 onclick="addToCartOnline(this)"><button class="btn theme-btn-1 btn-effect-1"><i class="fas fa-shopping-cart">&nbsp;&nbsp;Add to cart</i></button></a>
                </div>
              </div>
            </div>
          </div>
          <?}
        }else{?>
          <div class="tab-pane fade show active">
            <h4>No items found in your wishlist</h4>
          </div>
            <?}?>


        </div>
      </div>
    </div>
  </div>
</div>
</div>
