@extends('homepage.master')

@section('content')

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">	
			<!-- post -->
			<div class="col-md-6">
				<div class="post post-thumb">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-1.jpg') }}" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-2" href="category.html">JavaScript</a>
							<span class="post-date">March 27, 2018</span>
						</div>
						<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
					</div>
				</div>
			</div>
			<!-- /post -->

			<!-- post -->
			<div class="col-md-6">
				<div class="post post-thumb">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-2.jpg') }}" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-3" href="category.html">Jquery</a>
							<span class="post-date">March 27, 2018</span>
						</div>
						<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
					</div>
				</div>
			</div>
			<!-- /post -->
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Bài viết gần đây</h2>
				</div>
			</div>
			<?php $i = 0; ?>
			@foreach ($recent_post as $item)
			<?php $i++; ?>
				<div class="col-md-4">
					<div class="post">
						<a class="post-img" href="{{ route('blogPost', $item->slug) }}"><img class="post-item-img" src="{{ asset('uploads/posts') . '/' . $item->image }}" alt="{{ $item->title }}"></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-1" href="category.html">{{ substr($item->name,0,20) }}</a>
								<span class="post-date">{{ $item->created_at }}</span>
							</div>
							<h3 class="post-title"><a href="">{{ $item->title }}</a></h3>
						</div>
					</div>
				</div>
				@if ($i%3 == 0)
				<div class="clearfix visible-md visible-lg"></div>
				@endif
			@endforeach
			
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!-- post -->
					<div class="col-md-12">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-2.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-1.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-4" href="category.html">Css</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-2.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<div class="clearfix visible-md visible-lg"></div>

					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-4.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-5.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<div class="clearfix visible-md visible-lg"></div>

					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-3.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-4.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>

			<div class="col-md-4">
				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Đọc nhiều nhất</h2>
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
						<h2>Gợi ý</h2>
					</div>
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-2.jpg') }}" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="category.html">Jquery</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
						</div>
					</div>

					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-1.jpg') }}" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-2" href="category.html">JavaScript</a>
								<span class="post-date">March 27, 2018</span>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
						</div>
					</div>
				</div>
				<!-- /post widget -->
				
				<!-- ad -->
				<div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="{{ asset('homepages/img/ad-1.jpg') }}" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2>Bài viết nổi bật</h2>
				</div>
			</div>

			<!-- post -->
			<div class="col-md-4">
				<div class="post">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-4.jpg') }}" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-2" href="category.html">JavaScript</a>
							<span class="post-date">March 27, 2018</span>
						</div>
						<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
					</div>
				</div>
			</div>
			<!-- /post -->

			<!-- post -->
			<div class="col-md-4">
				<div class="post">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-5.jpg') }}" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-3" href="category.html">Jquery</a>
							<span class="post-date">March 27, 2018</span>
						</div>
						<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
					</div>
				</div>
			</div>
			<!-- /post -->

			<!-- post -->
			<div class="col-md-4">
				<div class="post">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-3.jpg') }}" alt=""></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-1" href="category.html">Web Design</a>
							<span class="post-date">March 27, 2018</span>
						</div>
						<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
					</div>
				</div>
			</div>
			<!-- /post -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Các bài viết khác</h2>
						</div>
					</div>
					<!-- post -->
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-4.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-6.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-1.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-4" href="category.html">Css</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">CSS Float: A Tutorial</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
							</div>
						</div>
					</div>
					<!-- /post -->
					
					<!-- post -->
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="blog-post.html"><img src="{{ asset('homepages/img/post-2.jpg') }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
							</div>
						</div>
					</div>
					<!-- /post -->
					
					<div class="col-md-12">
						<div class="section-row">
							<button class="primary-button center-block">Load More</button>
						</div>
					</div>
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
				
				<!-- catagories -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Thể loại</h2>
					</div>
					<div class="category-widget">
						<ul>
							@foreach ($cate as $item)
								<li><a href="#" class="cat-{{ $item->category_id }}">{{ $item->name }}<span>{{ $item->total }}</span></a></li>
							@endforeach
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
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->


@endsection()