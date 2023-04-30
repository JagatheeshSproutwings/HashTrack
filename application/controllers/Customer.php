<?php

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
	}

	//To Load Customer Form
	public function index()
	{
		if (!$this->session->has_userdata('user_id')) {
			$this->load->view('login_form');
		} else {
			$this->load->view('header');
			$this->load->view('customer_form');
			$this->load->view('footer');
		}
	}

	//Validate QID When Click Validate Button
	public function ValidateQID()
	{
		$qid_no = $this->input->post('qid_no');
		$result = $this->customer_model->Validate_QID($qid_no);
		echo json_encode($result);
	}

	//Check Mobile Number Is Exists Or Not Then Save Customer Information
	public function SaveCustomerInformation()
	{
		$data['qid_no'] = $this->input->post('qid_no');
		$data['customer_name'] = $this->input->post('customer_name');
		$data['customer_mob_no'] = $this->input->post('customer_mob_no');
		$data['customer_address'] = $this->input->post('customer_address');
		$result = $this->customer_model->Validate_Mobile_No($data);

		if ($result == true) {
			$result = $this->customer_model->Save_Customer_Information($data);
			if ($result == true) {
				echo json_encode(2);
			} else {
				echo json_encode(1);
			}
		} else {
			echo json_encode(0);
		}
	}

	//Load Customer Info Into DataTables
	public function GetAllCustomerInfo()
	{
		$CustomerInfo = $this->customer_model->Get_All_Customer_Info();
		$count = 1;
		foreach ($CustomerInfo as $list) {

			$Edit = '<a href="javascript:editdata(' . $list->id . ')" id="' . $list->id . '"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit </a>';
			$Delete = '<a href="javascript:deletedata(' . $list->id . ')" id="' . $list->id . '"><i class="fa fa-trash" aria-hidden="true"></i>  Delete </a>';
			$AddBalance = '<a href="javascript:AddBalance(' . $list->id . ')" id="' . $list->id . '"><i class="fa fa-money" aria-hidden="true"></i>  Add Balance </a>';

			$data[] = array(
				'S No' => $count++,
				'qid_no' => $list->qid_no,
				'customer_name' => $list->customer_name,
				'customer_mob_no' => $list->customer_mob_no,
				'customer_address' => $list->customer_address,
				'bal_amount' => $list->bal_amount,
				'Action' => $Edit . ' | ' . $Delete . ' | ' . $AddBalance
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
	public function GetCustomerByID()
	{
		$id = $this->input->post('thisid');
		$result = $this->customer_model->Get_Customer_By_ID($id);
		echo json_encode($result);
	}

	// Except This ID Check Mobile Number Is Exists Or Not Then Update Customer Information
	public function UpdateCustomerInformation()
	{
		$data['id'] = $this->input->post('customer_id');
		$data['qid_no'] = $this->input->post('qid_no');
		$data['customer_name'] = $this->input->post('customer_name');
		$data['customer_mob_no'] = $this->input->post('customer_mob_no');
		$data['customer_address'] = $this->input->post('customer_address');
		$result = $this->customer_model->Validate_Mobile_No_ByID($data);

		if ($result == true) {
			$result = $this->customer_model->Update_Customer_Information($data);
			if ($result == true) {
				echo json_encode(2);
			} else {
				echo json_encode(1);
			}
		} else {
			echo json_encode(0);
		}
	}

	//Check Customer Pending Status
	public function CheckPendingStatus()
	{
		$id = $this->input->post('thisid');
		$result = $this->customer_model->Check_Pending_Status($id);
		if ($result == true) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}

	//Delete Customer Info
	public function DeleteCustomerInfo()
	{
		$id = $this->input->post('thisid');
		$result = $this->customer_model->Delete_Customer_Info($id);
		if ($result == true) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}

	//Update Customer Account Balance
	public function UpdateAccountBalance()
	{
		$id = $this->input->post("customerid");
		$bal_amount = $this->input->post("totalamount");
		$result = $this->customer_model->Update_Account_Balance($id, $bal_amount);
		if ($result == true) {
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}
}
