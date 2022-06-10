<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Category extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
    }
    //====================view_category==================\\
    public function view_category()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $this->db->select('*');
            $this->db->from('tbl_category');

            $data['category_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/category/view_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=======================add category==================\\
    public function add_category()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');



            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/category/add_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================add_category_data======================\\
    public function add_category_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $name=$this->input->post('name');


                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('name'=>$name,
                                'ip' =>$ip,
                                'added_by' =>$addedby,
                                'is_active' =>1,
                                'date'=>$cur_date

                                );





                        $last_id=$this->base_model->insert_table("tbl_category", $data_insert, 1) ;
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data inserted successfully');

                            redirect("dcadmin/category/view_category", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);
                        $data_insert = array('name'=>$name,
                                );

                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_category', $data_insert);
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');

                            redirect("dcadmin/category/view_category", "refresh");
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
    //=========================update_category==========================\\
    public function update_category($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_category');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['category']=$dsa->row();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/category/update_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=====================delete_category=====================\\
    public function delete_category($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $zapak=$this->db->delete('tbl_category', array('id' => $id));
                if ($zapak!=0) {
                    redirect("dcadmin/category/view_category", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            } else {
                $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
    public function updatecategoryStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
       'is_active'=>1

       );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_category', $data_update);
                $this->session->set_flashdata('smessage', 'Data inserted successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/category/view_category", "refresh");
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
                $zapak=$this->db->update('tbl_category', $data_update);
                $this->session->set_flashdata('smessage', 'Data inserted successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/category/view_category", "refresh");
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
}
