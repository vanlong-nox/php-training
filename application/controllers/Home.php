<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		echo "fuck";
		// $this->load->view('welcome_message');
	}
	public function fuck($para1, $para2, $para3) {
		echo "fuck ".$para1;
	}

	//goi ben view
	public function view() {
		$this->load->view('home/view');
	}

	//goi csdl
	public function show($number = 6, $start=0) {
		$data['category'] = $this->db->select('*')->from('category')->limit($number,$start)->get()->result_array();
		// $this->load->view('home/show',$data);
		// print_r($data);
	}

	public function update($catid = 2) {
		$data = array(
			'title' => 'bóng đá 24h'
		);
		$this->db->where('id',$catid)->update('category', $data);
		// $this->db->update('category', $data);

		$data['category'] = $this->db->select('*')->from('category')->limit(6,0)->get()->result_array();
		$this->load->view('home/show',$data);
		
	}

	public function delete($catid = 6) {
		// $this->db->delete('category', array('id' => $catid));  // Produces: // DELETE FROM mytable  // WHERE id = $id
		$this->db->where('id', $catid);
		$this->db->delete('category');


		$data['category'] = $this->db->select('*')->from('category')->get()->result_array();
		$this->load->view('home/show',$data);
	}

	public function insert() {
		$data = array(
			'title' => 'làm đẹp'
		);
		$this->db->insert('category', $data);
		$data['category'] = $this->db->select('*')->from('category')->get()->result_array();
		$this->load->view('home/show', $data);
	}

	// public function detail($catid = 1) {

	// 	$data['category'] = $this->db->select('*')->from('category')->where(array('id' => $catid))->get()->row_array();
	// 	$this->load->view('home/detail', $data);
	// }

	public function detail($alias = '') {

		$data['category'] = $this->db->select('*')->from('category')->where(array('alias' => $alias))->get()->row_array();
		$this->load->view('home/detail', $data);
	}
}
