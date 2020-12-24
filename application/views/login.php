<div class="container text-center">
	<?php
	$attr = array(
		'name' => 'login_form',
		'method' => 'post',
		'id' => 'login_form');
	echo form_open_multipart('#', $attr); 
	?>
	<div class="form-signin">
		<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		
		<div class="row">
			<div class="col">
				<a href="<?= base_url('Admin/register_view') ?>" class="text-primary">Register</a>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<button class="btn btn-primary btn-block" id="login">Sign in</button>	
			</div>
		</div>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</div>
</div>

<script type="text/javascript">
	$('#login_form').submit(function(e){
		e.preventDefault();
	})
	$('#login').click(function(){

		if(!$('#login_form')[0].checkValidity())
		{
			return ;
		}
		var form = $('#login_form')[0];
		var datastring = new FormData(form);

		$.ajax({
			data: datastring,
			type: $('#login_form').attr('method'),
			url: "<?= base_url() ?>Admin/login",
			processData: false,
			contentType: false,
			cache: false,
			dataType: 'json',
			success: function(response){

				if (response.status == 1) {
					window.location.href = "<?= base_url('Admin/user_view') ?>";
				}else{
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