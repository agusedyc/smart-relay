<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('relay');
		$this->load->model('profil');
	}

	/*public function index()
	{
		$data = array(
			'title' => 'Profile Saklar',
			'table' => 'Data Profil Saklar',
			'form' => 'Tambah Profil',
			'no' => 0,
			// 'waktus' => $this->db->get('waktu')->result(),
			'rows' => $this->db->get('profil'),
			// 'rows' => $this->db->get_where('profil',array('id' => , $id_profil)),

		);
		$this->template->view('waktu/index',$data);
	}*/

	public function kelola()
	{
		$mode = $this->uri->segment(5);
		$profil_id = $this->uri->segment(4);
		$data = array(
			'title' => ($mode=='0') ? 'Jadwal Saklar' : 'Interval Saklar',
			'table' => ($mode=='0') ? 'Data Jadwal Saklar' : 'Data Interval Saklar',
			'form' => ($mode=='0') ? 'Tambah Jadwal Saklar' : 'Tambah Interval Saklar',
			'no' => 0,
			// 'waktus' => $this->db->get('waktu')->result(),
			'rows' => $this->db->get_where('waktu',array('profil_id' => $profil_id)),
			// 'rows' => $this->db->get_where('profil',array('id' => , $id_profil)),

		);
		if ($mode=='1') {
			$this->template->view('waktu/interval',$data);	
		}else{
			$this->template->view('waktu/terjadwal',$data);
		}

		// echo current_url();
		
	}

	public function edit()
	{
		$mode = $this->uri->segment(5);
		$profil_id = $this->uri->segment(4);
		$waktu_id = $this->uri->segment(3);
		$dataInterval = $this->db->get_where('waktu',array('id' => $waktu_id))->row();
		$interval = (object) [
			'jam' => $this->secondToTime($dataInterval->interval)->jam,
			'menit' => $this->secondToTime($dataInterval->interval)->menit,
			'detik' => $this->secondToTime($dataInterval->interval)->detik,
		];
		$data = array(
			'title' => ($mode=='0') ? 'Jadwal Saklar' : 'Interval Saklar',
			'table' => ($mode=='0') ? 'Data Jadwal Saklar' : 'Data Interval Saklar',
			'form' => ($mode=='0') ? 'Edit Jadwal Saklar' : 'Edit Interval Saklar',
			'no' => 0,
			'rows' => $this->db->get_where('waktu',array('profil_id' => $profil_id)),
			'row' => (object) array_merge((array) $dataInterval, (array) $interval),
			);
		
		/*echo '<pre>';
		print_r($data['row']);
		echo '</pre>';*/
		if ($mode=='1') {
			$this->template->view('waktu/interval',$data);	
		}else{
			$this->template->view('waktu/terjadwal',$data);
		}
	}

	public function update()
	{
		
		$update = $this->input->post();
		if ($mode = $this->input->post('mode') == '1') {
			$interval = sprintf("%02d",$update['jam']).':'.sprintf("%02d",$update['menit']).':'.sprintf("%02d",$update['detik']);
			unset($update['id'],$update['url'],$update['mode'],$update['jam'],$update['menit'],$update['detik']);
			$update['interval'] = $this->timeToSecond($interval);
		}else{
			unset($update['id'],$update['url'],$update['mode']);
			$update['interval'] = $this->diff($this->input->post('awal'),$this->input->post('akhir'))->detik;
		}
		$this->db->update('waktu', $update, array('id' => $this->input->post('id')));
		redirect($this->input->post('url'),'refresh');
		/*echo "<pre>";
		print_r($update);
		echo "<pre>";*/
	}

	public function add()
	{
		$input = $this->input->post();
		if ($mode = $this->input->post('mode') == '1') {
			$interval = sprintf("%02d",$input['jam']).':'.sprintf("%02d",$input['menit']).':'.sprintf("%02d",$input['detik']);
			unset($input['url'],$input['mode'],$input['jam'],$input['menit'],$input['detik']);
			$input['interval'] = $this->timeToSecond($interval);
		}else{
			unset($input['url'],$input['mode']);
			$input['interval'] = $this->diff($this->input->post('awal'),$this->input->post('akhir'))->detik;
		}		
			$this->db->insert('waktu',$input);
			redirect($this->input->post('url'),'refresh');
		/*echo '<pre>';
		print_r($input);
		echo '</pre>';*/

	}

	public function delete()
	{
		$waktu_id = $this->uri->segment(3);
		$this->db->delete('waktu',['id' => $waktu_id]);
		redirect('waktu/kelola/0'.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6),'refresh');

	}

	public function timeToSecond($time)
	{
		// echo $time = "01:20:00";
		// echo '<br>';
		// echo '<br>';
		sscanf($time, "%d:%d:%d", $hours, $minutes, $seconds);
		return $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
	}

	public function intervalKeWaktu($awal,$interval)
	{
		// $now = date('Y-m-d H:i:s');
		
		// $interval = 300;
		// $plusInterval = strtotime($awal) + ($interval * 60 * 60); // Jam
		// $plusInterval = strtotime($awal) + ($interval * 60); // menit
		$plusInterval = strtotime($awal) + ($interval); // Detik
		// '<br>';
		return date('Y-m-d H:i:s',$plusInterval);

	}

	public function setWaktuByInterval($date='')
	{
		$data_waktu = $this->getAktifProfil();
		if (!empty($date)) {
			$waktu_sekarang = $date;
		}else{
			$waktu_sekarang = date('Y-m-d H:i:s');
		}
		$data = [
			// 'id' => $data_waktu[0]->id,
			'awal' => $waktu_sekarang,
			'akhir' => $this->intervalKeWaktu($waktu_sekarang,$data_waktu[0]->interval),

		];
		$this->db->update('waktu',$data, array('id' => $data_waktu[0]->id));

		

		$no = 0;
		foreach ($this->getAktifProfil() as $value) {
			// $no++;
			if ($data_waktu[0]->id != $value->id) {
				// $no++;
				$datas = [
					// 'no' => $no++,
					// 'id' => $value->id,
					'awal' => $akhir = $this->db->get_where('waktu',['id'=>$data_waktu[$no++]->id])->row()->akhir,
					'akhir' => $this->intervalKeWaktu($akhir,$value->interval),
				];
				$this->db->update('waktu',$datas, array('id' => $value->id));
			}
			
		}

		// echo '<pre>';
		// print_r($data_waktu);
		// echo '<br>';
		// print_r($data);
		// echo '<br>';
		// print_r($datas);
		// echo '</pre>';
	}

	public function setIntervalByWaktu()
	{
		// echo $now = date('Y-m-d H:i:s');
		// echo '<br><br>';
		// Belu teruji
		foreach ($this->getAktifProfil() as $value) {
			// echo $value->awal;
			// echo "<br>";
			// echo $value->akhir;
			// echo "<br>";
			// echo $this->diff($value->awal,$value->akhir)->detik;
			// echo "<br>";
			// echo $this->diff($value->awal,$value->akhir)->menit;
			// echo "<br>";
			// echo $this->diff($value->awal,$value->akhir)->jam;
			// echo "<br>";
			// echo $this->diff($value->awal,$value->akhir)->hari;
			// echo "<br><br>";
			// echo strtotime($now)+;
			$this->db->update('waktu', ['interval' => $this->diff($value->awal,$value->akhir)->detik], array('id' => $value->id));
			// jka tanggal sekarang >= tanggal terakhir
			// 
		}
	}

	public function getAktifProfil()
	{
		// Model
		$aktifProfil = $this->db->get_where('profil',array('aktif' => '1' ))->row('id');
		$data = $this->db->get_where('waktu',array('profil_id'=> $aktifProfil ))->result();
		return $data;
		
		// echo "<pre>";
		// print_r($aktifProfil);
		// echo "<br>";
		// print_r($data);
		// echo "</pre>";
	}

	public function diff($awal='', $akhir='')
	{
		// $awal  = strtotime('2017-08-10 10:05:25');
		// $akhir = strtotime('2017-08-11 11:07:33');
		$diff  = strtotime($akhir) - strtotime($awal);

		$jam   = floor($diff / (60 * 60));
		$menit = $diff - $jam * (60 * 60);
		// echo 'Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';
		// echo "<br>";
		// echo 'Second: '.$diff;
		// echo "<br>";
		// echo "Minutes: ".$diff/60;
		// echo "<br>";
		// echo "hour: ".($diff/60)/60;
		// echo "<br>";
		// echo "<br>";

		$data_diff = (object) array(
			'detik' => $diff, 
			'menit' => $diff/60,
			'jam' => ($diff/60)/60,
			'hari' => $diff/86400,
		);

		return $data_diff;
	}

	public function status($id_waktu)
	{
		/*
			Set status waktu, 
			untuk mencari waktu yang aktif sekarang
		*/
		$this->db->set('status_waktu', '0'); //value that used to update column  
		$this->db->update('waktu');  //table name
		$this->db->update('waktu',['status_waktu'=>'1'],['id'=>$id_waktu]);
	}

	public function cekWaktu()
	{ 
		/*
			Cekwaktu file lama
		*/
		$waktu_sekarang = date('Y-m-d H:i:s');
		// $stat = 0;
		foreach ($this->profil->aktifGetWaktu()->waktu as $value) {
			if (strtotime($waktu_sekarang) >= strtotime($value->awal) and strtotime($waktu_sekarang) <= strtotime($value->akhir)) {
					// echo $value->status;
					// echo '<br>';
					// echo $waktu_sekarang;
					// echo '<br>';
					// echo $value->awal;
					// echo '<br>';
					// echo $value->akhir;
					$this->relay->set($value->status);
					$this->status($value->id);
					$status = true;
					// set relay sesuai status
					
					break;
				}else{
					$status = false;
				}

		}
			// echo '<br>';
			if ($status) {
				// echo 'benar';
			}else{
				// echo 'salah';
				// set ulang interval
				// 0 Waktu
				// 1 Interval
				if ($this->profil->aktif()->mode=='0') { 
					if (strtotime($waktu_sekarang) >= strtotime($this->profil->aktifGetWaktu()->max->akhir)) {
					// if (strtotime($waktu_sekarang) >= strtotime($this->profil->aktifGetWaktu()->max->akhir) and strtotime($waktu_sekarang) <= strtotime($this->profil->aktifGetWaktu()->max->akhir)) {
						$this->setWaktuByInterval($this->profil->aktifGetWaktu()->max->akhir);	
					}					
				}/*else{
					$this->setWaktuByInterval();	
				}*/
				
			}
		// echo '<br><br>';
		// print_r($status);
	}

	public function secondToTime($second = '')
	{
		$time =  gmdate("H:i:s", $second);
		$timeExplode = explode(":", $time);
		$data_diff = (object) array(
			'detik' => $timeExplode[2], 
			'menit' => $timeExplode[1],
			'jam' => $timeExplode[0],
			// 'hari' => $diff/86400,
		);

		return $data_diff;
	}

	public function daemon()
	{
		// 0 Waktu
		// 1 Interval
		if ($this->profil->aktif()->mode == '0') {
			// Waktu
			$this->waktu();
		} else {
			// interval
			$this->counter();
		}
	}

	public function waktu()
	{ 
		/*
			CekWaktu file baru
		*/
		$waktu_sekarang = date('Y-m-d H:i:s');
		// $stat = 0;
		foreach ($this->profil->aktifGetWaktu()->waktu as $value) {
			if (strtotime($waktu_sekarang) >= strtotime($value->awal) and strtotime($waktu_sekarang) <= strtotime($value->akhir)) {
					// echo $value->status;
					// echo '<br>';
					// echo $waktu_sekarang;
					// echo '<br>';
					// echo $value->awal;
					// echo '<br>';
					// echo $value->akhir;
					// set relay sesuai status
					$this->relay->set($value->status);
					// update status waktu sekarang agar terlihat waktu yang sedang berjalan
					$this->status($value->id);
					$status = true;
					// set relay sesuai status
					
					break;
				}else{
					$status = false;
				}

		}
			// echo '<br>';
			if ($status) {
				// echo 'benar';
			}else{
				// echo 'salah';
				// set ulang interval
				// 0 Waktu
				// 1 Interval
				if ($this->profil->aktif()->mode=='0') { 
					if (strtotime($waktu_sekarang) >= strtotime($this->profil->aktifGetWaktu()->max->akhir)) {
					// if (strtotime($waktu_sekarang) >= strtotime($this->profil->aktifGetWaktu()->max->akhir) and strtotime($waktu_sekarang) <= strtotime($this->profil->aktifGetWaktu()->max->akhir)) {
						$this->setWaktuByInterval($this->profil->aktifGetWaktu()->max->akhir);	
					}					
				}/*else{
					$this->setWaktuByInterval();	
				}*/
				
			}
		// echo '<br><br>';
		// print_r($status);
	}

	public function counter()
	{
		// JikaInterval
		$data = $this->profil->aktifGetWaktu();
		$num_rows = 0;
		foreach ($data->waktu as $value) {
			$num_rows++;
			if ($value->counter > 0 ) {
				// jika counter > 0
				// set status relay
				$this->relay->set($value->status);
				// kurangi counter -1
				$this->db->update('waktu',[
					'counter' => $value->counter -1,
				], array('id' => $value->id));
				// update status waktu sekarang agar terlihat waktu yang sedang berjalan
				$this->status($value->id);
				// break, berhenti
				break;
			}
		}

		if ($data->max->counter == '0') {
			// jika jumlahdata >= counter data 
			// reset counter
			$this->setCounterByInterval();
			// ikut di reset juga waktunya;
			$this->setWaktuByInterval();
			
		}

		// echo '<pre>';
		// print_r($num_rows);
		// echo '<br>';
		// print_r($data->num_rows);
		// echo '<br>';
		// print_r($data->waktu);
		// echo '</pre>';
	}

	public function setCounterByInterval()
	{
		
		$data = $this->profil->aktifGetWaktu();
		$data_waktu = $data->waktu;
		$data_pertama = [
			'id' => $data_waktu[0]->id,
			// 'interval' => $data_waktu[0]->interval,
			// 'interval_sebelum' => $data_waktu[0]->interval,
			'counter' => $data_waktu[0]->interval,
		];
		$this->db->update('waktu',$data_pertama, array('id' => $data_waktu[0]->id));

		

		$no = 0;
		foreach ($data_waktu as $value) {
			// $no++;
			if ($data_waktu[0]->id != $value->id) {
				// $no++;
				$data_sebelumnya = $this->db->get_where('waktu',['id'=>$data_waktu[$no++]->id])->row()->counter;
				$data_selajutnya = [
					// 'no' => $no++,
					'id' => $value->id,
					// 'interval' => $value->interval,
					// 'counter_sebelum' => $data_sebelumnya,
					// 'counter' => $data_sebelumnya + $value->interval,
					'counter' => $value->interval,			
				];
				$this->db->update('waktu',$data_selajutnya, array('id' => $value->id));
			}
		}
		// echo '<pre>';
		// print_r($data_pertama);
		// echo '<br>';
		// print_r($data_selajutnya);
		// echo '<br>';
		// print_r($datas);
		// echo '</pre>';
	}

	/*
		# untuk set waktu sesuai interval.
		1. jika cek waktu (status) true, set relay sesuai $value->status.
		2. jika cek waktu (status) false, set ulang interval.

	*/
}

/*
// load the last run time from a file, database, etc
 if(time() >= $last_run + (60 * 5)) { // 60 * 5 is 5 minutes
     // do your task here
     // save the last run time to a file, database, etc
 }

*/

/* jika berdasar menit
baca semua data
ambil data sesuai urutan 
cek menit
jika profil sudah aktif
set waktu awal = now()
set waktu akhir date()+menit



*/

/* End of file Waktu */
/* Location: ./application/controllers/Waktu */