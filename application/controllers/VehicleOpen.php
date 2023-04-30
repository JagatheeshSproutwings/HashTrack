<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VehicleOpen extends CI_Controller
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
			$url = 'https://vts.trackingwings.com/api/qatar_all_vehicles';
                $curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		));
		$respone = curl_exec($curl);
		curl_close($curl);
		
		
		$data['vehicle_list'] = json_decode($respone);
			$this->load->view('header');
			$this->load->view('vehicle_open',$data);
			$this->load->view('footer');
		}
	}

	public function GetCustomerName()
	{
		$qidno = $this->input->post('qidno');
		$response = $this->vehicle_model->getcustomerhavevehicle($qidno);
		if ($response == "true") {
			$qidno = $this->vehicle_model->getcustomername($qidno);
			if ($qidno != null) {
				echo json_encode($qidno);
			} else {
				echo json_encode(1);
			}
		} else {
			echo json_encode(0);
		}
	}

	public function GetVehicleDetails()
	{
		$VehicleDet = "";

		$VehicleNo = $this->input->post('VehicleNo');
		$result = $this->vehicle_model->checkstatus($VehicleNo);

		if ($result != null) {
			if ($result->vehicle_status == "Active") {
				$VehicleDet = $this->vehicle_model->getvehicleDetails($VehicleNo);
				echo json_encode($VehicleDet);
			} else {
				echo json_encode(1);
			}
		} else {
			echo json_encode($VehicleDet);
		}
	}

	public function GetCustomerwithVehicle()
	{
		$id = $this->input->post('thisid');
		$editdata = $this->vehicle_model->GetCustomerwithVehicle($id);
		if ($editdata != null) {
			echo json_encode($editdata);
		} else {
			echo json_encode(0);
		}
	}

	public function SaveVehicleOpen()
	{
		$data['open_date'] = $this->input->post('opendate');
		$data['agreement_no'] = $this->input->post('agreementno');
		$data['customer_id'] = $this->input->post('customerid');
		$data['vehicle_id'] = $this->input->post('vehicleid');
		$data['per_day_rent'] = $this->input->post('rentperday');
		$data['credit_limit'] = $this->input->post('totcreditlimit');
		$data['created_at'] = date('Y-m-d H:i:s');
		$data['current_status'] = 'Open';

		$result = $this->vehicle_model->SaveVehicleOpenDet($data);
		if ($result == "saved") {
			$result = $this->vehicle_model->UpdateCustomerBalance($data);
			redirect('vehicleopen');
		}
		
	}


	public function vehicle_open_list()
	{
		$opendetails = $this->vehicle_model->vehicle_open_details();
		$count = 1;
		foreach ($opendetails as $list) {

			$Change = '<a href="javascript:changedata(' . $list->ref_no . ')" id="' . $list->ref_no . '" class="chg"><i class="fa fa-circle-o " aria-hidden="true"></i> Change</a>';
			$Close = '<a href="javascript:closedata(' . $list->ref_no . ')" id="' . $list->ref_no . '" class="cls"><i class="fa fa-circle-o " aria-hidden="true"></i> Close</a>';

			$data[] = array(
				'S No' => $count++,

				'open_date' => $list->open_date,
				'agreement_no' => $list->agreement_no,
				'customer_name' => $list->customer_name,
				'vehicle_name' => $list->vehicle_name,
				'rentperday' => $list->per_day_rent,
				'creditlimit' => $list->credit_limit,
				'vehicle_status' => $list->current_status,
				'Action' => $Change . ' | ' . $Close

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

	public function BalAmount()
	{
		$opendate = $this->input->post('opendate');
		$changedate = $this->input->post('changedate');
		$oldrent = $this->input->post('oldrent');
		$oldcredit = $this->input->post('oldcredit');

		$FrToSecDiff = strtotime($changedate) - strtotime($opendate);
		$RentPerSecond = $oldrent / 86400;

		$UtilizedAmt = $RentPerSecond * $FrToSecDiff;

		$balamt = $oldcredit - $UtilizedAmt;

		echo json_encode($balamt);
	}

	public function closevehicle()
	{
		$customer_id =	$this->input->post('cls_customer_id');
		$bal_amount =	$this->input->post('cls_BalAmt');

		$agreement_no =	$this->input->post('cls_agreement_no');
		$old_vehicleid = $this->input->post('cls_old_vehicleid');

		$this->vehicle_model->close_vehicle($customer_id, $bal_amount, $agreement_no, $old_vehicleid);

		redirect('vehicleopen');

	}
}
