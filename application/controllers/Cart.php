<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . 'core/CI_finecontrol.php');
class Cart extends CI_finecontrol{
function __construct()
{
	parent::__construct();
	$this->load->model("login_model");
	$this->load->model("admin/base_model");
	$this->load->library('user_agent');
}

////-------------------session cart manage--------------------------------------

    //-----add to cart session ----

    public function addToCartOffline()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $product_id=$this->input->post('product_id');
                $quantity=$this->input->post('quantity');
                $type_id=$this->input->post('type_id');
                $product_id=base64_decode($product_id);
                $type_id=base64_decode($type_id);
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");
                $response['data'] = '';
                $response['data_message'] = '';
                $cart_item = array('product_id'=>$product_id,
                  'type_id'=>$type_id,
                  'quantity'=>$quantity,
                  'ip' =>$ip,
                  'date'=>$cur_date
                  );

                // $this->db->select('*');
                // $this->db->from('tbl_type');
                // $this->db->where('product_id', $product_id);
                // $this->db->where('id', $type_id);
                // $pro_data = $this->db->get()->row();
                // echo $type_id;die();
                //-----check inventory------
                $this->db->select('*');
                $this->db->from('tbl_inventory');
                $this->db->where('type_id',$type_id);
                $inventory= $this->db->get()->row();
                if (!empty($inventory->quantity)) {
                    if ($inventory->quantity >= $quantity) {
                        //------inventory in stock--------
                        $cart_data = $this->session->userdata('cart_data');
                        //----check product in already in cart------
                        if (!empty($cart_data)) {
                            $i=0;
                            foreach ($cart_data as $items) {
                              // echo $items['product_id']."ANDD".$items['type_id'];die();
                                if ($items['product_id'] == $product_id && $items['type_id'] == $type_id) {
                                    $i=1;
                                }
                            }
                            if ($i==1) {
                                $respone['data'] = false;
                                $respone['data_message'] ="Product is already in your cart";
                                echo json_encode($respone);
                            } else {
                                array_push($cart_data, $cart_item);
                                $this->session->set_userdata('cart_data', $cart_data);
                                $respone['data'] = true;
                                $respone['data_message'] = "Item successfully added in your cart";
                                echo json_encode($respone);
                            }
                        }
                        //------create session cart------
                        else {
                            $cart = array($cart_item);
                            $this->session->set_userdata('cart_data', $cart);
                            $respone['data'] = true;
                            $respone['data_message'] = "Item successfully added in your cart";
                            echo json_encode($respone);
                        }
                        ///---inventory out of stock--------
                    } else {
                        $respone['data'] = false;
                        $respone['data_message'] ="Out of stock";
                        echo json_encode($respone);
                    }
                } else {
                    $respone['data'] = false;
                    $respone['data_message'] ="Out of stock";
                    echo json_encode($respone);
                }
            } else {
                $respone['data'] = false;
                $respone['data_message'] =validation_errors();
                echo json_encode($respone);
            }
        } else {
            $respone['data'] = false;
            $respone['data_message'] ="Please insert some data, No data available";
            echo json_encode($respone);
        }
    }
    //-------delete cart product from session------

  public function deleteCartOffline()
  {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->helper('security');
      if ($this->input->post()) {
          $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
          $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
          if ($this->form_validation->run()== true) {
              $product_id=$this->input->post('product_id');
              $type_id=$this->input->post('type_id');
              $product_id=base64_decode($product_id);
              $type_id=base64_decode($type_id);
              // echo $type_id;die();

              $index="-1";
              $cart = $this->session->userdata('cart_data');
              if (!empty($cart)) {
                  for ($i = 0; $i < count($cart); $i ++) {
                      if ($cart[$i]['product_id'] == $product_id && $cart[$i]['type_id'] == $type_id) {
                        // echo ":hi"; die();
                          $index= $i;
                      }
                  }
              }
              // echo $index; die();
              if ($index > -1) {
                  $cart = $this->session->userdata('cart_data');
                  unset($cart[$index]);
                  $cart = array_values($cart);
                  $this->session->set_userdata('cart_data', $cart);
                  $respone['data'] = true;
                  $respone['data_message'] ="Item successfully deleted from your cart";
                  echo json_encode($respone);
              } else {
                  $respone['data'] = false;
                  $respone['data_message'] ="Some error occured";
                  echo json_encode($respone);
              }
          } else {
              $respone['data'] = false;
              $respone['data_message'] =validation_errors();
              echo json_encode($respone);
          }
      } else {
          $respone['data'] = false;
          $respone['data_message'] ="Please insert some data, No data available";
          echo json_encode($respone);
      }
  }

  //----update cart quatity from session cart--------
  public function updateCartOffline()
  {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->helper('security');
      if ($this->input->post()) {
        $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
        $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
        $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');
        $this->form_validation->set_rules('price', 'price', 'required|xss_clean|trim');

          if ($this->form_validation->run()== true) {
            $product_id=$this->input->post('product_id');
            $product_id=base64_decode($product_id);
            $type_id=$this->input->post('type_id');
            $type_id=base64_decode($type_id);
            // echo $type_id;die();
            $quantity=$this->input->post('quantity');
            $pricee=$this->input->post('price');
              $index="-1";

              // echo $type_id;die();

              $this->db->select('*');
              $this->db->from('tbl_type');
              $this->db->where('product_id', $product_id);
              $this->db->where('id', $type_id);
              $pro_data= $this->db->get()->row();
              //-----check inventory------
              $this->db->select('*');
              $this->db->from('tbl_inventory');
              $this->db->where('type_id',$type_id);
              $inventory= $this->db->get()->row();
              if (!empty($inventory->quantity)) {
                  if ($inventory->quantity >= $quantity) {
                      $cart = $this->session->userdata('cart_data');
                      // echo $product_id;
                      // print_r($cart);
                      // $this->session->unset_userdata('cart_data');
                      if (!empty($cart)) {
                          for ($i = 0; $i < count($cart); $i ++) {
                              if ($cart[$i]['product_id'] == $product_id && $cart[$i]['type_id']) {
                                  $index= $i;
                              }
                          }
                      }
                      if ($index > -1) {
                          $cart = $this->session->userdata('cart_data');
                          $cart[$index]['quantity']=$quantity;
                          $this->session->set_userdata('cart_data', $cart);
                          $cart2 = $this->session->userdata('cart_data');
                          $total=0;
                          $subtotal = 0;

                          foreach ($cart2 as $value) {
                              $price=0;
                              $this->db->select('*');
                              $this->db->from('tbl_type');
                              $this->db->where('product_id', $value['product_id']);
                              $this->db->where('id', $value['type_id']);
                              $pro_data= $this->db->get()->row();
                              $price = $pro_data->spgst * $value['quantity'];
                              $total= $total + $price;
                          }
                          $subtotal = $total;
                          $this->db->select('*');
              $this->db->from('tbl_type');
              $this->db->where('id',$value['type_id']);
              $type_da= $this->db->get()->row();
              $newprice = $type_da->spgst*$quantity;

                          $respone['data'] = true;
                          $respone['data_message'] ="Item successfully updated in your cart";
                          $respone['data_price'] =round($total);
                          $respone['data_subtotal'] =round($subtotal);
                          $respone['newprice'] =$newprice;
                          echo json_encode($respone);
                      } else {
                          $respone['data'] = false;
                          $respone['data_message'] ="Some error occured";
                          echo json_encode($respone);
                      }
                  } else {
                      $respone['data'] = false;
                      $respone['data_message'] ="Out of stock";
                      echo json_encode($respone);
                  }
              } else {
                  $respone['data'] = false;
                  $respone['data_message'] ="Out of stock";
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

  ////-------------------log in cart manage--------------------------------------

  //-----add to cart session ----

  public function addToCartOnline()
  {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->helper('security');
      if ($this->input->post()) {
          $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
          $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
          $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');

          if ($this->form_validation->run()== true) {
              $product_id=$this->input->post('product_id');
              $quantity=$this->input->post('quantity');
              $type_id=$this->input->post('type_id');
              $product_id=base64_decode($product_id);
              $type_id=base64_decode($type_id);
              $ip = $this->input->ip_address();
              date_default_timezone_set("Asia/Calcutta");
              $cur_date=date("Y-m-d H:i:s");
              $response['data'] = '';
              $response['data_message'] = '';
              if (!empty($this->session->userdata('user_data'))) {

                  $user_id = $this->session->userdata('user_id');

                          $this->db->select('*');
                          $this->db->from('tbl_cart');
                          $this->db->where('user_id', $user_id);
                          $this->db->where('type_id', $type_id);
                          $cartInfo= $this->db->get()->row();
                          if (empty($cartInfo)) {
                              $cart_insert = array('user_id'=>$user_id,
                        'product_id'=>$product_id,
                        'type_id'=>$type_id,
                        'quantity'=>$quantity,
                        'ip'=>$ip,
                        'date'=>$cur_date
                    );
                              $last_id=$this->base_model->insert_table("tbl_cart", $cart_insert, 1) ;
                              if (!empty($last_id)) {

                                  $respone['data'] = true;
                                  $respone['data_message'] ="Item successfully deleted from your cart";
                                  echo json_encode($respone);
                              } else {
                                  $respone['data'] = false;
                                  $respone['data_message'] ="Some error occured";
                                  echo json_encode($respone);
                              }
                          }else{
                            $respone['data'] = false;
                            $respone['data_message'] ="Item is already in your cart";
                            echo json_encode($respone);
                          }

              } else {
                  $respone['data'] = false;
                  $respone['data_message'] ="Cart data not found";
                  echo json_encode($respone);
              }
          } else {
              $respone['data'] = false;
              $respone['data_message'] =validation_errors();
              echo json_encode($respone);
          }
      } else {
          $respone['data'] = false;
          $respone['data_message'] ="Please insert some data, No data available";
          echo json_encode($respone);
      }
  }

  ////-----------delete cart product login---------

  public function deleteCartOnline()
  {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->helper('security');
      if ($this->input->post()) {
          $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
          $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
          if ($this->form_validation->run()== true) {
              $product_id=$this->input->post('product_id');
              $product_id=base64_decode($product_id);
              $type_id=$this->input->post('type_id');
              $type_id=base64_decode($type_id);
              $response['data'] = '';
              $response['data_message'] = '';
              if (!empty($this->session->userdata('user_data'))) {
                  $user_id = $this->session->userdata('user_id');

                  $zapak=$this->db->delete('tbl_cart', array('user_id' => $user_id,'product_id'=>$product_id, 'type_id'=>$type_id));
                  $respone['data'] = true;
                  $respone['data_message'] ='Item successfully deleted from your cart';
                  echo json_encode($respone);
              } else {
                  $respone['data'] = false;
                  $respone['data_message'] ='Some error occured';
                  echo json_encode($respone);
              }
          } else {
              $respone['data'] = false;
              $respone['data_message'] =validation_errors();
              echo json_encode($respone);
          }
      } else {
          $respone['data'] = false;
          $respone['data_message'] ="Please insert some data, No data available";
          echo json_encode($respone);
      }
  }

  //---------update cart value login-----------
  public function updateCartOnline()
  {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->helper('security');
      if ($this->input->post()) {
          $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
          $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
          $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');

          if ($this->form_validation->run()== true) {
              $product_id=$this->input->post('product_id');
              $product_id=base64_decode($product_id);
              $type_id=$this->input->post('type_id');
              $type_id=base64_decode($type_id);
              // echo $type_id;die();
              $quantity=$this->input->post('quantity');
              $user_id = $this->session->userdata('user_id');

                          $this->db->select('*');
              $this->db->from('tbl_inventory');
              $this->db->where('type_id',$type_id);
              $inventory_data= $this->db->get()->row();
              // echo $inventory_data->quantity;die();
              //-----check inventory------
              if (!empty($inventory_data->quantity)) {
                  if ($inventory_data->quantity >= $quantity) {

              //----------cart quantity update--------
                      $data_update = array('quantity'=>$quantity);
                      $this->db->where('user_id', $user_id);
                      $this->db->where('product_id', $product_id);
                      $this->db->where('type_id', $type_id);
                      $zapak=$this->db->update('tbl_cart', $data_update);

                      if (!empty($zapak)) {

        //--------------cart total calculate---------
                          $this->db->select('*');
                          $this->db->from('tbl_cart');
                          $this->db->where('user_id', $user_id);
                          $cartInfo= $this->db->get();
                          $total = 0;
                          $shipping = 0;
                          $subtotal = 0;
                          foreach ($cartInfo->result() as $cart) {
                              $price=0;
                              $this->db->select('*');
                              $this->db->from('tbl_type');
                              $this->db->where('id', $cart->type_id);
                              $pro_data= $this->db->get()->row();
                              $price = $pro_data->spgst * $cart->quantity;
                              $total= $total + $price;
                          }
                          $subtotal = $total;
                                      $this->db->select('*');
                          $this->db->from('tbl_type');
                          $this->db->where('id',$type_id);
                          $type_da= $this->db->get()->row();
                          $newprice = $type_da->spgst * $quantity;
                          $respone['data'] = true;
                          $respone['data_message'] ="Cart item update successfully";
                          $respone['data_price'] =round($total);
                          $respone['data_subtotal'] =round($subtotal);
                          $respone['newprice'] =$newprice;
                          echo json_encode($respone);
                      } else {
                          $respone['data'] = false;
                          $respone['data_message'] ="Some error occucred";
                          echo json_encode($respone);
                      }
                  } else {
                      $respone['data'] = false;
                      $respone['data_message'] ="Out of stock";
                      echo json_encode($respone);
                  }
              } else {
                  $respone['data'] = false;
                  $respone['data_message'] ="Out of stock";
                  echo json_encode($respone);
              }
          } else {
              $respone['data'] = false;
              $respone['data_message'] =validation_errors();
              echo json_encode($respone);
          }
      } else {
          $respone['data'] = false;
          $respone['data_message'] ="Please insert some data, No data available";
          echo json_encode($respone);
      }
  }

  //--------wishlist---------
    public function wishlist()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('user_id', 'user_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('status', 'status', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $product_id=base64_decode($this->input->post('product_id'));
                $type_id=base64_decode($this->input->post('type_id'));
                $user_id=base64_decode($this->input->post('user_id'));
                $status=$this->input->post('status');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");
                $this->db->select('*');
                $this->db->from('tbl_wishlist');
                $this->db->where('user_id', $user_id);
                $this->db->where('product_id', $product_id);
                $this->db->where('type_id', $type_id);
                $wishcheck= $this->db->get()->row();

                //----------add to wishlist----
                if ($status=="add") {
                    if (empty($wishcheck)) {
                        $data_insert = array('user_id'=>$user_id,
          'product_id'=>$product_id,
          'type_id'=>$type_id,
          'ip' =>$ip,
          'date'=>$cur_date
          );

                        $last_id=$this->base_model->insert_table("tbl_wishlist", $data_insert, 1) ;

                        if (!empty($last_id)) {
                            $respone['data'] = true;
                            $respone['data_message'] ='Item successfully added in your wishlist';
                            echo json_encode($respone);
                        } else {
                            $respone['data'] = false;
                            $respone['data_message'] ='Some error occured';
                            echo json_encode($respone);
                        }
                    } else {
                        $respone['data'] = false;
                        $respone['data_message'] ='Already in your wishlist';
                        echo json_encode($respone);
                    }
                }
                //---------remove wishlist---------
                elseif ($status=="remove") {
                    $delete=$this->db->delete('tbl_wishlist', array('user_id' => $user_id,'product_id'=>$product_id, 'type_id'=>$type_id));
                    if (!empty($delete)) {
                        $respone['data'] = true;
                        $respone['data_message'] ='Item successfully deleted from your wishlist';
                        echo json_encode($respone);
                    } else {
                        $respone['data'] = false;
                        $respone['data_message'] ='Some error occured';
                        echo json_encode($respone);
                    }
                }
                //---------move to cart--------
                elseif ($status=="move") {
                              $this->db->select('*');
                  $this->db->from('tbl_cart');
                  $this->db->where('user_id',$wishcheck->user_id);
                  $this->db->where('product_id',$wishcheck->product_id);
                  $this->db->where('type_id',$wishcheck->type_id);
                  $wish_check= $this->db->get()->row();
                  if(empty($wish_check)){
										//-----------inventory check-----------------------
	                  $this->db->select('*');
	                  $this->db->from('tbl_inventory');
	                  $this->db->where('type_id',$wishcheck->type_id);
	                  $inventory= $this->db->get()->row();
	                  //-----check inventory------
	                  if (!empty($inventory->quantity)) {

	                      if ($inventory->quantity >= 1) {

                    $cart_insert = array('user_id'=>$wishcheck->user_id,
                          'product_id'=>$wishcheck->product_id,
                          'type_id'=>$wishcheck->type_id,
                          'quantity'=>1,
                          'ip' =>$ip,
                          'date'=>$cur_date
                          );

                    $cart_id=$this->base_model->insert_table("tbl_cart", $cart_insert, 1) ;
										if (!empty($cart_id)) {
                        $delete=$this->db->delete('tbl_wishlist', array('user_id' => $user_id,'product_id'=>$product_id));
                        $respone['data'] = true;
                        $respone['data_message'] ='Item successfully added in your cart';
                        echo json_encode($respone);
                    } else {
                        $respone['data'] = false;
                        $respone['data_message'] ='Some error occured';
                        echo json_encode($respone);
                    }
									}else{
										$respone['data'] = false;
	                  $respone['data_message'] ='Product is out of stock';
	                  echo json_encode($respone);
									}
								}else{
									$respone['data'] = false;
                  $respone['data_message'] ='Product is out of stock';
                  echo json_encode($respone);
								}

                }else{
                  $respone['data'] = false;
                  $respone['data_message'] ='Product is already in your cart';
                  echo json_encode($respone);
                }
              }
            } else {
                $respone['data'] = false;
                $respone['data_message'] =validation_errors();
                echo json_encode($respone);
            }
        } else {
            $respone['data'] = false;
            $respone['data_message'] ="Please insert some data, No data available";
            echo json_encode($respone);
        }
    }


}
