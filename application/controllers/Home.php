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

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/index');
        $this->load->view('frontend/common/footer');
    }

    public function about()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/about');
        $this->load->view('frontend/common/footer');
    }

    public function my_profile()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/my_profile');
        $this->load->view('frontend/common/footer');
    }

    public function cart()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/my_profile');
        $this->load->view('frontend/common/footer');
    }

    public function checkout()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/checkout');
        $this->load->view('frontend/common/footer');
    }

    public function contact()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/common/footer');
    }

    public function login()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/login');
        $this->load->view('frontend/common/footer');
    }

    public function register()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/register');
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

    public function all_products()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/all_products');
        $this->load->view('frontend/common/footer');
    }

    public function producdetails()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/producdetails');
        $this->load->view('frontend/common/footer');
    }

    public function wishlist()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/wishlist');
        $this->load->view('frontend/common/footer');
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
