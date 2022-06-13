<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Product extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    //===========================view_product==========================\\
    public function view_product()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_product');

            $data['product_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/product/view_product');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==========================add_product==========================\\
    public function add_product()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_category');
            $data['category_data']= $this->db->get();

            $this->db->select('*');
            $this->db->from('tbl_subcategory');
            $data['subcategory_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/product/add_product');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //========================add_user_data=========================\\
    public function add_product_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('category_id', 'category_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('subcategory_id', 'subcategory_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                $this->form_validation->set_rules('description', 'description', 'required|xss_clean|trim');


                if ($this->form_validation->run()== true) {
                    $name=$this->input->post('name');
                    $category_id=$this->input->post('category_id');
                    $subcategory_id=$this->input->post('subcategory_id');
                    $description=$this->input->post('description');


                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');
                    //========================image_1 upload========================\\
                    $this->load->library('upload');
                    $image1="";
                    $img1='image1';

                    $file_check=($_FILES['image1']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/product/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="product".date("Ymdhms");
                        $this->upload_config = array(
                  'upload_path'   => $image_upload_folder,
                  'file_name' => $new_file_name,
                  'allowed_types' =>'jpg|jpeg|png',
                  'max_size'      => 25000
                  );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img1)) {
                            $upload_error = $this->upload->display_errors();
                            // echo json_encode($upload_error);
                            $this->session->set_flashdata('emessage', $upload_error);
                            //echo $upload_error;
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/product/".$new_file_name.$file_info['file_ext'];
                            $image1=$videoNAmePath;

                            // echo json_encode($file_info);
                        }
                    }
                    //============================image_2 upload=======================\\
                    $this->load->library('upload');
                    $image2="";
                    $img2='image2';

                    $file_check=($_FILES['image2']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/product/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="product2".date("Ymdhms");
                        $this->upload_config = array(
                  'upload_path'   => $image_upload_folder,
                  'file_name' => $new_file_name,
                  'allowed_types' =>'jpg|jpeg|png',
                  'max_size'      => 25000
                  );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img2)) {
                            $upload_error = $this->upload->display_errors();
                            // echo json_encode($upload_error);
                            $this->session->set_flashdata('emessage', $upload_error);
                            //echo $upload_error;
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/product/".$new_file_name.$file_info['file_ext'];
                            $image2=$videoNAmePath;

                            // echo json_encode($file_info);
                        }
                    }
                    //=============================image_3 upload===============================\\
                    $this->load->library('upload');
                    $image3="";
                    $img3='image3';

                    $file_check=($_FILES['image3']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/product/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="product3".date("Ymdhms");
                        $this->upload_config = array(
                  'upload_path'   => $image_upload_folder,
                  'file_name' => $new_file_name,
                  'allowed_types' =>'jpg|jpeg|png',
                  'max_size'      => 25000
                  );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img3)) {
                            $upload_error = $this->upload->display_errors();
                            // echo json_encode($upload_error);
                            $this->session->set_flashdata('emessage', $upload_error);
                            //echo $upload_error;
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/product/".$new_file_name.$file_info['file_ext'];
                            $image3=$videoNAmePath;

                            // echo json_encode($file_info);
                        }
                    }
                    //==========================image_4 upload=======================\\
                    $this->load->library('upload');
                    $image4="";
                    $img4='image4';

                    $file_check=($_FILES['image4']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/product/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="product4".date("Ymdhms");
                        $this->upload_config = array(
                  'upload_path'   => $image_upload_folder,
                  'file_name' => $new_file_name,
                  'allowed_types' =>'jpg|jpeg|png',
                  'max_size'      => 25000
                  );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img4)) {
                            $upload_error = $this->upload->display_errors();
                            // echo json_encode($upload_error);
                            $this->session->set_flashdata('emessage', $upload_error);
                            //echo $upload_error;
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/product/".$new_file_name.$file_info['file_ext'];
                            $image4=$videoNAmePath;
                        }
                    }

                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('category_id'=>$category_id,
                    'subcategory_id'=>$subcategory_id,
                    'name'=>$name,
                    'image1'=>$image1,
                    'image2' =>$image2,
                    'image3' =>$image3,
                    'image4' =>$image4,
                    'description' =>$description,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date

                    );

                        $last_id=$this->base_model->insert_table("tbl_product", $data_insert, 1) ;
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data inserted successfully');

                            redirect("dcadmin/product/view_product", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);
                        $this->db->select('*');
                        $this->db->from('tbl_product');
                        $this->db->where('id', $idw);
                        $pro_data= $this->db->get()->row();
                        if (empty($image1)) {
                            $image1=$pro_data->image1;
                        }
                        if (empty($image2)) {
                            $image2=$pro_data->image2;
                        }
                        if (empty($image3)) {
                            $image3=$pro_data->image3;
                        }
                        if (empty($image4)) {
                            $image4=$pro_data->image4;
                        }
                        $data_insert = array('category_id'=>$category_id,
             'subcategory_id'=>$subcategory_id,
             'name'=>$name,
             'image1'=>$image1,
             'image2' =>$image2,
             'image3' =>$image3,
             'image4' =>$image4,
             'description' =>$description,


             );





                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_product', $data_insert);
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');

                            redirect("dcadmin/product/view_product", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }



                } else {
                    $this->session->set_flashdata('emessage', validation_errors());
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //======================update_product===================\\

    public function update_product($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_category');
            //$this->db->where('id',$usr);
            $data['category_data']= $this->db->get();

            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_product');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['product']=$dsa->row();

            $this->db->select('*');
            $this->db->from('tbl_subcategory');
            $this->db->where('category_id', $data['product']->category_id);
            $data['subcategory_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/product/update_product');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===========================delete_product========================\\
    public function delete_product($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $zapak=$this->db->delete('tbl_product', array('id' => $id));
                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Data deleted successfully');
                    redirect("dcadmin/product/view_product", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            }

            else {
                $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
    //==================update_product_status=====================\\
    public function updateproductStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
                            'is_active'=>1

                            );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_product', $data_update);

                $this->session->set_flashdata('smessage', 'Data updated successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/product/view_product", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            }
            if ($t=="inactive") {
                $data_update = array(
                            'is_active'=>0

                            );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_product', $data_update);
                  $this->session->set_flashdata('smessage', 'Data updated successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/product/view_product", "refresh");
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

    //============== category subcategory =============
    public function get_subcategory()
    {
        $cat_id=$_GET['cat_id'];
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('category_id', $cat_id);
        $subcat_data= $this->db->get();
        $res=[];
        foreach ($subcat_data->result() as $data) {
            $res[]= array(
          'id'=>$data->id,
          'name'=>$data->name,
        );
        }
        echo json_encode($res);
    }
}
