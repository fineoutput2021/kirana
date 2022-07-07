<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                <div class="section-title-area ltn__section-title-2">
                    <h1 class="section-title white-color">My Account</h1>
                </div>
                <div class="ltn__breadcrumb-list">
                    <ul>
                        <li><a href="<?=base_url()?>Home/">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="liton__wishlist-area pb-70 pt-30">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- PRODUCT TAB AREA START -->
            <div class="ltn__product-tab-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ltn__tab-menu-list mb-50">
                                <div class="nav">
                                    <a class="active show" data-toggle="tab" href="#liton_tab_1_1">Dashboard <i class="fas fa-home"></i></a>
                                    <a data-toggle="tab" href="#liton_tab_1_2">Orders <i class="fas fa-file-alt"></i></a>
                                    <!-- <a data-toggle="tab" href="#liton_tab_1_3">Downloads <i class="fas fa-arrow-down"></i></a>
                                    <a data-toggle="tab" href="#liton_tab_1_4">address <i class="fas fa-map-marker-alt"></i></a> -->
                                    <!-- <a data-toggle="tab" href="#liton_tab_1_5">Account Details <i class="fas fa-user"></i></a> -->
                                    <a href="<?=base_url()?>User/logout">Logout <i class="fas fa-sign-out-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="liton_tab_1_1">
                                    <div class="ltn__myaccount-tab-content-inner">
                                        <p>Hello <strong><?=$user_data->name?></strong></p>
                                        <p>From your account dashboard you can view your <span>recent orders</span>.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_1_2">
                                    <div class="ltn__myaccount-tab-content-inner">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>S No.</th>
                                                        <th>Order Id</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th>Promocode Discount</th>
                                                        <th>Shipping</th>
                                                        <th>Final</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?$i = 1; foreach($order1_dataa->result() as $order1){?>
                                                    <tr>
                                                        <td><?=$i;?></td>
                                                        <td><?=$order1->id?></td>
                                                        <td><?$source = $order1->date;
                                                           $date = new DateTime($source);
                                                           echo $date->format('F j, Y, g:i a');?></td>
                                                           <td>₹<?=$order1->total_amount;?></td>
                                                           <td>₹<?if(!empty($order1->promo_discount)){echo $order1->promo_discount;}else{
                                                             echo '0';
                                                           }?></td>
                                                           <td>₹<?=$order1->shipping;?></td>
                                                           <td>₹<?=$order1->final_amount;?></td>
                                                           <td><?php if ($order1->order_status==1) {?>
                                                           <p class="label bg-blue">Placed</p>
                                                           <?} elseif ($order1->order_status==2) {?>
                                                           <p class="label bg-orange">Confirmed</p>

                                                           <?} elseif ($order1->order_status==3) {?>
                                                           <p class="label bg-yellow">Dispatched</p>

                                                           <?} elseif ($order1->order_status==4) {?>
                                                           <p class="label bg-green">Delievered</p>

                                                           <?} elseif ($order1->order_status==5) {?>
                                                           <p class="label bg-red">Cancelled</p>
                                                           <?} else {
                                                           echo("rejected");
                                                           }

                                                            ?>
                                                           </td>
                                                        <td><a href="<?=base_url()?>Home/order_details/<?=base64_encode($order1->id)?>">View</a></td>
                                                    </tr>
                                                    <?$i++; }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT TAB AREA END -->
        </div>
    </div>
</div>
</div>
<!-- WISHLIST AREA START -->
