<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h1 class="section-title white-color">Register</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?=base_url()?>Home">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->
		<? if(!empty($this->session->flashdata('smessage'))){ ?>
    <div class="alert alert-success alert-dismissible fade in">
      <strong><? echo $this->session->flashdata('smessage'); ?></strong>
    </div>
  <? }
   if(!empty($this->session->flashdata('emessage'))){ ?>
  <div class="alert alert-danger alert-dismissible fade in">
    <strong><? echo $this->session->flashdata('emessage'); ?></strong>
  </div>
<? } ?>
<!-- LOGIN AREA START (Register) -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Register <br>Your Account</h1>
                    <p> Apna Kirana Store<br>
                         </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="<?=base_url()?>User/register_process"method="POST" enctype="application/x-www-form-urlencoded">
                        <input type="text" name="name" placeholder="First Name">
                        <input type="text" name="last" placeholder="Last Name">
                        <input type="text" name="email" placeholder="Email*">
                        <input type="password" name="password" placeholder="Password*">
                        <!-- <input type="password" name="confirmpassword" placeholder="Confirm Password*"> -->
                        <!-- <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            By clicking "create account", I consent to the privacy policy.
                        </label> -->
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                        </div>
                    </form>
                    <div class="by-agree text-center">
                        <!-- <p>By creating an account, you agree to our:</p>
                        <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p> -->
                        <div class="go-to-btn mt-50">
                            <a href="<?=base_url()?>">ALREADY HAVE AN ACCOUNT ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->
