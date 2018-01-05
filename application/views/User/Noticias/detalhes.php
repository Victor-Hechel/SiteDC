<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h1 class="text-center">
					<?php echo $dados->titulo; ?>
				</h1>
				<p>Publicado em: <i><?php echo $dados->datahorapublicacao; ?></i></p>
				<?php
					if($dados->datahorapublicacao != $dados->datahoraatualizacao){
				?>
					<p>Atualizado em: <i><?php echo $dados->datahoraatualizacao; ?></i></p>
				<?php
					}
				?>
				<hr>
				<?php

					if($dados->foto != null){
				?>

					<img src="/uploads/<?php echo $dados->foto; ?>" class="img-responsive">

				<?php
					}

				?>

				<div>
					<?php
						echo $dados->descricao;
					?>
				</div>
			</div>
		</div>	
	</div>
</div>