$('#send-comment').click(function(event) {
	let email 	= $('input[name="email"]').val();
	let name 	= $('input[name="name"]').val();
	let website = $('input[name="website"]').val();
	let message = $('textarea[name="message"]').val();
	let _token  = $('input[name="_token"]').val();
	let post_id = $('input[name="post_id"]').val();
	if (!checkStatus(email, name, message)) {
		alert('Please fill in the input');
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
			alert('Email is incorrect')
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

