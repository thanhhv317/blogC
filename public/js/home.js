$('#send-comment').click(function(event) {
	let email 	= $('input[name="email"]').val();
	let name 	= $('input[name="name"]').val();
	let website = ($('input[name="website"]').val() != '') ? $('input[name="website"]').val() : '-';
	let message = $('textarea[name="message"]').val();
	let _token  = $('input[name="_token"]').val();
	let post_id = $('input[name="post_id"]').val();
	if (!checkStatus(email, name, message)) {
		alert('Vui lòng điền đầy đủ thông tin');
	} else {
		if (checkMail(email)) {
			$.ajax({
				url: '/sendComent',
				type: 'POST',
				data: {
					email 	: email,
					name	: name,
					website : website,
					message : message,
					post_id : post_id,
					_token 	: _token,
				},
				success: function(data) {
					console.log(data);
					Swal.fire({
					  title: 'Thành công, bình luận của bạn đang chờ phê duyệt',
					  width: 600,
					  padding: '3em',
					  background: '#fff url(https://grid.gograph.com/tartan-seamless-pattern-background-in-eps-illustration_gg104358566.jpg)',
					  backdrop: `
					    rgba(0,0,123,0.4)
					    url("https://thumbs.gfycat.com/ScaryMassiveGallowaycow-small.gif")
					    bottom left
					    no-repeat
					  `
					})
				}
			});
			
		} else {
			Swal.fire({
			  title: 'Không được rồi',
			  text: "Bạn có chắc đây là địa chỉ email hợp lệ!",
			  type: 'question',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Đúng là nó !'
			}).then((result) => {
			  if (result.value) {
			  	Swal.fire('Lừa nhau à', 'Chắc tôi tin quá, vui lòng nhập lại cho đúng nhé', 'warning');
			  }
			})
		}
	}

});

var checkStatus = (email, name, message) => {
	return (email == '' || name == '' || message == '') ? false : true;
}

var checkMail = email => {
	let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if (testEmail.test(email))
	    return true;
	return false;
}

// load more post
var skip = 7;
$('#loadMore').click(function(event) {
	let _token = $('input[name="_token"]').val();
	let cate = $('.category').attr('id');
	var view ='';
	$.ajax({
		url: '/loadMore',
		type: 'POST',
		data: {
			_token: _token,
			cate: cate,
			skip: skip
		},
		success: function(data) {
			if (data == 0) {
				$('#loadMore').hide();
			} else {
				console.log(data);
				var link = data.link;
				var arr = data.post;
				for (let i = 0; i < arr.length; ++i) {
					view += `<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="/blog-post/${arr[i].slug}"><img class="orther-post-img" src="${link}/${arr[i].image}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="">${arr[i].name}</a>
									<span class="post-date">${arr[i].created_at}</span>
								</div>
								<h3 class="post-title"><a href="/blog-post/${arr[i].slug}">${arr[i].title}</a></h3>
								<p><div class="format-text">${(arr[i].content).substr(0,150)}...</div></p>
							</div>
						</div>
					</div>`;
				}
				$('.append-data').append(view);
			}
		}
	});
	skip += 5;
});

// back to top button
$(document).ready(function() {
   $(window).scroll(function() { 
      if($(window).scrollTop() != 0) { 
        $('#top').fadeIn();
      } else {
        $('#top').fadeOut();
      }
   });
  $('#top').click(function() {
    $('html, body').animate({scrollTop:0},500);
  });
});
