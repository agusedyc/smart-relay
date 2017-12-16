<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('relay');
	}

	public function index()
	{
		$data = array(
			'title' => 'Profil Saklar',
			'table' => 'Data Profil Saklar',
			'form' => 'Tambah Profil',
			'no' => 0,
			// 'waktus' => $this->db->get('waktu')->result(),
			'rows' => $this->db->get('profil'),
			// 'rows' => $this->db->get_where('profil',array('id' => , $id_profil)),

		);
		$this->template->view('profil/index',$data);
	}

	public function add()
	{
		$input = $this->input->post();
		$this->db->insert('profil',$input);
		redirect('profil','refresh');

	}

	public function edit()
	{
		$profil_id = $this->uri->segment(3);
		$data = array(
			'title' => 'Profile Saklar',
			'table' => 'Data Profil Saklar',
			'form' => 'Edit Profil',
			'no' => 0,
			// 'waktus' => $this->db->get('waktu')->result(),
			'rows' => $this->db->get('profil'),
			'row' => $this->db->get_where('profil', array('id' => $profil_id))->row(),
		);
		$this->template->view('profil/index',$data);
	}

	public function update()
	{
		$update = $this->input->post();
		unset($update['id']);
		$this->db->update('profil', $update, array('id' => $this->input->post('id')));
		redirect('profil','refresh');
		// echo "<pre>";
		// print_r($update);
		// echo "<pre>";
	}

	public function delete()
	{
		$id_profil = $this->uri->segment(3);
		$data = $this->db->delete('profil', array('id' => $id_profil));
		redirect('profil','refresh');
	}

	public function setAktif()
	{
		$id_aktif_baru = $this->uri->segment(3);
		$id_aktif = $this->db->get_where('profil',['aktif'=>'1'])->row('id');
		$this->db->update('profil', ['aktif'=> '0'], array('id' => $id_aktif));
		$this->db->update('profil', ['aktif'=> '1'], array('id' => $id_aktif_baru));
		redirect('profil','refresh');
		/*echo '<pre>';
		print_r($id_aktif);
		echo '</pre>';*/
	}

	public function setStatus()
	{
		$id_aktif_baru = $this->uri->segment(3);
		$status = $this->uri->segment(5);
		$id_aktif = $this->db->get_where('profil',['aktif'=>'1'])->row('id');
		$this->db->update('profil', ['aktif'=> '0'], array('id' => $id_aktif));
		$this->db->update('profil', ['aktif'=> $status], array('id' => $id_aktif_baru));
		redirect('profil','refresh');
		// redirect('waktu/kelola/0'.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6),'refresh');

	}

	public function setNAktif()
	{
		$this->db->set('aktif', '0'); //value that used to update column  
		$this->db->update('profil');  //table name
		$this->relay->off();
		// $this->db->update('waktu',['status_waktu'=>'1'],['id'=>$id_waktu]);
		redirect('profil','refresh');
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */