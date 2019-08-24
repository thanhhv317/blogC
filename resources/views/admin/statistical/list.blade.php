@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
   {{ $title }}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.post') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">statistical</li>
  </ol>
</section>

<section class="content-header">
  <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Posts</h3>
        </div>
          <div class="box-body">
            Nothing
          </div>

          <div class="box-footer">
            hmm!
          </div>
      </div>
    </div>
</section>

@endsection()