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
                        <li style="text-align:right;">
                            <p style="font-size:20px; color:green; cursor: pointer; margin-bottom:0px" product_id="<?=base64_encode($type_data->product_id)?>" type_id="<?=base64_encode($type_data->id)?>" onclick="deleteCartOnline(this)">X</p>
                        </li>
                        <li>
                            <h4><?=$product_data->name;?></h4>
                            <h6>Type: <?=$type_data->name;?></h6>
                              <h6>Unit Price : ₹<?=$type_data->spgst?> </h6>
                              <div class="cart-plus-minus p-0">
                            <div class="dec qtybutton" onclick="incdeec(<?=$type_data->id?>,1); updateCartOnline(<?=$type_data->id?>)">-</div>
                            <input type="text" product_id="<?=base64_encode($type_data->product_id)?>" type_id="<?=base64_encode($type_data->id)?>" value="<?=$cart->quantity?>"  id="quantity<?=$type_data->id?>" readonly name="qtybutton" class="cart-plus-minus-box">
                            <div class="inc qtybutton" onclick="incdeec(<?=$type_data->id?>,2); updateCartOnline(<?=$type_data->id?>)">+</div>
                          </div>
                        </li>
                        <li style="display:flex; font-size:20px;">
                          <h6 >Price : <span id="price<?=$type_data->id?>">₹<?=$type_data->spgst*$cart->quantity?></span> </h6>
                            <!-- <div>
                              <h6>Unit Price : ₹<?=$type_data->spgst?> </h6>
                                <h5 class="mt-2" id="price<?=$type_data->id?>" style="font-size:20px; margin-left:5px;">Price:-&nbsp₹<?=$type_data->spgst*$cart->quantity?></h5>
                            </div> -->
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
                            <td id="cartTot">₹<?=$totalCart;?></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>₹50.00</td>
                        </tr>
                        <tr style="border-bottom:0px;">
                            <th>Order Total</th>
                            <th id="subTot">₹<?=$totalCart+50;?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-wrapper text-center" style="position:sticky;top:0;">
                  <?if(!empty($cart_check)){?>
                    <a href="<?=base_url()?>Order/calculate" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                    <?}else{?>
                      <a href="javascript:;" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                      <br /><span style="color: red; font-size: 14px">Please add products in your cart to proceed.</span>
                      <?}?>
                </div>
            </div>
        </div><!-- //side div end -->

    </div>
</div>
<script>

function updateCartOnline(i) {
  var product_id = $("#quantity"+i).attr("product_id");
  var type_id = $("#quantity"+i).attr("type_id");
  // var price = $("#quantity"+i).attr("price");
  var quantity = $("#quantity"+i).val();
  // alert(quantity);
  if(quantity==0){
    window.location.reload();
    return;
  }
  var base_path = "<?=base_url();?>";
  $.ajax({
    url: '<?=base_url();?>Cart/updateCartOnline',
    method: 'POST',
    data: {
      product_id: product_id,
      type_id: type_id,
      quantity: quantity
    },
    dataType: 'json',
    success: function(response) {
      // alert(response)
      if (response.data == true) {
        document.getElementById('price' + i).innerHTML = "₹"+response.newprice;
        document.getElementById('subTot').innerHTML = '₹'+response.data_subtotal;
        document.getElementById('cartTot').innerHTML = '₹'+response.data_cartsubtotal;
        // $("#quantity"+i).attr("price", response.newprice);
        $.notify({
          icon: 'bi-check-circle-fill',
          // title: 'Alert!',
          message: response.data_message
        }, {
          element: 'body',
          position: null,
          type: "success",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: true,
          placement: {
            from: "top",
            align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 9999,
          delay: 5000,
          animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
          },
          icon_type: 'class',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success  alert-dismissible fade show alert-{0}" role="alert">' +
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            // '<div class="progress" data-notify="progressbar">' +
            // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            // '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });

        // window.setTimeout(function(){location.reload()},2000)
        $( "#cartDiv" ).load(window.location.href + " #cartDiv > *" );
  // $("#qty"+i).attr("price", response.newprice);


      } else if (response.data == false) {
        $.notify({
          icon: 'bi-exclamation-octagon-fill',
          // title: 'Alert!',
          message: response.data_message
        }, {
          element: 'body',
          position: null,
          type: "danger",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: true,
          placement: {
            from: "top",
            align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 9999,
          delay: 5000,
          animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
          },
          icon_type: 'class',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-danger  alert-dismissible fade show alert-{0}" role="alert">' +
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            // '<div class="progress" data-notify="progressbar">' +
            // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            // '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
        // window.setTimeout(function(){location.reload()},1000)
        $( "#cartDiv" ).load(window.location.href + " #cartDiv > *" );


      }
    }
  });
}
</script>
<!-- cart items end -->
