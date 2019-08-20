@extends('homepage.master')

@section('header')
<div id="post-header" class="page-header">
	<div class="background-img" style="background-image: url('{{ asset('uploads/posts').'/'.$post->image }}"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-meta">
					<a class="post-category cat-2" href="category.html">{{ $post->category }}</a>
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
						<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
						<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-envelope"></i></a>
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
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /author -->

				<!-- comments -->
				<div class="section-row">
					<div class="section-title">
						<h2>3 Comments</h2>
					</div>

					<div class="post-comments">
						<!-- comment -->
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="{{ asset('homepages/img/avatar.png') }}" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4>John Doe</h4>
									<span class="time">March 27, 2018 at 8:00 am</span>
									<a href="#" class="reply">Reply</a>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="{{ asset('homepages/img/avatar.png') }}" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comment -->

						<!-- comment -->
						<div class="media">
							<div class="media-left">
								<img class="media-object" src="{{ asset('homepages/img/avatar.png') }}" alt="">
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h4>John Doe</h4>
									<span class="time">March 27, 2018 at 8:00 am</span>
									<a href="#" class="reply">Reply</a>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
						</div>
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
						<h2>Most Read</h2>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/widget-1.jpg') }}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/widget-2.jpg') }}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/widget-3.jpg') }}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
						</div>
					</div>

					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/widget-4.jpg') }}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
						</div>
					</div>
				</div>
				<!-- /post widget -->

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Featured Posts</h2>
					</div>
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-2.jpg') }}" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="#">Jquery</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
						</div>
					</div>

					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-1.jpg') }}" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="#">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
						</div>
					</div>
				</div>
				<!-- /post widget -->
				
				<!-- catagories -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Catagories</h2>
					</div>
					<div class="category-widget">
						<ul>
							<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
							<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
							<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
							<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
						</ul>
					</div>
				</div>
				<!-- /catagories -->
				
				<!-- tags -->
				<div class="aside-widget">
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
				</div>
				<!-- /tags -->
				
				<!-- archive -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Archive</h2>
					</div>
					<div class="archive-widget">
						<ul>
							<li><a href="#">January 2018</a></li>
							<li><a href="#">Febuary 2018</a></li>
							<li><a href="#">March 2018</a></li>
						</ul>
					</div>
				</div>
				<!-- /archive -->
			</div>
			<!-- /aside -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection()