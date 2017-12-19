<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="text-center">
					<?php
						echo $dados->titulo;
					?>
				</h2>
			</div>
			<div class="panel-body">
				<p>Publicado em: <?php echo $dados->datahora ?></p>
				<br>
				<p>
					<?php
						echo $dados->descricao;
					?>
				</p>
			</div>
		</div>
	</div>
</div>