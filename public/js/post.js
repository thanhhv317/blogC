$(document).ready(function() {
	setTimeout(()=> $('.alert-danger').hide(1000) ,4000);
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$('.deletePost').click(function(event) {
	let post_id = Number(this.id);
	var _token = $('input[name="_token"]').val();
	Swal.fire({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.value) {
	  	$.ajax({
	  		url: `/admin/post/delete`,
	  		type: 'POST',
	  		data: {
	  			_token	: _token,
	  			post_id : post_id
	  		},
	  		success: function(data) {
	  			Swal.fire(
			      'Deleted!',
			      'Your file has been deleted.',
			      'success'
			    );
			    $('#post-' + post_id).hide(1000);
	  		}
	  	});
	  }
	})
});

var editStatus = (id, id_post) => {
	let status = $('#comment-'+id).find('select').val();
	var _token = $('input[name="_token"]').val();
	$.ajax({
		url: '/admin/comment/edit',
		type: 'POST',
		data: {
			id 		: id,
			id_post : id_post,
			status  : status,
			_token  : _token
		},
		success: function(data) {
			if (data == 1) {
				Swal.fire('Updated!','This comment has been updated.','success');
			    $('#row-' + id).hide(1000);
			}
		}
	});	
}

$('.change-status').change(function(event) {
	let _token = $('input[name="_token"]').val();
	let id = $(this).attr('id');
	let status = $(this).val();
	$.ajax({
		url: '/admin/post/changeStatus',
		type: 'POST',
		data: {
			id: id,
			status: status,
			_token: _token
		},
		success: function(data) {
			if (data == 1)
				Swal.fire('Updated!','This post has been updated.','success');
			else
				Swal.fire('Error!','This post has not been updated.','error');
		}
	});
	
});
