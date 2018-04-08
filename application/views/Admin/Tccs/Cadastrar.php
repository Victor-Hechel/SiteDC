<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<h3>TCCs</h3>
			</div>
			
			<div class="panel-body">
				<?php
					$this->load->view("/Admin/form_validation.php");
				?>
				<form method="post" action="/admin/Tccs/cadastrar" enctype="multipart/form-data">
				<?php
					$select ="class='form-control'";
					echo form_hidden('id', $dados['id']);

				?>
					<div class="form-group">
						<label for="titulo">Titulo</label>
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
						<label for="autor">Autor</label>
						<?php
							echo form_input(array(
											'name' => 'autor',
											'id' => 'autor',
											'class' => 'form-control',
											'value' => $dados['autor']
											));
						?>
					</div>

					<div class="form-group">
						<label for="professorid">Orientador</label>
						<?php

							echo form_dropdown('professorid', $dados['professores'], $dados['professorid'], $select);
						?>
					</div>

					<div class="form-group">
						<label for="palavraschave">Palavras Chave</label>
						<?php
							echo form_input(array(
											'name' => 'palavraschave',
											'id' => 'Palavraschave',
											'class' => 'form-control',
											'value' => $dados['palavrasChave']
											));
						?>
					</div>

					<div class="form-group">
						<label for="ano">Ano</label>
						<?php
							echo form_input(array(
											'name' => 'ano',
											'id' => 'ano',
											'class' => 'form-control',
											'value' => $dados['ano']
											));
						?>
					</div>

					<div class="form-group">
						<label for="curso">Curso</label>
						<?php
							$options = array(
											'integrado' => 'Informática para Internet',
											'superior' => 'Tecnólogo em Análise e Desenvolvimento de Sistemas'
								);
							echo form_dropdown('curso', $options, $dados['curso'], $select);
						?>
					</div>
					
					<div class="form-group"> 
						<label for="tcc">TCC</label>										 
						<?php

							echo form_upload(array(
											 'name' => 'tcc',
											 'id' => 'tcc',
											 'class' => 'form-control',
											));
						
						?>
					</div>

					<?php
						if($dados['tccOld'] != null){
					?>
						<div class="form-group">
							<a class="btn btn-info form-control" target="_blank" href="/tccs/<?php echo $dados['tccOld'];?>">Arquivo de TCC atual</a>
						</div>
					<?php
						}
					?>	

					<input type="hidden" name="tccOld" value="<?php echo $dados['tccOld'];?>">

					<div class="form-group">
						<input type="submit" value="Cadastrar" class="form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>