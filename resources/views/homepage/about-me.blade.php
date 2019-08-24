@extends('homepage.master')

@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>About me</li>
				</ul>
				<h1>About me</h1>
			</div>
		</div>
	</div>
</div>
@endsection()

@section('content')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row section-row">
					<div class="col-md-6">
						<figure class="figure-img">
							<img class="img-responsive" src="{{ asset('homepages/img/contact.jpg') }}" alt="">
						</figure>
					</div>
					<div class="col-md-6">
						<h3>Hoang Van Thanh</h3>
						<p>is an information technology enthusiast, always exploring, researching and sharing what you know for everyone. Looking forward to creating a forum to discuss specialized knowledge for the work of all ITer.</p>
						<ul class="list-style">
							<li><p>2016-2020: Ho Chi Minh University Education</p></li>
							<li><p>Email: thanhhoang317@gmail.com</p></li>
							<li><p>Web developer.</p></li>
							<li><p>Skill: </p></li>
							<ul class="list-style">
								<li><p>HTML, CSS, Javascript, Bootstrap, Jquery,..</p></li>
								<li><p>PHP(OOP, MVC, Framework: Laravel)</p></li>
								<li><p>GIT</p></li>
							</ul>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- aside -->
			<div class="col-md-4">
				<!-- ad -->
				<div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="{{ asset('homepages/img/ad-1.jpg') }}" alt="">
					</a>
				</div>
				<!-- /ad -->

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Đọc nhiều nhất</h2>
					</div>

					@foreach ($most_read as $item)
					<div class="post post-widget">
						<a class="post-img" href="{{ route('blogPost', $item->slug) }}"><img src="{{ asset('uploads/posts').'/'. $item->image }}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="{{ route('blogPost', $item->slug) }}">{{ $item->title }}</a></h3>
						</div>
					</div>
					@endforeach

				</div>
				<!-- /post widget -->
			</div>
			<!-- /aside -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection()