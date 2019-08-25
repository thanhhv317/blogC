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

console.log("%c Smile                                                         .","font-size:28px;color:red;background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAEaElEQVRYhcVXT0iUWxT/fc7ogIsW0UYdx7I2Iq8ZihauhoSoEEJNEBGkneNCUrCBSpudb1GSIEiL3IguBHUUDcL+ODoMjyAwkJT3XomL2liO4BCVVr8W5/tz5/tmxqnXe+/AWXz3nvs7v+/cc889F8hfCgE0AvgdwGMAWzZ9rM816ra/TCoA9ANIAmCemtTXVPxT5xEV+OxZsLcXnJ0FV1fBrS3R1VUZ6+0VGxuZyM84rgTw0ABpbQWXl0EyP11eljUKiYc6Zl7yG4B3AOjzgfPz+Tu26/y8YOgk3unYOaVU0/AnAJaXg+/f/5jDZ8/AS5fAo0fBQACcmgK3twULAAsK8BeA0lwEEgBYW2uBTkyAwaClgQB4/jx4/Dj44gX4/Dn48aP87eHDzoS8cEFwamvNsUQ259cB0O+3/ry7O3e2nzsH3r4NNjZaYyUlJezo6GB1dbU5dueOYPr9pt11u3OvpmEPAB88EOc1NRZoKBRiLBZjLBZjKBQyxwMBiYDx3draSlXa29sJgB4PuLkp2ACo+/KqBO4DYHOzOF9chL7Qw3g8TrvE43F6PB4CYFeX2NbV1TnsSLKlpYUAGIkIdnOzSfi+SmAbAOfmxMgADYfDGUFJMhwOEwDLysR2dHQ0o93Y2BgBsKlJsOfmzCgkDecXjXAaiXfsmBglEgmS5OTkJIuLi9nW1mYCJxIJAqDbLbYbGxsZCaysrBAAq6os/EDAjMJFALinhigTAb/fb+5zMpnMSmB4eJhut5ter5fT09MkyVQqZa79/FnwIxGTwD0AeAKACwsWAfsWNDQ00OVysaioiKlUKm0LDh2yCHR2drKgoIAAWF9fnzUCCwsmgScAsA6AL19aBvYk3N/f58TEBBcXFx1JePKklQMzMzPUNI2apnFpaSljDpDiSyewDgC7ALizk17VjNDmOoY1NRqHh9NPwdDQEAcHB7OeAlJ86Ri7WQmMjkpZzVaEurvFbnvbGotGo2kJODU1ZWQ8NzezE3BsAQl++AB++SL7pZbiYFDKs2p79apFoqenh2traxwYGKDL5SIAnjiRbm/fAkcSknK/nz4Nvn6d30WkkrBrZ2e6rT0JHceQBEdGxMjnA79+TZ/79g0cHATHx8FHj6ztu3FDtq2yEjx1CjxyBOzvl8tKXW8/ho5CZGgwKIY3bzoJXL4siVpYCIbDzrW7u+DeHvjpk3POXoigl0WzFBv69KkVxpERJ9Dbt+CtW+D6evr4mzcSlfFxMB5Pn8tUigHbZaSqUZQAsK/v4Fzo67Psu7qc89kuI8d1rGpTkwXq84HXrkmSvnolOjsrY0r7xbt3nTi5rmMgQ0Oi6pkzcp6zZbqhVVVgNOpcf1BDYoijJVO1rk5IaJokH5TLqKwsd+dstGQuF/7I5hwASvXGkeXlUuUykSguFnW7RTMlqPrnRlPqcuFvHNCUAnm05f390gdeuZJeYu36M225If/rw0SViALynz7NVKnADz5ONQ07+EWPU1X+lef5dx3fisFC3wKhAAAAAElFTkSuQmCC');");
console.log("Do you intend to hack my site?");