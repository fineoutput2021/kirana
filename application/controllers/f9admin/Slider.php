<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Slider extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    //========================view_slider======================\\
    public function view_slider()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $this->db->select('*');
            $this->db->from('tbl_slider');
            //$this->db->where('id',$usr);
            $data['slider_data']= $this->db->get();



            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider/view_slider');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================add_slider===================\\
    public function add_slider()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');



            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider/add_slider');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==============================add_slider_data=====================\\
    public function add_slider_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('link', 'link', 'required|xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $link=$this->input->post('link');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');
                    $this->load->library('upload');
                    //=================image_upload==============\\
                    $image="";
                    $img1='image';

                    $file_check=($_FILES['image']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/slider/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="slider".date("Ymdhms");
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
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/slider/".$new_file_name.$file_info['file_ext'];
                            $image=$videoNAmePath;
                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                            // echo json_encode($file_info);
                        }
                    }
                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array(
                                                        'image'=>$image,
                                                    'link'=>$link,
                                                    'ip' =>$ip,
                                                    'added_by' =>$addedby,
                                                    'is_active' =>1,
                                                    'date'=>$cur_date

                                                    );





                        $last_id=$this->base_model->insert_table("tbl_slider", $data_insert, 1) ;
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');

                            redirect("dcadmin/slider/view_slider", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);
                        if (!empty($image)) {
                            $data_insert = array('link'=>$link,
                                                                     'image'=>$image,

                                                                     );
                        } else {
                            $data_insert = array('link'=>$link,
                                     );
                        }

                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_slider', $data_insert);
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');

                            redirect("dcadmin/slider/view_slider", "refresh");
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
    //======================update_slider===================\\

    public function update_slider($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_slider');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['slider']=$dsa->row();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider/update_slider');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    //======================delete_slider===================\\

    public function delete_slider($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $this->db->select('image');
                $this->db->from('tbl_slider');
                $this->db->where('id', $id);
                $dsa= $this->db->get();
                $da=$dsa->row();
                // $img=$da->image;

                $zapak=$this->db->delete('tbl_slider', array('id' => $id));
                if ($zapak!=0) {
                    // $path = FCPATH . "assets/public/slider/".$img;
                    // unlink($path);

                    redirect("dcadmin/slider/view_slider", "refresh");
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

    //==================update_slider status=====================\\
    public function updatesliderStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
                              'is_active'=>1

                              );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_slider', $data_update);
                $this->session->set_flashdata('smessage', 'Data inserted successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/slider/view_slider", "refresh");
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
                $zapak=$this->db->update('tbl_slider', $data_update);
                $this->session->set_flashdata('smessage', 'Data inserted successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/slider/view_slider", "refresh");
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
