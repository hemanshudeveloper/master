<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'language']);
		$this->load->model('Admin_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

//category start
        
	public function category_add()
	{
		
		$this->form_validation->set_rules('cat_nm', 'category name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/category_add');
		}
		else
		{
			$data = array(
				'cat_nm'=>$this->input->post('cat_nm')
			);
			
			if($this->Admin_model->category_add($data))
			{
				$this->session->set_flashdata('cat_su', 'category insert successfully');
			}
			redirect('admin/category_view', 'refresh');
		}
	}
	public function category_view()
	{
		$q=$this->db->get('category');
		$data['categorys']=$q->result();
		$this->load->view('auth/category_view',$data);

	}
	public function category_edit()
	{

		if($this->uri->segment(3)==FALSE)
		{
			$cat_id=0;
		}
		else
		{
			$cat_id=$this->uri->segment(3);
		}

		$q = $this->db->get_where("category",array("cat_id"=>$cat_id));
		$data['row']=$q->result();

		if(!empty($data['row']))
		{
			$this->load->view('auth/category_edit',$data);
		}
		else
		{
			echo 0;
		}
		
	}
	public function category_update()
	{
		$data = array(
			'cat_nm'=>$this->input->post('cat_nm')
		);
		$id=$this->input->post('id');
		//print_r($data);
		if($this->Admin_model->category_update($data,$id))
		{
			$this->session->set_flashdata('cat_up', 'category update successfully');
		}

		redirect('admin/category_view', 'refresh');
	}
	public function category_delete()
	{
		if($this->uri->segment(3)==FALSE)
		{
			$cat_id=0;
		}
		else
		{
			$cat_id=$this->uri->segment(3);
		}

		if($this->Admin_model->category_delete($cat_id))
		{
			$this->session->set_flashdata('cat_del', 'category delete successfully');
		}

		redirect('admin/category_view','refresh');
	}
	//category over

	//product start
	public function product_add()
	{
		$q=$this->db->get('category');
		$data['categorys']=$q->result();
		$this->form_validation->set_rules('p_nm', 'product name', 'required');
		$this->form_validation->set_rules('p_price', 'product price', 'required');
		

		if(empty($_FILES['p_img']['name'][0]))
		{
			$this->form_validation->set_rules('p_img', 'product img', 'required');
		}

		$cat=$this->input->post('p_cat');
		if(empty($cat))
		{
			$this->form_validation->set_rules('p_cat', 'product cat', 'required');
		}
		
		$this->form_validation->set_rules('p_desc', 'product desc', 'required');
		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('auth/product_add',$data);
		}
		else
		{
			
			$config = array(
				'upload_path' => './uploads/',
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000"
			);
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('p_img'))
			{ 
				$data['imageError'] =  $this->upload->display_errors();

			}
			else
			{
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
			}

			$data = array(
				'p_nm'=>$this->input->post('p_nm'),
				'p_price'=>$this->input->post('p_price'),
				'p_img'=>$image,
				'p_cat'=>$this->input->post('p_cat'),
				'p_desc'=>$this->input->post('p_desc')
			);
			//print_r($data);
			if($this->Admin_model->product_add($data))
			{
				$this->session->set_flashdata('pro_su', 'product insert successfully');
			}

			
			redirect('admin/product_view', 'refresh');
		}

	}

	public function product_view()
	{	
		$this->db->join('category', 'product.p_cat = category.cat_id');
		$pq=$this->db->get('product');
		$data['products']=$pq->result();

		$this->load->view('auth/product_view',$data);

	}

	public function product_delete()
	{
		if($this->uri->segment(3)==FALSE)
		{
			$p_id=0;
		}
		else
		{
			$p_id=$this->uri->segment(3);
		}
		$q = $this->db->get_where("product",array("p_id"=>$p_id));
		$row = $q->row();
		$del_img=$row->p_img;
		$path = './uploads/'.$row->p_img;
		
		if($this->Admin_model->product_delete($p_id))
		{
			unlink($path);
			$this->session->set_flashdata('pro_del', 'product delete successfully');
		}

		redirect('admin/product_view','refresh');

	}

	public function product_edit()
	{
		if($this->uri->segment(3)==FALSE)
		{
			$p_id=0;
		}
		else
		{
			$p_id=$this->uri->segment(3);
		}
		
		$q = $this->db->get_where("product",array("p_id"=>$p_id));
		$data['products']=$q->row();

		$c= $this->db->get('category');
		$data['categorys']=$c->result();

		if(!empty($data['products']))
		{
			$this->load->view('auth/product_edit',$data);
		}
		else
		{
			echo $p_id;
		}
		
	}

	public function product_update()
	{
		
		$this->form_validation->set_rules('p_nm', 'product name', 'required');
		$this->form_validation->set_rules('p_price', 'product price', 'required');
		
		$p_id=$this->input->post('id');
		$cat=$this->input->post('p_cat');
		if(empty($cat))
		{
			$this->form_validation->set_rules('p_cat', 'product cat', 'required');
		}
		
		$this->form_validation->set_rules('p_desc', 'product desc', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			
			$q = $this->db->get_where("product",array("p_id"=>$p_id));
			$data['products']=$q->row();

			$c= $this->db->get('category');
			$data['categorys']=$c->result();

			$this->load->view('auth/product_edit',$data);
		}
		else
		{
			if(empty($_FILES['p_img']['name'][0]))
			{
				$data = array(
					'p_nm'=>$this->input->post('p_nm'),
					'p_price'=>$this->input->post('p_price'),
					'p_cat'=>$this->input->post('p_cat'),
					'p_desc'=>$this->input->post('p_desc')
				);
				$id=$this->input->post('id');
			//print_r($data);
				if($this->Admin_model->product_update($data,$id))
				{
					$this->session->set_flashdata('pro_up', 'product update successfully');
				}

				redirect('admin/product_view', 'refresh');

			}
			else
			{
				$config = array(
					'upload_path' => './uploads/',
					'allowed_types' => "gif|jpg|png|jpeg",
					'overwrite' => TRUE,
					'max_size' => "2048000"
				);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('p_img'))
				{ 
					$data['imageError'] =  $this->upload->display_errors();

				}
				else
				{
					$imageDetailArray = $this->upload->data();
					$image =  $imageDetailArray['file_name'];
				}

				$data = array(
					'p_nm'=>$this->input->post('p_nm'),
					'p_price'=>$this->input->post('p_price'),
					'p_img'=>$image,
					'p_cat'=>$this->input->post('p_cat'),
					'p_desc'=>$this->input->post('p_desc')
				);
				$id=$this->input->post('id');
				$del_img=$this->input->post('del_img');
				$path = './uploads/'.$del_img;
				
			//print_r($data);
				if($this->Admin_model->product_update($data,$id))
				{
					unlink($path);
					$this->session->set_flashdata('pro_up', 'product update successfully');
				}
				
				redirect('admin/product_view', 'refresh');
			}
			
			
		}

	}
	//product over

}