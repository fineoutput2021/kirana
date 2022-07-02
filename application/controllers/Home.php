<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('is_active', 1);
        $data['slider_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $data['category_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_testimonials');
        $this->db->where('is_active', 1);
        $data['testimonials_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        $this->db->where('feature', 1);
        $data['feature_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        // $this->db->where('feature', 1);
        $data['product_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('is_active', 1);
        $data['subcategory']= $this->db->get();



        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/index');
        $this->load->view('frontend/common/footer');
    }

    public function about()
    {
        $this->db->select('*');
        $this->db->from('tbl_testimonials');
        $this->db->where('is_active', 1);
        $data['testimonials_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/about');
        $this->load->view('frontend/common/footer');
    }

    public function my_profile()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->db->select('*');
            $this->db->from('tbl_users');
            $this->db->where('id', $this->session->userdata('user_id'));
            $data['user_data']= $this->db->get()->row();
            if(!empty($data['user_data'])){
            if($data['user_data']->is_active==1){
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('order_status != ', 0);
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $data['order1_dataa']= $this->db->get();
            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/my_profile');
            $this->load->view('frontend/common/footer');
          }else{
              $this->session->unset_userdata('user_data');
              $this->session->unset_userdata('user_id');
              $this->session->unset_userdata('user_name');
              $this->session->unset_userdata('user_email');
            $this->session->set_flashdata('emessage','Your account is inactive! Please contact admin');
            redirect("/", "refresh");
          }
        }else{
              $this->session->unset_userdata('user_data');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('user_email');
          $this->session->set_flashdata('emessage','User not found');
          redirect("/", "refresh");
        }
        }
    }

    public function cart()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->db->select('*');
            $this->db->from('tbl_cart');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $data['cart_data']= $this->db->get();
            $data['cart_check'] = $data['cart_data']->row();
            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/cart');
            $this->load->view('frontend/common/footer');
        } else {
            $this->load->view('frontend/common/header');
            $this->load->view('frontend/localcart');
            $this->load->view('frontend/common/footer');
        }
    }


    public function contact()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/common/footer');
    }

    public function term_and_condition()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/common/footer');
    }
    public function sign_in()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/login');
        $this->load->view('frontend/common/footer');
    }
    public function contact_form_submit()
    {

                // if(!empty($this->session->userdata('admin_data'))){


        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('last', 'last', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'require|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');
            $this->form_validation->set_rules('message', 'message', 'required|xss_clean|trim');
            if ($this->form_validation->run()== true) {
                $name=$this->input->post('name');
                $last=$this->input->post('last');
                $phone=$this->input->post('phone');
                $email=$this->input->post('email');
                $message=$this->input->post('message');

                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $data_insert = array('name'=>$name." ".$last,
                    'phone'=>$phone,
                    'email'=>$email,
                    'message'=>$message,

                    'ip' =>$ip,
                    // 'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date

                    );


                $last_id=$this->base_model->insert_table("tbl_contact_us", $data_insert, 1) ;



                if ($last_id!=0) {
                    $this->session->set_flashdata('smessage', 'We will get back to you soon');
                    redirect("/", "refresh");
                } else {
                    $this->session->set_flashdata('emessage', 'Sorry error occured');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function subscribe_data()
    {

                // if(!empty($this->session->userdata('admin_data'))){


        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            // print_r($this->input->post());
            // exit;

            $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');


            if ($this->form_validation->run()== true) {
                $email=$this->input->post('email');
                // $passw=$this->input->post('password');

                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                // $addedby=$this->session->userdata('admin_id');



                $data_insert = array(
                    // 'phone'=>$phone,
                    // 'address'=>$address,
                    'email'=>$email,
                    'date'=>$cur_date,
                    'ip' =>$ip,
                    // 'added_by' =>$addedby,
                    'is_active' =>1,
                    );

                $last_id=$this->base_model->insert_table("tbl_subscribe", $data_insert, 1) ;

                if ($last_id!=0) {
                    $this->session->set_flashdata('smessage', 'Subscribed successfully!');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('emessage', 'Sorry error occured');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //================Product Details page type change==============================
    public function type_change()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('type_id', 'type_id', 'xss_clean|trim');


            if ($this->form_validation->run()== true) {
                // $type_id=$this->input->post('type_id');
                $type_id=base64_decode($this->input->post('type_id'));

                $this->db->select('*');
                $this->db->from('tbl_type');
                $this->db->where('id', $type_id);
                $type_data= $this->db->get()->row();

                //   if(!empty($this->session->userdata('user_data'))){
                //   // -----wishlist check----------
                //   $this->db->select('*');
                //   $this->db->from('tbl_wishlist');
                //   $this->db->where('user_id', $this->session->userdata('user_id'));
                //   $this->db->where('type_id', $type_id);
                //   $wish_data = $this->db->get()->row();
                //   if(!empty($wish_data)){
                //     $existsInWishlist = 1;
                //   }else{
                //     $existsInWishlist = 0;
                //   }
                // }else{
                //   $existsInWishlist = 33;
                // }


                $respone['data'] = 'success';
                $respone['data_message'] = 'success';
                $respone['update_type'] = $type_data;
                // $respone['existsInWishlist'] = $existsInWishlist;
                echo json_encode($respone);
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


    public function register()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/register');
        $this->load->view('frontend/common/footer');
    }


    public function search()
    {
        $string= $this->input->get('search');

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->like('name', $string);
        $this->db->where('is_active', 1);
        $data['products_data']= $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $data['category_data']= $this->db->get();
        $data['subcategoryName'] = "Search Results";
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/all_products');
        $this->load->view('frontend/common/footer');
    }


    public function order_failed()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/order_failed');
        $this->load->view('frontend/common/footer');
    }


    public function order_success()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/order_success');
        $this->load->view('frontend/common/footer');
    }

    public function all_products($idd, $sort="")
    {
        $id=base64_decode($idd);
        $data['id']=$idd;
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('is_active', 1);
        $this->db->where('id', $id);
        $sub_data = $this->db->get()->row();
        $data['subcategoryName'] = $sub_data->name;

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        if(!empty($sort)){
          if($sort=="AZ"){
            $this->db->order_by('name', "aesc");
          }elseif($sort=="ZA"){
            $this->db->order_by('name', "desc");
          }elseif($sort=="NA"){
            $this->db->order_by('id', "desc");
          }elseif($sort=="FP"){
            $this->db->where('feature', 1);
          }
        }
        $this->db->where('subcategory_id', $id);
        $data['products_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $data['category_data']= $this->db->get();

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/all_products');
        $this->load->view('frontend/common/footer');
    }

    public function product_detail($idd)
    {
        $id=base64_decode($idd);
        $data['id']=$idd;
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        $this->db->where('id', $id);
        $data['product_data'] = $this->db->get()->row();

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        $this->db->where('id != ', $id);
        $this->db->where('subcategory_id', $data['product_data']->subcategory_id);
        $data['related_data']= $this->db->get();

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/product_details');
        $this->load->view('frontend/common/footer');
    }

    public function wishlist()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->db->select('*');
            $this->db->from('tbl_wishlist');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $data['wish_data']= $this->db->get();
            $data['wish_check'] = $data['wish_data']->row();
            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/wishlist');
            $this->load->view('frontend/common/footer');
        } else {
            $this->session->set_flashdata('emessage', 'Please Login First!');
            redirect("/", "refresh");
        }
    }

    public function error404()
    {
        $this->load->view('errors/error404');
    }



    // public function blog()
    // {
    //
    //
    // 											$this->db->select('*');
    // 											$this->db->from('tbl_blog');
    // 											$this->db->where('is_active',1);
    // 											$this->db->order_by('blog_id', 'DESC');
    // 											$data['blog_data']= $this->db->get();
    //
    //
    //
    //
    // 		$this->load->view('blog/header',$data);
    // 		$this->load->view('blog/blog');
    // 		$this->load->view('blog/footer');
    //     // }
    // }


        // public function single()
        // {
        //
        // 		$this->load->view('blog/single-header');
        // 		$this->load->view('blog/blogsingle');
        // 		$this->load->view('blog/footer');
        //
        // }
}
