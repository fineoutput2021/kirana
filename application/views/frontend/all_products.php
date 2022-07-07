<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-3 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h1 class="section-title white-color"><?=$subcategoryName?></h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?=base_url()?>Home/">Home</a></li>
                            <li><a href="javascript:;"><?=$subcategoryName?></a></li>
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
                                        <li class=" "><a href="<?=base_url()?>Home/all_products/<?=base64_encode($subcat->id)?>"><?=$subcat->name;?></a>
                                            <!-- <ul class="ltn__category-submenu-children">
                                              <?$this->db->select('*');
                                              $this->db->from('tbl_product');
                                              $this->db->where('is_active', 1);
                                              $this->db->where('subcategory_id', $subcat->id);
                                              $pro_da = $this->db->get();
                                              foreach($pro_da->result() as $pro){
                                              ?>
                                                <li><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($pro->id)?>"><?=$pro->name;?> </a></li>
                                                <?}?>
                                            </ul> -->
                                        </li>
                                        <?}?>
                                    </ul>
                                </li>
<?}?>


                            </ul>
                        </div>
                    </div>
                <!-- END CATEGORY-MENU-LIST -->
            </div>
            <div class="col-lg-9">
              <div class="ltn__shop-options">
                  <ul>
                      <li>
                          <div class="ltn__grid-list-tab-menu ">

                          </div>
                      </li>
                      <li>
                         <div class="showing-product-number text-right">
                              <!-- <span>Showing 1–12 of 18 results</span> -->
                          </div>
                      </li>
                      <li>
                         <div class="short-by text-center">
                              <select onchange="filter(this)" class="nice-select">
                                  <option value="">Default Sorting</option>
                                  <option value="AZ">Sort by A-Z</option>
                                  <option value="ZA">Sort by Z-A</option>
                                  <!-- <option value="NA">Sort by New Arrivals</option>
                                  <option value="FP">Sort by Trending Products</option> -->

                              </select>
                          </div>
                      </li>
                  </ul>
              </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                              <?foreach($products_data->result() as $product){
                                              $this->db->select('*');
                                              $this->db->from('tbl_type');
                                              $this->db->where('is_active', 1);
                                              $this->db->where('product_id', $product->id);
                                              $type_data = $this->db->get();
                                              $type_row = $type_data->row();
                                              if(!empty($type_row)){
                                               ?>
                                <!-- ltn__product-item -->
                                <div class="col-xl-4 col-sm-6 col-6">
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
                                          <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish<?=$product->id?>" status="add"
                                              user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                              <i class="far fa-heart iconn"></i></a></li>
                                          <?} else {?>
                                          <li class="sale-badge"><a href="javascript:;" title="Wishlist" onclick="wishlist(this)" product_id="<?=base64_encode($type_row->product_id)?>" type_id="<?=base64_encode($type_row->id)?>" id="add_wish<?=$product->id?>" status="remove"
                                              user_id="<?=base64_encode($this->session->userdata('user_id'))?>">
                                              <i class="far fa-heart iconn"></i></a></li>
                                          <?}?>
                                        </ul>
                                      </div>
                                      <?} ?>
                                    </div>
                                    <div class="product-info">
                                      <h2 class="product-title text"><a href="<?=base_url()?>Home/product_detail/<?=base64_encode($type_row->product_id)?>"><?=$product->name?></a></h2>
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
                                <?}}?>
                            </div>
                        </div>
                    </div>



                </div>

                </div>
        </div>
    </div>
</div>
<script>
function filter(obj){
  var filter = $(obj).val();
  window.location.href='<?=base_url()?>Home/all_products/<?=$id?>/'+filter;
}
</script>
