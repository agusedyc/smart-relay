<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Model {

	public function aktif()
	{
		// Model
		$data =  $this->db->get_where('profil',array('aktif' => '1' ))->row();
		return $data;
		// $data = $this->db->get_where('waktu',array('profil_id'=> $aktifProfil ))->result();
		// return $data;
		
		// echo "<pre>";
		// print_r($aktifProfil);
		// echo "<br>";
		// print_r($data);
		// echo "</pre>";
	}

	public function aktifGetWaktu()
	{
		$waktuAktif = $this->db->get_where('waktu',array('profil_id'=> $this->aktif()->id ));
		$data = (object)[
			'waktu' => $waktuAktif->result(),
			'max' => $waktuAktif->row($waktuAktif->num_rows()-1),
			'num_rows' => $waktuAktif->num_rows,

		];
		return $data;
	}
	

}

/* End of file Profil.php */
/* Location: ./application/models/Profil.php */