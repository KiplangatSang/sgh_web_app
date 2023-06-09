<!DOCTYPE html>
<html>

<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/main.css') }}">
				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<title>SG-H</title>
</head>

<body>
				<main>
								@yield('content')
				</main>
				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets2/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>
				<script type="text/javascript">
								// Login Page Flipbox control
								$('.login-content [data-toggle="flip"]').click(function() {
												$('.login-box').toggleClass('flipped');
												return false;
								});
				</script>
</body>

</html>
