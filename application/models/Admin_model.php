<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		$this->load->library('datatables');
		$this->load->database();
	}

	function login()
	{
		$post = $this->input->post();
		
		$name = $post['email'];
		$pass = md5($post['password']);
		$sql = "SELECT * FROM account WHERE username = '$name' and password = '$pass' and status = 1";
		$data = $this->db->query($sql)->result_array();
		if($data){

		$newdata = array( 
			'name'  => $data[0]['acc_name'], 
			'id'  => $data[0]['acc_id'], 
			'role'     => $data[0]['role'], 
			'logged_in' => TRUE
		);  
		
		session_start();
		$this->session->set_userdata($newdata);
			$result = array(
				'status' => 1,
				'role' => $newdata['role'],
				'msg' => 'Welcome Article Site'
			);
		}else{
			$result = array(
				'status' => 2,
				'msg' => 'Username and Password does not match or your account is not actived. Please contact admin system to activated your account'
			);
		}

		return $result;

	}


	function register(){
		$post = $this->input->post();
		$name = $post['email'];
		$acc_name = $post['acc_name'];
		$pass = md5($post['password']);

		$sql = "INSERT INTO account (username, password, status, role, acc_name) VALUES ('$name', '$pass', 1, 2, '$acc_name')";
		$data = $this->db->query($sql);

		if($data){
			$result = array(
				'status'  => 1,
				'msg' => 'Registration is successs'
			);
		}else{
			$result = array(
				'status' => 2,
				'msg' => 'Registration is failed'
			);
		}

		return $result;
		


	}


	function article_listing()
	{
		$this->db->select("article_id, title, article, article.status, article.acc_id, account.acc_name, account.role");
		$this->db->from('article');
		$this->db->join('account', 'account.acc_id = article.acc_id', 'left');

		// pr($this->session->userdata);

		$data['data'] = $this->db->get()->result_array();

		return $data;
	}

	function article_data($id)
	{
		$this->db->select("title, article, acc_name");
		$this->db->join('account', 'account.acc_id = article.acc_id', 'left');
		$this->db->from('article');
		$this->db->where('article_id', $id);

		$data = $this->db->get()->result_array();
		return $data;
	}

	function add_article()
	{
		$post = $this->input->post();

		$status = $post['status'];
		$title = $post['title'];
		$article = $post['article'];
		$acc_id = $post['acc_id'];

		$sql = "INSERT INTO article (title, article, status, acc_id) VALUES ('$title', '$article', '$status', '$acc_id')";

		$data = $this->db->query($sql);

		if($data){
			$result = array(
				'status'  => 1,
				'msg' => 'Successs'
			);
		}else{
			$result = array(
				'status' => 2,
				'msg' => 'Failed'
			);
		}

		return $result;
	}

	function update_article()
	{
		$post = $this->input->post();

		$status = $post['status'];
		$title = $post['title'];
		$article = $post['article'];
		$article_id = $post['article_id'];

		$sql = "UPDATE article SET  title = '$title', article = '$article', status = '$status' WHERE article_id = '$article_id'";

		// pr($sql);
		$data = $this->db->query($sql);

		if($data){
			$result = array(
				'status'  => 1,
				'msg' => 'Successs'
			);
		}else{
			$result = array(
				'status' => 2,
				'msg' => 'Failed'
			);
		}

		return $result;
	}

	function delete_article(){
        $post = $this->input->post();
        $id = $post['id'];

        // delete comment
        $this->db->where("article_id IN ($id)");
		$this->db->delete('comment');

		// delete article
        $this->db->where("article_id IN ($id)");
		$query = $this->db->delete('article');

        if($query == 1){
            $result = array(
                    'status' => 1,
                    'msg' => 'Success'
                );
        }else{
            $result = array(
                    'status' => 0,
                    'msg' => 'Failed'
                );
        }
        return $result;

    }

    function add_comment()
	{
		$post = $this->input->post();

		$comment = $post['comment'];
		$acc_id = $post['acc_id'];
		$article_id = $post['article_id'];

		$sql = "INSERT INTO comment (cmn_desc, acc_id, article_id) VALUES ('$comment', '$acc_id', '$article_id')";
		// pr($sql);
		$data = $this->db->query($sql);

		if($data){
			$result = array(
				'status'  => 1,
				'msg' => 'Successs'
			);
		}else{
			$result = array(
				'status' => 2,
				'msg' => 'Failed'
			);
		}

		return $result;
	}

	function user_listing()
	{
		$this->db->select("*");
		$this->db->from('account');
		// $this->db->join('account', 'account.acc_id = article.acc_id', 'left');

		// pr($this->session->userdata);

		$data['data'] = $this->db->get()->result_array();

		return $data;
	}

	function delete_user(){
        $post = $this->input->post();
        $id = $post['id'];

        // delete user
        $this->db->where("acc_id IN ($id)");
		$this->db->delete('account');

		// delete article
        $this->db->where("acc_id IN ($id)");
		$query = $this->db->delete('article');

        if($query == 1){
            $result = array(
                    'status' => 1,
                    'msg' => 'Success'
                );
        }else{
            $result = array(
                    'status' => 0,
                    'msg' => 'Failed'
                );
        }
        return $result;

    }

    function user_data($id)
	{
		$this->db->select("*");
		$this->db->from('account');
		$this->db->where('acc_id', $id);

		$data = $this->db->get()->result_array();
		return $data;
	}

	function update_user()
	{
		$post = $this->input->post();

		$status = $post['status'];
		$name = $post['acc_name'];
		$username = $post['email'];
		$acc_id = $post['acc_id'];

		$sql = "UPDATE account SET  acc_name = '$name', status = '$status', username = '$username' WHERE acc_id = '$acc_id'";

		// pr($sql);
		$data = $this->db->query($sql);

		if($data){
			$result = array(
				'status'  => 1,
				'msg' => 'Successs'
			);
		}else{
			$result = array(
				'status' => 2,
				'msg' => 'Failed'
			);
		}

		return $result;
	}
}

