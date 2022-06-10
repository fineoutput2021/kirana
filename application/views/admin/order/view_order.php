                            <div class="content-wrapper">
                              <section class="content-header">
                                <h1>
                                  New Order
                                </h1>
                                <ol class="breadcrumb">
                                  <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                    <li><a href="<?php echo base_url() ?>dcadmin/order/view_order"><i class="fa fa-dashboard"></i> view order </a></li>
                                  <li class="active"></li>
                                </ol>
                              </section>
                              <section class="content">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <!-- <a class="btn btn-info cticket" href="<?php echo base_url() ?>dcadmin/order/Add_order" role="button" style="margin-bottom:12px;"></a> -->
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View order</h3>
                                      </div>
                                      <div class="panel panel-default">

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
                                          <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered table-hover table-striped" id="userTable">
                                              <thead>
                                                <tr>
                                                  <th>#</th>
                                                  <th>User Name</th>
                                                  <th>final_amount</th>
                                                  <th>payment_type</th>
                                                  <th>name</th>
                                                  <th>phone</th>
                                                  <th>pincode</th>
                                                  <th>email</th>
                                                  <th>address</th>
                                                  <th>status</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php $i=1; foreach ($order1_data->result() as $data) { ?>
                                                <tr>
                                                  <td><?=$i?></td>

                                                  <td><?php             $this->db->select('*');
                                                                                      $this->db->from('tbl_users');
                                                                                      $this->db->where('id', $data->user_id);
                                                                                      $users_data= $this->db->get()->row();
                                                                                      if (!empty($users_data)) {
                                                                                          echo $users_data->name;
                                                                                      } else {
                                                                                          echo "user not found";
                                                                                      }
                                                                                      ?></td>

                                                  <!-- <td><?php ?> </td> -->
                                                  <td><?php echo $data->final_amount ?></td>
                                                  <td>
                                                    <?php if ($data->payment_type== 1) {
                                                                                          echo "COD";
                                                                                      } else {
    echo "online payment";
}  ?></td>

                                                  <td><?php echo $data->name ?></td>
                                                  <td><?php echo $data->phone ?></td>
                                                  <td><?php echo $data->pincode ?></td>
                                                  <td><?php echo $data->email ?></td>
                                                  <td><?php echo $data->address ?></td>
                                                  <td><?php if ($data->order_status==1) {?>
                                                    <p class="label bg-green">Placed</p>
                                                    <?} elseif ($data->order_status==2) {?>
                                                    <p class="label bg-blue">Confirmed</p>

                                                    <?} elseif ($data->order_status==3) {?>
                                                    <p class="label bg-orange">Dispatched</p>

                                                    <?} elseif ($data->order_status==4) {?>
                                                    <p class="label bg-black">Delievered</p>

                                                    <?} elseif ($data->order_status==5) {?>
                                                    <p class="label bg-red">Cancelled</p>
                                                    <?} else {
    echo("rejected");
}

                                                         ?>
                                                  </td>

                                                  <td>
                                                    <div class="btn-group" id="btns<?php echo $i ?>">
                                                      <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <?php if ($data->order_status==1) { ?>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/updateorderStatus/<?php echo base64_encode($data->id) ?>/confirmed">Confirmed</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/updateorderStatus/<?php echo base64_encode($data->id) ?>/reject">Reject</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->id) ?>">order detail</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/view_bill/<?php echo base64_encode($data->id) ?>">view bill</a></li>

                                                          <?php } elseif ($data->order_status==2) {?>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/updateorderStatus/<?php echo base64_encode($data->id) ?>/dispatched">Dispatched</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/updateorderStatus/<?php echo base64_encode($data->id) ?>/reject">Reject</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->id) ?>">order detail</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/view_bill/<?php echo base64_encode($data->id) ?>">view bill</a></li>

                                                          <?php } elseif ($data->order_status==3) {?>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/updateorderStatus/<?php echo base64_encode($data->id) ?>/delievered">Delievered</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/updateorderStatus/<?php echo base64_encode($data->id) ?>/reject">Reject</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->id) ?>">order detail</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/view_bill/<?php echo base64_encode($data->id) ?>">view bill</a></li>

                                                          <?php } elseif ($data->order_status==4) {?>

                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->id) ?>">order detail</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/view_bill/<?php echo base64_encode($data->id) ?>">order bill</a></li>
                                                          <?php } elseif ($data->order_status==5) {?>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->id) ?>">order detail</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/view_bill/<?php echo base64_encode($data->id) ?>">view bill</a></li>

                                                          <?} else {?>

                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->id) ?>">order detail</a></li>
                                                          <li><a href="<?php echo base_url() ?>dcadmin/order/view_bill/<?php echo base64_encode($data->id) ?>">view bill</a></li>
                                                          <?}?>
                                                        </ul>
                                                      </div>
                                                    </div>


                                                  </td>
                                                </tr>
                                                <?php $i++; } ?>
                                              </tbody>
                                            </table>






                                          </div>
                                        </div>
                                      </div>

                                    </div>

                                  </div>
                                </div>
                              </section>
                            </div>


                            <style>
                              label {
                                margin: 5px;
                              }
                            </style>
                            <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
                            <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
                            <script type="text/javascript">
                              $(document).ready(function() {
                                $('#userTable').DataTable({
                                  responsive: true,
                                  // bSort: true
                                });

                                $(document.body).on('click', '.dCnf', function() {
                                  var i = $(this).attr("mydata");
                                  console.log(i);

                                  $("#btns" + i).hide();
                                  $("#cnfbox" + i).show();

                                });

                                $(document.body).on('click', '.cans', function() {
                                  var i = $(this).attr("mydatas");
                                  console.log(i);

                                  $("#btns" + i).show();
                                  $("#cnfbox" + i).hide();
                                })

                              });
                            </script>
                            <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
                                  <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
