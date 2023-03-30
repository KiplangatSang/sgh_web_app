<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}




<head>

				<title>SG-Hekima</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/admin.css') }}">

				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
</head>

<body class="app sidebar-mini">
				<!-- Navbar-->
				@include('admin.layouts.inc.header')
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
				@include('admin.layouts.inc.sidebar')
				<!-- main  content-->
				<main class="app-content">
								@include('inc.messages')
								@yield('content')
				</main>
				<script type="text/javascript">
								function submitform() {
												var btn = document.getElementById("sales_date_btn");
												if (btn.innerText === "Red") {
																btn.innerText = "Blue";
												} else {
																btn.innerText = "Red";
												}
												document.getElementById("sales_date_form").action = "/sales-by-date/1";
												document.getElementById("sales_date_form").submit();

								}

								function submitretailform(id) {

												document.getElementById("retailform").action = "/sales/sales-by-retail/" + id;
												document.getElementById("retailform").submit();

								}
				</script>


				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets2/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>
				<!-- Page specific javascripts-->
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/chart.js') }}"></script>
				<script type="text/javascript">
								var data = {
												labels: @json($data['usersData']['months']),
												datasets: [{
																				label: "My First dataset",
																				fillColor: "rgba(220,220,220,0.2)",
																				strokeColor: "rgba(220,220,220,1)",
																				pointColor: "rgba(220,220,220,1)",
																				pointStrokeColor: "#fff",
																				pointHighlightFill: "#fff",
																				pointHighlightStroke: "rgba(220,220,220,1)",
																				data: @json($data['usersData']['users'])


																},
																{
																				label: "My Second dataset",
																				fillColor: "rgba(151,187,205,0.2)",
																				strokeColor: "rgba(151,187,205,1)",
																				pointColor: "rgba(151,187,205,1)",
																				pointStrokeColor: "#fff",
																				pointHighlightFill: "#fff",
																				pointHighlightStroke: "rgba(151,187,205,1)",
																				data: @json($data['usersData']['months'])
																}
												]
								};



								var ctxl = $("#usersLineChart").get(0).getContext("2d");
								var lineChart = new Chart(ctxl).Line(data);


								var usersPdata = @json($data['userspdata']);

								var data = [{
																value: 40,
																color: "#ff0000",
																highlight: "#5AD3D1",
																label: "Complete"
												},
												{
																value: 60,
																color: "#7a97cc",
																highlight: "#000000",
																label: "In-Progress"
												}
								]

								var creditPdata = [{
																value: 40,
																color: "#ff0000",
																highlight: "#5AD3D1",
																label: "Complete"
												},
												{
																value: 60,
																color: "#7a97cc",
																highlight: "#000000",
																label: "In-Progress"
												}
								]



								var ctxp = $("#usersPieChart").get(0).getContext("2d");
								var pieChart = new Chart(ctxp).Pie(usersPdata);


								// var ctxp = $("#revenuePieChart").get(0).getContext("2d");
								// var pieChart = new Chart(ctxp).Pie(revenuePdata);
				</script>




				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>


				<script type="text/javascript">
								$('#sl').on('click', function() {
												$('#tl').loadingBtn();
												$('#tb').loadingBtn({
																text: "Signing In"
												});
								});

								$('#el').on('click', function() {
												$('#tl').loadingBtnComplete();
												$('#tb').loadingBtnComplete({
																html: "Sign In"
												});
								});


								$('#multipleSelectForm').select2();
				</script>

				{{-- date picker --}}
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/jquery.dataTables.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dataTables.bootstrap.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript">
								$('#sl').on('click', function() {
												$('#tl').loadingBtn();
												$('#tb').loadingBtn({
																text: "Signing In"
												});
								});

								$('#el').on('click', function() {
												$('#tl').loadingBtnComplete();
												$('#tb').loadingBtnComplete({
																html: "Sign In"
												});
								});

								$('#startDate').datepicker({
												format: "yyyy-mm-dd",
												autoclose: true,
												todayHighlight: true
								});
								$('#endDate').datepicker({
												format: "yyyy-mm-dd",
												autoclose: true,
												todayHighlight: true
								});

								$('#demoSelect').select2();
				</script>
				<script type="text/javascript">
								$('#sampleTable').DataTable();
				</script>


</body>

</html>
