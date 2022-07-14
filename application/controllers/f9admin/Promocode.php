<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Promocode extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    //============================view_promocode=======================\\
    public function view_promocode()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_promocode');
            //$this->db->where('id',$usr);
            $data['promocode_data']= $this->db->get();



            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/promocode/view_promocode');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //================================add_promocode========================\\
    public function add_promocode()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');




            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/promocode/add_promocode');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=============================add_promocode_data==================\\
    public function add_promocode_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('promocode', 'promocode', 'required|xss_clean|trim');
                  $this->form_validation->set_rules('ptype', 'ptype', '');
                $this->form_validation->set_rules('giftpercent', 'giftpercent', 'required|xss_clean|trim');
                $this->form_validation->set_rules('expiry', 'expiry', 'required|xss_clean|trim');
                $this->form_validation->set_rules('minorder', 'minorder', 'required|xss_clean|trim');
                $this->form_validation->set_rules('max', 'max', 'required|xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $promocode=$this->input->post('promocode');
                    $ptype=$this->input->post('ptype');
                    $expiry=$this->input->post('expiry');
                    $giftpercent=$this->input->post('giftpercent');
                    $minorder=$this->input->post('minorder');
                    $max=$this->input->post('max');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('promocode'=>$promocode,
                        'ptype'=>$ptype,
                              'giftpercent'=>$giftpercent,
                              'expiry'=>$expiry,
                              'minorder'=>$minorder,
                              'max'=>$max,
                              'ip' =>$ip,
                              'added_by' =>$addedby,
                              'is_active' =>1,
                              'date'=>$cur_date

                              );





                        $last_id=$this->base_model->insert_table("tbl_promocode", $data_insert, 1) ;
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data inserted successfully');

                            redirect("dcadmin/promocode/view_promocode", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occured');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);


                        $data_insert = array('promocode'=>$promocode,
                        'ptype'=>$ptype,
                              'expiry'=>$expiry,
                              'giftpercent'=>$giftpercent,
                              'minorder'=>$minorder,
                              'max'=>$max,
                              );

                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_promocode', $data_insert);
                        if ($last_id!=0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');

                            redirect("dcadmin/promocode/view_promocode", "refresh");
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
		//============================update_promocode==========================\\
    public function update_promocode($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_promocode');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['promocode']=$dsa->row();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/promocode/update_promocode');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==============================delete_promocode=====================\\
    public function delete_promocode($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $zapak=$this->db->delete('tbl_promocode', array('id' => $id));
                if ($zapak!=0) {
                      $this->session->set_flashdata('smessage', 'Data deleted successfully');
                    redirect("dcadmin/promocode/view_promocode", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            } else {
              $this->session->set_flashdata('emessage', "Sorry You Don't Have Permission To Delete Anything");
              redirect("dcadmin/promocode/view_promocode", "refresh");
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }

    //==================update_promocode status=====================\\
    public function updatepromocodeStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
                               'is_active'=>1

                               );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_promocode', $data_update);
                $this->session->set_flashdata('smessage', 'Data updated successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/promocode/view_promocode", "refresh");
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
                $zapak=$this->db->update('tbl_promocode', $data_update);
                $this->session->set_flashdata('smessage', 'Data updated successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/promocode/view_promocode", "refresh");
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
