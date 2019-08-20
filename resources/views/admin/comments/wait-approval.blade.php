@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    {{ $title }}
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Comments</li>
  </ol>
</section>

<section class="content-header">
  <div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
          <a class="btn btn-success" href="{{ route('admin.comment') }}"><i class="fa fa-gears"></i> Comment wait for approval</a>
          <a class="btn btn-primary" href="{{ route('admin.comment.availability') }}"><i class="fa fa-check"></i> Availability</a>
          <a class="btn btn-danger" href="{{ route('admin.comment.spam') }}"><i class="fa fa-trash"></i> Spam</a>
        </div>
      </div>
  </div>
</section>

<section class="content">
  	<div class="row">
 		<div class="col-md-12" >
      		<div class="box box-primary">
      			<div class="table-responsive">
  				<form >
				@csrf
      			<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Message</th>
				      <th scope="col">Website</th>
				      <th scope="col">Status</th>
				      <th scope="col">View Post</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($comments as $item)
				    <tr id="row-{{ $item->id }}">
				      <th scope="row">{{ $item->id }}</th>
				      <td>{{ $item->user_name }}</td>
				      <td>{{ $item->user_mail }}</td>
				      <td>{{ $item->content }}</td>
				      <td>{{ $item->website }}</td>
				      <td>
				      	<div class="row select-status" id="comment-{{ $item->id }}">
							<select name="status">
						        <option value="0" {{ ($item->status == 0) ? "selected" : "" }}>Waiting</option>
						        <option value="1" {{ ($item->status == 1) ? "selected" : "" }}>Availability</option>
						        <option value="2" {{ ($item->status == 2) ? "selected" : "" }}>Spam</option>
					      	</select>
					      	<button type="button" class="btn btn-success ml-1" onclick="editStatus( {{ $item->id, $item->post_id }})">OK</button>
						</div>
				      </td>
				      <td><a class="btn btn-dark" href="{{ route('blogPost', $item->slug) }}" target="_blank"><i class="fa fa-truck"></i> Go</a></td>
				    </tr>
				   	@endforeach
				  </tbody>
				</table>
				</form>
				</div>
      		</div>
  	</div>
</section>

@endsection()