		<!-- BEGIN: Vendor CSS-->
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors.min.css') ?>">
		<!-- END: Vendor CSS-->

		<!-- BEGIN: Theme CSS-->
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/bootstrap.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/bootstrap-extended.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/colors.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/components.min.css') ?>">
		<!-- END: Theme CSS-->

		<!-- BEGIN: Page CSS-->
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/colors/palette-gradient.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/fonts/simple-line-icons/style.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/pages/card-statistics.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/pages/vertical-timeline.min.css') ?>">
		<!-- END: Page CSS-->

		<!-- BEGIN: Custom CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

		<script>
			$(document).ready(function() {
				$('#VehicleOpenButton').click(function() {
					$('#VehicleOpenButton').hide();
					$('#openEntry').show();
					$('#vehinfo').hide();
				});
			});
		</script>

		<script>
			$(function() {
				// City change
				$('#qidno').change(function() {

					var qidno = $(this).val();

					// AJAX request
					$.ajax({
						url: '<?= base_url('vehicleopen/GetCustomerName') ?>',
						method: 'post',
						data: {
							qidno: qidno
						},
						success: function(response) {
							var obj = JSON.parse(response);
							if (obj == 1) {
								$('#customername').val("");
								$('#customerid').val("");
								$('#qidno').val("");
								$('#AccBal').val("");

								$('#customername_msg').text("Customer Name Not Found");

								Swal.fire({
									text: 'Customer Name Not Found',
									icon: 'error'
								});

							} else if (obj == 0) {

								$('#customername').val("");
								$('#customerid').val("");
								$('#qidno').val("");
								$('#AccBal').val("");

								Swal.fire({
									text: 'This Customer already booked a vehicle',
									icon: 'error'
								});
							} else {
								$('#customername_msg').text("");

								$('#customername').val("");
								$('#customername').val(obj.customer_name);

								$('#customerid').val("");
								$('#customerid').val(obj.id);

								$('#AccBal').val("");
								$('#AccBal').val(obj.bal_amount);
							}
						}
					});
				});
			});
		</script>

		<script>
			$(function() {
				// City change
				$('#VehicleNo').change(function() {

					var VehicleNo = $(this).val();

					// AJAX request
					$.ajax({
						url: '<?= base_url('vehicleopen/GetVehicleDetails') ?>',
						method: 'post',
						data: {
							VehicleNo: VehicleNo
						},
						success: function(response) {
							var obj = JSON.parse(response);
							if (obj == "") {
								$('#vehiclename').val("");
								$('#modelno').val("");
								$('#odometer').val("");
								$('#rentperday').val("");
								$('#vehicleid').val("");

								$('#vehiclename_msg').text("Vehicle Name Not Found");
								$('#modelno_msg').text("Model No Not Found");
								$('#odometer_msg').text("Odometer Not Found");
								$('#rentperday_msg').text("Rent Per Day Not Found");

								$('#VehicleNo').val("");

								Swal.fire({
									text: 'The Entered Vehicle Number does not exists',
									icon: 'error'
								});

							} else if (obj == 1) {
								$('#vehiclename').val("");
								$('#modelno').val("");
								$('#odometer').val("");
								$('#rentperday').val("");
								$('#vehicleid').val("");

								$('#vehiclename_msg').text("");
								$('#modelno_msg').text("");
								$('#odometer_msg').text("");
								$('#rentperday_msg').text("");

								Swal.fire({
									text: 'VEHICLE IS NOT ACTIVE',
									icon: 'error'
								});

							} else {
								$('#vehiclename_msg').text("");
								$('#modelno_msg').text("");
								$('#odometer_msg').text("");
								$('#rentperday_msg').text("");

								$('#vehiclename').val("");
								$('#vehiclename').val(obj.vehicle_name);
								$('#modelno').val("");
								$('#modelno').val(obj.model_no);
								$('#odometer').val("");
								$('#odometer').val(obj.odometer);
								$('#rentperday').val("");
								$('#rentperday').val(obj.rent_per_day);
								$('#vehicleid').val("");
								$('#vehicleid').val(obj.id);
							}
						}
					});
				});
			});
		</script>

		<script>
			divlightbox();

			function divlightbox() {
				// define the $ as jQuery for multiple uses
				jQuery(function($) {

					var table = $('#vehicledata').DataTable({
						"bProcessing": true,
						"sAjaxSource": "<?php echo base_url(); ?>vehicleopen/vehicle_open_list",
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
								mData: 'open_date'
							},
							{
								mData: 'agreement_no'
							},
							{
								mData: 'customer_name'
							},
							{
								mData: 'vehicle_name'
							},
							{
								mData: 'rentperday'
							},
							{
								mData: 'creditlimit'
							},
							{
								mData: 'vehicle_status'
							},
							{
								mData: 'Action'
							},
						]
					});
				});
			}
		</script>

		<script>
			$(function() {
				$("input").prop('required', true);
			});
		</script>

		<script type="text/javascript">
			function changedata(thisid) {

				$.ajax({
					type: "POST",
					datatype: "json",
					url: "<?php echo site_url('vehicleopen/GetCustomerwithVehicle/'); ?>",
					data: {
						thisid: thisid
					},
					success: function(response) {
						var obj = JSON.parse(response);

						if (obj == 0) {

							Swal.fire({
								text: 'Already Closed',
								icon: 'error'
							});

							$('#customer_id').val("");
							$('#old_vehicleid').val("");

							$('#customer_name').val("");
							$('#current_vehicle').val("");
							$('#vehicle_name').val("");
							$('#model_no').val("");
							$('#odometer_no').val("");
							$('#old_credit').val("");
							$('#agreement_no').val("");
							$('#opendatewithtime').val("");
						} else {

							$('#VehicleOpenButton').hide();
							$('#entrys').show();
							$('#vehinfo').hide();

							$('#customer_id').val("");
							$('#customer_id').val(obj.customer_id);

							$('#qid').val("");
							$('#qid').val(obj.qid_no);

							$('#old_vehicleid').val("");
							$('#old_vehicleid').val(obj.vehicle_id);

							$('#customer_name').val("");
							$('#customer_name').val(obj.customer_name);

							$('#current_vehicle').val("");
							$('#current_vehicle').val(obj.vehicle_name);

							$('#oldrent').val("");
							$('#oldrent').val(obj.per_day_rent);

							$('#vehicle_name').val("");
							$('#vehicle_name').val(obj.vehicle_name);

							$('#model_no').val("");
							$('#model_no').val(obj.model_no);

							$('#odometer_no').val("");
							$('#odometer_no').val(obj.odometer);

							$('#old_credit').val("");
							$('#old_credit').val(obj.credit_limit);

							$('#agreement_no').val("");
							$('#agreement_no').val(obj.agreement_no);

							$('#opendatewithtime').val("");
							$('#opendatewithtime').val(obj.open_date);
						}

					},
					error: function() {
						console.log('Error While Request User Edit List..');
					}

				});
			}
		</script>

		<script type="text/javascript">
			function closedata(thisid) {

				$.ajax({
					type: "POST",
					datatype: "json",
					url: "<?php echo site_url('vehicleopen/GetCustomerwithVehicle/'); ?>",
					data: {
						thisid: thisid
					},
					success: function(response) {
						var obj = JSON.parse(response);

						if (obj == 0) {

							Swal.fire({
								text: 'Already Closed',
								icon: 'error'
							});

							$('#cls_customer_id').val("");
							$('#cls_old_vehicleid').val("");

							$('#cls_customer_name').val("");
							$('#cls_current_vehicle').val("");
							$('#cls_vehicle_name').val("");
							$('#cls_model_no').val("");
							$('#cls_odometer_no').val("");
							$('#cls_old_credit').val("");
							$('#cls_agreement_no').val("");
							$('#cls_opendatewithtime').val("");
						} else {

							$('#VehicleOpenButton').hide();
							$('#closeentry').show();
							$('#vehinfo').hide();

							$('#cls_ustomer_id').val("");
							$('#cls_customer_id').val(obj.customer_id);

							$('#cls_qid').val("");
							$('#cls_qid').val(obj.qid_no);

							$('#cls_old_vehicleid').val("");
							$('#cls_old_vehicleid').val(obj.vehicle_id);

							$('#cls_customer_name').val("");
							$('#cls_customer_name').val(obj.customer_name);

							$('#cls_current_vehicle').val("");
							$('#cls_current_vehicle').val(obj.vehicle_name);

							$('#cls_oldrent').val("");
							$('#cls_oldrent').val(obj.per_day_rent);

							$('#cls_vehicle_name').val("");
							$('#cls_vehicle_name').val(obj.vehicle_name);

							$('#cls_model_no').val("");
							$('#cls_model_no').val(obj.model_no);

							$('#cls_odometer_no').val("");
							$('#cls_odometer_no').val(obj.odometer);

							$('#cls_old_credit').val("");
							$('#cls_old_credit').val(obj.credit_limit);

							$('#cls_agreement_no').val("");
							$('#cls_agreement_no').val(obj.agreement_no);

							$('#cls_opendatewithtime').val("");
							$('#cls_opendatewithtime').val(obj.open_date);
						}

					},
					error: function() {
						console.log('Error While Request User Edit List..');
					}

				});
			}
		</script>

		<script>
			$(function() {
				// City change
				$('#qid').change(function() {

					var qid = $(this).val();

					// AJAX request
					$.ajax({
						url: '<?= base_url('vehiclechange/getopeninfo') ?>',
						method: 'post',
						data: {
							qid: qid
						},
						success: function(response) {
							var obj = JSON.parse(response);
							if ($.isEmptyObject(obj)) {
								$('#customer_id').val("");
								$('#old_vehicleid').val("");

								$('#customer_name').val("");
								$('#current_vehicle').val("");
								$('#vehicle_name').val("");
								$('#model_no').val("");
								$('#odometer_no').val("");
								$('#old_credit').val("");
								$('#agreement_no').val("");
								$('#opendatewithtime').val("");

							} else {


								$('#old_vehicleid').val("");
								$('#old_vehicleid').val(obj.vehicle_id);

								$('#customer_name').val("");
								$('#customer_name').val(obj.customer_name);

								$('#current_vehicle').val("");
								$('#current_vehicle').val(obj.vehicle_name);

								$('#vehicle_name').val("");
								$('#vehicle_name').val(obj.vehicle_name);

								$('#model_no').val("");
								$('#model_no').val(obj.model_no);

								$('#odometer_no').val("");
								$('#odometer_no').val(obj.odometer);

								$('#old_credit').val("");
								$('#old_credit').val(obj.credit_limit);

								$('#agreement_no').val("");
								$('#agreement_no').val(obj.agreement_no);

								$('#opendatewithtime').val("");
								$('#opendatewithtime').val(obj.open_date);


							}

						}
					});
				});
			});
		</script>

		<script>
			$(function() {
				// City change
				$('#new_VehicleNo').change(function() {

					var new_VehicleNo = $(this).val();

					// AJAX request
					$.ajax({
						url: '<?= base_url('VehicleOpen/GetVehicleDetails') ?>',
						method: 'post',
						data: {
							VehicleNo: new_VehicleNo
						},
						success: function(response) {
							var obj = JSON.parse(response);
							if (obj == "") {
								$('#new_vehiclename').val("");
								$('#new_modelno').val("");
								$('#new_odometer').val("");
								$('#new_rentperday').val("");
								$('#new_vehicleid').val("");

								$('#new_vehiclename_msg').text("Vehicle Name Not Found");
								$('#new_modelno_msg').text("Model No Not Found");
								$('#new_odometer_msg').text("Odometer Not Found");
								$('#new_rentperday_msg').text("Rent Per Day Not Found");

								$('#new_VehicleNo').val("");


								Swal.fire({
									text: 'The Entered Vehicle Number does not exists',
									icon: 'error'
								});

								alert("VEHICLE NO NOT FOUND");

								//swal("VEHICLE NO NOT FOUND");
							} else if (obj == 1) {
								$('#new_vehiclename').val("");
								$('#new_modelno').val("");
								$('#new_odometer').val("");
								$('#new_rentperday').val("");
								$('#new_vehicleid').val("");

								$('#new_vehiclename_msg').text("");
								$('#new_modelno_msg').text("");
								$('#new_odometer_msg').text("");
								$('#new_rentperday_msg').text("");



								Swal.fire({
									text: 'VEHICLE NO IS NOT ACTIVE :-)',
									icon: 'error'
								});

							} else {
								$('#new_vehiclename_msg').text("");
								$('#new_modelno_msg').text("");
								$('#new_odometer_msg').text("");
								$('#new_rentperday_msg').text("");

								$('#new_vehiclename').val("");
								$('#new_vehiclename').val(obj.vehicle_name);
								$('#new_modelno').val("");
								$('#new_modelno').val(obj.model_no);
								$('#new_odometer').val("");
								$('#new_odometer').val(obj.odometer);
								$('#new_rentperday').val("");
								$('#new_rentperday').val(obj.rent_per_day);
								$('#new_vehicleid').val("");
								$('#new_vehicleid').val(obj.id);
							}
						}
					});
				});
			});
		</script>

		<script>
			$('#opendate').datetimepicker({
				format: 'hh:mm:ss a'
			});
		</script>

		<script>
			$(document).ready(function() {
				$("#GetAmount").click(function() {
					var opendate = $('#opendatewithtime').val();
					var changedate = $('#changedate').val();
					var oldrent = $('#oldrent').val();
					var oldcredit = $('#old_credit').val();

					$.ajax({
						type: "POST",
						datatype: "json",
						url: "<?php echo base_url('vehicleopen/BalAmount/'); ?>",
						data: {
							opendate: opendate,
							changedate: changedate,
							oldrent: oldrent,
							oldcredit: oldcredit
						},
						success: function(response) {
							var obj = JSON.parse(response);
							if (obj == 0) {
								$('#BalAmt').val("");
							} else {
								$('#BalAmt').val("");
								$('#BalAmt').val(response);

								$('#TotAmt').val("");
								var BalAmt = $('#BalAmt').val();
								var NewCredit = $('#new_creditlimit').val();
								var TotAmt = parseInt(BalAmt, 10) + parseInt(NewCredit, 10);
								$('#TotAmt').val(TotAmt);
							}
						},
						error: function() {
							console.log('Error While Request User Edit List..');
						}

					});
				});
			});
		</script>

		<script>
			$(document).ready(function() {
				$('#new_creditlimit').change(function() {
					$('#TotAmt').val("");
					var BalAmt = $('#BalAmt').val();
					var NewCredit = $('#new_creditlimit').val();
					var TotAmt = parseInt(BalAmt, 10) + parseInt(NewCredit, 10);
					$('#TotAmt').val(TotAmt);
				});
			});
		</script>

		<script>
			$(document).ready(function() {
				$('#creditlimit').change(function() {

					var creditlimit = $(this).val();
					var AccBal = $("#AccBal").val();
					var totBal = parseInt(creditlimit, 10) + parseInt(AccBal, 10);

					$("#totcreditlimit").val(totBal);
					alert(totBal);
				});
			});
		</script>



		<div class="app-content content">
			<div class="content-overlay"></div>
			<div class="content-wrapper">
				<section class="basic-elements">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="float-left">
										<h4 class="card-title">Vehicle Transaction Info</h4>
									</div>
									<div class="float-right"><a class="btn btn-primary float" id="VehicleOpenButton">Vehicle Open</a></div>
								</div>
								<div class="card-content">
									<div class="card-body">
										<form method="post" action="<?= base_url('vehicleopen/savevehicleopen') ?>">
											<div id="openEntry" style="display:none;">
												<div class="row">
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Open Date</label>
															<input type='date' class="form-control" id="opendate" name="opendate">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Agreement Numer</label>
															<input type="text" class="form-control" id="agreementno" name="agreementno" required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">QID No</label><input type="text" id="customerid" name="customerid" hidden>
															<input type="text" class="form-control" id="qidno" name="qidno" required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Customer Name</label>&nbsp &nbsp &nbsp &nbsp<span id="info"><label id="customername_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="customername" required readonly>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Account Balance</label>
															<input type="text" class="form-control" id="AccBal" name="AccBal" readonly value="0">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Rented Vehicle No</label>
															<input type="text" id="vehicleid" name="vehicleid" hidden>
															<input type="text" class="form-control" id="VehicleNo" required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Vehicle Name</label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="vehiclename_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="vehiclename" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Model No</label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="modelno_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="modelno" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Odometer </label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="odometer_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="odometer" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Rent Per Day</label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="rentperday_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="rentperday" name="rentperday" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Credit Limit</label>
															<input type="text" class="form-control" name="creditlimit" id="creditlimit" required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Total Amount</label>
															<input type="text" class="form-control" id="totcreditlimit" name="totcreditlimit" required readonly>
														</fieldset>
													</div>
													<div class="col-xl-8">
														<fieldset class="form-group">
															<button type="submit" name="submit" value="submit" class="btn btn-success">SAVE</button>
															<a href="<?= base_url('vehicleopen'); ?>" class="btn btn-danger">BACK</a>
														</fieldset>
													</div>
												</div>
											</div>
										</form>
										<form method="post" action="<?= base_url('vehicleopen/closevehicle') ?>">
											<div id="closeentry" style="display:none;">
												<div class="row">
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">QID No</label><input type="text" id="cls_customer_id" name="customer_id" hidden>
															<input type="text" class="form-control" id="cls_qid" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Customer Name</label>
															<input type="text" class="form-control" id="cls_customer_name" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Current Vehicle</label><input type="text" id="cls_old_vehicleid" name="old_vehicleid" hidden>
															<input type="text" class="form-control" id="cls_current_vehicle" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Vehicle Name</label>
															<input type="text" class="form-control" id="cls_vehicle_name" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Model No</label>
															<input type="text" class="form-control" id="cls_model_no" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Odometer</label>
															<input type="text" class="form-control" id="cls_odometer_no" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Old Rent Per Day</label>
															<input type="text" class="form-control" id="cls_oldrent" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Open Date</label>
															<input type="text" class="form-control" id="cls_opendatewithtime" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Old Credit Limt</label>
															<input type="text" class="form-control" id="cls_old_credit" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Agreement No</label>
															<input type="text" class="form-control" id="cls_agreement_no" name="agreement_no" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-3">
														<fieldset class="form-group">
															<label for="basicInput">Change Date</label>
															<input type='date' class="form-control" id="cls_changedate" name="changedate">
													</div>
													<div class="col-xl-3">
														<fieldset class="form-group">
															<label for="basicInput">Click To View Balance Amount</label>
															<input type="button" class="btn btn-warning" value="Get Balance Amount" id="GetAmount">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Balance Amount</label>
															<input type="text" class="form-control" id="cls_BalAmt" name="BalAmt" readonly value="0">
														</fieldset>
													</div>
													<div class="col-xl-8">
														<fieldset class="form-group">
															<button type="submit" name="submit" value="submit" class="btn btn-success">SAVE</button>
															<a href="<?= base_url('vehicleopen'); ?>" class="btn btn-danger">BACK</a>
														</fieldset>
													</div>
												</div>
											</div>
										</form>
										<form method="post" action="<?= base_url('VehicleChange/SaveVehicleChange') ?>">
											<div id="entrys" style="display:none;">
												<div class="row">
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">QID No</label><input type="text" id="customer_id" name="customer_id" hidden>
															<input type="text" class="form-control" id="qid" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Customer Name</label>
															<input type="text" class="form-control" id="customer_name" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Current Vehicle</label><input type="text" id="old_vehicleid" name="old_vehicleid" hidden>
															<input type="text" class="form-control" id="current_vehicle" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Vehicle Name</label>
															<input type="text" class="form-control" id="vehicle_name" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Model No</label>
															<input type="text" class="form-control" id="model_no" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Odometer</label>
															<input type="text" class="form-control" id="odometer_no" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Old Rent Per Day</label>
															<input type="text" class="form-control" id="oldrent" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Open Date</label>
															<input type="text" class="form-control" id="opendatewithtime" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Old Credit Limt</label>
															<input type="text" class="form-control" id="old_credit" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Agreement No</label>
															<input type="text" class="form-control" id="agreement_no" name="agreement_no" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-3">
														<fieldset class="form-group">
															<label for="basicInput">Change Date</label>
															<input type='date' class="form-control" id="changedate" name="changedate">
													</div>
													<div class="col-xl-3">
														<fieldset class="form-group">
															<label for="basicInput">Click To View Balance Amount</label>
															<input type="button" class="btn btn-warning" value="Get Balance Amount" id="CLS_GetAmount">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Balance Amount</label>
															<input type="text" class="form-control" id="BalAmt" name="BalAmt" readonly value="0">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Replace Agreement Number</label>
															<input type="text" class="form-control" id="new_agreement_no" name="new_agreement_no">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Rented Vehicle No</label> <input type="text" id="new_vehicleid" name="new_vehicleid" hidden>
															<input type="text" class="form-control" id="new_VehicleNo" required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="basicInput">Vehicle Name</label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="new_vehiclename_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="new_vehiclename" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Model No</label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="new_modelno_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="new_modelno" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Odometer </label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="new_odometer_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="new_odometer" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Rent Per Day</label> &nbsp &nbsp &nbsp &nbsp<span id="info"><label id="new_rentperday_msg" style="color:red;"></label></span>
															<input type="text" class="form-control" id="new_rentperday" name="new_rentperday" readonly required>
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">New Credit Limt</label>
															<input type="text" class="form-control" id="new_creditlimit" name="new_creditlimit" required value="0">
														</fieldset>
													</div>
													<div class="col-xl-6">
														<fieldset class="form-group">
															<label for="helpInputTop">Total Credit Limt</label>
															<input type="text" class="form-control" id="TotAmt" required value="0" name="creditlimit" readonly>
														</fieldset>
													</div>
													<div class="col-xl-8">
														<fieldset class="form-group">
															<button type="submit" name="submit" value="submit" class="btn btn-success">SAVE</button>
															<a href="<?= base_url('vehicleopen'); ?>" class="btn btn-danger">BACK</a>
														</fieldset>
													</div>
												</div>
											</div>
										</form>
										<div id="vehinfo">
											<div class="row">
												<div class="col-xl-12">
													<div class="card" id="VehicleInfo">
														<table id="vehicledata" class="table table-striped table-bordered display responsive nowrap" style="width: 100%;">
															<thead class="border-bottom border-dark">
																<tr>
																	<th>S No</th>
																	<th>Date</th>
																	<th>Agreement No</th>
																	<th>Name</th>
																	<th>Vehicle Name</th>
																	<th>Rent</th>
																	<th>Credit Limit</th>
																	<th>Status</th>
																	<th>Action</th>
																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		</div>
		</div>
		</body>