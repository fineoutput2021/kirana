<?php

ob_start(); if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
    }

    //-------------calculate--------------

    public function calculate()
    {
        $user_id = $this->session->userdata('user_id');
        //---------get cart data----------------
        $this->db->select('*');
        $this->db->from('tbl_cart');
        $this->db->where('user_id', $user_id);
        $cartInfo= $this->db->get();
        $cart_e = $cartInfo->row();

        if (!empty($cart_e)) {
            $ip = $this->input->ip_address();
            date_default_timezone_set("Asia/Calcutta");
            $cur_date=date("Y-m-d H:i:s");
            $total = 0;
            foreach ($cartInfo->result() as $cart) {
                $price=0;
                $this->db->select('*');
                $this->db->from('tbl_type');
                $this->db->where('id', $cart->type_id);
                $pro_data= $this->db->get()->row();

                $price = $pro_data->spgst * $cart->quantity;
                $total= $total + $price;

                // //-----check inventory------
                // $this->db->select('*');
                // $this->db->from('tbl_inventory');
                // $this->db->where('type_id',$cart->type_id);
                // $inventory= $this->db->get()->row();
                // if (!empty($inventory->quantity)) {
                //     if ($inventory->quantity >= $cart->quantity) {
                //
                //     } else {
                //         $this->session->set_flashdata('emessage', ''.$pro_data->name.'  is out of stock');
                //         redirect($_SERVER['HTTP_REFERER']);
                //     }
                // } else {
                //     $this->session->set_flashdata('emessage', ''.$pro_data->name.'  is out of stock');
                //     redirect($_SERVER['HTTP_REFERER']);
                // }
                $user_id = $this->session->userdata('user_id');
                $final_amount = $total ;
            }
            if ($final_amount < 1000) {
                $this->session->set_flashdata('emessage', 'Total cart amount should be greater than ₹1000');
                redirect($_SERVER['HTTP_REFERER']);
                exit;
            }
            $final_amount = $final_amount + 50;
            //------order1 entry-------------
            $order1_insert = array('user_id'=>$user_id,
                        'total_amount'=>$total,
                        'final_amount'=>round($final_amount, 2),
                        'payment_status'=>0,
                        'order_status'=>0,
                        'shipping'=>50,
                        'ip' =>$ip,
                        'date'=>$cur_date
                        );

            $last_id=$this->base_model->insert_table("tbl_order1", $order1_insert, 1) ;

            if (!empty($last_id)) {

//---------------order2 entires-------------------
                foreach ($cartInfo->result() as $cart2) {
                    $this->db->select('*');
                    $this->db->from('tbl_type');
                    $this->db->where('id', $cart2->type_id);
                    $pro_data= $this->db->get()->row();

                    $total = $pro_data->spgst * $cart2->quantity;

                    $order2_insert = array('main_id'=>$last_id,
                        'product_id'=>$cart2->product_id,
                        'type_id'=>$cart2->type_id,
                        'quantity'=>$cart2->quantity,
                        'mrp'=>$pro_data->mrp,
                        'selling_price'=>$pro_data->spgst,
                        'total_amount'=>$total,
                        'date'=>$cur_date
                        );

                    $last_id2=$this->base_model->insert_table("tbl_order2", $order2_insert, 1);
                }
                // die();
                if (!empty($last_id)) {
                    $this->session->set_userdata('order_id', base64_encode($last_id));
                    // echo $this->session->userdata('order_id');
                    redirect("Order/view_checkout", "refresh");
                } else {
                    $this->session->set_flashdata('emessage', 'Some error occured! Please try again');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Some error occured');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please add product for process to checkout');
            redirect("/", "refresh");
        }
    }

    //--------view checkout---------

    public function view_checkout()
    {
        if ((!empty($this->session->userdata('user_data')) && !empty($this->session->userdata('order_id')))) {
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('id', base64_decode($this->session->userdata('order_id')));
            $data['order_data']= $this->db->get()->row();

            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/checkout');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }

    //-----------apply promocode---------
    public function apply_promocode()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('promocode', 'promocode', 'required|xss_clean|trim');
            $this->form_validation->set_rules('order_id', 'order_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $promocode=$this->input->post('promocode');
                $order_id=$this->input->post('order_id');
                // echo $order_id;die();
                $promocode = strtoupper($promocode);
                $order_id=base64_decode($order_id);
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d");

                $discount = 0;
                $promocode_id=0;

                // echo $promocode;
                // exit;
                $this->db->select('*');
                $this->db->from('tbl_promocode');
                $this->db->where('promocode', $promocode);
                $this->db->where('is_active', 1);
                $dsa= $this->db->get();
                $promocode_data=$dsa->row();

                if (!empty($promocode_data)) {
                    $this->db->select('*');
                    $this->db->from('tbl_order1');
                    $this->db->where('id', $order_id);
                    $order_data= $this->db->get()->row();


                    $final_amount = 0;
                    $promocode_id = $promocode_data->id;
                    if ($promocode_data->ptype==1) {
                        $this->db->select('*');
                        $this->db->from('tbl_order1');
                        $this->db->where('user_id', $order_data->user_id);
                        $this->db->where('promocode', $promocode_data->id);
                        $dsa= $this->db->get();
                        $promo_check=$dsa->row();

                        if (empty($promo_check)) {
                            date_default_timezone_set("Asia/Calcutta");
                            $cur_date=date("Y-m-d");
                            if ($promocode_data->expiry >= $cur_date) {
                                if ($order_data->total_amount > $promocode_data->minorder) { //----checking minorder for promocode
                                    // echo "hii";

                                    $discount_amt = $order_data->total_amount * $promocode_data->giftpercent/100;
                                    if ($discount_amt > $promocode_data->max) {
                                        // will get max amount
                                        $discount =  $promocode_data->max;
                                    } else {
                                        $discount =  $discount_amt;
                                    }
                                }//endif of minorder
                                else {
                                    $respone['data'] = false;
                                $respone['data_message'] = 'Please add more products for promocode';
                                echo json_encode($respone);
                                return;
                                }
                            } else {
                              $respone['data'] = false;
                          $respone['data_message'] = 'Invalid Promocode';
                          echo json_encode($respone);
                          return;


                            }
                        } else {
                            $respone['data'] = false;
                            $respone['data_message'] = 'Promocode already used';
                            echo json_encode($respone);
                            return;

                        }
                    }
                    //-----every time promocode---
                    else {
                        if ($order_data->total_amount > $promocode_data->minorder) { //----checking minorder for promocode
                            // echo "hii";

                            $discount_amt = $order_data->total_amount * $promocode_data->giftpercent/100;
                            if ($discount_amt > $promocode_data->max) {
                                // will get max amount
                                $discount =  $promocode_data->max;
                            } else {
                                $discount =  $discount_amt;
                            }
                        }//endif of minorder
                        else {
                            $respone['data'] = false;
                            $respone['data_message'] = 'Please add more products for promocode';
                            echo json_encode($respone);
                            return;

                        }
                    }


                    $final_amount = $order_data->total_amount - $discount;


                    //-------table_order1 entry-------

                    $update_order1_data = array(
          'promocode'=>$promocode_id,
          'promo_discount'=>$discount,
          );

                    $this->db->where('id', $order_id);
                    $last_id=$this->db->update('tbl_order1', $update_order1_data);

                    if (!empty($last_id)) {
          //               $response  = array(
          //
          // 'total' => $order_data->total_amount,
          // 'sub_total' => $final_amount,
          // 'promocode_discount' => $discount,
          // 'promocode_id' => $promocode_id,
          //
          // );
          //
          //
          //               $res = array('message'=>'success',
          // 'status'=>200,
          // 'data'=>$response
          // );

                        $respone['data'] = true;
                        $respone['data_message'] = 'success';
                        echo json_encode($respone);
                    } else {
                        $respone['data'] = false;
                        $respone['data_message'] = 'some eroor occured! please try again';
                        echo json_encode($respone);
                        return;

                    }
                } else {
                  $respone['data'] = false;
                  $respone['data_message'] = 'invalid promocode';
                  echo json_encode($respone);
                  return;

                }
            } else {
                $respone['data'] = false;
                $respone['data_message'] = validation_errors();
                echo json_encode($respone);
                return;
                
            }
        } else {
            $respone['data'] = false;
            $respone['data_message'] ="Please insert some data, No data available";
            echo json_encode($respone);
            return;

        }
    }

    //------remove promocode--------
    public function remove_promocode()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('order_id', 'order_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $order_id=$this->input->post('order_id');

                $order_id=base64_decode($order_id);
                $this->db->select('*');
                $this->db->from('tbl_order1');
                $this->db->where('id', $order_id);
                $orderdata= $this->db->get()->row();

                $final_amount = $orderdata->final_amount + $orderdata->promo_discount;

                $data_update = array('promocode'=>"",
            'promo_discount'=>"",
            'final_amount'=>$final_amount
          );
                $this->db->where('id', $order_id);
                $zapak=$this->db->update('tbl_order1', $data_update);
                if (!empty($zapak)) {
                    $respone['data'] = true;
                    $respone['data_message'] ="Promocode removed successfully";
                    echo json_encode($respone);
                } else {
                    $respone['data'] = false;
                    $respone['data_message'] ="Some error occured";
                    echo json_encode($respone);
                }
            } else {
                $respone['data'] = false;
                $respone['data_message'] = validation_errors();
                echo json_encode($respone);
            }
        } else {
            $respone['data'] = false;
            $respone['data_message'] ="Please insert some data, No data available";
            echo json_encode($respone);
        }
    }

    //--------checkout----------------
    public function checkout()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('order_id', 'order_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
                $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
                $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
                $this->form_validation->set_rules('pincode', 'pincode', 'required|xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
                $this->form_validation->set_rules('payment_method', 'payment_method', 'required|xss_clean|trim');


                if ($this->form_validation->run()== true) {
                    $order_id=base64_decode($this->input->post('order_id'));
                    $name=$this->input->post('name');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $address=$this->input->post('address');
                    $pincode=$this->input->post('pincode');
                    $state=$this->input->post('state');
                    $payment_method=$this->input->post('payment_method');
                    $user_id=$this->session->userdata('user_id');
                    // exit;
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");
                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('id', $user_id);
                    $user_data = $this->db->get()->row();
                    if (!empty($user_data)) {
                        if ($user_data->is_active==1) {

                    //----------order1 entry-------------
                            $order1_update = array(
                                'name'=>$name,
                                'email'=>$email,
                                'phone'=>$phone,
                                'address'=>$address,
                                'state'=>$state,
                                'pincode'=>$pincode,
                                'payment_status'=>1,
                                'payment_type'=>1,
                                'order_status'=>1,
                                'date'=>$cur_date,
                                'ip'=>$ip,
                                  );
                            // print_r($order1_update);die();
                            $this->db->where('id', $order_id);
                            $zapak2 = $this->db->update('tbl_order1', $order1_update);
                            // echo $zapak2;die();

                            if ($zapak2==1) {
                                // redirect("Order/online_payment");
                                $this->db->select('*');
                                $this->db->from('tbl_order2');
                                $this->db->where('main_id', $order_id);
                                $order2_data = $this->db->get();
                                // print_r($order2_data);die();

                                //--------------inventory update and cart delete--------
                                foreach ($order2_data->result() as $odr2) {
                                    // echo $user_id;
                                    // echo $odr2->product_id;
                                    // exit;

                                    //-------cart delete---------
                                    $delete=$this->db->delete('tbl_cart', array('user_id' => $user_id,'product_id'=>$odr2->product_id, 'type_id'=>$odr2->type_id));
                                    $this->session->unset_userdata('cart_data');
                                    // $this->session->unset_userdata('order_id');
                            // echo "hi";die();
                                }

//
                                // $config = Array(
                                // 'protocol' => 'smtp',
                                // 'smtp_host' => SMTP_HOST,
                                // 'smtp_port' => SMTP_PORT,
                                // 'smtp_user' => USER_NAME, // change it to yours
                                // 'smtp_pass' => PASSWORD, // change it to yours
                                // 'mailtype' => 'html',
                                // 'charset' => 'iso-8859-1',
                                // 'wordwrap' => true
                                // );
                                // $to=$email;
                                // $data['name']= $name;
                                // $data['email']= $email;
                                // $data['phone']= $phone;
                                // $data['order1_id']= $order_id;
                                // $data['date']= $cur_date;
//
//
//
                                // $message =$this->load->view('email/ordersuccess',$data,TRUE);
                                // // echo $to;
                                // // print_r($message);
                                // // exit;
//
                                // $this->load->library('email', $config);
                                // $this->email->set_newline("");
                                // $this->email->from(EMAIL); // change it to yours
                                // $this->email->to($to);// change it to yours
                                // $this->email->subject('Order Placed');
                                // $this->email->message($message);
                                // if($this->email->send()){
                                // // echo 'Email sent.';
                                // }else{
                                // show_error($this->email->print_debugger());
                                // }
                                // die();
                                $respone['data'] = true;
                                echo json_encode($respone);
                                redirect("Order/order_success", "refresh");
                            } else {
                                $respone['data'] = false;
                                $respone['data_message'] ="Some error occured";
                                echo json_encode($respone);
                            }
                        } else {
                            $this->session->unset_userdata('user_data');
                            $this->session->unset_userdata('user_id');
                            $this->session->unset_userdata('user_name');
                            $this->session->unset_userdata('user_email');
                            $respone['data'] = false;
                            $respone['data_message'] ="Your account is inactive! Contact Admin";
                            echo json_encode($respone);
                        }
                    } else {
                        $this->session->unset_userdata('user_data');
                        $this->session->unset_userdata('user_id');
                        $this->session->unset_userdata('user_name');
                        $this->session->unset_userdata('user_email');
                        $respone['data'] = false;
                        $respone['data_message'] ="User Not Found!";
                        echo json_encode($respone);
                    }
                } else {
                    $respone['data'] = false;
                    $respone['data_message'] = validation_errors();
                    echo json_encode($respone);
                }
            } else {
                $respone['data'] = false;
                $respone['data_message'] ="Please insert some data, No data available";
                echo json_encode($respone);
            }
        } else {
            $respone['data'] = false;
            $respone['data_message'] ="Some unknown error occured";
            echo json_encode($respone);
        }
    }

    //-----------order success---------
    public function order_success()
    {
        if ((!empty($this->session->userdata('user_data')) && !empty($this->session->userdata('order_id'))) || (!empty($this->session->userdata('guest_data')) && !empty($this->session->userdata('order_id')))) {
            $user_id = $this->session->userdata('user_id');

            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('id', base64_decode($this->session->userdata('order_id')));
            $orderdata= $this->db->get()->row();

            $data['order_id'] =$orderdata->id;
            $data['amount'] =$orderdata->final_amount;
            $data['user_id'] =$user_id;

            $this->session->unset_userdata('order_id');

            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/order_success');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }

    public function order_failed()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/order_failed');
        $this->load->view('frontend/common/footer');
    }

    //===========View my orders=========================
    public function view_order()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $user_id=$this->session->userdata('user_id');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('user_id', $user_id);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_status!= ', 0);
            $data['order1_data']= $this->db->get();
            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/my_orders');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }
    //=================Order details===========================
    public function order_details($idd)
    {
        if (!empty($this->session->userdata('user_data'))) {
            $id=base64_decode($idd);

            $this->db->select('*');
            $this->db->from('tbl_order2');
            $this->db->where('main_id', $id);
            $data['order_detail']= $this->db->get();
            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/order_details');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }
    //--------cancel order---------
    public function cancel_order($idd)
    {
        $order_id=base64_decode($idd);
        // $order_id=base64_decode($this->input->post('order_id'));
        // echo $order_id;die();

        $data_update = array(
        'order_status'=>5

);

        $this->db->where('id', $order_id);
        $zapak=$this->db->update('tbl_order1', $data_update);

        //-------update inventory-------
        $this->db->select('*');
        $this->db->from('tbl_order2');
        $this->db->where('main_id', $order_id);
        $data_order2= $this->db->get();

        foreach ($data_order2->result() as $data) {
            $this->db->select('*');
            $this->db->from('tbl_inventory');
            $this->db->where('type_id', $data->type_id);
            $pro_data= $this->db->get()->row();
            if (!empty($pro_data)) {
                $update_inv = $pro_data->quantity + $data->quantity;
                $data_update = array('quantity'=>$update_inv,
);
                $this->db->where('id', $pro_data->id);
                $zapak2=$this->db->update('tbl_inventory', $data_update);
            }
        }

        if (!empty($zapak)) {
            $this->session->set_flashdata('smessage', 'Order cancelled successfully');
            redirect("Order/view_order");
        } else {
            $this->session->set_flashdata('emessage', 'Some error occured');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
