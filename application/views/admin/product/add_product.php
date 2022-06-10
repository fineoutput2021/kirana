<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add New Product
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/product/view_product"><i class="fa fa-dashboard"></i> view Product </a></li>

    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New product</h3>
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
              <form action="<?php echo base_url() ?>dcadmin/product/add_product_data/<?php echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">

                    <tr>
                      <td> <strong>Category</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <select name="category_id" id="category_id" class="form-control">
                          <!-- <option value=""</option> -->
                          <?php $i=1; foreach ($category_data->result() as $category) { ?>
                          <option value="<?=$category->id?>"><?=$category->name?></option>
                          <?php $i++; } ?>
                      </td>
                    </tr>

                    <tr>
                      <td> <strong>Subcategory</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                          <!-- <option value="">=========select subcategory==============</option> -->
                          <?php $i=1; foreach ($subcategory_data->result() as $subcategory) { ?>
                          <option value="<?=$subcategory->id?>"><?=$subcategory->name?></option>
                          <?php $i++; } ?>
                      </td>
                    </tr>

                    <tr>
                      <td> <strong>Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="name" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image1</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image1" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image2</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="file" name="image2" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image3</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="file" name="image3" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image4</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="file" name="image4" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Description</strong> <span style="color:red;"></span></strong> </td>
                      <td>
                        <input type="text" name="description" class="form-control" placeholder="" value="" />
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
  $(document).ready(function() {
    $("#category_id").change(function() {
      var vf = $(this).val();
      if (vf == "") {
        return false;
      } else {
        // alert(vf)
        $('#subcategory_id option').remove();
        // var opton = "<option value=''>Please Select </option>";
        var opton = '';
        $.ajax({
          url: base_url + "dcadmin/Product/get_subcategory?cat_id=" + vf,
          data: '',
          type: "get",
          success: function(response) {
            if (response != "NA") {
              var data = jQuery.parseJSON(response);
              $.each(data, function(i) {
                opton += '<option value="' + data[i]['id'] + '">' + data[i]['name'] + '</option>';
              });
              $('#subcategory_id').append(opton);
            } //if end
          } //success end
        }); //ajax end
      }
    });
  });
</script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
