<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<h3>Professores</h3>
			</div>
			<div class="panel-body">
				<?php
					$this->load->view("/Admin/form_validation.php");
				?>
				<form method="post" action="/admin/Professores/cadastrar" enctype="multipart/form-data">
				<?php
					echo form_hidden('siapeOld', $dados['siape']);
					echo form_hidden('fotoOld', $dados['foto']);

				?>
					<div class="form-group">
						<label for="siape">Siape</label>
						<?php
						if(isset($dados['siape']))
							echo form_input(array(
											'name' => 'siape',
											'id' => 'siape',
											'class' => 'form-control',
											'value' => $dados['siape'],
											'readonly' => 'readonly'
											));
						else
							echo form_input(array(
											'name' => 'siape',
											'id' => 'siape',
											'class' => 'form-control',
											'value' => $dados['siape'],
											));
						?>
					</div>

					<div class="form-group">
						<label for="nome">Nome</label>
						<?php
							echo form_input(array(
											'name' => 'nome',
											'id' => 'nome',
											'class' => 'form-control',
											'value' => $dados['nome']
											));
						?>
					</div>

					<div class="form-group">
						<label for="titulacao">Titulação</label>
						<?php
							echo form_input(array(
											'name' => 'titulacao',
											'id' => 'titulacao',
											'class' => 'form-control',
											'value' => $dados['titulacao']
											));
						?>
					</div>

					<div class="form-group">
						<label for="lattes">Lattes</label>
						<?php
							echo form_input(array(
											'name' => 'lattes',
											'id' => 'lattes',
											'class' => 'form-control',
											'value' => $dados['lattes']
											));
						?>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<?php
							echo form_input(array(
											'name' => 'email',
											'id' => 'email',
											'class' => 'form-control',
											'value' => $dados['email']
											));

						?>
					</div>

					<div class="form-group changeable">

					<?php
						if ($dados['foto'] != null) {
					?>
								<div class="col-md-6">
									<img src="/uploads/<?php echo $dados['foto'];?>"
									 class='img-responsive'>
								</div>
								<div class="col-md-6">
									<label class="foto">Foto</label>
									<?php
										echo form_upload(array(
														 'name' => 'foto',
														 'id' => 'foto',
														 'class' => 'form-control'
														));
									?>
									<br>
										<button id="remove" class="btn btn-warning form-control">Remover foto antiga</button>
								</div>
																 
					<?php
						}else{
							echo ('<label class="foto">Foto</label>');
							echo form_upload(array(
											 'name' => 'foto',
											 'id' => 'foto',
											 'class' => 'form-control'
											));
						}
					?>

					</div>

					<input type="hidden" name="fotoOld" value="<?php echo $dados['foto']; ?>">
					<input type="hidden" name="trocarFoto" id="trocarFoto">

					<div class="form-group">
						<input type="submit" value="Cadastrar" class="form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on("click", "#remove", function(e){
		if(!confirm("Você tem certeza que deseja remover a imagem?"))
			e.preventDefault();
		else{
			$("#trocarFoto").val("t");
			var item = $("#foto").clone();
			$(".changeable").html('<label class="foto">Foto</label>');
			$(".changeable").append(item);
		}
	});
</script>