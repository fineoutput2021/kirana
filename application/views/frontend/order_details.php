<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                <div class="section-title-area ltn__section-title-2">
                    <h1 class="section-title white-color">Order Details</h1>
                </div>
                <div class="ltn__breadcrumb-list">
                    <ul>
                        <li><a href="<?=base_url()?>Home/">Home</a></li>
                        <li>Order Id: <?=base64_decode($id)?></li>
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
          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>S No.</th>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Quantity</th>
                          <th>Selling Price</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?$i = 1; foreach($order2_data->result() as $order2){?>
                      <tr>
                          <td><?=$i;?></td>
                          <td><?$this->db->select('*');
                          $this->db->from('tbl_product');
                          $this->db->where('id', $order2->product_id);
                          $pro_data = $this->db->get()->row();
                          if(!empty($pro_data)){
                            echo $pro_data->name;
                          }else{
                            echo "Product Not Found";
                          }
                          ?></td>
                          <td>
                            <?$this->db->select('*');
                            $this->db->from('tbl_type');
                            $this->db->where('id', $order2->type_id);
                            $type_data = $this->db->get()->row();
                            if(!empty($type_data)){
                              echo $type_data->name;
                            }else{
                              echo "Type Not Found";
                            }
                            ?>
                          </td>
                          <td><?=$order2->quantity?> </td>
                          <td>₹<?=$order2->selling_price?> </td>
                          <td>₹<?=$order2->total_amount?> </td>
                      </tr>
                      <?$i++; }?>
                  </tbody>
              </table>
          </div>
        </div>
    </div>
</div>
</div>
<!-- WISHLIST AREA START -->
