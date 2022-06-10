<?php if (! defined('BASEPATH')) {
exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Type extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    //================================view_type=============================\\
    public function view_type($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');
             $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_type');
            $this->db->where('product_id',$id);
            $data['type_data']= $this->db->get();



            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/type/view_type');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=============================add_type=============================\\
    public function add_type()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $this->db->select('*');
            $this->db->from('tbl_product');
            $data['product_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/type/add_type');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==============================add_type_data=============================\\
    public function add_type_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                $this->form_validation->set_rules('mrp', 'mrp', 'required|xss_clean|trim');
                $this->form_validation->set_rules('sp', 'sp', 'required|xss_clean|trim');
                $this->form_validation->set_rules('gst', 'gst', 'required|xss_clean|trim');
                $this->form_validation->set_rules('spgst', 'spgst', 'required|xss_clean|trim');


                if ($this->form_validation->run()== true) {
                    $product_id=$this->input->post('product_id');
                    $name=$this->input->post('name');
                    $mrp=$this->input->post('mrp');
                    $sp=$this->input->post('sp');
                    $gst=$this->input->post('gst');
                    $spgst=$this->input->post('spgst');


                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('product_id'=>$product_id,
                            'name'=>$name,
                            'mrp'=>$mrp,
                            'sp'=>$sp,
                            'gst'=>$gst,
                            'spgst' =>$spgst,
                            'ip'=>$ip,
                            'added_by' =>$addedby,
                            'is_active' =>1,
                            'date'=>$cur_date

                            );





                        $last_id=$this->base_model->insert_table("tbl_type", $data_insert, 1) ;

                                            if ($last_id!=0) {
                                                $this->session->set_flashdata('smessage', 'Type inserted successfully');

                                                redirect("dcadmin/type/view_type/".base64_encode($product_id), "refresh");
                                            } else {
                                                $this->session->set_flashdata('emessage', 'Sorry error occured');
                                                redirect($_SERVER['HTTP_REFERER']);
                                            }
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);



                        $data_insert = array('product_id'=>$product_id,
                  'name'=>$name,
                  'mrp'=>$mrp,
                  'sp'=>$sp,
                  'gst'=>$gst,
                  'spgst' =>$spgst,


                            );




                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_type', $data_insert);

                                            if ($last_id!=0) {
                                                $this->session->set_flashdata('smessage', 'Type updated successfully');

                                                redirect("dcadmin/type/view_type/".base64_encode($product_id), "refresh");
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
    //==========================update_type==========================\\
    public function update_type($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_type');
            $this->db->where('id', $id);
            $dsa= $this->db->get();
            $data['type']=$dsa->row();

            $this->db->select('*');
            $this->db->from('tbl_product');

            $data['product_data']= $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/type/update_type');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function delete_type($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $zapak=$this->db->delete('tbl_type', array('id' => $id));
                if ($zapak!=0) {
                    redirect("dcadmin/type/view_type", "refresh");
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
    public function updatetypeStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
     'is_active'=>1

     );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_type', $data_update);
                $this->session->set_flashdata('smessage', 'Data updated successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/type/view_type", "refresh");
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
                $zapak=$this->db->update('tbl_type', $data_update);
                $this->session->set_flashdata('smessage', 'Data updated successfully');

                if ($zapak!=0) {
                    redirect("dcadmin/type/view_type", "refresh");
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
