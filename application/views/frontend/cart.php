<!-- mobile cart start -->

<!--=============================mobile_cart=====================================-->

<!-- mobile cart end  -->
<div class="container mt-3 ">
    <div class="row" id="cartDiv">
        <div class="col-12 col-md-8 col-lg-8 ">
          <? $totalCart = 0; foreach($cart_data->result() as $cart){
            $this->db->select('*');
            $this->db->from('tbl_type');
            $this->db->where('id', $cart->type_id);
            $type_data = $this->db->get()->row();
            $this->db->select('*');
            $this->db->from('tbl_product');
            $this->db->where('id', $type_data->product_id);
            $product_data = $this->db->get()->row();
            ?>
            <div style="border:1px solid #ccc" class="row">
                <div class="col-4 col-md-4 col-lg-4 col-sm-4 p-3" style="justify-content:center">
                    <img src="<?=base_url().$product_data->image1?>" class="img-fluid"></a>
                </div>
                <div class="col-8 col-md-8 col-lg-8 col-sm-8 " style="justify-content: space-around;">
                    <ul class="p-0">
                        <li style="text-align:right; padding-bottom:0px;">
                            <p style="font-size:20px; color:green; cursor: pointer;" product_id="<?=base64_encode($type_data->product_id)?>" type_id="<?=base64_encode($type_data->id)?>" onclick="deleteCartOnline(this)">X</p>
                        </li>
                        <li>
                            <h4><?=$product_data->name;?></h4><br />
                            <?=$type_data->name;?>
                        </li>
                        <li style="display:flex; font-size:20px;"><span>Price:-&nbsp</span>
                            <div>
                                <h5 class="mt-2" style="font-size:20px; margin-left:5px;">₹ <?=$type_data->spgst*$cart->quantity?></h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <? $totalCart = $totalCart + ($cart->quantity * $type_data->spgst);
          }?>



        </div>


        <div class="shoping-cart col-md-4 col-lg-4 col-12 cartx">
            <div style="position:sticky;top:0;">
                <table class="table">
                    <thead class="text-center">
                        <th>Cart Summary</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr style="background-color:#f7f8fa;">
                            <td>Cart Subtotal</td>
                            <td>₹<?=$totalCart;?></td>
                        </tr>
                        <!-- <tr>
                            <td>Shipping</td>
                            <td>₹ 50</td>
                        </tr> -->
                        <tr style="border-bottom:0px;">
                            <th>Order Total</th>
                            <th>₹<?=$totalCart;?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-wrapper text-center" style="position:sticky;top:0;">
                  <?if(!empty($cart_check)){?>
                    <a href="<?=base_url()?>Order/calculate" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                    <?}else{?>
                      <a href="javascript:;" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                      <?}?>
                </div>
            </div>
        </div><!-- //side div end -->

    </div>
</div>

<!-- cart items end -->
