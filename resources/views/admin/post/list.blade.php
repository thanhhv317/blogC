@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    {{ $title }}
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.post') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">post</li>
  </ol>
</section>

@if (isset($profile->image))
<section class="content-header">
  <div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
          <a class="btn btn-success" href="{{ route('admin.post.getNew') }}">Add new</a>
        </div>
      </div>
  </div>
</section>
@else
  <section class="content-header">
  <div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
          <h2>You must fill in personal information to write articles.</h2>
        </div>
      </div>
  </div>
</section>
@endif

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
            <a href="" class="btn btn-info"><i class="fa fa-comments"></i>Comment: </a>

            <select class="change-status" id="{{ $value->post_id }}">
              <option value="0" {{ ($value->status == 0) ? "selected" : "" }} >Disable</option>
              <option value="1" {{ ($value->status == 1) ? "selected" : "" }}>Enable</option>
            </select>
          </div>
        </form>
      </div>
    </div>
    @endforeach

  </div> 
</section>

@if ($posts->count() < $posts->total())
<section class="content-header">
  <div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
          <nav aria-label="pagination">
            <ul class="pager">
              <li class="{{ ($posts->currentPage() == 1) ? 'disabled' : 'enabled' }}"><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
              <li class="{{ ($posts->currentPage() == $posts->lastPage()) ? 'disabled' : 'enabled' }}"><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
  </div>
</section>
@endif

@endsection()