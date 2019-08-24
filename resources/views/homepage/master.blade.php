<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('homepages/css/bootstrap.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
		<link rel="stylesheet" href="{{ asset('homepages/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('homepages/css/style.css') }}"/>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/page.css') }}">

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="{{ url('/') }}" class="logo"><img src="{{ asset('homepages/img/logo.png') }}" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="{{ route('category','chuyen-coding') }}">Chuyện Coding</a></li>
							<li><a href="{{ route('category','chuyen-nghe-nghiep') }}">Chuyện nghề nghiệp </a></li>
							<li><a href="{{ route('category', 'chuyen-linh-tinh') }}">Chuyện linh tinh</a></li>
							<li><a href="{{ route('aboutMe') }}">About me</a></li>
						</ul>
						<!-- /nav -->

						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<div class="search-form">
								<form class="search-input" action="{{ route('search') }}" method="get">
									<input class="search-input" type="text" name="title" placeholder="Enter Your Search ...">
									<button class="btn btn-info btn-lg btn-block" >Search</button>
								</form>
								<button class="search-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="{{ route('homepage') }}">Trang chủ</a></li>
							<li><a href="{{ route('category','chuyen-coding') }}">Chuyện Coding</a></li>
							<li><a href="{{ route('category','chuyen-nghe-nghiep') }}">Chuyện nghề nghiệp </a></li>
							<li><a href="{{ route('category', 'chuyen-linh-tinh') }}">Chuyện linh tinh</a></li>
							<li><a href="{{ route('aboutMe') }}">About me</a></li>
						</ul>
					</div>
					<!-- /nav -->

					<!-- social links -->
					<div class="section-row">
						<h3>Follow me</h3>
						<ul class="nav-aside-social">
							<li><a href="https://www.facebook.com/thanhfuzu18"><i class="fa fa-facebook"></i></a></li>
							<div class="fb-share-button" data-href="#" data-layout="button_count" data-size="small"><a target="_blank" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->

			@yield('header')

		</header>
		<!-- /Header -->

		@yield('content')

		<div id="top" title="Back to top">
			<i class="fas fa-angle-up icon-back-to-top"></i>
		</div>
		
		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="index.html" class="logo"><img src="{{ asset('homepages/img/logo.png') }}" alt=""></a>
							</div>
							<ul class="footer-nav">
								
							</ul>
							<div class="footer-copyright">
								<span>&copy; Copyright &copy 2019 | No-Blog 
									<i class="fa fa-heart-o" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">About me</h3>
									<ul class="footer-links">
										<li><a href="{{ route('aboutMe') }}">About me</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Catagories</h3>
									<ul class="footer-links">
										<li><a href="{{ route('category', 'chuyen-coding') }}">Chuyện Coding </a></li>
										<li><a href="{{ route('category', 'chuyen-nghe-nghiep') }}">Chuyện Nghề nghiệp </a></li>
										<li><a href="{{ route('category', 'chuyen-linh-tinh') }}">Chuyện Linh tinh </a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=1258908524276060&autoLogAppEvents=1"></script>
		<!-- jQuery Plugins -->
		<script src="{{ asset('homepages/js/jquery.min.js') }}"></script>
		<script src="{{ asset('homepages/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('homepages/js/main.js') }}"></script>
		<script src="{{ asset('js/home.js') }}"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>

	</body>
</html>
