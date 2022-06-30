<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . 'core/CI_finecontrol.php');
class User extends CI_finecontrol{
function __construct()
{
	parent::__construct();
	$this->load->model("login_model");
	$this->load->model("admin/base_model");
	$this->load->library('user_agent');
}

public function login(){
      if(empty($this->session->userdata('user_data'))){
				$referer = $this->input->get('referer');
				if(empty($referer)){
					$referer = '';
				}
				$data['referer'] = $referer;

  			$this->load->view('login',$data);

    }else{
  	redirect("home","refresh");
    }
    }

    public function login_process(){

    			$this->load->helper(array('form', 'url'));
    			$this->load->library('form_validation');
    			$this->load->helper('security');
          $data['data'] = '';
    			if($this->input->post())
    			{
						// $referer = $this->input->get('referer');
						// if(empty($referer)){
						// 	$referer = '';
						// }
    				$this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean|trim');
    				$this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
    				if($this->form_validation->run()== TRUE)
    				{

    					$email=$this->input->post('email');
    					$passw=$this->input->post('password');
    					$pass=md5($passw);
    												$this->db->select('*');
    												$this->db->from('tbl_users');
    												$this->db->where('email',$email);
    												$da_customer= $this->db->get();
    												$da=$da_customer->row();
    												if(!empty($da)){

    															$db_name=$da->name;
    															$db_id=$da->id;

                                  $db_email=$da->email;
    															$db_password=$da->password;


    													if($db_password==$pass){

    														$db_id=$da->id;

    												$this->session->set_userdata('user_data',1);
                            $this->session->set_userdata('user_id', $db_id);
    												$this->session->set_userdata('customer_name', $db_name);

	                            $this->session->set_userdata('customer_email', $db_email);

    											//	redirect("home","refresh");
	                         // $data['data']=true;
													 // $data['cusomer_id']=$db_id;
													 // $data['referer'] = $referer;
													 	$this->session->set_flashdata('smessage','Successfully Signned in!');
														redirect("/", "refresh");
    					}
							else{

								$this->session->set_flashdata('emessage','Invalid Password!');
								redirect($_SERVER['HTTP_REFERER']);

							}
						}
						else{
							$this->session->set_flashdata('emessage','Invalid email or password!');
							redirect($_SERVER['HTTP_REFERER']);

						}
    				}
    				else{
							$this->session->set_flashdata('emessage',validation_errors());
							redirect($_SERVER['HTTP_REFERER']);
    				}

    			}
    	}


			public function login_process_page(){

	    			$this->load->helper(array('form', 'url'));
	    			$this->load->library('form_validation');
	    			$this->load->helper('security');
	          $data['data'] = '';
	    			if($this->input->post())
	    			{
							$referer = $this->input->get('referer');
							if(empty($referer)){
								$referer = '';
							}
	    				$this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean|trim');
	    				$this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
	    				if($this->form_validation->run()== TRUE)
	    				{

	    					$email=$this->input->post('email');
	    					$passw=$this->input->post('password');
	    					$pass=md5($passw);
								$ip = $this->input->ip_address();
								date_default_timezone_set("Asia/Calcutta");
								$cur_date=date("Y-m-d H:i:s");
	    												$this->db->select('*');
	    												$this->db->from('tbl_users');
	    												$this->db->where('email',$email);
	    												// $this->db->where('password',$pass);
	    												$da_customer= $this->db->get();
	    												$da=$da_customer->row();
	    												if(!empty($da)){

	    															$db_first_name=$da->name;

	                                  $db_email=$da->email;
	    															$db_password=$da->password;


	    													if($db_password==$pass){

	    														$db_id=$da->id;

																	//insert cart data into cart table---------
						                                    $cart_data = $this->session->userdata('cart_data');
						                                    // print_r($cart_data);
						                                    // exit;
						                                    if (!empty($cart_data)) {
						                                        foreach ($cart_data as $value) {
						                                            $this->db->select('*');
						                                            $this->db->from('tbl_cart');
						                                            $this->db->where('user_id', $db_id);
						                                            $this->db->where('product_id', $value['product_id']);
						                                            $this->db->where('type_id', $value['type_id']);
						                                            $cartInfo= $this->db->get()->row();
						                                            if (empty($cartInfo)) {
						                                                //---------inventory check------------
						                                                $this->db->select('*');
						                                                $this->db->from('tbl_inventory');
						                                                $this->db->where('type_id', $value['type_id']);
						                                                $pro_data= $this->db->get()->row();
						                                                if (!empty($pro_data)) {
						                                                    if ($pro_data->quantity>=$value['quantity']) {
						                                                        $data_insert = array('user_id'=> $db_id,
						                                              'product_id'=>$value['product_id'],
						                                              'type_id'=>$value['type_id'],
						                                              'quantity'=>$value['quantity'],
						                                              'ip' =>$ip,
						                                              'date'=>$cur_date
						                                              );

						                                                        $cart_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;
						                                                    }
						                                                }///end check innventory
						                                            }
						                                        }
						                                    }
						                                    $this->session->unset_userdata('cart_data');

	    												$this->session->set_userdata('user_data',1);
	    												$this->session->set_userdata('user_id',$db_id);
	    												$this->session->set_userdata('user_name', $db_first_name);
	                            $this->session->set_userdata('user_email', $db_email);

	    											//	redirect("home","refresh");
		                         $data['data']=true;
														 $data['cusomer_id']=$db_id;
														 $data['referer'] = $referer;
														 $this->session->set_flashdata('smessage', 'Successfully Logged in!');
	                            redirect("/","refresh");
	    					}
								else{
									$this->session->set_flashdata('emessage','Invalid Password!');
									redirect($_SERVER['HTTP_REFERER']);

								}
							}
							else{

								$this->session->set_flashdata('emessage','Invalid email or password!');
								redirect($_SERVER['HTTP_REFERER']);

							}
	    				}
	    				else{
								$this->session->set_flashdata('emessage',validation_errors());
								redirect($_SERVER['HTTP_REFERER']);
	    				}

		}else{
			$this->session->set_flashdata('emessage','Please insert some data, No data available');
			redirect($_SERVER['HTTP_REFERER']);
		}
	    	}


//====================Register===============================
        public function register_process(){


        	          if(empty($this->session->userdata('user_data'))){
          					$data['data'] = '';

        											$this->load->helper(array('form', 'url'));
        											$this->load->library('form_validation');
        											$this->load->helper('security');
        	            if($this->input->post())
        	           {

        // echo "yespost"; die();

        $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('last', 'last', 'required|xss_clean|trim');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean|trim');
        $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
        	             if($this->form_validation->run()== TRUE)
        	             {
        // echo "yes"; die();
        	              	$name=$this->input->post('name');
        	              	$last=$this->input->post('last');
        	              	$email=$this->input->post('email');
        	      	 			 	$password=$this->input->post('password');
                          $pass= md5($password);
        								 	$name=$this->input->post('name');
        	                $ip = $this->input->ip_address();
        	      					date_default_timezone_set("Asia/Calcutta");
        	                $cur_date=date("Y-m-d H:i:s");

													      			$this->db->select('*');
													$this->db->from('tbl_users');
													$this->db->where('email',$email);
													$email_check= $this->db->get()->row();
													if(empty($email_check)){

        	                  $data_insert = array('name'=>$name." ".$last,
        	                       	 'email'=>$email,
        	       	 			 						'password'=>$pass,
        	                            'ip' =>$ip,
        	                            'is_active' =>1,
        	                            'date'=>$cur_date
        	                            );


        	$last_id=$this->base_model->insert_table("tbl_users",$data_insert,1) ;
					$this->session->set_flashdata('smessage', 'Successfully Registered!');
					//------send register email-------------
												if(!empty($last_id)){
                                  //   $config = array(
                                  //     'protocol' => 'smtp',
                                  //     'smtp_host' => SMTP_HOST,
                                  //     'smtp_port' => SMTP_PORT,
                                  //     'smtp_user' => USER_NAME, // change it to yours
                                  //     'smtp_pass' => PASSWORD, // change it to yours
                                  //     'mailtype' => 'html',
                                  //     'charset' => 'iso-8859-1',
                                  //     'wordwrap' => true
                                  //          );
                                  //   $to=$email;
                                  //   $data['name'] = $name;
                                  //
                                  //   $message = 	$this->load->view('email/newaccount', $data, true);
                                  //
                                  //   $this->load->library('email', $config);
                                  //   $this->email->set_newline("");
                                  //   $this->email->from(EMAIL); // change it to yours
                                  // $this->email->to($to);// change it to yours
                                  // $this->email->subject('New account created');
                                  //   $this->email->message($message);
																	// 	// die();
                                  //   if ($this->email->send()) {
                                  //       // echo 'Email sent.';die();
                                  //   } else {
                                  //       // show_error($this->email->print_debugger());
                                  //   }

					}
					$this->session->set_userdata('user_data',1);
					$this->session->set_userdata('user_id',$last_id);
					$this->session->set_userdata('user_name', $name);
					$this->session->set_userdata('user_email', $email);

											//insert cart data into cart table---------
                                    $cart_data = $this->session->userdata('cart_data');
                                    // print_r($cart_data);
                                    // exit;
                                    if (!empty($cart_data)) {
                                        foreach ($cart_data as $value) {
                                            $this->db->select('*');
                                            $this->db->from('tbl_cart');
                                            $this->db->where('user_id', $last_id);
                                            $this->db->where('product_id', $value['product_id']);
                                            $this->db->where('type_id', $value['type_id']);
                                            $cartInfo= $this->db->get()->row();
                                            if (empty($cartInfo)) {
                                                //---------inventory check------------
                                                $this->db->select('*');
                                                $this->db->from('tbl_inventory');
                                                $this->db->where('type_id', $value['type_id']);
                                                $pro_data= $this->db->get()->row();
                                                if (!empty($pro_data)) {
                                                    if ($pro_data->quantity>=$value['quantity']) {
                                                        $data_insert = array('user_id'=> $last_id,
                                              'product_id'=>$value['product_id'],
                                              'type_id'=>$value['type_id'],
                                              'quantity'=>$value['quantity'],
                                              'ip' =>$ip,
                                              'date'=>$cur_date
                                              );

                                                        $cart_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;
                                                    }
                                                }///end check innventory
                                            }
                                        }
                                    }
                                    $this->session->unset_userdata('cart_data');
																		$this->session->set_flashdata('smessage', 'Successfully Registered!');

 redirect("/", "refresh");
        								// $data['data']=true;
											}else{
												$this->session->set_flashdata('emessage', 'Users already exists with this email!');
					redirect($_SERVER['HTTP_REFERER']);
											}


        	                  } // VALIDATION PART ENDS


        	                    } // POST DATA ENDS
        	            else{
        	              $this->session->set_flashdata('emessage','No data found, Please insert some data');
        	              redirect($_SERVER['HTTP_REFERER']);
        	            }
        							// echo json_encode($data);
        	          } // LOGIN CHECK ENDS HERE

        	      else{
									$this->session->set_flashdata('emessage','Please insert some data');
									redirect($_SERVER['HTTP_REFERER']);
        	        redirect("home","refresh");
        	      }
        	    }

//======================logout====================================================
              public function logout(){

              		if(!empty($this->session->userdata('user_data'))){

                    $this->session->unset_userdata('user_data');
                    	$this->session->unset_userdata('user_id');
                    	$this->session->unset_userdata('user_name');
                      $this->session->unset_userdata('user_email');

              		// redirect("home","refresh");
									$this->session->set_flashdata('smessage', 'Successfully Logged out!');

              		redirect("/","refresh");

              		}
              		else{
              				redirect("/","refresh");
              		}

              	}
								//------form forgot password submit-----

						    public function generateRandomString($length = 20)
						    {
						        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						        $charactersLength = strlen($characters);
						        $randomString = '';
						        for ($i = 0; $i < $length; $i++) {
						            $randomString .= $characters[rand(0, $charactersLength - 1)];
						        }
						        return $randomString;
						    }

//========================forgot password email submit===================================
								public function form_submit_forgotpassword()
    {
        if (empty($this->session->userdata('user_data'))) {
            $this->load->helper(array( 'form', 'url' ));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('reset_email', 'reset_email', 'required|valid_email|xss_clean|trim');

                if ($this->form_validation->run() == true) {
                    $email = $this->input->post('reset_email');


                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('email', $email);
                    $this->db->where('is_active', 1);
                    $user_data= $this->db->get()->row();
                    // print_r($user_data);
                    // exit;
                    if (!empty($user_data)) {
                        $user_id=$user_data->id;
                        $user_name=$user_data->name;
                        $user_email=$user_data->email;
                        $ip = $this->input->ip_address();
                        date_default_timezone_set("Asia/Calcutta");
                        $cur_date=date("Y-m-d H:i:s");

                        //generate unique string number for txn_id

                        $txn_id=  $this->generateRandomString(6);

                        $data_insert = array('user_id'=>$user_id,
                                         'txn_id'=>$txn_id,
                                         'status'=>0,
                                         'ip'=>$ip,
                                         'date'=>$cur_date
                                         );

                        $last_id=$this->base_model->insert_table("tbl_forgot_pass", $data_insert, 1) ;
                        $link = base_url()."User/forget_password_reset/".$txn_id;
                        $forgot_password_data = array('user_name'=>$user_name,
                    'link'=>$link

                 );

                        $config = array(
                          'protocol' => 'smtp',
                      'smtp_host' => SMTP_HOST,
                      'smtp_port' => SMTP_PORT,
                      'smtp_user' => USER_NAME, // change it to yours
                      'smtp_pass' => PASSWORD, // change it to yours
                      'mailtype' => 'html',
                      'charset' => 'iso-8859-1',
                      'wordwrap' => true
                           );
                        $to=$user_email;

                        $message = 	$this->load->view('email/forgetpassword', $forgot_password_data, true);

                        $this->load->library('email', $config);
                        $this->email->set_newline("");
                        $this->email->from(EMAIL); // change it to yours
                  $this->email->to($to);// change it to yours
                  $this->email->subject('Reset your password');
                        $this->email->message($message);
                        if ($this->email->send()) {
                            // echo 'Email sent.';
                        } else {
                            // show_error($this->email->print_debugger());
                        }

                        $this->session->set_flashdata('smessage', 'Password reset link has been sent successfully');
                        redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $this->session->set_flashdata('emessage', 'User does not exists');
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
        } else {
            redirect("/", "refresh");
        }
    }

		//---forget-password-reset-----
public function forget_password_reset($t)
{
		if (empty($this->session->userdata('user_data'))) {
				$id=$t;
				$this->db->select('*');
				$this->db->from('tbl_forgot_pass');
				$this->db->where('txn_id', $id);
				$u1= $this->db->get()->row();
				$st=$u1->status;

				if ($st==0) {
						$data_update = array('status'=>1);
						$this->db->where('status', $u1->status);
						$zapak=$this->db->update('tbl_forgot_pass', $data_update);
						$data['auth']=$id;

						$this->load->view('frontend/common/header', $data);
						$this->load->view('frontend/forgotpass');
						$this->load->view('frontend/common/footer', $data);
				} else {
					$this->session->set_flashdata('emessage', 'Link already used');
					redirect("/");
				}
		} else {
				redirect("/", "refresh");
		}
}
////-------update password------
	public function update_password($t)
	{
			if (empty($this->session->userdata('user_data'))) {
					$txn_id=$t;

					$this->db->select('*');
					$this->db->from('tbl_forgot_pass');
					$this->db->where('txn_id', $txn_id);
					$u2= $this->db->get()->row();
					$ui=$u2->user_id;
					$data['auth']=$txn_id;
					$this->load->helper(array( 'form', 'url' ));
					$this->load->library('form_validation');
					$this->load->helper('security');
					if ($this->input->post()) {
							$this->form_validation->set_rules('reset_password', 'reset_password', 'required|xss_clean|trim');

							if ($this->form_validation->run() == true) {
									$reset_password = $this->input->post('reset_password');

									$this->db->select('*');
									$this->db->from('tbl_users');
									$this->db->where('id', $ui);
									$this->db->where('is_active', 1);
									$user= $this->db->get()->row();

									if (!empty($user)) {
											$rs=md5($reset_password);
											$data_update = array('password'=>$rs);

											$this->db->where('password', $user->password);
											$zapak=$this->db->update('tbl_users', $data_update);

											if ($zapak!=0) {
													$this->session->set_flashdata('smessage', 'Password reset successfully');
													redirect("/", "refresh");
											}
									} else {
											$this->session->set_flashdata('emessage', 'User not found');
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
			} else {
					redirect("/", "refresh");
			}
	}


}
