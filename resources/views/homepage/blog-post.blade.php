@extends('homepage.master')

@section('header')
<div id="post-header" class="page-header">
	<div class="background-img" style="background-image: url('{{ asset('uploads/posts').'/'.$post->image }}"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-meta">
					<a class="post-category cat-2">{{ $post->category }}</a>
					<span class="post-date">{{ $post->created_at }}</span>
				</div>
				<h1>{{ $post->title }}</h1>
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
			<!-- Post content -->
			<div class="col-md-8">
				<div class="section-row sticky-container">
					<div class="main-post">
						{!! $post->content !!}
					</div>
					<div class="post-shares sticky-shares">
						<a href="#/" class="share-facebook"><i class="fa fa-facebook"></i></a>
						<a href="#/" class="share-twitter"><i class="fa fa-twitter"></i></a>
						<a href="#/" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
						<a href="#/" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
						<a href="#/" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
						<a href="#/"><i class="fa fa-envelope"></i></a>
					</div>
				</div>

				<!-- ad -->
				<div class="section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="{{ asset('homepages/img/ad-2.jpg') }}" alt="">
					</a>
				</div>
				<!-- ad -->
				
				<!-- author -->
				<div class="section-row">
					<div class="post-author">
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="{{ asset('uploads/users').'/'.$post->author_img }}" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h3>{{ $post->name }}</h3>
								</div>
								<p>{{ $post->information }}</p>
								<ul class="author-social">
									<li><a href="{{ $post->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a><i class="fa fa-twitter"></i></a></li>
									<li><a><i class="fa fa-google-plus"></i></a></li>
									<li><a><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /author -->

				<!-- comments -->
				<div class="section-row">
					<div class="section-title">
						<h2>{{ isset($comment) ? count($comment) : 0 }} Comments</h2>
						<div class="fb-share-button" data-href="#" data-layout="button_count" data-size="large"><a target="_blank" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
					</div>

					<div class="post-comments">
						<!-- comment -->
						@foreach ($comment as $item)
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="{{ asset('homepages/img/avatar.png') }}" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4>{{ $item->user_name }}</h4>
									<span class="time">{{ $item->created_at }}</span>
								</div>
								<p>{{ $item->content }}</p>
							</div>
						</div>
						@endforeach
						<!-- /comment -->
					</div>
				</div>
				<!-- /comments -->

				<!-- reply -->
				<div class="section-row">
					<div class="section-title">
						<h2>Bình luận:</h2>
						<p>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</p>
					</div>
					<form class="post-reply" id="form">
						@csrf
						<input type="text" hidden="" name="post_id" value="{{ $post->id }}">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<span>Name *</span>
									<input class="input" type="text" name="name" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Email *</span>
									<input class="input" type="email" name="email" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Website</span>
									<input class="input" type="text" name="website">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="input" name="message" placeholder="Message"></textarea>
								</div>
								<button type="button" id="send-comment" class="primary-button">Gửi</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /reply -->
			</div>
			<!-- /Post content -->

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
			<!-- /aside -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection()