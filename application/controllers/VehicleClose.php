<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VehicleClose extends CI_Controller
{
	public function index()
	{
		if (!$this->session->has_userdata('user_id')) {
			$this->load->view('login_form');
		} else {
			$this->load->view('header');
			$this->load->view('vehicle_close');
			$this->load->view('footer');
		}
	}
}
?>
