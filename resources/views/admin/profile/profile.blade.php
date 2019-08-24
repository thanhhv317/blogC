@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    My account
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">profile</li>
  </ol>
</section>

@include('admin.blocks.error')

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">My profile</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="#" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <div class="text-center">
                    <img src="{{ (isset($profile->image)) ? asset('uploads/users').'/'.$profile->image : 'https://via.placeholder.com/300'}} " class="rounded profile-img" alt="..." id="blah">
                    <input class="form-control" type="file" name="fImage" id="imgInp" {{ (isset($profile->image)) ? '' : 'required=""' }}>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" placeholder="Enter name" required="" name="name" value="{{ (isset($profile->name)) ? $profile->name : ''}}">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Enter Address" required="" name="address" value="{{ (isset($profile->address)) ? $profile->address : ''}}">
                    </div>
                    <div class="form-group">
                      <label>Facebook</label>
                      <input type="text" class="form-control" placeholder="facebook" required="" name="facebook" value="{{ (isset($profile->facebook)) ? $profile->facebook : ''}}">
                    </div>
                    <div class="form-group">
                      <label>Information</label>
                      <textarea rows="5" class="form-control" name="information" required="">
                        {{ (isset($profile->information)) ? $profile->information : ''}}
                      </textarea>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div><!-- /.box -->
    </div>

  </div>   <!-- /.row -->
</section><!-- /.content -->

<!-- jquery preview image  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection()