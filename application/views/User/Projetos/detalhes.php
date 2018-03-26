<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h1 class="text-center title">
					<?php echo $dados->titulo; ?>
				</h1>

				<p class="descricao">
					<?php
						echo $dados->descricao;
					?>
				</p>
				<div class="text-center">
					<h2>Equipe</h2>
					<div class="row">
						<div class="col-sm-12">
							<h3>Orientador(a)</h3>
						</div>
						<div class="col-sm-12">
							<?php
								if($dados->foto != null){
							?>
									<img src="img-responsive img-circle" src="/uploads/<?php echo $dados->foto;?>">
							<?php
								}
							?>
							<h4><?php echo $dados->coordenador["nome"];?></h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<h3>Bolsistas</h3>
						</div>
						<div class="col-sm-12">
							<?php
								foreach ($dados->aluno as $value) {
							?>
								<h4><?php echo $value;?></h4>
							<?php
								}
							?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<h3>Professores</h3>
						</div>
						<div class="col-sm-12">
							<?php
								foreach ($dados->nome as $value) {
							?>
								<h4><?php echo $value;?></h4>
							<?php
								}
							?>
						</div>
					</div>
				</div>

			</div>
		</div>	
	</div>
</div>

<style type="text/css">
	.title{
		width: 90%;
		border-bottom: 0.1px solid lightgray;
		margin-left: 5%;
		padding-bottom: 2%;
	}

	.descricao{
		margin: 5% 5% 0% 5%;
		width: 90%;
		padding-bottom: 2%;
		border-bottom: 0.1px solid lightgray;
	}


</style>