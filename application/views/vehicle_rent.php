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

		<!-- BEGIN: Content-->


		<div class="app-content content">
			<div class="row">
				<div class="col-xl-6">
					<div id="loginStatus">
						<code style="font-size: 18px;">
							<?= $this->session->flashdata('message'); ?>
						</code>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6"></div>
				<div class="col-xl-6">
					<div style="display: none;" id="AddRent">
						<form method="POST" action="<?= base_url('vehiclerent/savevehiclerent'); ?>">
							<div class="col-xl-6">
								<label for="helpInputTop">Model Number</label>
								<input type="text" class="form-control" id="vehname" name="vehname" readonly>
								<input type="text" class="form-control" id="vehid" name="vehid" hidden>
							</div>
							<div class="col-xl-6">
								<fieldset class="form-group">
									<label for="helpInputTop">Model Number</label>
									<input type="text" class="form-control" id="modelno" name="modelno" readonly>
								</fieldset>
							</div>
							<div class="col-xl-6">
								<fieldset class="form-group">
									<label for="helpInputTop">Odometer</label>
									<input type="text" class="form-control" id="odometer" name="odometer" readonly>
								</fieldset>
							</div>
							<div class="col-xl-6">
								<fieldset class="form-group">
									<label for="helpInputTop">Rent Per Day</label>
									<input type="text" class="form-control" id="rentperday" name="rentperday">
								</fieldset>
							</div>
							<div class="col-xl-6">
								<fieldset>
									<button type="submit" name="submit" value="submit" class="btn btn-success">SAVE</button>
									<a href="<?= base_url('vehiclerent'); ?>" class="btn btn-danger">CLOSE</a>
								</fieldset>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xl-6"></div>
			</div>



			<div class="content-wrapper">
				<div class="content-header row">					
					<div class="col-xl-12" id="VehInfo">
						<table id="vehicledata" class="table table-striped table-bordered display responsive nowrap" style="width: 100%;">
							<thead class="border-bottom border-dark">
								<tr>
									<th>S No</th>
									<th>Vehicle Name</th>
									<th>Vehicle Model</th>
									<th>Odometer</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="vehicle_info">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>



		<!-- Load Data From Beginning -->
		<script>
			divlightbox();

			function divlightbox() {
				// define the $ as jQuery for multiple uses
				jQuery(function($) {


					$("#vehicledata").DataTable({
						ajax: ({
							url: "https://vts.trackingwings.com/api/qatar_all_vehicles?_=1682602028060",
							type: 'GET',
							dataType: 'jsonp',
							cors: true,
							contentType: 'application/json',
							secure: true,
							headers: {
								'Access-Control-Allow-Origin': '*',
							},
							success: function(data) {

								$("#vehicle_info").html("<tr><td>" + data[0].vehicleid + "</td><td>" + data[0].vehiclename + "</td><td>" + data[0].vehiclename + "</td><td>" + data[0].odometer + "</td><td><a href= 'javascript:editdata(" + data[0].vehicleid + ")' class='edit' onclick='deleteThis(event)'  data-id=" + data[0].vehicleid + " vehname = " + data[0].vehiclename + " odo = " + data[0].odometer + " >Add Rent</a></td></tr>");
							}
						})
					});
				});
			}
		</script>

		<script>
			function deleteThis(e) {
				$('#AddRent').show();
				$('#VehInfo').hide();

				var id = e.target.getAttribute('data-id');
				var veh = e.target.getAttribute('data-id');

				var id = e.target.getAttribute('data-id');
				var name = e.target.getAttribute('vehname');
				var mno = e.target.getAttribute('vehname');
				var odom = e.target.getAttribute('odometer');

				$("#vehname").val(name);
				$("#vehid").val(id);
				$("#modelno").val(mno);
				$("#odometer").val(odom);
			}
		</script>

		<script>
			$(document).ready(function() {
				setTimeout(function() {
					$('#AddRent').hide();
					$('#loginStatus').fadeToggle(3000);
				});
			});
		</script>


		</body>
