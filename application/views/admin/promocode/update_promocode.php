<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Update promocode
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/promocode/view_promocode"><i class="fa fa-dashboard"></i> view promocode </a></li>

    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New promocode</h3>
          </div>

          <?php if (!empty($this->session->flashdata('smessage'))) { ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo $this->session->flashdata('smessage'); ?>
          </div>
          <?php }
                                       if (!empty($this->session->flashdata('emessage'))) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php echo $this->session->flashdata('emessage'); ?>
          </div>
          <?php } ?>


          <div class="panel-body">
            <div class="col-lg-10">
              <form action="<?php echo base_url() ?>dcadmin/promocode/add_promocode_data/<?php echo base64_encode(2); ?>/<?=$id?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">

                    <tr>
                      <td> <strong>Promocode</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="text" name="promocode" class="form-control" placeholder="" value="<?=$promocode->promocode?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Gift(%)</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" name="giftpercent" class="form-control" placeholder="" value="<?=$promocode->giftpercent?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Expiry_date</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="date" name="expiry" class="form-control" placeholder="" value="<?=$promocode->expiry?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Minimum Order Amount</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" name="minorder" class="form-control" placeholder="" value="<?=$promocode->minorder?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Maximum discount</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" name="max" class="form-control" placeholder="" value="<?=$promocode->max?>" />
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <input type="submit" class="btn btn-success" value="save">
                      </td>
                    </tr>
                  </table>
                </div>

              </form>

            </div>



          </div>

        </div>

      </div>
    </div>
  </section>
</div>
<script>
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
       month = '0' + month.toString();
   if(day < 10)
       day = '0' + day.toString();

   var maxDate = year + '-' + month + '-' + day;
   // alert(maxDate);

    $('#expdate').attr('min', maxDate);
});
</script>



<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
