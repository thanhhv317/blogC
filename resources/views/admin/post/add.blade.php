@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Add new post
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">post</li>
  </ol>
</section>

@include('admin.blocks.error')

<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="{{ route('admin.post') }}" class="btn btn-primary btn-block margin-bottom">Back to List</a>
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>
          <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts<span class="label label-primary pull-right">12</span></a></li>
            <li><a href="#"><i class="fa fa-trash-o"></i> Trash <span class="label label-warning pull-right">65</span></a></li>
          </ul>
        </div>
      </div>
       
    </div>
    <div class="col-md-9">
      <div class="box box-primary">
      <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-header with-border">
          <h3 class="box-title">Compose New Post</h3>
        </div>

        <div class="box-body">
            <div class="form-group">
              <input class="form-control" required="" name="title" type="text" placeholder="Title" value="{{ old('title') }}" />
            </div>
            <div class="form-group">
              <label>Category</label>
              <select class="form-control select2" required="" name="category">
                @foreach ($cates as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <textarea id="compose-textarea" required="" name="content" class="form-control" rows="30">
                {{ old('content') }}
              </textarea>
            </div>
            <div class="form-group">
              <div class="btn btn-default btn-file">
                <i class="fa fa-paperclip"></i> Attachment Post Image
                <input type="file" required="" name="attachment" id="imgInp" accept="image/*" />
              </div>
              <p class="help-block">Just Image (png, jpg,...)</p>
              <img id="blah" class="post-img-preview" />
            </div>
        </div>
        @if (isset($profile->image))
        <div class="box-footer">
          <div class="pull-right">
            <button class="btn btn-default"><i class="fa fa-pencil"></i> Save to draft</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> OK</button>
          </div>
        </div>
        @endif
      </form>
      </div>
    </div>
  </div>
</section>

<!-- jquery preview image  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection()