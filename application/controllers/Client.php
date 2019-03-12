<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Admin_model');
        $this->load->model('User');
        $this->load->helper(['url', 'language']);
        $this->load->library('pagination');
    }

    public function index() {
        //redirect('/', 'refresh');
        $q = $this->db->get('category');
        $data['categorys'] = $q->result();

        $this->db->join('category', 'product.p_cat = category.cat_id');
        $pq = $this->db->get('product');
        $data['products'] = $pq->result();
        //$this->session->unset_userdata('cart_products');


        $this->load->view('shopper/index', $data);
    }

    public function category_product() {

        if ($this->uri->segment(3) == FALSE) {
            $p_cat = 0;
        } else {
            $p_cat = $this->uri->segment(3);
        }
        $q = $this->db->get('category');
        $data['categorys'] = $q->result();

        $cq = $this->db->get_where('category', array("cat_id" => $p_cat));
        $data['category'] = $cq->row();

        $config['base_url'] = base_url('client/category_product/' . $p_cat);
        $config['total_rows'] = $this->Admin_model->get_cat_count($p_cat);
        $config['per_page'] = 1;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['links'] = $this->pagination->create_links();
//        $data['products'] = $pq->result([], $config['per_page'], $page);

        $data['products'] = $this->Admin_model->get_cat_product($config["per_page"], $page, $p_cat);

//        $this->db->join('category', 'product.p_cat = category.cat_id');
//        $pq = $this->db->get_where('product', array("p_cat" => $p_cat));
//        $data['products'] = $pq->result();

        $this->load->view('shopper/category_product', $data);
    }

    public function product() {


        $q = $this->db->get('category');
        $data['categorys'] = $q->result();

//        $this->db->join('category', 'product.p_cat = category.cat_id');
//        $pq = $this->db->get('product');

        $config['base_url'] = base_url('client/product');
        $config['total_rows'] = $this->Admin_model->get_count();
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['links'] = $this->pagination->create_links();
//        $data['products'] = $pq->result([], $config['per_page'], $page);

        $data['products'] = $this->Admin_model->get_product($config["per_page"], $page);

//        $data['products'] = $pq->result();

        $this->load->view('shopper/product', $data);
    }

    public function product_detail() {
        $this->load->library('cart');
        if ($this->uri->segment(3) == FALSE) {
            $p_id = 0;
        } else {
            $p_id = $this->uri->segment(3);
        }

        $q = $this->db->get('category');
        $data['categorys'] = $q->result();

        $this->db->join('category', 'product.p_cat = category.cat_id');
        $pq = $this->db->get_where('product', array("p_id" => $p_id));
        $data['products'] = $pq->row();


        $this->load->view('shopper/product_detail', $data);
    }

    public function product_cart() {
        $this->load->library('cart');

        $id = $this->input->get('id');

        $this->db->join('category', 'product.p_cat = category.cat_id');
        $pq = $this->db->get_where('product', array("p_id" => $id));
        $products = $pq->row();
        $qty = 1;
        if (isset($id)) {
            $cartItem = array(
                'id' => $products->p_id,
                'qty' => $qty,
                'price' => $products->p_price,
                'name' => $products->p_nm,
                'options' => array(
                    'img' => $products->p_img
                )
            );
            //print_r($cartItem);
            $this->cart->insert($cartItem);
        }
        //$this->session->set_userdata('cart_products', $cart_products);
        //$cartContents = $this->cart->contents();
        $this->load->view('shopper/product_cart');
        //redirect('client/product_cart');
    }

    public function cart_delete() {
        $this->load->library('cart');
        $rowid = $this->input->get('rowid');
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect('client/product_cart');
//        $this->load->view('shopper/product_cart');
    }

    public function cart_update() {
        $this->load->library('cart');
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        //print_r($data);

        $this->cart->update($data);
        redirect('client/product_cart');
//        $this->load->view('shopper/product_cart');
    }

    public function login() {
        $this->load->view('shopper/login');
    }

    public function product_wishlist() {
        $id = $this->input->get('id');
        $user_id = $this->session->userdata('userId');
        if (!empty($user_id)) {
            $data = array(
                'product_id' => $id,
                'user_id' => $user_id
            );

            if ($this->User->add_wishlist($data)) {
//                $this->session->set_flashdata('cat_su', 'category insert successfully');
                redirect('client/view_wishlist');
            }
        } else {
            redirect('users/login');
        }


//        $this->load->view('shopper/product_wishlist');
    }

    public function view_wishlist() {
        $user_id = $this->session->userdata('userId');
        $q = $this->db->get('category');
        $data['categorys'] = $q->result();

//        $this->db->join('category', 'product.p_cat = category.cat_id');
//        $pq = $this->db->get('product');

        $config['base_url'] = base_url('client/product');
        $config['total_rows'] = $this->Admin_model->get_count();
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['links'] = $this->pagination->create_links();
//        $data['products'] = $pq->result([], $config['per_page'], $page);

        $data['products'] = $this->User->get_wishlist($config["per_page"], $page, $user_id);

//        $data['products'] = $pq->result();
        //$this->load->view('shopper/product', $data);

        $this->load->view('shopper/product_wishlist', $data);
    }

    public function remove_wishlist() {
        $id = $this->input->get('id');
        $user_id = $this->session->userdata('userId');
        if (!empty($user_id)) {


            if ($this->User->remove_wishlist($id)) {
//                $this->session->set_flashdata('cat_su', 'category insert successfully');
                redirect('client/view_wishlist');
            }
        } else {
            redirect('users/login');
        }
    }

}
