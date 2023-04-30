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


<!-- BEGIN: Content-->
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row"></div>
	</div>
	<div class="content-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-content">
						<div class="card-body">
							<table id="vehicledata" class="table table-striped table-bordered display responsive" style="width: 100%;">
								<thead class="border-bottom border-dark">
									<tr>
										<th><span class="align-middle">S No</span></th>
										<th>Vehicle Name</th>
										<th>Model No</th>
										<th>Rent Per Day</th>
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





<script>
	divlightbox();

	function divlightbox() {
		// define the $ as jQuery for multiple uses
		jQuery(function($) {

			var table = $('#vehicledata').DataTable({
				"bProcessing": true,
				"sAjaxSource": "<?php echo base_url(); ?>vehiclechange/rentDetails",
				"bPaginate": true,
				"sPaginationType": "full_numbers",
				"responsive": true,
				"bDestroy": true,
				"iDisplayLength": 10,
				"aoColumns": [{
						mData: 'S No'
					},
					{
						mData: 'vehicle_name'
					},
					{
						mData: 'model_no'
					},
					{
						mData: 'rent_per_day'
					},
				]
			});
		});
	}
</script>

<script>
	$('document').ready(function() {
		$('#vehicle').click(function() {
			$('#vehicle').hide();
			$('#entry').show();
			$('#vehinfo').hide();
		});
	});
</script>

<script type="text/javascript">
	$(function() {
		$('#datetimepicker1').datetimepicker();
	});
</script>


<!-- END: Content-->



<!-- BEGIN: Vendor JS-->
<script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url('app-assets/vendors/js/charts/apexcharts/apexcharts.min.js') ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url('app-assets/js/core/app-menu.min.js') ?>"></script>
<script src="<?= base_url('app-assets/js/core/app.min.js') ?>"></script>
<script src="<?= base_url('app-assets/js/scripts/customizer.min.js') ?>"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?= base_url('app-assets/js/scripts/cards/card-statistics.min.js') ?>"></script>
<!-- END: Page JS-->

</body>
