<?if(!empty($order_data->promocode)){?>
<style>
#apply_promocode{
  display: none;
}
#remove_promocode{
  display: block
}
</style>
  <?}else{?>
    <style>
    #apply_promocode{
      display: block;
    }
    #remove_promocode{
      display: none
    }
    </style>
    <?}?>
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?=base_url()?>assets/frontend/img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h1 class="section-title white-color">Checkout</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?=base_url()?>Home/">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="ltn__checkout-area mb-105">
    <div class="container">
      <div class="col-md-12 mt-3">
          <div class="col-md-6">
          <div class="ltn__coupon-code-form">
              <p>If you have a coupon code, please apply it below.</p>
              <?
              if(!empty($order_data->promocode)){
              $this->db->select('*');
              $this->db->from('tbl_promocode');
              $this->db->where('id', $order_data->promocode);
              $promo = $this->db->get()->row();
              $promocode_text = $promo->promocode;
            }else{
              $promocode_text = '';
            }
              ?>
              <form action="javascript:void:;" id="promocode_form" >
                  <input type="hidden" name="order_id" value="<?=$this->session->userdata('order_id')?>">
                  <input type="text" name="promocode" <?if(!empty($promocode_text)){echo "value='".$promocode_text."' readonly";}?> id="promocode_text" placeholder="Coupon code">
                  <button class="btn theme-btn-2 btn-effect-2 text-uppercase" id="apply_promocode">Apply Coupon</button>
              </form>
              <button class="btn theme-btn-2 btn-effect-2 text-uppercase" order_id="<?=$this->session->userdata('order_id')?>" id="remove_promocode" onclick="remove_promocode(this)">Remove Coupon</button>
              </div>
          </div>
      </div>
      <div class=" col-lg-12 ">
          <div class="row rev">
      <div class="col-lg-6">
          <div class="ltn__checkout-payment-method mt-50">
              <h4 class="title-2">Payment Method</h4>
              <div id="checkout_accordion_1">
                  <!-- card -->
                  <div class="card">
                      <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1" aria-expanded="false">
                          Online payments
                      </h5>
                      <div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-5">
                                Yuvi Enterprises<br />
                                Bank- ICICI Bank<br />
                                Account Number- 076005009676<br />
                                IFSC Code- ICIC0000760
                              </div>
                              <div class="col-md-7">
                                <img src="<?=base_url()?>assets/frontend/img/barcode.jpeg" />
                              </div>
                            </div>

                          </div>
                      </div>
                  </div>
                  <!-- card -->
                  <div class="card">
                      <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="true">
                          Cash on delivery
                      </h5>
                      <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
                          <div class="card-body">
                              <p>Pay with cash upon delivery.</p>
                          </div>
                      </div>
                  </div>
                  <!-- card -->

              </div>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="shoping-cart-total1 mt-50">
              <h4 class="title-2">Cart Summary</h4>
              <table class="table">
                <?$this->db->select('*');
                $this->db->from('tbl_order2');
                $this->db->where('main_id', $order_data->id);
                $order2_data = $this->db->get();

                ?>
                  <tbody>
                    <?foreach($order2_data->result() as $order2){
                      $this->db->select('*');
                      $this->db->from('tbl_type');
                      $this->db->where('id', $order2->type_id);
                      $type_data = $this->db->get()->row();
                      $this->db->select('*');
                      $this->db->from('tbl_product');
                      $this->db->where('id', $order2->product_id);
                      $product_data = $this->db->get()->row();
                      ?>
                      <tr>
                          <td><?=$product_data->name."(".$type_data->name.")";?> <strong>× <?=$order2->quantity;?></strong></td>
                          <td>₹<?=$order2->total_amount?></td>
                      </tr>
                      <?}?>
                      <tr id="promoDis">
                        <?if(!empty($order_data->promo_discount)){?>
                          <td>Promocode</td>
                          <td>- ₹<?=$order_data->promo_discount?></td>
                          <?}?>
                      </tr>
                      <tr>
                          <td>Shipping</td>
                          <td>₹50.00</td>
                      </tr>
                      <tr>
                          <td><strong>Order Total</strong></td>
                          <td id="finalAmt"><strong>₹<?=$order_data->final_amount?></strong></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      </div>
      </div>

        <div class="row">
          <form action="javascript:void;" id="pay" >
            <div class="col-lg-12">
                <div class="ltn__checkout-inner">
                    <div class="ltn__checkout-single-content mt-50">
                        <h4 class="title-2">Billing Details</h4>
                        <div class="ltn__checkout-single-content-info">
                                <h6>Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" required name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" required name="email" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" maxlength="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="phone" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <input type="hidden" id="order" name="order_id" value="<?=$this->session->userdata('order_id')?>">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" maxlength="6" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="lastname" required id="pincode" placeholder="Pincode">
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="payment_method" id="payment_method" value="1"  />
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Address</h6>
                                                <div class="input-item">
                                                    <input type="text" id="address" required placeholder="House number and street name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>State</h6>
                                                <div class="input-item">
                                                    <input type="text" required id="state" placeholder="State">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="ltn__payment-note mt-30 mb-30">
                <p>Your order will be delivered to you within 24 hours.</p>
            </div>
            <a href="javascript:;"><button class="btn theme-btn-1 btn-effect-1 text-uppercase"  onclick="checkout()">Place order</button></a>
              </form>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->
<script>
$(document).ready(function() {
  var subtotal = $("#subtotal").val()

  // $("#promocode_form").submit(function(e){
   // $('#promocode_submit').on('click',function(e){
   $('#promocode_form').on('submit',function(e){
   // $("#promocode_submit").click(function(){
    // alert("hi")
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var frm = $(this).closest("#promocode_form");
    var dataString = frm.serialize();
    // alert(dataString)
      url = "<?=base_url()?>Order/apply_promocode";
    $.ajax({
      url: url,
      method: 'post',
       data: dataString, // serializes the form's elements.
       dataType: 'json',
      success: function(response) {
        if (response.data == true) {
          $.notify({
            icon: 'fa fa-check',
            title: '',
            message: response.data_message
          }, {
            element: 'body',
            position: null,
            type: "success",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
              from: "top",
              align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 1000,
            animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success  alert-dismissible fade show alert-{0}" role="alert">' +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
              '<span data-notify="icon"></span> ' +
              '<span data-notify="title">{1}</span> ' +
              '<span data-notify="message">{2}</span>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });

          $( "#orderDetails" ).load(window.location.href + " #orderDetails > *" );
          $( "#promoDis" ).load(window.location.href + " #promoDis > *" );
          $( "#finalAmt" ).load(window.location.href + " #finalAmt > *" );
          $("#remove_promocode").css('display', 'block')
          $("#apply_promocode").css('display', 'none')
          // $("#promocode_text").attr('readonly', '')
          // window.location.reload();

        } else if (response.data == false) {
          $.notify({
            icon: 'fa fa-cancel',
            title: '',
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
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-DANGER  alert-dismissible fade show alert-{0}" role="alert">' +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
              '<span data-notify="icon"></span> ' +
              '<span data-notify="title">{1}</span> ' +
              '<span data-notify="message">{2}</span>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });
          // window.location.reload();
          $( "#orderDetails" ).load(window.location.href + " #orderDetails > *" );


        }
      }
    });
  });
  });
  function remove_promocode(obj) {
    var order_id = $(obj).attr("order_id");
    // alert(product_id);
    var base_path = "<?=base_url();?>";
    $.ajax({
      url: '<?=base_url();?>Order/remove_promocode',
      method: 'post',
      data: {
        order_id: order_id
      },
      dataType: 'json',
      success: function(response) {
        if (response.data == true) {
          $.notify({
            icon: 'fa fa-check',
            title: '',
            message: response.data_message
          }, {
            element: 'body',
            position: null,
            type: "success",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
              from: "top",
              align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 1000,
            animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success  alert-dismissible fade show alert-{0}" role="alert">' +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
              '<span data-notify="icon"></span> ' +
              '<span data-notify="title">{1}</span> ' +
              '<span data-notify="message">{2}</span>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });

          $( "#orderDetails" ).load(window.location.href + " #orderDetails > *" );
          $( "#promoDis" ).load(window.location.href + " #promoDis > *" );
          $( "#finalAmt" ).load(window.location.href + " #finalAmt > *" );
          $("#promocode_submit").val("");
          $("#apply_promocode").css('display', 'block')
          $("#remove_promocode").css('display', 'none')
          $("#promocode_text").val('')


        } else if (response.data == false) {
          $.notify({
            icon: 'fa fa-cancel',
            title: '',
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
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
              '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
              '<span data-notify="icon"></span> ' +
              '<span data-notify="title">{1}</span> ' +
              '<span data-notify="message">{2}</span>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });
          $( "#orderDetails" ).load(window.location.href + " #orderDetails > *" );
;
        }
      }
    });
  }
</script>
<script>
$(document).ready(function () {
 $('#pay').on('submit',function(e){
    e.preventDefault();
    var name = $("#name").val()
    var email = $("#email").val()
    var phone = $("#phone").val()
    var payment_method = $("#payment_method").val()
    // var payment_method = $(".payment_type:checked").val();

    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      order_id: $("#order").val(),
      pincode: $("#pincode").val(),
      state: $("#state").val(),
      address: $("#address").val(),
      payment_method: payment_method,
    };
    if(payment_method==1){
      $.ajax({
      type: "POST",
      url: '<?php echo base_url() ?>'+'Order/checkout',
      data: formData,
      dataType: "json",
      success: function(response) {
        // alert(response.data)
        if (response.data == true) {
          window.location.replace("<?=base_url()?>Order/order_success");
        }else if (response.data == false) {
          $.notify({
                     icon: 'bi-exclamation-octagon-fill',
                     // title: 'Alert!',
                     message: response.data_message
                 },{
                     element: 'body',
                     position: null,
                     type: "danger",
                     allow_dismiss: true,
                     newest_on_top: false,
                     showProgressbar: false,
                     placement: {
                       from: "top",
                       align: "right"
                     },
                     offset: 20,
                     spacing: 10,
                     z_index: 9999,
                     delay: 1000,
                     animate: {
                       enter: 'animated fadeInDown',
                       exit: 'animated fadeOutUp'
                     },
                     icon_type: 'class',
                     template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-danger  alert-dismissible fade show alert-{0}" role="alert">' +
                     '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                       '<span data-notify="title">{1}</span> ' +
                       '<span data-notify="message">{2}</span>' +
                       '<a href="{3}" target="{4}" data-notify="url"></a>' +
                       '</div>'
                 });
        }
      }
    });
    }
});

//     else{
//     //------------------------
//               $.ajax({
//               type: "POST",
//               url: "<?php echo base_url(); ?>Order/create_razorpay_order_id",
//               data: {
//                 name: $("#name").val(),
//                 email: $("#email").val(),
//                 phone: $("#phone").val(),
//                 order_id: $("#order").val(),
//                 pincode: $("#pincode").val(),
//                 address: $("#address").val(),
//               },
//               dataType: 'json',
//               success: function(response){
//                     if(response.message == 'success'){
//                       // alert(response.razorpayOrder )
//                       var totalAmount = $("#totAmt").val()
//                       // alert(totalAmount)
//                       var product_id =  $("#order").val()
//                       var product_name =  "Soap Mould";
//                       var options = {
//                         "key": "rzp_test_4xP4NZyxYeuqlD",
//                         "amount": totalAmount , // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
//                         "currency": "INR",
//                         "name": product_name,
//                         "description": "Test Transaction",
//                         "prefill": {
//                         "name": name,
//                         "email": email,
//                         "contact": phone,
//                         },
//                         // "image": "https://example.com/your_logo",
//                         "order_id": response.razorpayOrder,
//                         "handler": function (response){
// // console.log("--------------"+ JSON.stringify(response))
//                             if(response.razorpay_payment_id.length!==0){
//                               // alert(response.razorpay_payment_id)
//                           $.ajax({
//                             url: '<?php echo base_url() ?>'+'Order/check_payment',
//                             type: 'post',
//                             dataType: 'json',
//                             data: {
//                               razorpay_payment_id: response.razorpay_payment_id,
//                               razorpay_order_id: response.razorpay_order_id,
//                               razorpay_signature: response.razorpay_signature,
//                               name: $("#name").val(),
//                               email: $("#email").val(),
//                               phone: $("#phone").val(),
//                               order_id: $("#order").val(),
//                               pincode: $("#pincode").val(),
//                               address: $("#address").val(),
//                               payment_method: payment_method,
//                             },
//                             "prefill": {
//                             "name": name,
//                             "email": email,
//                             "phone": phone,
//                             },
//                             "notes": {
//                             "address": $("#address").val(),
//                         },
//                             success: function (respawn) {
//                               if (respawn.data == true) {
//                                 window.location.replace("<?=base_url()?>Order/order_success");
//                               }else if (respawn.data == false) {
//                                 window.location.replace("<?=base_url()?>Order/order_failed");
//                               }
//                             }
//                           });
//                         }else{
//
//                         }
//                         },
//                         "theme": {
//                           "color": "#416e7a"
//                         }
//                       };
//                       var rzp1 = new Razorpay(options);
//                       rzp1.open();
//                     }
//                     else{
//                          alert('Not OKay');
//                         }
//                    }
//         });
//   }
});

</script>
