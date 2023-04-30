<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
			</div>
		</div>
		<div class="content-body"><!-- Basic Elements start -->
			<section class="basic-elements">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-content">

								<!-- Start Form New Customer Add -->

								<div class="card-body" id="CustomerFormArea" style="display: none;">
									<h4 class="card-title">Customer Form</h4>
									<br>
									<form id="CustomerForm">
										<div class="row">
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">QID</label><span><input type="text" id="customer_id" name="customer_id" hidden></span>
													<input type="text" class="form-control" id="qid_no" name="qid_no" required>
												</fieldset>
											</div>
											<div class="col-xl-2 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="" id="LblValidate">Validate QID Here</label>
													<input type="button" class="form-control btn btn-info" value="Validate" id="QIDValidate">
												</fieldset>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Customer Name</label>
													<input type="text" class="form-control" id="customer_name" name="customer_name" required>
												</fieldset>
											</div>
											<div class="col-xl-3 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Mobile No</label>
													<input type="text" class="form-control" id="customer_mob_no" name="customer_mob_no" required>
												</fieldset>
											</div>
											<div class="col-xl-9 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Address</label>
													<input type="text" class="form-control" id="customer_address" name="customer_address" required>
												</fieldset>
											</div>
											<div class="col-xl-9 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<input type="submit" id="Save" name="submit" class="btn btn-success" value="SAVE" style="color: black;">
													<button type="button" id="Back" class="btn btn-danger"><a href="<?= base_url("Customer") ?>" style="color: black;">BACK</a></button>
												</fieldset>
											</div>
										</div>
									</form>
								</div>

								<!-- End Form New Customer Add -->


								<!-- Start Form New Customer Add Rent-->

								<div class="card-body" id="CustomerAddBalanceForm" style="display: none;">
									<h4 class="card-title">Customer Form</h4>
									<br>
									<form id="CustomerCreditForm">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">QID</label><span><input type="text" id="customerid" name="customerid" hidden></span>
													<input type="text" class="form-control" id="qidno" name="qidno" required>
												</fieldset>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Customer Name</label>
													<input type="text" class="form-control" id="customername" name="customername" required readonly>
												</fieldset>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Account Balance</label>
													<input type="number" class="form-control" id="accbal" name="accbal" required readonly>
												</fieldset>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Credit Amount</label>
													<input type="number" class="form-control" id="creditamount" name="creditamount" required>
												</fieldset>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Total Amount</label>
													<input type="number" class="form-control" id="totalamount" name="totalamount" required readonly>
												</fieldset>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 mb-1 d-flex">
												<fieldset class="form-group" style="margin-top: 28px;">
													<input type="submit" id="SaveRent" name="submit" class="btn btn-success" value="SAVE RENT" style="color: black;">
													<button type="button" id="BackRent" class="btn btn-danger"><a href="<?= base_url("Customer") ?>" style="color: black;">BACK</a></button>
												</fieldset>
											</div>
										</div>
									</form>
								</div>

								<!-- End Form New Customer Add Rent -->



								<!-- Start Table Customer Details -->

								<div class="card-content collapse show" id="CustomerTableArea">
									<div class="card-body card-dashboard">
										<div class="row">
											<div class="col-sm-3 float-left">
												<h4 class="card-title">Customer Details</h4>
											</div>
											<div class="col-sm-6"></div>
											<div class="col-sm-3 float-right"><button class="btn btn-primary" id="AddCustomer">ADD CUSTOMER</button>
											</div>
										</div>
										<br>
										<table class="table table-striped table-bordered display responsive nowrap" id="Customer">
											<thead class="border-bottom border-dark">
												<tr>
													<th>S No</th>
													<th>QID</th>
													<th>Customer Name</th>
													<th>Mobile Number</th>
													<th>Address</th>
													<th>Balance</th>
													<th>Action</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>

								<!-- End Table Customer Details -->


							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>


<!-- Fix Input Box As Disabled -->
<script>
	$(document).ready(function() {
		$("#customer_name").prop('disabled', true);
		$("#customer_mob_no").prop('disabled', true);
		$("#customer_address").prop('disabled', true);
		$("#Save").prop('disabled', true);
	});
</script>

<!-- Click Add Customer Button -->
<script>
	$(document).ready(function() {
		$("#AddCustomer").click(function() {
			$("#CustomerFormArea").show();
			$("#CustomerTableArea").hide();
		});
	});
</script>

<!-- Click Back Button -->
<script>
	$(document).ready(function() {
		$("#Back").click(function() {
			$("#CustomerFormArea").hide();
			$("#CustomerTableArea").show();
		});
	});
</script>

<!-- Validating QID If Exists or Not -->
<script>
	$(document).ready(function() {
		$("#QIDValidate").click(function() {
			var qid_no = $("#qid_no").val();
			$.ajax({

				url: "<?= base_url("Customer/ValidateQID") ?>",
				method: "POST",
				data: {
					qid_no: qid_no
				},
				dataType: 'json',
				success: function(response) {
					if (response == true) {
						$("#customer_name").prop('disabled', false);
						$("#customer_mob_no").prop('disabled', false);
						$("#customer_address").prop('disabled', false);
						$("#Save").prop('disabled', false);

						swal("QID", "Valid QID", "success");
						$("#customer_name").focus();
					} else if (response == false) {
						$("#customer_name").prop('disabled', true);
						$("#customer_mob_no").prop('disabled', true);
						$("#customer_address").prop('disabled', true);
						$("#Save").prop('disabled', true);

						swal("QID", "Already Exists", "error");
						$("#qid_no").val("");
						$("#qid_no").focus();
					}
				}
			});
		});
	});
</script>

<!-- QID change Disable Input Field -->
<script>
	$(document).ready(function() {
		$("#qid_no").change(function() {
			$("#customer_name").val("");
			$("#customer_mob_no").val("");
			$("#customer_address").val("");
			$("#customer_name").prop('disabled', true);
			$("#customer_mob_no").prop('disabled', true);
			$("#customer_address").prop('disabled', true);
			$("#Save").prop('disabled', true);
		});
	});
</script>

<!-- Submit Customer Form Through AJAX -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#CustomerForm").submit(function(e) {
			var StoreType = $("#Save").val();
			// NEW Customer 
			if (StoreType == "SAVE") {
				e.preventDefault();
				$.ajax({
					url: "<?= base_url("Customer/SaveCustomerInformation") ?>",
					type: "POST",
					data: $(this).serialize(),
					success: function(response) {
						if (response == 0) {
							swal("", "Mobile Number Already", "info");
						} else if (response == 1) {
							swal("", "Customer Details Not Saved", "error");
							$("#CustomerForm")[0].reset();
							$("#customer_name").prop('disabled', true);
							$("#customer_mob_no").prop('disabled', true);
							$("#customer_address").prop('disabled', true);
							$("#Save").prop('disabled', true);

							$("#CustomerFormArea").hide();
							$("#CustomerTableArea").show();
						} else if (response == 2) {
							swal("", "Customer Details Saved", "success");
							$("#CustomerForm")[0].reset();
							$("#customer_name").prop('disabled', true);
							$("#customer_mob_no").prop('disabled', true);
							$("#customer_address").prop('disabled', true);
							$("#Save").prop('disabled', true);

							$("#CustomerFormArea").hide();
							$("#CustomerTableArea").show();
						}
					},
					error: function() {
						alert("Form Submission Failed!");
					}
				});
			}
			// UPDATE Customer
			else if (StoreType == "UPDATE") {
				e.preventDefault();
				$.ajax({
					url: "<?= base_url("Customer/UpdateCustomerInformation") ?>",
					type: "POST",
					data: $(this).serialize(),
					success: function(response) {
						if (response == 0) {
							swal("", "Mobile Number Already", "info");
						} else if (response == 1) {
							swal("", "Customer Details Not Updated", "error");
							$("#CustomerForm")[0].reset();
							$("#CustomerFormArea").hide();
							$("#CustomerTableArea").show();
						} else if (response == 2) {
							swal("", "Customer Details Updated", "success");
							$("#CustomerForm")[0].reset();
							$("#CustomerFormArea").hide();
							$("#CustomerTableArea").show();
						}
					},
					error: function() {
						alert("Form Submission Failed!");
					}
				});
			}
		});
	});
</script>

<!-- Datatable Customer Info-->
<script>
	divlightbox();

	function divlightbox() {
		// define the $ as jQuery for multiple uses
		jQuery(function($) {

			var table = $('#Customer').DataTable({
				"bProcessing": true,
				"sAjaxSource": "<?php echo base_url("Customer/GetAllCustomerInfo"); ?>",
				"bPaginate": true,
				"sPaginationType": "full_numbers",
				"responsive": true,
				"bDestroy": true,
				"iDisplayLength": 10,
				"sScrollX": "100%",
				"bScrollCollapse": true,
				"aoColumns": [{
						mData: 'S No'
					},
					{
						mData: 'qid_no'
					},
					{
						mData: 'customer_name'
					},
					{
						mData: 'customer_mob_no'
					},
					{
						mData: 'customer_address'
					},
					{
						mData: 'bal_amount'
					},
					{
						mData: 'Action'
					},
				]
			});
		});
	}
</script>

<!-- Edit Customer Info -->
<script type="text/javascript">
	function editdata(thisid) {

		$.ajax({
			type: "POST",
			datatype: "json",
			url: "<?php echo base_url('Customer/GetCustomerByID'); ?>",
			data: {
				thisid: thisid
			},
			success: function(response) {
				var obj = JSON.parse(response);
				if ($.isEmptyObject(obj)) {
					swal("Alert", "No Customer Found", "error");
				} else {
					$("#CustomerFormArea").show();
					$("#CustomerTableArea").hide();
					$("#QIDValidate").hide();
					$("#LblValidate").hide();

					$("#qid_no").prop('disabled', true);
					$("#customer_name").prop('disabled', false);
					$("#customer_mob_no").prop('disabled', false);
					$("#customer_address").prop('disabled', false);
					$("#Save").prop('disabled', false);

					$("#qid_no").val(obj.qid_no);
					$("#customer_id").val(obj.id);
					$("#customer_name").val(obj.customer_name);
					$("#customer_mob_no").val(obj.customer_mob_no);
					$("#customer_address").val(obj.customer_address);
					$("#Save").val("UPDATE");
				}
			},
			error: function() {
				console.log('Error While Request User Edit List..');
			}
		});

	}
</script>

<!-- Delete Customer Pending Status -->
<script type="text/javascript">
	function deletedata(thisid) {

		$.ajax({
			type: "POST",
			datatype: "json",
			url: "<?php echo base_url('Customer/CheckPendingStatus'); ?>",
			data: {
				thisid: thisid
			},
			success: function(response) {
				if (response == 0) {
					swal("", "Pending Transaction Available Please Clear Then Delete This User", "info");
				} else if (response == 1) {
					swal({
							text: "Are You Sure You Want To Delete This ?",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {

								$.ajax({
									type: "POST",
									datatype: "json",
									url: "<?php echo base_url('Customer/DeleteCustomerInfo'); ?>",
									data: {
										thisid: thisid
									},
									success: function(response) {
										if (response == 0) {
											swal("", "Customer Details Not Deleted", "error");
											$("#CustomerForm")[0].reset();

										} else if (response == 1) {
											swal("", "Customer Details Deleted", "success");
											$("#CustomerForm")[0].reset();
										}
									}
								});
								swal("Customer Information Deleted.", {
									icon: "success",
								});
							} else {
								swal("Customer Information Not Deleted.", {
									icon: "info",
								});
							}
						});
				}
			},
			error: function() {
				console.log('Error While Request User Edit List..');
			}
		});
	}
</script>

<!-- Add Account Balance -->
<script type="text/javascript">
	function AddBalance(thisid) {

		$.ajax({
			type: "POST",
			datatype: "json",
			url: "<?php echo base_url('Customer/GetCustomerByID'); ?>",
			data: {
				thisid: thisid
			},
			success: function(response) {
				var obj = JSON.parse(response);
				if ($.isEmptyObject(obj)) {
					swal("Alert", "No Customer Found", "error");
				} else {
					$("#CustomerAddBalanceForm").show();
					$("#CustomerTableArea").hide();

					$("#qidno").val(obj.qid_no);
					$("#customerid").val(obj.id);
					$("#customername").val(obj.customer_name);
					$("#accbal").val(obj.bal_amount);
					$("#totalamount").val(obj.bal_amount);
				}
			},
			error: function() {
				console.log('Error While Request User Edit List..');
			}
		});
	}
</script>

<!-- Calculating Account Balance -->
<script>
	$(document).ready(function() {
		$("#creditamount").change(function() {
			var AccBal = parseInt($("#accbal").val());
			var CreditAmount = parseInt($(this).val());
			if (isNaN(CreditAmount)) {
				$("#totalamount").val(AccBal);
				$("#creditamount").val(0);
			} else {
				var Total = AccBal + CreditAmount;
				$("#totalamount").val(Total);
			}
		});
	});
</script>

<!-- Save New Credit Amount -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#CustomerCreditForm").submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?= base_url("Customer/UpdateAccountBalance") ?>",
				type: "POST",
				data: $(this).serialize(),
				success: function(response) {
					if (response == 0) {
						swal("", "Credit Amount Not Updated", "error");
					} else if (response == 1) {
						swal("", "Credit Amount Updated", "success");
						$("#CustomerCreditForm")[0].reset();
						$("#CustomerCreditForm").hide();
						$("#CustomerTableArea").show();
					}
				},
				error: function() {
					alert("Form Submission Failed!");
				}
			});
		});
	});
</script>