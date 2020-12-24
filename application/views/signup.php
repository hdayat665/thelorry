<div class="container text-center">
	<?php
	$attr = array(
		'name' => 'signup_form',
		'method' => 'post',
		'id' => 'signup_form');
	echo form_open_multipart('#', $attr); 
	?>
	<div class="form-signin">
		<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Registration New User</h1>
		<label for="inputPassword" class="sr-only">Full Name</label>
		<input type="text" id="inputPassword" name="acc_name" class="form-control" placeholder="Fullname" required>
		<br>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" id="register">Sign up</button>
	</div>
</div>

<script type="text/javascript">
	$('#signup_form').submit(function(e){
		e.preventDefault();
	})
	$('#register').click(function(){

		if(!$('#signup_form')[0].checkValidity())
		{
			return ;
		}
		var form = $('#signup_form')[0];
		var datastring = new FormData(form);

		$.ajax({
			data: datastring,
			type: $('#signup_form').attr('method'),
			url: "<?= base_url() ?>Admin/register",
			processData: false,
			contentType: false,
			cache: false,
			dataType: 'json',
			success: function(response){

				$.alert({
					title: 'TheLorry',
					content: response.msg,
					buttons: {
						OK: {
							text: 'OK',
							action: function(){
								window.location.href = "<?= base_url('/') ?>"
							}
						},
					}
				});

			},

			error: function(){
				$('body').removeClass('loading');
				$.alert({
					title: 'TheLorry',
					content: response.msg,
					buttons: {
						OK: {
							text: 'OK',

						},
					}
				});
			}
		});
	})
</script>