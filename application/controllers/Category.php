<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function show() {
		$data['category'] = $this->db->select('*')->from('category')->order_by('id asc')->get()->result_array();
 		$this->load->view('category/show', $data);
	}

	public function add() {
		$this->load->library('myclass');
		// echo $this->myclass->alias("fuck you mày");
		$this->load->view('category/add');
		if($this->input->post('Add')) {
			$title = trim($this->input->post('title'));
			// $alias = $this->input->post('alias');

			$data = array(
				'title' => $title,
				'alias'	=> $this->myclass->alias($title)
			);
			$this->db->insert('category', $data);
			header('Location: show');
		}
		
	}
	public function edit($id) {
		$id = (int)$id;
		$data['category'] = $this->db->select('*')->from('category')->where(array('id' => $id))->get()->row_array();
		$this->load->view('category/edit', $data);

		if(!isset($data['category']) || count($data['category'])==0) {
			header('Location: http://localhost/demo-ci/index.php/category/show');
		}
		if($this->input->post('edit')) {
			$title = $this->input->post('title');
			$alias = $this->input->post('alias');
			$data = array(
				'title' => $title,
				'alias' => $alias
			);
			$this->db->where('id', $id)->update('category', $data);
			header('Location: http://localhost/demo-ci/index.php/category/show');

			// $data['category'] = $this->db->select('*')->from('category')->order_by('id asc')->get()->result_array();
			// $this->load->view('category/show', $data);
		}
	}
	public function delete($id) {
		$id = (int)$id;
		$this->db->where('id',$id)->delete('category');
		header('Location: http://localhost/demo-ci/index.php/category/show');
	}
}
?>