<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Login</h1>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<form method="post" action="/admin/logar">
						<?php
							if ($this->session->flashdata('erro') != null) {

						?>

							<div class="alert alert-danger row text-center">
								<?php
									echo $this->session->flashdata('erro');
								?>
							</div>

						<?php
							}
						?>
						
						<div class="form-group row">
							<label for="login">Login: </label>
							<input type="text" name="login" id="login" class="form-control">
						</div>
						<div class="form-group row">
							<label for="senha">Senha: </label>
							<input type="password" name="senha" id="senha" class="form-control">
						</div>
						<div class="form-group row">
							<input class="btn btn-default full-width" type="submit" value="Logar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

