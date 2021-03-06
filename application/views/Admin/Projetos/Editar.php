<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<h3>Projetos</h3>
			</div>
			<div class="panel-body">
				<?php
					$this->load->view("/Admin/form_validation.php");
				?>
				<form method="post" action="/admin/Projetos/Cadastrar">
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $dados['titulo'];?>">
					</div>

					<div class="form-group">
						<label for="coordenador">Coordenador</label>
						<?php

							echo form_dropdown('coordenador', $dados['professores'], $dados['coordenador']['id'], "class='form-control'");
						?>
					</div>

					<div class="form-group">
						<label for="tipo">Tipo</label>
						<select class="form-control" id="tipo" name="tipo" >
							<option value="pesquisa" <?php if($dados['tipo'] == "pesquisa") echo("selected"); ?>>Pesquisa</option>
							<option value="extensao" <?php if($dados['tipo'] == "extensao") echo("selected"); ?>>Extensão</option>
							<option value="ensino" <?php if($dados['tipo'] == "pesquisa") echo("ensino"); ?>>Ensino</option>
						</select>
					</div>

					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea name="descricao" id="descricao" class="form-control" rows=5><?php echo $dados['descricao']; ?></textarea>
					</div>

					<div class="form-group">
						<label for="bolsista">Bolsistas</label>
						<div class="input-group">
							<input type="text" class="form-control" id="bolsista">
					      	<span class="input-group-btn">
					        	<button class="btn btn-secondary" type="button" id="addBolsista">Adicionar</button>
					      	</span>
						</div>
					</div>
					<div class="form-group">
						<table class="table table-bordered table-stripped">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dados['bolsistas'] as $value) {
								?>

										<tr>
											<td><?php echo $value ?></td>
											<td>
												<button type='button' class="btn btn-danger removerBolsista">Remover</button>
												<input type='hidden' value=<?php echo "$value";?> name='bolsista[]'>
											</td>
										</tr>

								<?php

									}

								?>
							</tbody>
						</table>
					</div>

					<div class="form-group">
						<label for="equipe">Equipe</label>
						<?php
							$attrs = array("class" => "form-control");
							echo form_multiselect('equipe[]', $dados['professores'], $dados['equipe'], $attrs);
						?>
					</div>

					<input type="hidden" name="id" value="<?php echo $dados['id'];?>">

					<div class="form-group">
						<input type="submit" value="Salvar" class="btn btn-default full-width">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/js/Admin/ProjetosCadastro.js"></script>