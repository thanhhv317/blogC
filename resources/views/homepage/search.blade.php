@extends('homepage.master')

@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>Search</li>
				</ul>
				@if (isset($name))
				<h1>kết quả tìm kiếm của: {{ $name }}</h1>
				@else
				<h1>Gợi ý cho bạn: </h1>
				@endif
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
			@foreach ($post as $item)
			<div class="col-md-5 col-md-offset-1">
				<div class="post post-thumb">
					<a class="post-img" href="{{ route('blogPost', $item->slug) }}"><img class="top2-post" src="{{ asset('uploads/posts').'/'.$item->image }}" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-{{ rand(1,3) }}" href="#">{{ $item->name }}</a>
							<span class="post-date">{{ $item->created_at }}</span>
						</div>
						<h3 class="post-title"><a href="{{ route('blogPost', $item->slug) }}">{{ $item->title }}</a></h3>
					</div>
				</div>
			</div>
			@endforeach

			@if (count($post) < 1)
				<p>Không có kết quả nào phù hợp <a href="{{ url('/') }}">quay lại trang chủ</a></p>
			@endif

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->


@endsection()