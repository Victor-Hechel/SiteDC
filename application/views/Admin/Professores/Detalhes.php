<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="text-center">Professor</h2>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<?php
						if($dados->foto == null){
					?>
						<img src="/uploads/padrao.png" class="img-responsive">
					<?php
						}else{
					?>
						<img src="/uploads/<?php echo $dados->siape . $dados->foto;?>" class="img-responsive">
					<?php		
						}
					?>
				</div>
				<div class="col-md-8">
					<div>
						<label>Nome: </label>
						<span><?php echo $dados->nome;?></span>
					</div>
					<div>
						<label>Titulação: </label>
						<span><?php echo $dados->titulacao;?></span>
					</div>
					<div>
						<label>Lattes: </label>
						<span><?php echo $dados->lattes;?></span>
					</div>
					<div>
						<label>E-mail: </label>
						<span><?php echo $dados->email;?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>