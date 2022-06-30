<!-- FOOTER AREA START -->
<footer class="ltn__footer-area">
   <div class="footer-top-area  section-bg-1 plr--5">
       <div class="container-fluid">
           <div class="row">
               <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                   <div class="footer-widget footer-about-widget">
                       <div class="footer-logo">
                           <div class="site-logo">
                               <a href="<?=base_url()?>Home"><img src="<?=base_url()?>assets/frontend/img\brand-logo\kirana_logo.png" alt="Logo"></a>
                           </div>
                       </div>
                       <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.</p>
                       <div class="footer-address">
                           <ul>
                               <li>
                                   <div class="footer-address-icon">
                                       <i class="icon-placeholder"></i>
                                   </div>
                                   <div class="footer-address-info">
                                       <p>Brooklyn, New York, United States</p>
                                   </div>
                               </li>
                               <li>
                                   <div class="footer-address-icon">
                                       <i class="icon-call"></i>
                                   </div>
                                   <div class="footer-address-info">
                                       <p><a href="tel:+0123-456789">+0123-456789</a></p>
                                   </div>
                               </li>
                               <li>
                                   <div class="footer-address-icon">
                                       <i class="icon-mail"></i>
                                   </div>
                                   <div class="footer-address-info">
                                       <p><a href="mailto:example@example.com">example@example.com</a></p>
                                   </div>
                               </li>
                           </ul>
                       </div>
                       <div class="ltn__social-media mt-20">
                           <ul>
                               <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                               <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                   <div class="footer-widget footer-menu-widget clearfix">
                       <h4 class="footer-title">Company</h4>
                       <div class="footer-menu">
                           <ul>
                               <li><a href="<?=base_url()?>Home/about">About</a></li> <br>
                               <li><a href="<?=base_url()?>Home/contact">Contact us</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                   <div class="footer-widget footer-menu-widget clearfix">
                       <h4 class="footer-title">Services.</h4>
                       <div class="footer-menu">
                           <ul>

                               <li><a href="<?=base_url()?>Home/term_and_condition">Terms & Conditions</a></li><br>
                               <li><a href="#">Privacy & Policy</a></li>

                           </ul>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                   <div class="footer-widget footer-newsletter-widget">
                       <h4 class="footer-title">Newsletter</h4>
                       <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                       <div class="footer-newsletter">
                         <li>Subscribe</li><br>
                           <form action="<?=base_url()?>Home/subscribe_data" method="POST" enctype="application/x-www-form-urlencoded">
                               <input type="email" name="email" placeholder="Email*">
                               <div class="btn-wrapper">
                                   <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="ltn__copyright-area ltn__copyright-2 section-bg-2  ltn__border-top-2--- plr--5">
       <div class="container-fluid">
           <div class="row text-center">
               <div class="col-md-12 col-12">
                   <div class="ltn__copyright-design clearfix">
                       <p>All Rights Reserved @ Company <span class="current-year"></span></p>
                   </div>
               </div>
               <!-- <div class="col-md-6 col-12 align-self-center">
                   <div class="ltn__copyright-menu text-right">
                       <ul>
                           <li><a href="#">Terms & Conditions</a></li>
                           <li><a href="#">Claim</a></li>
                           <li><a href="#">Privacy & Policy</a></li>
                       </ul>
                   </div>
               </div> -->
           </div>
       </div>
   </div>
</footer>
<!-- FOOTER AREA END -->





</div>

<script>

$(document).ready(function() {
<?php if(!empty($this->session->flashdata('emessage'))){ ?>
 var fail_message = '<?php echo $this->session->flashdata('emessage')?>';
 loadErrorNotify(fail_message);
<?php  } ?>

<?php  if(!empty($this->session->flashdata('validationemessage'))){
$valid_errors = $this->session->flashdata('validationemessage');
$valid_errors = substr($valid_errors, 0, -1); ?>
loadErrorNotify("<?=$valid_errors?>");
<?php  } ?>

<?php if(!empty($this->session->flashdata('smessage'))){ ?>
  var succ_message = '<?php echo $this->session->flashdata('smessage');?>';
  loadSuccessNotify(succ_message);
 <?php  } ?>

});
function loadSuccessNotify(succ_message){
  $.notify({
             icon: 'bi-check-circle-fill',
             // title: 'Alert!',
             message: succ_message
         },{
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
             '<span data-notify="title">{1}</span> ' +
             '<span data-notify="message">{2}</span>' +
             '<div class="progress" data-notify="progressbar">' +
              '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
             '<a href="{3}" target="{4}" data-notify="url"></a>' +
             '</div>'
         });

}

    function loadErrorNotify(message){
      $.notify({
                 icon: 'bi-exclamation-octagon-fill',
                 // title: 'Alert!',
                 message: message
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
                 '<span data-notify="icon"></span> ' +
                 '<span data-notify="title">{1}</span> ' +
                 '<span data-notify="message">{2}</span>' +
                 '<a href="{3}" target="{4}" data-notify="url"></a>' +
                 '</div>'
             });

    }


    //-----------add to cart offline-----

      function addToCartOffline(obj){

        var product_id = $(obj).attr("product_id");
        var type_id = $(obj).attr("type_id");
        var quantity = $(obj).attr("quantity");
        var base_path = "<?=base_url();?>";
           $.ajax({
           url:'<?=base_url();?>Cart/addToCartOffline',
           method: 'post',
           data: {product_id: product_id, type_id: type_id, quantity: quantity},
           dataType: 'json',
           success: function(response){
           if(response.data == true){
             // alert(response.data_message)
              // var msg = response.data_message;
              // alert("product Added")
                  $.notify({
                            icon: 'bi-check-circle-fill',
                            // title: 'Alert!',
                            message: "Item successfully added in your cart"
                        },{
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
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            '</div>'
                        });
                        // window.setTimeout(function(){location.reload()},2000)
                        $( "#cartIcon" ).load(window.location.href + " #cartIcon > *" );
                            $( "#collapsibleNavbar" ).load(window.location.href + " #collapsibleNavbar > *" );

           }else if(response.data == false){
             var msg = response.data_message;
                    // alert(msg);
                   $.notify({
                               icon: 'bi-exclamation-octagon-fill',
                               // title: 'Alert!',
                               message: msg
                           },{
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
                               '<span data-notify="icon"></span> ' +
                               '<span data-notify="title">{1}</span> ' +
                               '<span data-notify="message">{2}</span>' +
                               '<a href="{3}" target="{4}" data-notify="url"></a>' +
                               '</div>'
                           });
                           // window.setTimeout(function(){location.reload()},2000)
                           $( "#cartIcon" ).load(window.location.href + " #cartIcon > *" );
                               $( "#collapsibleNavbar" ).load(window.location.href + " #collapsibleNavbar > *" );

           }
         }
           });

      }

    ///-----------add to cart online-----------

      function addToCartOnline(obj){

        var product_id = $(obj).attr("product_id");
        var type_id = $(obj).attr("type_id");
        var quantity = $(obj).attr("quantity");
        var base_path = "<?=base_url();?>";
        // alert(type_id)
           $.ajax({
           url:'<?=base_url();?>Cart/addToCartOnline',
           method: 'post',
           data: {product_id: product_id, type_id: type_id, quantity: quantity},
           dataType: 'json',
           success: function(response){
             // alert(response)
           if(response.data == true){
             // alert(response.data_message)
              // var msg = response.data_message;
                  $.notify({
                            icon: 'bi-check-circle-fill',
                            // title: 'Alert!',
                            message: "Item successfully added in your cart"
                        },{
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
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            '</div>'
                        });
                        // window.setTimeout(function(){location.reload()},2000)
                        $( "#cartIcon" ).load(window.location.href + " #cartIcon > *" );
                            $( "#collapsibleNavbar" ).load(window.location.href + " #collapsibleNavbar > *" );


           }else if(response.data == false){
             var msg = response.data_message;
                   $.notify({
                               icon: 'bi-exclamation-octagon-fill',
                               // title: 'Alert!',
                               message: msg
                           },{
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
                               '<span data-notify="icon"></span> ' +
                               '<span data-notify="title">{1}</span> ' +
                               '<span data-notify="message">{2}</span>' +
                               '<a href="{3}" target="{4}" data-notify="url"></a>' +
                               '</div>'
                           });
                           // window.setTimeout(function(){location.reload()},2000)
                           $( "#cartIcon" ).load(window.location.href + " #cartIcon > *" );
                               $( "#collapsibleNavbar" ).load(window.location.href + " #collapsibleNavbar > *" );


           }
         }
           });

      }



  function deleteCartOnline(obj) {
    var product_id = $(obj).attr("product_id");
    var type_id = $(obj).attr("type_id");
    // alert(product_id);
    var base_path = "<?=base_url();?>";
    $.ajax({
      url: '<?=base_url();?>Cart/deleteCartOnline',
      method: 'post',
      data: {
        product_id: product_id,
        type_id: type_id,
      },
      dataType: 'json',
      success: function(response) {
        if (response.data == true) {
          // alert("hi");
          $.notify({
            icon: 'bi-check-circle-fill',
            // title: '',
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
              '<span data-notify="title">{1}</span> ' +
              '<span data-notify="message">{2}</span>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });

          $( "#ltn__utilize-cart-menu" ).load(window.location.href + " #ltn__utilize-cart-menu > *" );
          $( "#cartCount" ).load(window.location.href + " #cartCount > *" );
          $( "#cartDiv" ).load(window.location.href + " #cartDiv > *" );


        } else if (response.data == false) {
          $.notify({
            icon: 'bi-exclamation-octagon-fill',
            // title: '',
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
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });
          $( "#here" ).load(window.location.href + " #here > *" );
          $( "#ltn__utilize-cart-menu" ).load(window.location.href + " #ltn__utilize-cart-menu > *" );
          $( "#cartDiv" ).load(window.location.href + " #cartDiv > *" );

        }
      }
    });
  }

      //---------------wishlist----------
function wishlist(obj) {
  var product_id = $(obj).attr("product_id");
  var type_id = $(obj).attr("type_id");
  var user_id = $(obj).attr("user_id");
  var status = $(obj).attr("status");
  // alert(product_id);
  // alert(user_id);
  // alert(status);
  // return;
  $.ajax({
    url: '<?=base_url();?>Cart/wishlist',
    method: 'post',
    data: {
      product_id: product_id,user_id: user_id,status : status, type_id: type_id
    },
    dataType: 'json',
    success: function(response) {
      // alert(response.data_message)
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
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });

        $( "#mobileHeader" ).load(window.location.href + " #mobileHeader > *" );
            $( "#collapsibleNavbar" ).load(window.location.href + " #collapsibleNavbar > *" );
            $( "#wishlist" ).load(window.location.href + " #wishlist > *" );
            $( "#prod_det_heart" ).load(window.location.href + " #prod_det_heart > *" );


      } else if (response.data == false) {
        $.notify({
          // icon: 'fa fa-times',
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
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-danger  alert-dismissible fade show alert-{0}" role="alert">' +
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
        $( "#mobileHeader" ).load(window.location.href + " #mobileHeader > *" );
            $( "#collapsibleNavbar" ).load(window.location.href + " #collapsibleNavbar > *" );
            $( "#prod_det_heart" ).load(window.location.href + " #prod_det_heart > *" );



      }
      // window.setTimeout(function(){location.reload()},10000)

    }
  });
}

    </script>



<!-- All JS Plugins -->
<script src="<?=base_url()?>assets/frontend/js/plugins.js"></script>
<!-- Main JS -->
<script src="<?=base_url()?>assets/frontend/js/main.js"></script>
<script src="<?=base_url()?>assets/frontend/js/bootstrap-notify.min.js"></script>

</body>

</html>
