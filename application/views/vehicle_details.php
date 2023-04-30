<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">



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

								<div class="card-body" id="VehicleFormArea" style="display: none;">
									<h4 class="card-title">Vehilce Form</h4>
									<br>
									<form id="VehicelEntry">
										<div class="row">
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Vehicle Number</label><span>&nbsp;&nbsp;<input id="clik" type="button" class="btn btn-primary btn-sm" value="Get odometer"></span>
													<select class="form-control" id="vehiclelist" style="width: 100%"></select>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Odometer</label>
													<input type="text" class="form-control" id="odometer" name="odometer" required readonly>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12">
												<fieldset class="form-group">
													<label for="vehicletype">Vehicle Type</label>
													<select class="select2 form-control" id="vehicle_type_id" name="vehicle_type_id" style="width: 100%">
														<option value="">Select Vehicle Type</option>
														<?php if ($types) {
															foreach ($types as $type) { ?>
																<option value="<?php echo $type->id; ?>"><?php echo $type->vehicle_type; ?></option>
														<?php   }
														} ?>
													</select>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12">
												<fieldset class="form-group">
													<label for="vehicletype">Brand Name</label>
													<select class="select2 form-control" id="brand_id" name="brand_id" style="width: 100%">
														<option value="">Select Brand</option>
														<?php if ($brands) {
															foreach ($brands as $brand) { ?>
																<option value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
														<?php   }
														} ?>

													</select>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Model Name</label>
													<select class="select2 form-control" id="model_id" name="model_id" style="width: 100%">
														<option value="">Select Model</option>
													</select>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Year</label>
													<select class="select2 form-control" id="year_id" name="year_id" style="width: 100%">
														<option value="">Select Year</option>
													</select>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Vehicle Name</label><span>&nbsp;&nbsp;<input id="GetVehName" type="button" class="btn btn-primary btn-sm" value="Get Vehicle Name"></span>
													<input type="text" class="form-control" id="vehiclename" name="vehiclename" required readonly>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Insurance Number</label>
													<input type="text" class="form-control" id="insuranceno" name="insuranceno" required>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Registration Date</label>
													<input type='date' class="form-control" id="registrationdate" name="registrationdate" required>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Insurance Start Date</label>
													<input type='date' class="form-control" id="insstartdate" name="insstartdate" required>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Insurance Expiry Date</label>
													<input type='date' class="form-control" id="insexpirydate" name="insexpirydate" required>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="">Rent Per Day</label>
													<input type="number" class="form-control" id="rentperday" name="rentperday" required>
												</fieldset>
											</div>
											<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
												<fieldset class="form-group">
													<input type="submit" id="Save" name="submit" class="btn btn-success" value="SAVE" style="color: black;">
													<button type="button" id="Back" class="btn btn-danger"><a href="<?= base_url("Vehicle") ?>" style="color: black;">BACK</a></button>
												</fieldset>
											</div>
										</div>
									</form>
								</div>

								<!-- End Form New Customer Add -->


								<!-- Start Table Vehicle Details -->

								<div class="card-content collapse show" id="VehicleTableArea">
									<div class="card-body card-dashboard">
										<div class="row">
											<div class="col-sm-3 float-left">
												<h4 class="card-title">Vehicle Details</h4>
											</div>
											<div class="col-sm-6"></div>
											<div class="col-sm-3 float-right"><button class="btn btn-primary" id="AddVehicle">ADD VEHICLE</button>
											</div>
										</div>
										<br>
										<table class="table table-striped table-bordered display responsive nowrap" id="VehicleTab">
											<thead class="border-bottom border-dark">
												<tr>
													<th>S No</th>
													<th>Vehicle No</th>
													<th>Odometer</th>
													<th>Type</th>
													<th>Brand</th>
													<th>Model</th>
													<th>Year</th>
													<th>Vehicle Name</th>
													<th>Insurance No</th>
													<th>Reg Date</th>
													<th>Insurance Start date</th>
													<th>Insurance Expiry date</th>
													<th>Rent</th>
													<th>Condition Status</th>
													<th>Active Status</th>
													<th>Action</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>

								<!-- End Table Vehicle Details -->

							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<!-- Load Vehicle List -->
<script>
	$("#vehiclelist").select2({
		placeholder: 'Select an option',
		ajax: {
			url: '<?= base_url('Vehicle/GetVehicleList') ?>', // Replace with the URL of your data endpoint
			dataType: 'json',
			delay: 250,
			processResults: function(data) {
				return {
					results: $.map(data, function(item) {
						return {
							id: item.vehicleid,
							text: item.vehiclename
						};
					})
				};
			},
			cache: true
		}
	});
</script>

<!-- Get Odometer Count -->
<script>
	$(document).ready(function() {
		$("#clik").click(function() {

		});
	});
</script>

<!-- Brand Search -->
<script>
	$("#brand_id").select2({});
</script>

<!-- Model Search -->
<script>
	$("#model_id").select2({});
</script>

<!-- Year Search -->
<script>
	$("#year_id").select2({});
</script>

<!-- Vehicle Type Search -->
<script>
	$("#vehicle_type_id").select2({});
</script>

<!-- Empty Model When Click Brand -->
<script>
	$('#brand_id').on('change', function() {
		// Clear the current dropdown by removing all child elements
		$('#model_id').empty();
		$('#year_id').empty();
	});
</script>

<!-- Empty Year When Click Model -->
<script>
	$('#model_id').on('change', function() {
		// Clear the current dropdown by removing all child elements
		$('#year_id').empty();
	});
</script>

<!-- Brand Search -->
<script>
	$(document).on('change', '#brand_id', function() {
		var brand_id = $(this).val();
		if (brand_id != "") {
			$.ajax({
				url: "<?= base_url("Vehicle/GetModelListByBrandID") ?>",
				method: "get",
				data: {
					brand_id: brand_id
				},
				success: function(response) {
					var obj = JSON.parse(response);
					$("#model_id").html('<option value="">Select Model</option>');

					$.each(obj, function(key, value) {
						$('<option>')
							.val(value.id)
							.text(value.model_name)
							.appendTo("#model_id");
					});
					$("#year_id").html('<option value="">Select Year</option>');
				}
			});
		} else {
			$("#model_id").html('<option value="">Select Model</option>');
			$('#year_id').html('<option value="">Select Year</option>');
		}
	});
</script>

<!-- Model Search -->
<script>
	$(document).on('change', '#model_id', function() {
		var model_id = $(this).val();
		if (model_id != "") {
			$.ajax({
				url: "<?= base_url("Vehicle/GetYearListByBrandID") ?>",
				method: "get",
				data: {
					model_id: model_id
				},
				success: function(response) {
					var obj = JSON.parse(response);
					$("#year_id").html('<option value="">Select Year</option>');

					$.each(obj, function(key, value) {
						$('<option>')
							.val(value.id)
							.text(value.year_name)
							.appendTo("#year_id");
					});
				}
			});
		} else {
			$('#year_id').html('<option value="">Select Year</option>');
		}
	});
</script>

<!-- Generate Vehicle Name -->
<script>
	$(document).ready(function() {
		// Function to be called on button click
		function GenerateVehicleName() {

			var type = $("#vehicle_type_id").val();
			var make = $("#brand_id").val();
			var model = $("#model_id").val();
			var year = $("#year_id").val();
			if (type != "" && make != "" && model != "" && year != "") {
				var type = $("#vehicle_type_id").find("option:selected").text();
				var make = $("#brand_id").find("option:selected").text();
				var model = $("#model_id").find("option:selected").text();
				var year = $("#year_id").find("option:selected").text();
				var vehiclename = type + "-" + make + "-" + model + "-" + year;
				$("#vehiclename").val(vehiclename);
			} else {
				swal("Fill The Above Details");
			}
		}
		// Attach a click event handler to the button
		$('#GetVehName').on('click', function() {
			// Call the function when the button is clicked
			GenerateVehicleName();
		});
	});
</script>

<!-- Submit Vehicle Form Through AJAX -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#VehicelEntry").submit(function(e) {
			var StoreType = $("#Save").val();
			// NEW Customer 
			if (StoreType == "SAVE") {
				e.preventDefault();

				var vehicleid = $("#vehiclelist").val();
				var vehicleno = $("#vehiclelist").find("option:selected").text();
				var odometer = $("#odometer").val();

				var type = $("#vehicle_type_id").val();
				var brand = $("#brand_id").val();
				var model = $("#model_id").val();
				var year = $("#year_id").val();

				var vehiclename = $("#vehiclename").val();
				var insuranceno = $("#insuranceno").val();
				var registrationdate = $("#registrationdate").val();
				var insstartdate = $("#insstartdate").val();
				var insexpirydate = $("#insexpirydate").val();
				var rentperday = $("#rentperday").val();

				//alert(vehicleid + odometer + type + make + model + year + vehiclename + insuranceno + registrationdate + insstartdate + insexpirydate + rentperday)


				$.ajax({
					url: "<?= base_url("Vehicle/SaveVehicleInformation") ?>",
					type: "POST",
					data: {
						vehicleid: vehicleid,
						vehicleno: vehicleno,
						odometer: odometer,
						type: type,
						brand: brand,
						model: model,
						year: year,
						vehiclename: vehiclename,
						insuranceno: insuranceno,
						registrationdate: registrationdate,
						insstartdate: insstartdate,
						insexpirydate: insexpirydate,
						rentperday: rentperday
					},
					success: function(response) {
						if (response == 0) {
							swal("", "Vehicle Details Not Saved", "error");
						} else if (response == 1) {
							swal("", "Vehicle Details Saved", "success");
							$("#VehicelEntry")[0].reset();
							$("#VehicleFormArea").hide();
							$("#VehicleTableArea").show();
						}
					},
					error: function() {
						alert("Form Submission Failed!");
					}
				});
			}
			// UPDATE Customer
			else if (StoreType == "UPDATE") {
				// e.preventDefault();
				// $.ajax({
				// 	url: "<?= base_url("Customer/UpdateCustomerInformation") ?>",
				// 	type: "POST",
				// 	data: $(this).serialize(),
				// 	success: function(response) {
				// 		if (response == 0) {
				// 			swal("", "Mobile Number Already", "info");
				// 		} else if (response == 1) {
				// 			swal("", "Customer Details Not Updated", "error");
				// 			$("#CustomerForm")[0].reset();
				// 			$("#CustomerFormArea").hide();
				// 			$("#CustomerTableArea").show();
				// 		} else if (response == 2) {
				// 			swal("", "Customer Details Updated", "success");
				// 			$("#CustomerForm")[0].reset();
				// 			$("#CustomerFormArea").hide();
				// 			$("#CustomerTableArea").show();
				// 		}
				// 	},
				// 	error: function() {
				// 		alert("Form Submission Failed!");
				// 	}
				// });
			}
		});
	});
</script>

<!-- Datatable Vehicle Info-->
<script>
	divlightbox();

	function divlightbox() {
		// define the $ as jQuery for multiple uses
		jQuery(function($) {

			var table = $('#VehicleTab').DataTable({

				"bProcessing": true,
				"sAjaxSource": "<?php echo base_url("Vehicle/GetAllVehicleInfo"); ?>",
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
						mData: 'vehicle_number'
					},
					{
						mData: 'odometer'
					},
					{
						mData: 'vehicle_type'
					},
					{
						mData: 'brand_name'
					},
					{
						mData: 'model_name'
					},
					{
						mData: 'year_name'
					},
					{
						mData: 'vehicle_name'
					},
					{
						mData: 'vehicle_insurance_number'
					},
					{
						mData: 'registration_date'
					},
					{
						mData: 'insurance_start_date'
					},
					{
						mData: 'insurance_end_date'
					},
					{
						mData: 'rent_per_day'
					},
					{
						mData: 'condition_status_name'
					},
					{
						mData: 'active_status_name'
					},
					{
						mData: 'Action'
					}
				]
			});
		});
	}
</script>

<!-- Vehicle Add Click -->
<script>
	$(document).ready(function() {
		$("#AddVehicle").on('click', function() {
			$("#VehicleFormArea").show();
			$("#VehicleTableArea").hide();
		});
	});
</script>

<!-- Edit Vehicle Info -->
<script type="text/javascript">
	function editdata(thisid) {
		$.ajax({
			type: "POST",
			datatype: "json",
			url: "<?php echo base_url('Vehicle/GetVehicleByID'); ?>",
			data: {
				thisid: thisid
			},
			success: function(response) {
				var obj = JSON.parse(response);
				alert(response);
				if ($.isEmptyObject(obj)) {
					swal("Alert", "No Customer Found", "error");
				} else {
					$("#VehicleFormArea").show();
					$("#VehicleTableArea").hide();

					$("#vehiclelist").val(obj.vehicle_number);
					$("#odometer").val(obj.odometer);
					$("#vehicle_type_id").val();
					$("#brand_id").val(obj.brand_name);
					$("#model_id").val(obj.model_name);
					$("#year_id").val(obj.year_name);
					$("#vehiclename").val(obj.vehicle_name);
					$("#insuranceno").val(obj.vehicle_insurance_number);
					$("#registrationdate").val(obj.registration_date);
					$("#insstartdate").val(obj.insurance_start_date);
					$("#insexpirydate").val(obj.insurance_end_date);
					$("#rentperday").val(obj.rent_per_day);

					$("#Save").val("UPDATE");
				}
			},
			error: function() {
				console.log('Error While Request User Edit List..');
			}
		});

	}
</script>