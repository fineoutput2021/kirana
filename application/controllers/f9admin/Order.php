<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Order extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    //==============================view_orders=========================\\
    public function view_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 1);//new orders
            $data['order1_data']= $this->db->get();
$data['heading'] = "New";
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===========================placed_orders===========================\\
    public function placed_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 1);//new orders
            $data['order1_data']= $this->db->get();
$data['heading'] = "Placed";




            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    //================================confirmed_orders=======================\\
    public function confirmed_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 2);//new orders
            $data['order1_data']= $this->db->get();
$data['heading'] = "Confirmed";

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===============================dispatched_orders========================\\
    public function dispatched_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 3);//dispatched_orders
            $data['order1_data']= $this->db->get();
            $data['heading'] = "Dispatched";





            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=========================delievered_orders=========================\\
    public function delievered_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 4);//delievered orders
            $data['order1_data']= $this->db->get();
$data['heading'] = "Delievered";




            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    //=============================cancelled_order==========================\\
    public function cancelled_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 5);//cancelled orders
            $data['order1_data']= $this->db->get();
$data['heading'] = "Cancelled";




            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function rejected_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status', 6);//rejected orders
            $data['order1_data']= $this->db->get();
$data['heading'] = "Rejected";




            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==============================update_order_status========================\\
    public function updateorderStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="confirmed") {
                $data_update = array(
                                           'order_status'=>2

                                           );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_order1', $data_update);

                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                  $this->session->set_flashdata('emessage', $upload_error);
                    exit;
                }
            }
            if ($t=="dispatched") {
                $data_update = array(
                                           'order_status'=>3

                                           );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_order1', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('emessage', $upload_error);
                    exit;
                }
            }
            if ($t=="delievered") {
                $data_update = array(
                                           'order_status'=>4

                                           );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_order1', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                      $this->session->set_flashdata('emessage', $upload_error);
                    exit;
                }
            }
            if ($t=="reject") {
                $data_update = array(
                                            'order_status'=>5

                                            );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_order1', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $data['e']="Error Occured";
                    // exit;
                    $this->load->view('errors/error500admin', $data);
                }
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
    //==================================order_detail==========================\\
    public function order_detail($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_order2');
            $this->db->where('main_id', $id);
            $data['order2_data']= $this->db->get();




            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/order_details');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=================================view_bill=============================\\
    public function view_bill($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $data['user_name']=$this->load->get_var('user_name');
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('id', $id);
            $data['order1_data']= $this->db->get()->row();
            $this->db->select('*');
            $this->db->from('tbl_order2');
            $this->db->where('main_id', $id);
            $data['order2_data']= $this->db->get();


            $this->load->view('admin/order/view_bill', $data);
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
