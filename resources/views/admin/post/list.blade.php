@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Post List
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">post</li>
  </ol>
</section>

<section class="content-header">
  <div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
          <a class="btn btn-success" href="{{ route('admin.post.getNew') }}">Add new</a>
        </div>
      </div>
  </div>
</section>

 <section class="content">
  <div class="row">
    @foreach($posts as $value)
    <div class="col-md-6" id="post-{{ $value->post_id }}">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $value->title }}</h3>
        </div>
        
        <form role="form">
          @csrf
          <div class="box-body">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="{{ asset('uploads/posts').'/'.$value->image }}" class="card-img" alt="{{ $value->title }}">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text">{!! substr($value->content, 0, 300) !!}...</p>
                    <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans() }}</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-footer">
            <a href="{{ route('admin.post.getEdit', $value->post_id) }}" class="btn btn-primary">Edit</a>
            <button id="{{ $value->post_id }}" type="button" class="btn btn-danger deletePost">Delete</button>
          </div>
        </form>
      </div>
    </div>
    @endforeach

    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Quick Example</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form">
          <div class="box-body">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="https://via.placeholder.com/150x150" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      </div><!-- /.box -->
    </div>

  </div>   <!-- /.row -->
</section><!-- /.content -->

@endsection()