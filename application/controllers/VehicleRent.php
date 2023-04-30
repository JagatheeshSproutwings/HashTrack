<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VehicleRent extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vehicle_model');
	}

	public function index()
	{
		if (!$this->session->has_userdata('user_id')) {
			$this->load->view('login_form');
		} else {
			$this->load->view('header');
			$this->load->view('vehicle_rent');
			$this->load->view('footer');
		}
	}


	public function get_vehicle_list()
	{
		$simdetails = $this->vehicle_model->all_vehicle_list();
		$count = 1;
		foreach ($simdetails as $list) {

			// $edit = echo "ggfhfghgf";
			$edit = '<a href="javascript:editdata(' . $list->vehicleid . ')" class="edit"  id="' . $list->vehicleid . '"><i class="" aria-hidden="true"></i>Add Rent</a>';
			// echo $edit;exit;
			//$delete = '<a href="javascript:deletedata(' . $list->vehicleid . ')" id="' . $list->vehicleid . '" class="delete"><i class="fa fa-trash " aria-hidden="true"></i></a>';

			$data[] = array(
				'S No' => $count++,

				'vehname' => $list->vehiclename,
				'vehmod' => $list->vehiclemodel,
				'odometer' => $list->odometer,
				'Action' => $edit
				//'Action' => $edit . ' ' . $delete

			);
		}

		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data),
			"iTotalDisplayRecords" => count($data),
			"aaData" => $data
		);

		echo json_encode($results);
	}


	public function add_vehicle_rent()
	{
		$id = $this->input->post('thisid');
		$editdata = $this->vehicle_model->addvehiclerent($id);
		echo json_encode($editdata);
	}

	public function savevehiclerent()
	{
		if ($this->input->post('submit')) {
			$data['ref_vehicle_id'] = $this->input->post('vehid');
			$data['vehicle_name'] = $this->input->post('vehname');
			$data['model_no'] = $this->input->post('modelno');
			$data['odometer'] = $this->input->post('odometer');
			$data['rent_per_day'] = $this->input->post('rentperday');
			$data['vehicle_status'] = 'Active';

			$result = $this->vehicle_model->IsRentedVehicleOrNot($data);

			if ($result == true) {
				$result = $this->vehicle_model->saverentdetails($data);

				if ($result == true) {
					$this->session->set_flashdata('message', 'Records Saved Successfully');
				} else {
					$this->session->set_flashdata('message', 'Records Not Saved');
				}
			} else {
				$this->session->set_flashdata('message', 'Rent Amount Has Been Already Fixed This Vehicle');
			}

			$this->load->view('header');
			$this->load->view('vehicle_rent');
			$this->load->view('footer');
		}
	}
}
