<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relay extends CI_Model {

	public function status()
	{
		foreach ($this->db->select('pin_relay, status_relay')->get('relay')->result() as $value) {
			$this->command($value->pin_relay,$value->status_relay);
		}
	}

	public function pin()
	{
		$pins = $this->db->select('pin_relay')->get('relay')->result();
		$i=1;
		foreach ($pins as $value) {
			$dataPin[] = (object) [
				'ch' => $i++,
				'pin' => $value->pin_relay, 
			];
		}
		return $dataPin;
		// echo '<pre>';
		// print_r($dataPin);
		// echo '</pre>';
	}

	public function command($pin='', $status='')
	{
		if ($status == "1") {
			$stat = "0";
		}else{
			$stat = "1";
		}
		exec("gpio -g mode $pin out".PHP_EOL);
		// echo "gpio -g mode $pin out".PHP_EOL;
		exec("gpio -g write $pin $stat".PHP_EOL);
		// echo "gpio -g write $pin $stat".PHP_EOL;


	}

	public function set($status_relay='')
	{
		foreach ($this->db->select('id, pin_relay, status_relay')->get('relay')->result() as $value) {
			// Update database jadi 0 / Mati / gpio status 1 = mati
			$this->db->update('relay', ['status_relay'=> $status_relay], array('id' => $value->id));
			$this->command($value->pin_relay,$status_relay);
		}	
	}

	public function off()
	{
		foreach ($this->db->select('id, pin_relay, status_relay')->get('relay')->result() as $value) {
			// Update database jadi 0 / Mati / gpio status 1 = mati
			$this->db->update('relay', ['status_relay'=> 0], array('id' => $value->id));
			$this->command($value->pin_relay,0);
		}
	}


// gpio -g mode 15 out
// gpio -g write 15 1	

}

/* End of file Relay.php */
/* Location: ./application/models/Relay.php */