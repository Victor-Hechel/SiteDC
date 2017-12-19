<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">Cadastrar Notícia</span>
			</div>
			<div class="panel-body">
				<form method="post" action="/admin/Noticias/atualizarInfo" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $dados['id'];?>">

					<div class="form-group">
						<label for="titulo">Título</label>
						<?php
							echo form_input(array(
											'name' => 'titulo',
											'id' => 'titulo',
											'class' => 'form-control',
											'value' => $dados['titulo']
								));
						?>
					</div>

					<div class="form-group">
						<label for="descricao">Descrição</label>
						<?php
							echo form_textarea(array(
											'name' => 'descricao',
											'id' => 'descricao',
											'class' => 'form-control',
											'rows' => 5,
											'value' => $dados['descricao']
								));
						?>
					</div>

					<div class="form-group">
						<label for="fotoPrincipal">Foto Principal</label>
						<input type="file" name="fotoPrincipal" id="fotoPrincipal" class="form-control">
						<?php
							if($dados['foto'] != null){
						?>	
						<br>
							<div class="row">
								<div class="col-md-offset-3 col-md-6">
									<img src="/uploads/<?php echo $dados['foto']; ?>" class="img-responsive">
								</div>
							</div>
						<?php			
							}
						?>
						<input type="hidden" name="fotoOld" value="<?php echo $dados['foto']; ?>">
					</div>

					<div class="form-group">
						<input type="submit" value="Cadastrar" class="form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>