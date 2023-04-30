<?php

class Vehicle extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vehicle_model');
	}

	//To Load Customer Form
	public function index()
	{
		if (!$this->session->has_userdata('user_id')) {
			$this->load->view('login_form');
		} else {
			$results['brands'] = $this->vehicle_model->Get_Brand_List();
			$results['types'] = $this->vehicle_model->Get_Vehicle_Type_List();
			$this->load->view('header');
			$this->load->view('vehicle_details', $results);
			$this->load->view('footer');
		}
	}

	//Get All Vehicle List
	public function GetVehicleList()
	{
		$results = $this->vehicle_model->Get_Vehicle_List();
		echo json_encode($results);
	}

	//Get All Model List By Brand
	public function GetModelListByBrandID()
	{
		$brand_id = $this->input->get('brand_id');
		$models = $this->vehicle_model->Get_Model_List_By_BrandID($brand_id);
		echo json_encode($models);
	}

	//Get All Year List By Model
	public function GetYearListByBrandID()
	{
		$model_id = $this->input->get('model_id');
		$years = $this->vehicle_model->Get_Year_List_By_BrandID($model_id);
		echo json_encode($years);
	}

	//Check Mobile Number Is Exists Or Not Then Save Customer Information
	public function SaveVehicleInformation()
	{
		$data['ref_vehicle_id'] = $this->input->post('vehicleid');
		$data['vehicle_number'] = $this->input->post('vehicleno');
		$data['odometer'] = $this->input->post('odometer');

		$data['vehicle_type_id'] = $this->input->post('type');
		$data['brand_id'] = $this->input->post('brand');
		$data['model_id'] = $this->input->post('model');
		$data['year_id'] = $this->input->post('year');

		$data['vehicle_name'] = $this->input->post('vehiclename');
		$data['vehicle_insurance_number'] = $this->input->post('insuranceno');
		$data['registration_date'] = $this->input->post('registrationdate');
		$data['insurance_start_date'] = $this->input->post('insstartdate');
		$data['insurance_end_date'] = $this->input->post('insexpirydate');
		$data['rent_per_day'] = $this->input->post('rentperday');

		$data['condition_status_id'] = "1";
		$data['active_status_id'] = "1";

		$result = $this->vehicle_model->Save_Vehicle_Information($data);

		if ($result == true) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}


	//Load Customer Info Into DataTables
	public function GetAllVehicleInfo()
	{
		$VehicleInfo = $this->vehicle_model->Get_All_Vehicle_Info();
		$count = 1;
		foreach ($VehicleInfo as $list) {

			$Edit = '<a href="javascript:editdata(' . $list->id . ')" id="' . $list->id . '"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit </a>';
			$Delete = '<a href="javascript:deletedata(' . $list->id . ')" id="' . $list->id . '"><i class="fa fa-trash" aria-hidden="true"></i>  Delete </a>';

			$data[] = array(
				'S No' => $count++,
				'vehicle_number' => $list->vehicle_number,
				'odometer' => $list->odometer,
				'vehicle_type' => $list->vehicle_type,
				'brand_name' => $list->brand_name,
				'model_name' => $list->model_name,
				'year_name' => $list->year_name,
				'vehicle_name' => $list->vehicle_name,
				'vehicle_insurance_number' => $list->vehicle_insurance_number,
				'registration_date' => $list->registration_date,
				'insurance_start_date' => $list->insurance_start_date,
				'insurance_end_date' => $list->insurance_end_date,
				'rent_per_day' => $list->rent_per_day,
				'condition_status_name' => $list->condition_status_name,
				'active_status_name' => $list->active_status_name,
				'Action' => $Edit . ' | ' . $Delete
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


	//Get Specific Customer Info By Using ID
	public function GetVehicleByID()
	{
		$id = $this->input->post('thisid');
		$result = $this->vehicle_model->Get_Vehicle_By_ID($id);
		echo json_encode($result);
	}
}
