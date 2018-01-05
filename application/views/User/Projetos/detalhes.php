<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h1 class="text-center">
					<?php echo $dados->titulo; ?>
				</h1>

				<p>
					<?php
						echo $dados->descricao;
					?>
				</p>

				<div class="row">
					<div class="col-sm-12">
						<h3>Orientador</h3>
					</div>
					<div class="col-sm-12">
						<?php
							if($dados->foto != null){
						?>
								<img src="img-responsive img-circle" src="/uploads/<?php echo $dados->foto;?>">
						<?php
							}
						?>
						<h4><?php echo $dados->coordenador;?></h4>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<h4>Bolsistas</h4>
					</div>
					<div class="col-sm-12">
						<?php
							foreach ($dados->aluno as $value) {
						?>
							<p><?php echo $value;?></p>
						<?php
							}
						?>
					</div>
				</div>

			</div>
		</div>	
	</div>
</div>