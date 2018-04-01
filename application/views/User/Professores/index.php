<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="text-center">Professores</h3>
			</div>
			<div class="panel-body">
				<?php
				 	for($i = 0; $i < count($dados); $i += 1) {
				 		$professor = $dados[$i];
				 		if($i % 4 == 0){
				 			
				?>
							<div class="row">
				<?php
				 		}
				 ?>
			 			<div class="col-sm-3" style="word-break: break-all;">
				 			<?php
				 				if($professor->foto != null){
				 			?>
				 				<img src="/uploads/<?php echo $professor->foto; ?>" class='img-circle img-responsive'>
				 			<?php
				 				}else{
				 			?>
				 			<div class="container-fluid">
				 				<img src="/images/professorDefault.png" class='img-circle img-responsive'>
				 			</div>
				 				
				 			<?php		
				 				}
				 			?>

				 			<h4 class="text-center"><?php echo $professor->nome; ?></h4>
				 			<h5 class="text-center"><?php echo $professor->titulacao;?></h5>
				 			<p ><b>Lattes: </b><a target="_blank" href="<?php echo $professor->lattes; ?>">Visualizar</a></p>
				 			<p ><b>Email: </b><span><?php echo $professor->email; ?></span></p>
			 			</div>
				 <?php
				 		if(($i + 1) % 4 == 0){
				 ?>
				 			</div>
				 <?php			
				 		}
				 	}
				 ?>
			</div>
		</div>
	</div>
</div>