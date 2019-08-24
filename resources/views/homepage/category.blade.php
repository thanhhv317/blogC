@extends('homepage.master')

@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				@if (count($posts) > 0)
				<ul class="page-header-breadcrumb">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li>{{ $posts[0]->category }}</li>
				</ul>
				<h1 class="category" id="{{ $posts[0]->category_id }}">{{ $posts[0]->category }}</h1>
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
			<div class="col-md-8">
				<div class="row">
					
					<!-- post -->
					@if (count($posts) > 0)
					<div class="col-md-12">
						<div class="post post-thumb">
							<a class="post-img" href="{{ route('blogPost', $posts[0]->slug) }}"><img class="top2-post" src="{{ asset('uploads/posts').'/'.$posts[0]->image }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-{{ rand(1,3) }}" href="#">{{ $posts[0]->name }}</a>
									<span class="post-date">{{ $posts[0]->created_at }}</span>
								</div>
								<h3 class="post-title"><a href="{{ route('blogPost', $posts[0]->slug) }}">{{ $posts[0]->title }}</a></h3>
							</div>
						</div>
					</div>
					@endif
					<!-- /post -->
								
					@if (count($posts) >= 3)
					<!-- post -->
					@for ($i = 1; $i < 3; ++$i)
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="{{ route('blogPost', $posts[$i]->slug) }}"><img src="{{ asset('uploads/posts').'/'.$posts[$i]->image }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-{{ rand(1,5) }}" href="#">{{ $posts[$i]->name }}</a>
									<span class="post-date">{{ $posts[$i]->created_at }}</span>
								</div>
								<h3 class="post-title"><a href="{{ route('blogPost', $posts[$i]->slug) }}">{{ $posts[$i]->title }}</a></h3>
							</div>
						</div>
					</div>
					@endfor
					@endif
					<!-- /post -->

					<div class="clearfix visible-md visible-lg"></div>
					
					<!-- ad -->
					<div class="col-md-12">
						<div class="section-row">
							<a href="#">
								<img class="img-responsive center-block" src="{{ asset('homepages/img/ad-2.jpg') }}" alt="">
							</a>
						</div>
					</div>
					<!-- ad -->
				
					<!-- post -->
					@if (count($posts) > 3)
					<?php $size = count($posts); ?>
					@for ($i = 3; $i < $size; ++$i)
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="{{ route('blogPost', $posts[$i]->slug) }}"><img class="orther-post-img" src="{{ asset('uploads/posts').'/'.$posts[$i]->image }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-{{ rand(1,5) }}" href="">{{ $posts[$i]->name }}</a>
									<span class="post-date">{{ $posts[$i]->created_at }}</span>
								</div>
								<h3 class="post-title"><a href="{{ route('blogPost', $posts[$i]->slug) }}">{{ $posts[$i]->title }}</a></h3>
								<p><div class="format-text">{!! substr($posts[$i]->content, 0, 150) !!}...</div></p>
							</div>
						</div>
					</div>
					@endfor
					@else
					@foreach ($posts as $item)
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="{{ route('blogPost', $item->slug) }}"><img class="orther-post-img" src="{{ asset('uploads/posts').'/'.$item->image }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-{{ rand(1,5) }}" href="">{{ $item->name }}</a>
									<span class="post-date">{{ $item->created_at }}</span>
								</div>
								<h3 class="post-title"><a href="{{ route('blogPost', $item->slug) }}">{{ $item->title }}</a></h3>
								<p><div class="format-text">{!! substr($item->content, 0, 150) !!}...</div></p>
							</div>
						</div>
					</div>
					@endforeach
					@endif
					<div class="append-data">
					</div>
					
					@if (count($posts) > 6)
					<div class="col-md-12">
						<form>
							@csrf
						<div class="section-row">
							<button type="button" id="loadMore" class="primary-button center-block">Xem thêm</button>
						</div>
						</form>
					</div>
					@endif
				</div>
			</div>
			
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
				
				<!-- catagories -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Thể loại</h2>
					</div>
					<div class="category-widget">
						<ul>
							@foreach ($cate as $item)
								<li><a href="{{ route('category', $item->slug) }}" class="cat-{{ $item->category_id }}">{{ $item->name }}<span>{{ $item->total }}</span></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<!-- /catagories -->
				
				<!-- tags -->
				<!-- <div class="aside-widget">
					<div class="tags-widget">
						<ul>
							<li><a href="#">Chrome</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">Tutorial</a></li>
							<li><a href="#">Backend</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">Design</a></li>
							<li><a href="#">Development</a></li>
							<li><a href="#">JavaScript</a></li>
							<li><a href="#">Website</a></li>
						</ul>
					</div>
				</div> -->
				<!-- /tags -->
				
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

@endsection()