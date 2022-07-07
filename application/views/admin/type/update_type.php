<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Update Type <?=$productName?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <!-- <li><a href="<?php echo base_url() ?>dcadmin/type/view_type"><i class="fa fa-dashboard"></i> view Type </a></li> -->

    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update type</h3>
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
              <form action="<?php echo base_url() ?>dcadmin/type/add_type_data/<?php echo base64_encode(2); ?>/<?=$id?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <input type="hidden" name="product_id" value="<?=base64_encode($type->product_id)?>">
                    <tr>
                      <td> <strong>Name</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="text" name="name" class="form-control" placeholder="" value="<?=$type->name?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>MRP</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" id="mrp" name="mrp" class="form-control" placeholder=""required value="<?=$type->mrp?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Selling price with(GST)</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" id="spgst" name="spgst" class="form-control" placeholder=""required value="<?=$type->spgst?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>GST(%)</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" name="gst" readonly id="gst" class="form-control" placeholder=""required value="<?=$type->gst?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Selling Price</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="number" name="sp" readonly id="sp" class="form-control" placeholder=""required value="<?=$type->sp?>" />
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
</script>
<script>
  $(document).ready(function() {
    $('#spgst, #mrp').keyup(function(ev) {
      var mrp = $('#mrp').val() * 1;
      var spgst = $('#spgst').val() * 1;
      var gst = ((spgst-mrp) / spgst) * 100;
      gst = Math.round(gst)
      var sp = mrp + ((spgst-mrp) / spgst);
      sp = Math.round(sp)
      $("#sp").val(sp)
      $("#gst").val(gst)
    });
  });
</script>



<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
