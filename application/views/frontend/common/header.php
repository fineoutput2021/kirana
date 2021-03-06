<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Apna Kirana Store</title>
  <meta name="robots" content="noindex, follow" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Place favicon.png in the root directory -->
  <link rel="shortcut icon" href="<?=base_url()?>assets/frontend/img/favicon.png" type="image/x-icon" />
  <!-- Font Icons css -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/font-icons.css">
  <!-- plugins css -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/plugins.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css\style.css">

  <!-- Main Stylesheet -->
  <!-- Responsive css -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/responsive.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/frontend/js/bootstrap-notify.min.js"></script>
  <style>
    .nice-select>ul {
      display: grid;
    }
  </style>
</head>

<body>
  <!-- Body main wrapper start -->
  <div class="body-wrapper">

    <!-- HEADER AREA START (header-5) -->
    <header class="ltn__header-area ltn__header-5 ltn__header-transparent-- gradient-color-4---">
      <!-- ltn__header-top-area start -->

      <!-- ltn__header-top-area end -->

      <!-- ltn__header-middle-area start -->
      <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white sticky-active-into-mobile plr--9---" style="background-color: white;">
        <div class="container">
          <div class="row">
            <div class="row">
              <div class="mobile-menu-toggle d-xl-none col-3 col-md-3 col-lg-3 mob1 mob2">
                <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                  <svg viewBox="0 0 800 600">
                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                    <path d="M300,320 L540,320" id="middle"></path>
                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                  </svg>
                </a>
              </div>
              <div class="col-6 col-md-6 col-lg-6 text-center d-lg-none mob1">
                <a href="<?=base_url()?>Home"><img src="<?=base_url()?>assets/frontend/img\brand-logo\kirana_logo.png" alt="Logo" style="text-align:center;"></a>
              </div>
              <!-- Mobile Menu Button -->

              <div class="col-3 col-md-3 col-lg-6 text-right mob1">
                <a href="<?=base_url()?>Home/cart" title="Shoping Cart" class="d-xl-none ">
                  <span class="utilize-btn-icon">
                    <i class="fas fa-shopping-cart" style="font-size:30px;"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col header-menu-column" style="display:flex;">
              <div class="site-logo-wrap">
                <div class="site-logo">
                  <a href="<?=base_url()?>Home"><img src="<?=base_url()?>assets/frontend/img\brand-logo\kirana_logo.png" alt="Logo" style="text-align:center;"></a>
                </div>
              </div>

              <div class="col header-menu-column menu-color-white---">
                <div class="header-menu ">
                  <nav class="">
                    <div class="ltn__main-menu" style="margin-left:160px;">
                      <ul>
                        <li class="menu-icon"><a href="<?=base_url()?>Home">Home</a>

                        </li>
                        <li class="ltn__category-menu-item ltn__category-menu-drop"><a href="javascript:void">Shop By All Categories<i class="fa fa-caret-down"></i></a>
                          <ul class="mega-menu">
                            <?$this->db->select('*');
                                          $this->db->from('tbl_category');
                                          $this->db->where('is_active', 1);
                                          $category_data = $this->db->get();
                                          foreach($category_data->result() as $category){
                                          ?>
                            <li><b><a href="javascript:void(0)"><?=$category->name;?></a></b>
                              <ul>
                                <?$this->db->select('*');
                                                  $this->db->from('tbl_subcategory');
                                                  $this->db->where('is_active', 1);
                                                  $this->db->where('category_id', $category->id);
                                                  $subcategory_data= $this->db->get();
                                                  foreach($subcategory_data->result() as $subcategory){
                                                  ?>
                                <li><a href="<?=base_url()?>Home/all_products/<?=base64_encode($subcategory->id)?>"><?=$subcategory->name;?></a></li>
                                <?}?>
                              </ul>
                            </li>
                            <?}?>
                          </ul>
                        </li>


                        <li><a href="<?=base_url()?>Home/about">About</a>
                        </li>

                        <li><a href="<?=base_url()?>Home/contact">Contact</a></li>
                        <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                          <!-- header-search-1 -->
                          <div class="header-search-wrap">
                            <div class="header-search-1">
                              <div class="search-icon">
                                <i class="icon-search for-search-show"></i>
                                <i class="icon-cancel  for-search-close"></i>
                              </div>
                            </div>
                            <div class="header-search-1-form">
                              <form id="searcH" method="GET" action="<?=base_url()?>Home/search">
                                <input type="text" name="search" value="" placeholder="Search here..." />
                                <button type="submit">
                                  <span><i class="icon-search"></i></span>
                                </button>
                              </form>
                            </div>
                          </div>
                          <!-- user-menu -->
                          <div class="ltn__drop-menu user-menu">
                            <ul>
                              <li>
                                <a href="#"><i class="icon-user"></i></a>
                                <ul>
                                  <?if(empty($this->session->userdata('user_data'))){?>
                                  <li><a href="<?=base_url()?>Home/sign_in">Sign in</a></li>
                                  <li><a href="<?=base_url()?>Home/register">Register</a></li>
                                  <?}else{?>
                                  <li><a href="<?=base_url()?>Home/my_profile">My Account</a></li>
                                  <li><a href="<?=base_url()?>Home/wishlist">Wishlist</a></li>
                                  <li><a href="<?=base_url()?>User/logout">Logout</a></li>
                                  <?}?>
                                </ul>
                              </li>
                            </ul>
                          </div>

                          <!-- mini-cart -->
                          <div class="mini-cart-icon">
                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                              <span id="cartIcon">
                                <i class="icon-shopping-cart"></i>
                                <sup>
                                  <?if(!empty($this->session->userdata('user_data'))){
                                                  $this->db->select('*');
                                                  $this->db->from('tbl_cart');
                                                  $this->db->where('user_id', $this->session->userdata('user_id'));
                                                  $cartCount= $this->db->count_all_results();
                                                  echo $cartCount;
                                                }else{
                                                  $cart = $this->session->userdata('cart_data');
                                                  if(!empty($cart)){

                                     foreach(($this->session->userdata('cart_data')) as $cart_data){
                                       $this->db->select('*');
                                       $this->db->from('tbl_type');
                                       $this->db->where('id',$cart_data['type_id']);
                                       $this->db->where('is_active', 1);
                                       $cart_row = $this->db->get()->row();
                                       if(empty($cart_row)){
                                         $type_id = $cart_data['type_id'];
                                         $index="-1";
                                         $cart = $this->session->userdata('cart_data');
                                         if (!empty($cart)) {
                                             for ($i = 0; $i < count($cart); $i ++) {
                                                 if ($cart[$i]['type_id'] == $type_id) {
                                                     $index= $i;
                                                 }
                                             }
                                         }
                                         if ($index > -1) {
                                             $cart = $this->session->userdata('cart_data');
                                             unset($cart[$index]);
                                             $cart = array_values($cart);
                                             $this->session->set_userdata('cart_data', $cart);
                                           }
                                       }
                                     }
                                                    echo count($cart);
                                                  }else{
                                                    echo "0";
                                                  }

                                                }?>
                                </sup>
                              </span>
                            </a>
                          </div>
                          <?if(!empty($this->session->userdata('user_data'))){

                                          ?>
                          <div class="mini-cart-icon">
                            <a href="<?=base_url()?>Home/wishlist" class="">
                              <span id="wish_count">
                                <?  $this->db->select('*');
                                                  $this->db->from('tbl_wishlist');
                                                  $this->db->where('user_id', $this->session->userdata('user_id'));
                                                  $wishcount = $this->db->count_all_results();
                                                  ?>
                                <i class="fa fa-heart"></i>
                                <sup><?=$wishcount?></sup>
                              </span>
                            </a>
                          </div>
                          <?}?>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>
    <!-- HEADER AREA END -->

    <!-- Utilize Cart Menu Start -->
    <?if(!empty($this->session->userdata('user_data'))){?>
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
      <div class="ltn__utilize-menu-inner ltn__scrollbar" id="sideCartWeb">
        <div class="ltn__utilize-menu-head" style="position: sticky;
    top: 0;
    background: #fff; z-index:9999;">
          <span class="ltn__utilize-menu-title">Cart</span>
          <button class="ltn__utilize-close" onclick="closeCart()">??</button>
        </div>
        <?$this->db->select('*');
            $this->db->from('tbl_cart');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $cart_data = $this->db->get();
            $cart_check = $cart_data->row();
            if(!empty($cart_check)){
            $totalCart = 0;
            foreach($cart_data->result() as $cart){
              $this->db->select('*');
              $this->db->from('tbl_product');
              $this->db->where('id', $cart->product_id);
              $product_data = $this->db->get()->row();
              $this->db->select('*');
              $this->db->from('tbl_type');
              $this->db->where('id', $cart->type_id);
              $type_data = $this->db->get()->row();
            ?>
        <div class="mini-cart-product-area">
          <div class="mini-cart-item clearfix">
            <div class="mini-cart-img">
              <a href="#"><img src="<?=base_url().$product_data->image1?>" alt="Image"></a>
              <span class="mini-cart-item-delete" product_id="<?=base64_encode($type_data->product_id)?>" type_id="<?=base64_encode($type_data->id)?>" onclick="deleteCartOnline(this)"><i class="icon-cancel"></i></span>
            </div>
            <div class="mini-cart-info">
              <h6><a href=""><?=$product_data->name?></a><br />Type: <?=$type_data->name?></h6>
              <span class="mini-cart-quantity"><?=$cart->quantity?> x ???<?=$type_data->spgst?></span>
            </div>
          </div>
        </div>
        <?
          $totalCart = $totalCart + ($cart->quantity * $type_data->spgst);
          }?>
        <div class="mini-cart-footer">
          <div class="mini-cart-sub-total">
            <h5>Subtotal: <span>???<?=$totalCart;?></span></h5>
          </div>
          <div class="btn-wrapper">
            <a href="<?=base_url()?>Home/cart" class="theme-btn-1 btn btn-effect-1" style="font-size:13px;">View Cart</a>
          </div>
          <!-- <p>Free Shipping on All Orders Over ???100!</p> -->
        </div>
        <?}else{?>
        <div class="mini-cart-footer">
          <div class="mini-cart-sub-total">
            <h5>Subtotal: <span>???0.00</span></h5>
          </div>
          <div class="btn-wrapper">
            <a href="<?=base_url()?>Home/cart" class="theme-btn-1 btn btn-effect-1" style="font-size:13px;">View Cart</a>
          </div>
          <!-- <p>Free Shipping on All Orders Over ???100!</p> -->
        </div>
        <?}?>
      </div>
    </div>
    <?}else{?>
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
      <div class="ltn__utilize-menu-inner ltn__scrollbar" id="sideCartWeb">
        <div class="ltn__utilize-menu-head" style="position: sticky;
    top: 0;
    background: #fff; z-index:9999;">
          <span class="ltn__utilize-menu-title">Cart</span>
          <button class="ltn__utilize-close" onclick="closeCart()">??</button>
        </div>
        <?
              if (!empty($this->session->userdata('cart_data'))) {
              $totalCart = 0;
              $cart_data= $this->session->userdata('cart_data');
              foreach($cart_data as $cart){
                $this->db->select('*');
                $this->db->from('tbl_product');
                $this->db->where('id', $cart['product_id']);
                $product_data = $this->db->get()->row();
                $this->db->select('*');
                $this->db->from('tbl_type');
                $this->db->where('id', $cart['type_id']);
                $type_data = $this->db->get()->row();
              ?>
        <div class="mini-cart-product-area ">
          <div class="mini-cart-item clearfix">
            <div class="mini-cart-img">
              <a href="javascript:;"><img src="<?=base_url().$product_data->image1?>" alt="Image"></a>
              <span class="mini-cart-item-delete" product_id="<?=base64_encode($type_data->product_id)?>" type_id="<?=base64_encode($type_data->id)?>" onclick="deleteCartOffline(this)"><i class="icon-cancel"></i></span>
            </div>
            <div class="mini-cart-info">
              <h6><a href="javascript:;"> <?=$product_data->name?></a><br />Type: <?=$type_data->name?></h6>
              <span class="mini-cart-quantity"><?=$cart['quantity']?> x ???<?=$type_data->spgst?></span>
            </div>
          </div>
        </div>
        <?
            $totalCart = $totalCart + ($cart['quantity'] * $type_data->spgst);
            }?>
        <div class="mini-cart-footer" style="position: sticky;
    bottom: 0;
    background: #fff;">
          <div class="mini-cart-sub-total">
            <h5>Subtotal: <span>???<?=$totalCart;?></span></h5>
          </div>
          <div class="btn-wrapper">
            <a href="<?=base_url()?>Home/cart" class="theme-btn-1 btn btn-effect-1" style="font-size:13px;">View Cart</a>
          </div>
          <!-- <p>Free Shipping on All Orders Over ???100!</p> -->
        </div>
        <?}else{?>
        <div class="mini-cart-footer">
          <div class="mini-cart-sub-total">
            <h5>Subtotal: <span>???0.00</span></h5>
          </div>
          <div class="btn-wrapper">
            <a href="<?=base_url()?>Home/cart" class="theme-btn-1 btn btn-effect-1" style="font-size:13px;">View Cart</a>
          </div>
          <!-- <p>Free Shipping on All Orders Over ???100!</p> -->
        </div>
        <?}?>
      </div>
    </div>
    <?}?>
    <!-- Utilize Cart Menu End -->


    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
      <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
          <div class="site-logo">
            <a href="<?=base_url()?>Home"><img src="<?=base_url()?>assets/frontend/img\brand-logo\kirana_logo.png" alt="Logo"></a>
          </div>
          <button class="ltn__utilize-close">??</button>
        </div>
        <div class="ltn__utilize-menu-search-form">
          <form action="<?=base_url()?>Home/search" method"GET">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <div class="ltn__utilize-menu">
          <ul>
            <li><a href="<?=base_url()?>Home">Home</a>
            </li>
            <li><a href="javascript:;">Shop By All Categories</a>
              <ul class="sub-menu pr-3">
                <?$this->db->select('*');
                      $this->db->from('tbl_category');
                      $this->db->where('is_active', 1);
                      $category_data = $this->db->get();
                      foreach($category_data->result() as $category){
                      ?>
                <li style="display: block;"><a href="javascript:void(0)"><?=$category->name;?></a>
                  <ul class="sub-menu ">
                    <?$this->db->select('*');
                              $this->db->from('tbl_subcategory');
                              $this->db->where('is_active', 1);
                              $this->db->where('category_id', $category->id);
                              $subcategory_data= $this->db->get();
                              foreach($subcategory_data->result() as $subcategory){
                              ?>
                    <li style="display: block;"><b><a href="<?=base_url()?>Home/all_products/<?=base64_encode($subcategory->id)?>"><?=$subcategory->name;?></a></b></li>
                    <?}?>
                  </ul>
                </li>
                <?}?>
              </ul>
            </li>
            <li><a href="<?=base_url()?>Home/about">About</a>
            </li>
            <li><a href="<?=base_url()?>Home/contact">Contact</a></li>
          </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
          <ul>
            <li>
              <a href="<?=base_url()?>Home/my_profile" title="My Account">
                <span class="utilize-btn-icon">
                  <i class="far fa-user"></i>
                </span>
                My Account
              </a>
            </li>
            <?if(!empty($this->session->userdata('user_data'))){
                  $this->db->select('*');
                  $this->db->from('tbl_wishlist');
                  $this->db->where('user_id', $this->session->userdata('user_id'));
                  $wishcount = $this->db->count_all_results();
                  ?>
            <li>
              <a href="<?=base_url()?>Home/wishlist" title="Wishlist">
                <span class="utilize-btn-icon">
                  <i class="far fa-heart"></i>
                  <sup><?=$wishcount;?></sup>
                </span>
                Wishlist
              </a>
            </li>
            <?}?>
            <li>
              <a href="<?=base_url()?>Home/cart" title="Shoping Cart">
                <span class="utilize-btn-icon">
                  <i class="fas fa-shopping-cart"></i>
                  <sup>
                    <?if(!empty($this->session->userdata('user_data'))){
                              $this->db->select('*');
                              $this->db->from('tbl_cart');
                              $this->db->where('user_id', $this->session->userdata('user_id'));
                              $cartCount= $this->db->count_all_results();
                              echo $cartCount;
                            }?>
                  </sup>
                </span>
                Shoping Cart
              </a>
            </li>
          </ul>
        </div>
        <div class="ltn__social-media-2">
          <ul>
            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Utilize Mobile Menu End -->
    <div class="ltn__utilize-overlay"></div>
