<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="text-center">Professores</h3>
			</div>
			<div class="panel-body">
				<?php
				 	foreach ($dados as $professor) {
				 ?>
			 			<div class="col-sm-3">
			 			<?php
			 				if($professor->foto != null){
			 			?>
			 				<img src="/uploads/<?php echo $professor->foto; ?>" class='img-circle'>
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
			 			<p><b>Lattes: </b><?php echo $professor->lattes; ?></p>
			 			<p><b>Email: </b><?php echo $professor->email; ?></p>
			 			</div>
				 <?php
				 	}
				 ?>
			</div>
		</div>
	</div>
</div>