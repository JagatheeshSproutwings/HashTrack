<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VehicleChange extends CI_Controller
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
			$this->load->view('vehicle_change');
			$this->load->view('footer');
		}
	}

	public function getopeninfo()
	{
		$qid = $this->input->post('qid');
		$qid = $this->vehicle_model->getvehicleopendetails($qid);
		echo json_encode($qid);
	}


	public function SaveVehicleChange()
	{
		$old_agreement_no = $this->input->post('agreement_no');
		$this->vehicle_model->ChangeOpenStatus($old_agreement_no);

		$old_vehicle_id = $this->input->post('old_vehicleid');
		$this->vehicle_model->ChangeVehicleStatus($old_vehicle_id);


		$data['open_date'] = $this->input->post('changedate');
		$data['agreement_no'] = $this->input->post('new_agreement_no');
		$data['customer_id'] = $this->input->post('customer_id');
		$data['vehicle_id'] = $this->input->post('new_vehicleid');
		$data['per_day_rent'] = $this->input->post('new_rentperday');
		$data['credit_limit'] = $this->input->post('creditlimit');
		$data['current_status'] = 'Open';	
	
		$result = $this->vehicle_model->SaveVehicleOpenDet($data);
		if ($result == "saved") {
			$result = $this->vehicle_model->UpdateCustomerBalance($data);
			redirect('vehicleopen');
		}
	}

	public function rentDetails()
	{
		$simdetails = $this->vehicle_model->rent_all_vehicle_list();
		$count = 1;
		foreach ($simdetails as $list) {

			// $edit = echo "ggfhfghgf";
			//$edit = '<a href="javascript:editdata(' . $list->id . ')" class="edit"  id="' . $list->vid . '"><i class="" aria-hidden="true"></i>Add Rent</a>';
			// echo $edit;exit;
			//$delete = '<a href="javascript:deletedata(' . $list->vehicleid . ')" id="' . $list->vehicleid . '" class="delete"><i class="fa fa-trash " aria-hidden="true"></i></a>';

			$data[] = array(
				'S No' => $count++,
				'vehicle_name' => $list->vehicle_name,
				'model_no' => $list->model_no,
				'rent_per_day' => $list->rent_per_day,
				//'Action' => $edit
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
}
?>
