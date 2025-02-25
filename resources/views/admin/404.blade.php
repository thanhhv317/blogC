@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    404 Error Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.post') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">404 error</li>
  </ol>
</section>

<section class="content">
  <div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href="{{ route('admin.post') }}">return to dashboard</a> or try using <a href="https://www.facebook.com/thanhfuzu18" target="_blank">contact the administrator</a>
      </p>
    </div>
  </div>
</section>

@endsection()