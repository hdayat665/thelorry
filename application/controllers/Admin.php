<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Admin_model'));
		// 	if(!$this->session->userdata('name')){
		// redirect('admin/login_view');
		// }
	}

	public function index()
	{
		header("Access-Control-Allow-Origin: *");
		$data = array();
		// pr($this->session->userdata);
		
		$this->template->load('login_template', 'content' , 'login', $data);
	}

	public function register_view()
	{
		$data = array();
		
		$this->template->load('login_template', 'content' , 'signup', $data);
	}

	public function user_view()
	{
		if ($this->session->userdata['name']) {

			$data = array();

			$this->template->load('portal_template', 'content' , 'article/listing', $data);
		}else{
			redirect('/');
		}
	}

	public function login()
	{

		echo json_encode($this->Admin_model->login());

	}

	public function register()
	{
		echo json_encode($this->Admin_model->register());
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function article_list()
	{
		echo json_encode($this->Admin_model->article_listing());

	}

	public function add_article_view()
	{
		$id = $this->uri->segment(3);
		$data['article'][0] = array(
			'title' => '',
			'status' => '',
			'article' => '',
			'publish_by' => ''
		);

		if ($id) {
			$data['article'] = $this->Admin_model->article_data($id);
		}

		// pr($data);
		$this->template->load('portal_template', 'content' , 'article/form', $data);

	}

	public function add_article()
	{
		echo json_encode($this->Admin_model->add_article());

	}

	public function update_article()
	{
		echo json_encode($this->Admin_model->update_article());

	}

	public function delete_article()
	{
		echo json_encode($this->Admin_model->delete_article());

	}

	public function details_article()
	{
		$id = $this->uri->segment(3);

		$data['article'] = $this->Admin_model->article_data($id);

		// pr($data);
		$this->template->load('portal_template', 'content' , 'article/detail', $data);

	}

	public function add_comment()
	{
		echo json_encode($this->Admin_model->add_comment());

	}

	public function user_list()
	{
		echo json_encode($this->Admin_model->user_listing());

	}

	public function user_list_view()
	{
		$data = '';
		$this->template->load('portal_template', 'content' , 'user/listing', $data);
	}

	public function delete_user()
	{
		echo json_encode($this->Admin_model->delete_user());

	}

	public function edit_user_view()
	{
		$id = $this->uri->segment(3);
		$data['user'][0] = array(
			'acc_id' => '',
			'acc_name' => '',
			'password' => '',
			'status' => '',
			'username' => ''
		);

		if ($id) {
			$data['user'] = $this->Admin_model->user_data($id);
		}

		$this->template->load('portal_template', 'content' , 'user/form', $data);
	}

	public function update_user()
	{
		echo json_encode($this->Admin_model->update_user());

	}


}
