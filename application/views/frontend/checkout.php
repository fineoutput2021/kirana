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
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__checkout-inner">


                    <div class="ltn__checkout-single-content mt-50">
                        <h4 class="title-2">Billing Details</h4>
                        <div class="ltn__checkout-single-content-info">
                            <form action="#" >
                                <h6>Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="ltn__name" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="ltn__lastname" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="ltn__email" placeholder="email address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="ltn__phone" placeholder="phone number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Address</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="House number and street name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Town / City</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h6>State </h6>
                                        <div class="input-item">
                                            <input type="text" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Zip</h6>
                                        <div class="input-item">
                                            <input type="text" placeholder="Zip">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                <div class="ltn__coupon-code-form">
                    <p>If you have a coupon code, please apply it below.</p>
                    <form action="#" >
                        <input type="text" name="coupon-code" placeholder="Coupon code">
                        <button class="btn theme-btn-2 btn-effect-2 text-uppercase">Apply Coupon</button>
                    </form>
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
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
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
                    <div class="ltn__payment-note mt-30 mb-30">
                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                    </div>
                    <a href="success.html"><button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping-cart-total1 mt-50">
                    <h4 class="title-2">Cart Summery</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Vegetables Juices <strong>× 2</strong></td>
                                <td>₹298.00</td>
                            </tr>
                            <tr>
                                <td>Orange Sliced Mix <strong>× 2</strong></td>
                                <td>₹170.00</td>
                            </tr>
                            <tr>
                                <td>Red Hot Tomato <strong>× 2</strong></td>
                                <td>₹150.00</td>
                            </tr>
                            <tr>
                                <td>Shipping and Handing</td>
                                <td>₹15.00</td>
                            </tr>
                            <tr>
                                <td><strong>Order Total</strong></td>
                                <td><strong>₹633.00</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->
