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
      <a href="mailbox.html" class="btn btn-primary btn-block margin-bottom">Back to List</a>
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>
          <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
            <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /. box -->
       
    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
      <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-header with-border">
          <h3 class="box-title">Compose New Post</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
              <input class="form-control" required="" name="title" type="text" placeholder="Title:" />
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
                <h1><u>Heading Of Message</u></h1>
                <h4>Subheading</h4>
                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee</p>
                <img src="https://via.placeholder.com/150x150" alt="image size 150x150">
                <ul>
                  <li>List item one</li>
                  <li>List item two</li>
                  <li>List item three</li>
                  <li>List item four</li>
                </ul>
                <p>Thank you,</p>
                <p>John Doe</p>
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
        </div><!-- /.box-body -->

        <div class="box-footer">
          <div class="pull-right">
            <button class="btn btn-default"><i class="fa fa-pencil"></i> Save to draft</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> OK</button>
          </div>
        </div><!-- /.box-footer -->
      </form>
      </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<!-- jquery preview image  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection()